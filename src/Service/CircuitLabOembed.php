<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class CircuitLabOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class CircuitLabOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'CircuitLab';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return 'https:\/\/www\.circuitlab\.com\/circuit';
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://www.circuitlab.com/circuit/oembed/';
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
    return 'https://www.circuitlab.com/circuit/e38756/555-timer-as-astable-multivibrator-oscillator';
  }

}
