<?php

namespace Drupal\racc_social_feed\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class FacebookTest.
 */
class FacebookTest extends ControllerBase {

  /**
   * Null.
   *
   * @return string
   *   Return Hello string.
   */
  public function test() {

    $fb = new \Facebook\Facebook([
      'app_id' => '1452790681483810',
      'app_secret' => 'aba84d144a9910ec9d47e0f6e8b4a5c6',
      'default_graph_version' => 'v2.10',
      'default_access_token' => '1452790681483810|p4zbO6ZCQrE4-QPF-fdzG0V3-Dw', // optional
      ]);
    
    $FacebookApp = $fb->getApp();
    $response = $fb->get('/'.$pageID.'/posts?fields=id', '1452790681483810|p4zbO6ZCQrE4-QPF-fdzG0V3-Dw');
    $lll = $response->getGraphEdge();
    $test = '';

    foreach($lll->id as $data){
      $test = $test.' post ID: '.$data;
    }

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: null')
    ];
  }

}
