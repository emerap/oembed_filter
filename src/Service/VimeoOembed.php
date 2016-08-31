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
    return array(
      'https:\/\/vimeo\.com\/.*',
      'https:\/\/vimeo\.com\/album\/.*\/video\/.*',
      'https:\/\/vimeo\.com\/channels\/.*/.*',
      'https:\/\/vimeo\.com\/groups\/.*/videos/.*',
      'https:\/\/vimeo\.com\/ondemand\/.*\/.*',
      'https:\/\/player\.vimeo\.com\/video\/.*',
    );
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

  /**
   * {@inheritdoc}
   */
  public function getExampleUrls() {

  }

}
