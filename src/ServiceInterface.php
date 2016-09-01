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
   * Get oEmbed discovery.
   *
   * @return bool
   *   Oembed discovery.
   */
  public function getDiscovery();

  /**
   * Get format response.
   *
   * @return int
   *   Format response.
   */
  public function getFormatResponse();

  /**
   * Get get example urls.
   *
   * @return string|array
   *   Example urls.
   */
  public function getExampleUrls();

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
