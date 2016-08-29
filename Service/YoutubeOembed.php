<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class YoutubeOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class YoutubeOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'youtube';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return '/http://www.youtube.com/';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://www.youtube.com/oembed';
  }

  /**
   * {@inheritdoc}
   */
  public function filter($fields) {
    return '';
  }

}
