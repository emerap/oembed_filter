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
    return 'json';
  }

}
