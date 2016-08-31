<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class AmChartsOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class AmChartsOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'AmCharts';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/live\.amcharts\.com\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://live.amcharts.com/oembed';
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
  public function getExampleUrls() {
    return 'https://live.amcharts.com/NjEwN';
  }

}
