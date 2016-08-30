<?php

namespace Emerap\OembedFilter;

const EMERAP_OEMBED_FILTER_RESPONSE_JSON = 0;
const EMERAP_OEMBED_FILTER_RESPONSE_XML  = 1;

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
      preg_match($service->getPatterns(), $url, $match);
      if ($match) {
        $this->addUrl($url, $service);
        return TRUE;
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
    return array(
      '\Emerap\OembedFilter\Service\YoutubeOembed',
    );
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
        'path'    => $url,
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
      $path = $url['path'];
      if ($oembed_request = $this->getOembedData($service, $path)) {
        $snippet = $service->filter($oembed_request);
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
    $req = FALSE;
    if ($curl = curl_init()) {
      curl_setopt($curl, CURLOPT_URL, $service->getEndpoit());
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($curl, CURLOPT_POST, !TRUE);
      $query_params = array(
        'url'    => $url,
        'format' => ($service->getFormatResponse() == EMERAP_OEMBED_FILTER_RESPONSE_JSON) ? 'json' : 'xml',
      );
      curl_setopt($curl, CURLOPT_POSTFIELDS, $query_params);
      $data = curl_exec($curl);
      $req = $this->parse($data, $service);
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

    if ($service->getFormatResponse() == 'json') {
      $oembed_data = (array) json_decode($data);
    }
    else {
      // Xml parse.
      $xml = simplexml_load_string($data);

      switch (TRUE) {

        case (isset($xml->type)):
          $oembed_data['type'] = (string) $xml->type;

        case (isset($xml->width)):
          $oembed_data['width'] = (string) $xml->width;

        case (isset($xml->provider_name)):
          $oembed_data['provider_name'] = (string) $xml->provider_name;

        case (isset($xml->thumbnail_url)):
          $oembed_data['thumbnail_url'] = (string) $xml->thumbnail_url;

        case (isset($xml->thumbnail_height)):
          $oembed_data['thumbnail_height'] = (string) $xml->thumbnail_height;

        case (isset($xml->title)):
          $oembed_data['title'] = (string) $xml->title;

        case (isset($xml->height)):
          $oembed_data['height'] = (string) $xml->height;

        case (isset($xml->provider_url)):
          $oembed_data['provider_url'] = (string) $xml->provider_url;

        case (isset($xml->thumbnail_width)):
          $oembed_data['thumbnail_width'] = (string) $xml->thumbnail_width;

        case (isset($xml->author_url)):
          $oembed_data['author_url'] = (string) $xml->author_url;

        case (isset($xml->version)):
          $oembed_data['version'] = (string) $xml->version;

        case (isset($xml->html)):
          $oembed_data['html'] = (string) $xml->html;

        case (isset($xml->author_name)):
          $oembed_data['author_name'] = (string) $xml->author_name;
      }

    }

    return $oembed_data;
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
  public function getSourceText() {
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
  public function setSourceText($source_text) {
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
