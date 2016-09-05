<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class TedOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class TedOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Ted';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/ted\.com\/talks\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://www.ted.com/services/v1/oembed.json';
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
    return 'http://www.ted.com/talks/jill_bolte_taylor_s_powerful_stroke_of_insight.html';
  }

}
