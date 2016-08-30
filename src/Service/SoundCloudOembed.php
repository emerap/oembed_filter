<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class SoundCloudOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class SoundCloudOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'SoundCloud';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return '/https:\/\/soundcloud\.com/';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://soundcloud.com/oembed';
  }

  /**
   * {@inheritdoc}
   */
  public function filter($fields) {
    return $fields['html'];
  }

}
