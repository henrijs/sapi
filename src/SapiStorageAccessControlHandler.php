<?php

/**
 * @file
 * Contains \Drupal\sapi\SapiStorageAccessControlHandler.
 */

namespace Drupal\sapi;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Statistic entity.
 *
 * @see \Drupal\sapi\Entity\SapiStorage.
 */
class SapiStorageAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\sapi\SapiStorageInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished statistic entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published statistic entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit statistic entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete statistic entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add statistic entities');
  }

}
