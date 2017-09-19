<?php

namespace Drupal\racc_social_feed;

/**
 * Class FacebookService.
 */
class FacebookService {

  /**
   * Facebook page ID
   */
  private $pageID;

  /**
   * Facebook page ID
   */
  private $appToken;
   
  /**
   * Facebook page ID
   */
  private $numberOfPosts;

  /**
   * Constructs a new FacebookService object.
   */
  public function __construct($id, $token, $nPosts) {
    $this->pageID = $id;
    $this->appToken = $token;
    $this->numberOfPosts = $nPosts;
  }

  /**
   * Get the number of Facebook posts id spedified in the construct.
   *
   * @return array
   *   object with the information of the Facebook posts (time posted, id, message).
   */
  public function getPosts() {
    $posts = json_decode(\Drupal::httpClient()->get(
      "https://graph.facebook.com/" . $this->pageID . "/posts?limit=" . (String)$this->numberOfPosts . "&access_token=" . $this->appToken
    )->getBody());
    return $posts;    
  }

  /**
   * Get an array with info about the post (URL, media, message and page name).
   *
   * @param object $info
   *    Data of the post (time posted, id, message).
   *
   * @return array
   *   String - return the Information of the Facebook posts (time posted, id, message).
   */
  public function getFeedStructure($info) {
    $post = array();
    $attachement = json_decode(\Drupal::httpClient()->get("https://graph.facebook.com/" . $info->id . "/attachments?&access_token=" . $this->appToken)->getBody());
    $idPieces = explode('_', (string) $info->id);
    array_push($post, $attachement->data[0]->media->image->src);

    if (! $info->message) {
      array_push($post, $info->story);
    }
    else {
      array_push($post, $info->message);        
    }

    array_push($post, 'https://www.facebook.com/' . $idPieces[0] . '/posts/' . $idPieces[1]);
    array_push($post, 'facebook');
    array_push($post, 'RACC Dummy');
    return $post;
  }

}
