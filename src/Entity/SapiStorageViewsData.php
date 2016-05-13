<?php

/**
 * @file
 * Contains \Drupal\sapi\Entity\SapiStorage.
 */

namespace Drupal\sapi\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Statistic entities.
 */
class SapiStorageViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['sapi_storage']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Statistic'),
      'help' => $this->t('The Statistic ID.'),
    );

    return $data;
  }

}
