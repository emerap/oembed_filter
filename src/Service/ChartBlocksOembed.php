<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class ChartBlocksOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class ChartBlocksOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'ChartBlocks';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/public\.chartblocks\.com\/c';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://embed.chartblocks.com/1.0/oembed/';
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
    return 'http://public.chartblocks.com/c/53f7702dc9a61d7935942613';
  }

}
