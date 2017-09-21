<?php

namespace Drupal\racc_social_feed\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class socialFeedController.
 */
class socialFeedController extends ControllerBase {

  private $facebook_page_id = '280905715738751';
  private $facebook_token = '1452790681483810|p4zbO6ZCQrE4-QPF-fdzG0V3-Dw';

  private $instagram_api_key = '69969a5c7658494fb9806695ee284dad';
  private $instagram_access_token = '6036429331.0612931.1d05d5dd9dd246b9a695ce199fd3a64a';

  private $number_of_posts = 3;

  /**
   * Content.
   *
   * @return array
   * return an array of content.
   * The content itself is an array that contains, where needed, the social media page where it came,
   * the post image, text, URL and the account that posted it.
   */
  public function content() {

    $feed = array();
    $facebook = new \Drupal\racc_social_feed\FacebookService($this->facebook_page_id, $this->facebook_token, $this->number_of_posts);
    $posts = $facebook->getPosts();

    foreach ($posts->data as $data) {
      array_push($feed, $facebook->getFeedStructure($data));
    }

    $instagram = new \Drupal\racc_social_feed\InstagramService($this->instagram_api_key, $this->instagram_access_token, $this->number_of_posts);
    $posts = $instagram->getPosts();
    foreach ($posts->data as $data) {
      array_push($feed, $instagram->getFeedStructure($data));
    }

    return [
      '#theme' => 'racc_social_feed',
      '#content' => $feed,
    ];
  }
  
}