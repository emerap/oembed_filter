<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class KickstarterOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class KickstarterOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Kickstarter';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/www\.kickstarter\.com\/projects\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://www.kickstarter.com/services/oembed';
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
    return 'https://www.kickstarter.com/projects/102322374/plain-papyrus-diy-paper-mask?ref=home_popular';
  }

}
