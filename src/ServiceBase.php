<?php

namespace Emerap\OembedFilter;

/**
 * Class ServiceBase.
 *
 * @package Emerap\OembedFilter
 */
abstract class ServiceBase implements ServiceInterface {

  /**
   * Get format response.
   *
   * @tag int
   *   Format response.
   */
  public function getFormatResponse() {
    return EMERAP_OEMBED_FILTER_RESPONSE_JSON;
  }

}
