<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class EgliseInfoOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class EgliseInfoOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'EgliseInfo';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'http:\/\/egliseinfo\.catholique\.fr\/.*';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'http://egliseinfo.catholique.fr/api/oembed';
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
    return 'http://egliseinfo.catholique.fr/horaires/paris';
  }

}
