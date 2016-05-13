<?php

/**
 * @file
 * Contains \Drupal\sapi\SapiStorageListBuilder.
 */

namespace Drupal\sapi;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Statistic entities.
 *
 * @ingroup sapi
 */
class SapiStorageListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Statistic ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\sapi\Entity\SapiStorage */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      new Url(
        'entity.sapi_storage.edit_form', array(
          'sapi_storage' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
