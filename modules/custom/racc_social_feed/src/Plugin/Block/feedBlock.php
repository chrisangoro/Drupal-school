<?php

namespace Drupal\racc_social_feed\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\racc_social_feed\Controller\socialFeedController;

/**
 * Provides a 'feedBlock' block.
 *
 * @Block(
 *  id = "feed_block",
 *  admin_label = @Translation("Social Feed Block"),
 * )
 */
class feedBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    return [
      '#theme' => 'social_feed_block',
      '#content' => 'retrieving information.',
      '#attached' => array(
        'library' => array(
          'racc_social_feed/AJAX-Call',
        ),
      ),
    ];
  }
  
}
