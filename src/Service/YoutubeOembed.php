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
    return 'YouTube';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'https:\/\/www\.youtube\.com';
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
  public function getDiscovery() {
    return TRUE;
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
  public function getExamples() {
    return 'https://www.youtube.com/watch?v=x30YOmfeVTE';
  }

}
