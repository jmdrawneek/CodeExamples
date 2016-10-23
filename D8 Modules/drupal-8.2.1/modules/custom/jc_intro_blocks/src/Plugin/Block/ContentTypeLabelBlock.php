<?php

namespace Drupal\jc_intro_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides the Content Type Label block.
 *
 * @Block(
 *   id = "content_type_label_block",
 *   admin_label = @Translation("Hero block: Content Type Label"),
 *
 * )
 */
class ContentTypeLabelBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $node = \Drupal::routeMatch()->getParameter('node');

    if (empty($node)) {
      $output = '';
    }
    else {
      $type = $node->bundle();

      switch ($type) {
        case 'office':
          $output = t("Office");
          break;

        case 'service':
          $output = t("Our Services");
          break;

        default:
          $output = '';
      }
    }

    return array(
      '#type' => 'markup',
      '#markup' => $output,
      '#cache' => array(
        'contexts' => array('route'),
      ),
    );
  }
}
