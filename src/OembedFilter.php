<?php

namespace Emerap\OembedFilter;

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
   * @param \Emerap\OembedFilter\ServiceInterface $service
   *   Processing service instance.
   */
  private function addUrl($url, ServiceInterface $service) {
    $urls = $this->getUrls();

    if (!isset($urls[$url])) {
      $urls[$url] = $service;
      $this->urls = $urls;
    }
  }

  /**
   * Apply oembed filter.
   */
  public function apply() {
    $this->findUrls();
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
   * @return \Emerap\OembedFilter\ServiceInterface[]
   *   Urls
   */
  public function getUrls() {
    return $this->urls;
  }

  /**
   * Get services objects.
   *
   * @return \Emerap\OembedFilter\ServiceInterface[]
   *   Services objects.
   */
  public function getServicesObjects() {
    return $this->servicesObjects;
  }

  /**
   * Set services objects.
   *
   * @param \Emerap\OembedFilter\ServiceInterface[] $services
   *   Services objects.
   */
  public function setServicesObjects($services) {
    $this->servicesObjects = $services;
  }

}
