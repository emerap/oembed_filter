<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class DeviantartOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class DeviantartOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Deviantart';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return array(
      'http:\/\/.*\.deviantart\.com\/art\/',
      'http:\/\/.*\.deviantart\.com\/.*\#\/\d.*',
      'http:\/\/fav\.me\/.*',
      'http:\/\/sta\.sh\/.*',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://backend.deviantart.com/oembed';
  }

  /**
   * {@inheritdoc}
   */
  public function filter($fields) {
    return '<img src="' . $fields['url'] . '" />';
  }

  /**
   * {@inheritdoc}
   */
  public function getExamples() {
    return array(
      'http://sauronsephiroth.deviantart.com/art/HeWillNotDie-626406083',
      'http://marsiams.deviantart.com/art/Follow-the-Ravenheart-551270670',
    );
  }

}
