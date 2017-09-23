<?php

namespace Drupal\racc_social_feed;

/**
 * Class TwitterService.
 */
class TwitterService {

  private $bearer;  
  private $number_tweets;
  private $username;

  /**
   * Constructs a new TwitterService object.
   */
  public function __construct($bearer, $nTweets, $user) {
      $this->bearer = $bearer;
      $this->number_tweets = $nTweets;
      $this->username = $user;
  }

  public function getPosts() {
    $context = stream_context_create(array(
      'http' => array(
        'method'=>'GET',
        'header'=>"Authorization: Bearer " . $this->bearer
        )
      )
    );

    $json = json_decode(file_get_contents( 
      "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name={$this->username}&count={$this->number_tweets}&include_rts=1",
       false,
       $context 
    )); 

    return $json;
  }

  public function getFeedStructure($info) {
    $tweet = [];
    array_push($tweet, $info->text);
    array_push($tweet, 'twitter');
    array_push($tweet, '@RACC_Dummy');

    return $tweet;
  }

}
