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
      'http(|s):\/\/instagram\.com\/p',
      'http(|s):\/\/instagr\.am\/p',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://api.instagram.com/oembed';
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
    return 'http://instagr.am/p/fA9uwTtkSN';
  }

}
