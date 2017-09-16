<?php

namespace Drupal\racc_social_feed\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class twitterController.
 */
class twitterController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function content() {

    /**
    * Implements Twitter connection
    */

    $settings = array(
      'oauth_access_token' => "120262126-VCsN9splUAwfbD92MV1UrjLxvl0ytDve0O5NZWk0",
      'oauth_access_token_secret' => "JkTVzBHfYNTt2nJgUUrQFE18Tq6xMXrHad4bqYTg9DGg4",
      'consumer_key' => "SisoMCpDn5zFnUz8nOWOkVHSA",
      'consumer_secret' => "ZIlEMymMl71DbCfDdFBkNorRuB0XCsRdbqqKc3tibWHF16hp2"
    );

    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = '?screen_name=chrisangoro';
    $requestMethod = 'GET';
    
    $twitter = new \TwitterAPIExchange($settings);
    $response = $twitter->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest();
    
    $test = var_dump(json_decode($response));

    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello with parameter(s): $name'),
    ];
  }

}
