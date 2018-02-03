<?php

namespace Drupal\admin_enquires\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Enquire Form' Block.
 *
 * @Block(
 *   id = "enquire_block",
 *   admin_label = @Translation("Enquire Form block"),
 *   category = @Translation("Enquires"),
 * )
 */
class EnquireForm extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\admin_enquires\Form\EnquireForm');
    return $form;
  }

}