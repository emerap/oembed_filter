<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class BlackfireOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class BlackfireOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Blackfire';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return array(
      'https:\/\/blackfire\.io\/profiles\/.*\/graph',
      'https:\/\/blackfire\.io\/profiles\/compare\/.*\/graph',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://blackfire.io/oembed';
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
  public function getExamples() {
    return 'https://blackfire.io/profiles/ffcffdc1-50db-42bc-bcbb-dcfe86758e26/graph';
  }

}
