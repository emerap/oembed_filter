<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class AnimatronOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class AnimatronOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Animatron';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'https:\/\/(|www)\.animatron\.com\/project';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://www.animatron.com/oembed/json';
  }

  /**
   * {@inheritdoc}
   */
  public function getDiscovery() {
    return TRUE;
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
    return 'https://www.animatron.com/project/a7d88f565846acac316121d1';
  }

}
