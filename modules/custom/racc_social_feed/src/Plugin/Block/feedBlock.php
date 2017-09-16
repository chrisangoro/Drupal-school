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
    
    $content = new socialFeedController();
    $build = $content->content();

    return $build;
  }
}
