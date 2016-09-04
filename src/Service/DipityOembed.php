<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class DipityOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class DipityOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Dipity';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return array(
      'http:\/\/www\.dipity\.com\/.*\/',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://www.dipity.com/oembed/timeline/';
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
    return array(
      'http://www.dipity.com/StevePro/Steve-Jobs-Life-and-Career',
    );
  }

}
