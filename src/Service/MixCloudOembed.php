<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class MixCloudOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class MixCloudOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'MixCloud';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/www\.mixcloud\.com\/.*\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://www.mixcloud.com/oembed/';
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
    return 'http://www.mixcloud.com/TechnoLiveSets/jon_rundell-live-electrobeach-festival-benidorm-16-08-2013';
  }

}
