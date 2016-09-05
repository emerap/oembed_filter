<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class FunnyOrDieOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class FunnyOrDieOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'FunnyOrDie';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/www\.funnyordie\.com\/videos\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://www.funnyordie.com/oembed.json';
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
    return 'http://www.funnyordie.com/videos/a7311134ac/patton-oswalt-in-heavy-metal';
  }

}
