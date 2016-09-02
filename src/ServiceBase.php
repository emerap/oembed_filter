<?php

namespace Emerap\OembedFilter;

/**
 * Class ServiceBase.
 *
 * @package Emerap\OembedFilter
 */
abstract class ServiceBase implements ServiceInterface {

  /**
   * Get definition hash.
   *
   * @return string
   *   Definition hash.
   */
  public function getHash() {
    $str = '';

    $str .= $this->getId();
    $str .= $this->getEndpoit();
    $str .= $this->getFormatResponse();
    $str .= $this->getDiscovery();
    $str .= implode('', (array) $this->getPatterns());
    $str .= implode('', (array) $this->getExamples());

    return md5($str);
  }

  /**
   * Get format response label.
   *
   * @return string
   *   Format response label.
   */
  public function getFormatResponseLabel() {
    return ($this->getFormatResponse() == EMERAP_OEMBED_FILTER_RESPONSE_JSON) ? 'JSON' : 'XML';
  }

  /**
   * Get format response label.
   *
   * @return string
   *   Format response label.
   */
  public function getDiscoveryLabel() {
    return ($this->getDiscovery()) ? 'TRUE' : 'FALSE';
  }

  /**
   * {@inheritdoc}
   */
  public function getFormatResponse() {
    return EMERAP_OEMBED_FILTER_RESPONSE_JSON;
  }

  /**
   * {@inheritdoc}
   */
  public function getDiscovery() {
    return FALSE;
  }

}
