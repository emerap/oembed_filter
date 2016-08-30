<?php

namespace Emerap\OembedFilter;

/**
 * Interface Service.
 *
 * @package Emerap\OembedFilter
 */
interface ServiceInterface {

  /**
   * Get service id.
   *
   * @return string
   *   Service id.
   */
  public function getId();

  /**
   * Get pattern.
   *
   * @return string|array
   *   Service pattern.
   */
  public function getPatterns();

  /**
   * Get API endpoint.
   *
   * @return string
   *   API endpoint.
   */
  public function getEndpoit();

  /**
   * Get format response.
   *
   * @return string
   *   Format response.
   */
  public function getFormatResponse();

  /**
   * Filter callback.
   *
   * @param array $fields
   *   Oembed fields.
   *
   * @return string Filter callback.
   *   Filter callback.
   */
  public function filter($fields);

}
