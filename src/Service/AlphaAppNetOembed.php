<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class AlphaAppNetOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class AlphaAppNetOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'AlphaAppNet';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/alpha\.app\.net\/.*\/post';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://alpha-api.app.net/oembed';
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
    return 'https://alpha.app.net/breakingnews/post/70349321';
  }

}
