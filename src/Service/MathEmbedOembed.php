<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class MathEmbedOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class MathEmbedOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'MathEmbed';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/mathembed\.com\/latex\?inputText\=.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://mathembed.com/oembed';
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
    return 'https://mathembed.com/latex?inputText=f(x) = \int_{-\infty}^\infty \hat f(\xi)\,e^{2 \pi i \xi x} \,d\xi';
  }

}
