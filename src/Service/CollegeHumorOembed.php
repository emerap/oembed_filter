<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class CollegeHumorOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class CollegeHumorOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'CollegeHumor';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/www\.collegehumor\.com\/video\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://www.collegehumor.com/oembed.json';
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
      'http://www.collegehumor.com/video/3922232/prank-war-7-the-half-million-dollar-shot',
    );
  }

}
