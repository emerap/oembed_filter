<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class VimeoOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class VimeoOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Vimeo';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return '/https:\/\/vimeo\.com/';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://vimeo.com/api/oembed.json';
  }

  /**
   * {@inheritdoc}
   */
  public function filter($fields) {
    return $fields['html'];
  }

}
