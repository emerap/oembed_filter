<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class AnimotoOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class AnimotoOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Animoto';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/animoto\.com\/play';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://animoto.com/oembeds/create';
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
    return 'https://animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA';
  }

}
