<?php

namespace Drupal\racc_social_feed\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class socialFeedController.
 */
class socialFeedController extends ControllerBase {

  private $facebook_page_id = '280905715738751';
  private $facebook_token = '1452790681483810|p4zbO6ZCQrE4-QPF-fdzG0V3-Dw';

  private $instagram_api_key = '69969a5c7658494fb9806695ee284dad';
  private $instagram_access_token = '6036429331.0612931.1d05d5dd9dd246b9a695ce199fd3a64a';

  private $bearer_token = 'AAAAAAAAAAAAAAAAAAAAACVO2QAAAAAAnDd%2B6MJHnId%2FrYSqVDQ9Qc7qigM%3DuBSnUQC1CpvBxc2Xv0iRXsgNsl6EAHB3D6DW9GXKatVkt23F37';
  private $twitter_username = 'RACC_Dummy';

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

    $feed = [];
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

    $twitter = new \Drupal\racc_social_feed\TwitterService($this->bearer_token, $this->number_of_posts, $this->twitter_username);
    $posts = $twitter->getPosts();
    $testing = [];
    foreach ($posts as $data) {
      array_push($feed, $twitter->getFeedStructure($data));
      array_push($testing, $twitter->getFeedStructure($data)); 
    }

    $content = [];
    for ($i=0; $i < 7; $i++) { 
      array_push($content, $feed[$i]);
    }

    $build = array(
      'page' => array(
        '#theme' => 'racc_social_feed',
        '#content' => $content,
        '#test' => $posts,
      ),
    );
    $html = \Drupal::service('renderer')->renderRoot($build);
    $response = new Response();
    $response->setContent($html);
  
    return $response;
  }
  
}