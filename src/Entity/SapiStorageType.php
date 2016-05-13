<?php

/**
 * @file
 * Contains \Drupal\sapi\Entity\SapiStorageType.
 */

namespace Drupal\sapi\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;
use Drupal\sapi\SapiStorageTypeInterface;

/**
 * Defines the Statistic type entity.
 *
 * @ConfigEntityType(
 *   id = "sapi_storage_type",
 *   label = @Translation("Statistic type"),
 *   handlers = {
 *     "list_builder" = "Drupal\sapi\SapiStorageTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\sapi\Form\SapiStorageTypeForm",
 *       "edit" = "Drupal\sapi\Form\SapiStorageTypeForm",
 *       "delete" = "Drupal\sapi\Form\SapiStorageTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\sapi\SapiStorageTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "sapi_storage_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "sapi_storage",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/statistics/sapi_storage_type/{sapi_storage_type}",
 *     "add-form" = "/admin/config/statistics/sapi_storage_type/add",
 *     "edit-form" = "/admin/config/statistics/sapi_storage_type/{sapi_storage_type}/edit",
 *     "delete-form" = "/admin/config/statistics/sapi_storage_type/{sapi_storage_type}/delete",
 *     "collection" = "/admin/config/statistics/sapi_storage_type"
 *   }
 * )
 */
class SapiStorageType extends ConfigEntityBundleBase implements SapiStorageTypeInterface {
  /**
   * The Statistic type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Statistic type label.
   *
   * @var string
   */
  protected $label;

}
