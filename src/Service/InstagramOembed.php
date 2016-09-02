<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class InstagramOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class InstagramOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Instagram';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return array(
      'http(|s):\/\/(|www\.)instagram\.com\/p',
      'http(|s):\/\/(|www\.)instagr\.am\/p',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://api.instagram.com/oembed/';
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
    return 'https://www.instagram.com/p/BJdYw4SDQAp';
  }

}
