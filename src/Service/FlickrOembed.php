<?php

namespace Emerap\OembedFilter\Service;

use Emerap\OembedFilter\ServiceBase;

/**
 * Class FlickrOembed.
 *
 * @package Emerap\OembedFilter\Service
 */
class FlickrOembed extends ServiceBase {

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return 'Flickr';
  }

  /**
   * {@inheritdoc}
   */
  public function getPatterns() {
    return array(
      'http(|s):\/\/(|www\.)flickr\.com\/photos\/',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEndpoit() {
    return 'https://www.flickr.com/services/oembed';
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
  public function getExamples() {
    return 'https://www.flickr.com/photos/127541062@N02/29156169670';
  }

}
