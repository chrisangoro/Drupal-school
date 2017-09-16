<?php

namespace Drupal\racc_social_feed\Controller;

//require 'Instagram.php';
//require_once('TwitterAPIExchange.php');


use Drupal\Core\Controller\ControllerBase;
use MetzWeb\Instagram\Instagram;

/**
 * Class socialFeedController.
 */
class socialFeedController extends ControllerBase {

  /**
   * Content.
   *
   * @return array
   * return an array of content.
   * The content itself is an array that contains the social media page where it came,
   * the post image, text, URL and the account that posted it.
   */
  public function content() {

    $feed = array();

    $pageID = '280905715738751';
    $appToken = '1452790681483810|p4zbO6ZCQrE4-QPF-fdzG0V3-Dw';
    $numberOfPosts = 3;
    
    $posts = file_get_contents("https://graph.facebook.com/".$pageID."/posts?limit=".(String)$numberOfPosts."&access_token=".$appToken);
    $info =  json_decode((string) $posts);

    foreach($info->data as $data){
      $post = array();
      $attachement = (json_decode((string) file_get_contents("https://graph.facebook.com/".$data->id."/attachments?&access_token=".$appToken)));
      $id = (string) $data->id;
      $idPieces = explode('_', $id);
      array_push($post, $attachement->data[0]->media->image->src);

      if(!$data->message){
        array_push($post, $data->story);
      }else{
        array_push($post, $data->message);        
      }

      array_push($post, 'https://www.facebook.com/'.$idPieces[0].'/posts/'.$idPieces[1]);
      array_push($post, 'facebook');
      array_push($post, 'RACC Dummy');


      array_push($feed, $post);
    }

    $instagram = new Instagram(array(
      'apiKey'      => '69969a5c7658494fb9806695ee284dad',
    ));

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
      '#theme' => 'racc_social_feed',
      '#content' => $feed,
    ];
  }
}