<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class GeographOrgUKOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class GeographOrgUKOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'GeographOrgUK';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return array(
      'http:\/\/.*\.geograph\.(org\.uk|co\.uk|ie)\/.*',
      'http:\/\/.*\.wikimedia\.org\/.*_geograph\.org\.uk_.*',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://api.geograph.org.uk/api/oembed';
  }

  /**
   * {@inheritdoc}
   */
  public function filter($fields) {
    return '<img src="' . $fields['url'] . '" />';
  }

  /**
   * {@inheritdoc}
   */
  public function getExamples() {
    return 'http://www.geograph.org.uk/photo/2928776';
  }

}
