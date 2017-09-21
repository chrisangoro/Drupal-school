<?php

namespace Drupal\racc_social_feed;

/**
 * Class TwitterService.
 */
class TwitterService {

  private $settings = array(
    'oauth_access_token' => '',
    'oauth_access_token_secret' => '',
    'consumer_key' => '',
    'consumer_secret' => ''  
  );

  /**
   * Constructs a new TwitterService object.
   */
  public function __construct($token, $token_secret, $key, $key_secret) {
    $this->settings = array(
      $token,
      $token_secret,
      $key,
      $key_secret
    );
  }

  public function getPosts() {
    $posts = json_decode(\Drupal::httpClient()->get(
      'https://api.twitter.com/1.1/statuses/user_timeline.json')->getBody());
    return $posts;    
  }

}
