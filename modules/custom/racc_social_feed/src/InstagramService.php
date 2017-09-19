<?php

namespace Drupal\racc_social_feed;

use MetzWeb\Instagram\Instagram;

/**
 * Class InstagramService.
 */
class InstagramService {
  
  /**
  * Instagram API Key
  */
  private $key;
   
  /**
   * Instagram profile access token
   */
  private $token;

  /**
   * Facebook page ID
   */
  private $numberOfPosts;

  /**
   * Constructs a new InstagramService object.
   */
  public function __construct($apiKey, $accessToken, $nPosts) {
    $this->key = $apiKey;
    $this->token = $accessToken;
    $this->numberOfPosts = $nPosts;
  }

  public function getPosts(){
    $instagram = new Instagram(array(
      'apiKey'      => $this->key,
    ));

    $instagram->setAccessToken($this->token);
    return $posts = $instagram->getUserMedia('self', $this->numberOfPosts);
  }

  public function getFeedStructure($info) {
    $post = array();
    array_push($post, str_replace('s150x150/', 's320x320/', "{$info->images->thumbnail->url}"));
    array_push($post, '@racc_dummy');
    array_push($post, "{$info->link}");
    array_push($post, 'instagram');
    return $post;
  }

}
