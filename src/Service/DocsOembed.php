<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class DocsOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class DocsOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Docs';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return array(
      'https:\/\/(|wwww\.)docs\.com\/.*',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://docs.com/api/oembed';
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
  public function getDiscovery() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function getExamples() {
    return array(
      'https://docs.com/constance/6216/silver-week',
    );
  }

}
