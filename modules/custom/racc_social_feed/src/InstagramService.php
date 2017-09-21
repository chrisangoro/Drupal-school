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

  /**
   * Get the number of Instagram posts info spedified in the construct.
   *
   * @return array
   *   objects with the information of the Instagram posts (time posted, id, message, thumbnail, etc.).
   */
  public function getPosts(){
    $instagram = new Instagram(array(
      'apiKey'      => $this->key,
    ));

    $instagram->setAccessToken($this->token);
    return $posts = $instagram->getUserMedia('self', $this->numberOfPosts);
  }

  /**
   * Get an array with info about the post (URL, media and page name).
   *
   * @param object $info
   *    Data of the post: Object (time posted, id, etc.).
   *
   * @return array
   *   String - return the Information of the Instagram posts (URL, thumbnail and account name).
   */
  public function getFeedStructure($info) {
    $post = [];
    array_push($post, str_replace('s150x150/', 's320x320/', "{$info->images->thumbnail->url}"));
    array_push($post, '@racc_dummy');
    array_push($post, "{$info->link}");
    array_push($post, 'instagram');
    return $post;
  }

}
