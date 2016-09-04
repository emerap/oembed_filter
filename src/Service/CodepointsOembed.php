<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class CodepointsOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class CodepointsOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Codepoints';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/(|www\.)codepoints\.net\/U\+.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://codepoints.net/api/v1/oembed';
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
      'https://codepoints.net/U+041F',
      'https://codepoints.net/U+2665',
      'https://codepoints.net/U+606E',
    );
  }

}
