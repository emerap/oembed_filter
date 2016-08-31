<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class CodepenOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class CodepenOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Codepen';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/codepen\.io';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://codepen.io/api/oembed';
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
  public function getExampleUrls() {
    return 'http://codepen.io/alexzaworski/pen/mEkvAG';
  }

}
