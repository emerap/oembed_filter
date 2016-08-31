<?php

namespace Emerap\OembedFilter;

/**
 * Class ServiceBase.
 *
 * @package Emerap\OembedFilter
 */
abstract class ServiceBase implements ServiceInterface {

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
