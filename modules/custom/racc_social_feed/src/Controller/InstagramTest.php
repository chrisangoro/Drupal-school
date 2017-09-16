<?php

namespace Drupal\racc_social_feed\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class InstagramTest.
 */
class InstagramTest extends ControllerBase {

  /**
   * Test.
   *
   * @return string
   *   Return Hello string.
   */
  public function test() {

    $instagram = new Instagram(array(
      'apiKey'      => '69969a5c7658494fb9806695ee284dad',
      // 'apiSecret'   => '3a10982a45ed4834bf7463e1020df249',
      // 'apiCallback' => 'http://localhost'
    ));

    // access_token
    //6036429331.0612931.1d05d5dd9dd246b9a695ce199fd3a64a

    $instagram->setAccessToken('6036429331.0612931.1d05d5dd9dd246b9a695ce199fd3a64a');

    $media = $instagram->getUserMedia('self', 3);

    foreach ($media->data as $entry) {
      $post = array();

      array_push($post, str_replace('s150x150/', 's320x320/', "{$entry->images->thumbnail->url}"));
      array_push($post, '@racc_dummy');
      array_push($post, "{$entry->link}");
      array_push($post, 'instagram');
      array_push($feed, $post);
    }

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: test')
    ];
  }

}
