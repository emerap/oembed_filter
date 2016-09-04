<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class CacooOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class CacooOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Cacoo';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/cacoo\.com\/diagrams';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://cacoo.com/oembed.json';
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
    return 'https://cacoo.com/diagrams/m9uZtizE5I2GkFR6';
  }

}
