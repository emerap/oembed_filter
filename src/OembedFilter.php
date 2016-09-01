<?php

namespace Emerap\OembedFilter;

const EMERAP_OEMBED_FILTER_RESPONSE_JSON = 0;
const EMERAP_OEMBED_FILTER_RESPONSE_XML  = 1;

const EMERAP_OEMBED_FILTER_VERSION = '1.0.0';

/**
 * Class OembedFilter.
 *
 * @package Emerap\OembedFilter
 */
class OembedFilter {

  protected $sourceText;
  protected $urls;
  protected $servicesObjects;

  /**
   * EmbedFilter constructor.
   *
   * @param string $text
   *   Source text.
   */
  public function __construct($text) {
    $this->setSourceText($text);
  }

  /**
   * Find urls in source text.
   */
  private function findUrls() {
    preg_match_all('/\b(?:(?:https?|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $this->getSourceText(), $match_urls);
    if (isset($match_urls[0])) {
      foreach ($match_urls[0] as $url) {
        $this->findService($url);
      }
    }
  }

  /**
   * Find services in urls.
   *
   * @param string $url
   *   Url.
   *
   * @return bool
   *   State;
   */
  private function findService($url) {
    // Create instances if not exist.
    if (!$this->getServicesObjects()) {
      $services = array();
      foreach (self::getServices() as $service) {
        /** @var \Emerap\OembedFilter\ServiceInterface $instance */
        $instance                     = new $service();
        $services[$instance->getId()] = $instance;
      }
      $this->setServicesObjects($services);
    }

    foreach ($this->getServicesObjects() as $service) {
      $patterns = $service->getPatterns();
      if (is_array($patterns)) {
        foreach ($patterns as $pattern) {
          preg_match('/' . $pattern . '/', $url, $match);
          if ($match) {
            $this->addUrl($url, $service);

            return TRUE;
          }
        }
      }
      else {
        preg_match('/' . $service->getPatterns() . '/', $url, $match);
        if ($match) {
          $this->addUrl($url, $service);

          return TRUE;
        }
      }
    }

    return FALSE;
  }

  /**
   * Get all services.
   *
   * @return array
   *   All available services.
   */
  static public function getServices() {
    $files    = scandir(__DIR__ . '/Service');
    $services = array();
    foreach ($files as $file) {
      preg_match('/.*Oembed/', $file, $match);
      if (isset($match[0])) {
        $services[] = '\Emerap\OembedFilter\Service\\' . $match[0];
      }
    }

    return $services;
  }

  /**
   * Get service instance.
   *
   * @param string $class
   *   Service instance.
   *
   * @return ServiceBase|bool
   *    Service instance or false.
   */
  static public function getServiceInstance($class) {
    if (class_exists($class)) {
      return new $class();
    }
    return FALSE;
  }

  /**
   * Add url.
   *
   * @param string $url
   *   Url.
   * @param \Emerap\OembedFilter\ServiceBase $service
   *   Processing service instance.
   */
  private function addUrl($url, ServiceBase $service) {
    $urls = $this->getUrls();

    if (!isset($urls[$url])) {
      $urls[]     = array(
        'path' => $url,
        'service' => $service,
      );
      $this->urls = $urls;
    }
  }

  /**
   * Apply oembed filter.
   */
  public function apply() {
    $this->findUrls();
    $replace = array();

    foreach ($this->getUrls() as $url) {
      /** @var ServiceBase $service */
      $service = $url['service'];
      $path    = $url['path'];
      if ($oembed_request = $this->getOembedData($service, $path)) {
        $snippet        = $this->buildHtml($service->filter($oembed_request), $service);
        $replace[$path] = $snippet;
      }
    }
    $out = $this->getSourceText();
    foreach ($replace as $path => $item) {
      $out = str_replace($path, $item, $out);
    }

    return $out;
  }

  /**
   * Get oembed data.
   *
   * @param \Emerap\OembedFilter\ServiceBase $service
   *   Service instance.
   * @param string $url
   *   Source url.
   *
   * @return bool|mixed
   *   Request from oembed service.
   */
  private function getOembedData(ServiceBase $service, $url) {
    $req          = FALSE;
    $query_params = array('url' => $url);
    // Checking format response on endpoint path.
    if (!preg_match('/\.(json|xml)$/', $service->getEndpoit())) {
      $query_params['format'] = ($service->getFormatResponse() == EMERAP_OEMBED_FILTER_RESPONSE_JSON) ? 'json' : 'xml';
    }
    // Get oembed response from service.
    if ($curl = curl_init()) {
      curl_setopt($curl, CURLOPT_URL, $service->getEndpoit() . '?' . http_build_query($query_params));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
      $data = curl_exec($curl);
      $req  = $this->parse($data, $service);
      curl_close($curl);
    }

    return $req;
  }

  /**
   * Request parse.
   *
   * @param string $data
   *   Oembed service raw request.
   * @param \Emerap\OembedFilter\ServiceBase $service
   *   Service instance.
   *
   * @return array
   *   Deserialize oembed request.
   */
  private function parse($data, ServiceBase $service) {
    $oembed_data = array();

    if ($service->getFormatResponse() == EMERAP_OEMBED_FILTER_RESPONSE_JSON) {
      $oembed_data = (array) json_decode($data);
    }
    else {
      // Xml parse.
      $xml = simplexml_load_string($data);
      foreach ($xml as $item) {
        $key = $item->getName();
        if (isset($xml->$key)) {
          $oembed_data[$key] = (string) $xml->$key;
        }
      }
    }

    return $oembed_data;
  }

  /**
   * Get vendor css class.
   *
   * @return string
   *   Vendor css class.
   */
  private function getVendorCssClass() {
    return 'emerap-oembed';
  }

  /**
   * Get html wrapper.
   *
   * @return string
   *   Html wrapper.
   */
  private function getHtmlWrapper() {
    return '<div class="%classes">%content</div>';
  }

  /**
   * Build html.
   *
   * @param string $snippet
   *   After service filter.
   * @param \Emerap\OembedFilter\ServiceBase $service
   *   Service instance.
   *
   * @return string
   *   Total string.
   */
  private function buildHtml($snippet, ServiceBase $service) {
    $out        = $this->getHtmlWrapper();
    $css_vendor = $this->getVendorCssClass();
    $classes    = array(
      $css_vendor . '-wrapper',
      $css_vendor . '-' . mb_strtolower($service->getId()),
    );

    $out = str_replace('%classes', implode(' ', $classes), $out);
    $out = str_replace('%content', $snippet, $out);

    return $out;
  }

  /**
   * Library version.
   *
   * @return string
   *   Library version.
   */
  public static function version() {
    return EMERAP_OEMBED_FILTER_VERSION;
  }

  /**
   * GETTERS / SETTERS.
   */

  /**
   * Get source text.
   *
   * @return string
   *   Source text.
   */
  private function getSourceText() {
    return $this->sourceText;
  }

  /**
   * Set source text.
   *
   * @param string $source_text
   *   Source text.
   *
   * @return $this
   */
  private function setSourceText($source_text) {
    $this->sourceText = $source_text;

    return $this;
  }

  /**
   * Get urls.
   *
   * @return array
   *   Urls list.
   */
  public function getUrls() {
    return $this->urls;
  }

  /**
   * Get services objects.
   *
   * @return \Emerap\OembedFilter\ServiceBase[]
   *   Services objects.
   */
  public function getServicesObjects() {
    return $this->servicesObjects;
  }

  /**
   * Set services objects.
   *
   * @param \Emerap\OembedFilter\ServiceBase[] $services
   *   Services objects.
   */
  public function setServicesObjects($services) {
    $this->servicesObjects = $services;
  }

}
