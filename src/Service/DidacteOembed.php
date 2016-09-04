<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class DidacteOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class DidacteOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Didacte';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return array(
      'http(|s):\/\/.*\.didacte\.com\/a\/course\/.*',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://finchp.didacte.com/cards/oembed';
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
      'http://finchp.didacte.com/a/course/363',
    );
  }

}
