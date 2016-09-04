<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class DailymotionOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class DailymotionOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Dailymotion';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/www\.dailymotion\.com\/video\/';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://www.dailymotion.com/services/oembed';
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
  public function getDiscovery() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function getExamples() {
    return array(
      'http://www.dailymotion.com/video/xoxulz_babysitter_animals',
    );
  }

}
