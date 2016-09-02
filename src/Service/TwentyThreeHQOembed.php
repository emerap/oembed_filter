<?php

namespace Emerap\OembedFilter\Service;

use const Emerap\OembedFilter\EMERAP_OEMBED_FILTER_RESPONSE_XML;
use Emerap\OembedFilter\ServiceBase;

/**
 * Class TwentyThreeHQOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class TwentyThreeHQOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return '23hq';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/www\.23hq\.com';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://www.23hq.com/23/oembed';
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
  public function getFormatResponse() {
    return EMERAP_OEMBED_FILTER_RESPONSE_XML;
  }

  /**
   * {@inheritdoc}
   */
  public function getExamples() {
    return 'http://www.23hq.com/Spelterini/photo/24385772';
  }

}
