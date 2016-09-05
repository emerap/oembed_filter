<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class DotsubOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class DotsubOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Dotsub';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/dotsub\.com\/view\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://dotsub.com/services/oembed';
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
    return 'http://dotsub.com/view/665bd0d5-a9f4-4a07-9d9e-b31ba926ca78';
  }

}
