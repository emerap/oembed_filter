<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class CoubOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class CoubOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Coub';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/coub\.com\/(view|embed';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://coub.com/api/oembed.json';
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
    return 'http://coub.com/view/2ohum';
  }

}
