<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class DailyMileOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class DailyMileOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'DailyMile';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/www\.dailymile\.com\/people\/.*\/entries\/';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://api.dailymile.com/oembed';
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
    return array(
      'http://www.dailymile.com/people/EddieJ3/entries/24776213',
    );
  }

}
