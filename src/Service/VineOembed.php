<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class VineOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class VineOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Vine';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/vine\.co\/v\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://vine.co/oembed.json';
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
    return 'https://vine.co/v/Ml16lZVTTxe';
  }

}
