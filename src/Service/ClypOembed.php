<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class ClypOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class ClypOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Clyp';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http(|s):\/\/clyp\.it';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://api.clyp.it/oembed/';
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
    return 'http://clyp.it/ebcbxtz1';
  }

}
