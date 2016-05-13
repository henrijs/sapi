<?php

/**
 * @file
 * Contains \Drupal\sapi\SapiStorageInterface.
 */

namespace Drupal\sapi;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Statistic entities.
 *
 * @ingroup sapi
 */
interface SapiStorageInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Statistic type.
   *
   * @return string
   *   The Statistic type.
   */
  public function getType();

  /**
   * Gets the Statistic name.
   *
   * @return string
   *   Name of the Statistic.
   */
  public function getName();

  /**
   * Sets the Statistic name.
   *
   * @param string $name
   *   The Statistic name.
   *
   * @return \Drupal\sapi\SapiStorageInterface
   *   The called Statistic entity.
   */
  public function setName($name);

  /**
   * Gets the Statistic creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Statistic.
   */
  public function getCreatedTime();

  /**
   * Sets the Statistic creation timestamp.
   *
   * @param int $timestamp
   *   The Statistic creation timestamp.
   *
   * @return \Drupal\sapi\SapiStorageInterface
   *   The called Statistic entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Statistic published status indicator.
   *
   * Unpublished Statistic are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Statistic is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Statistic.
   *
   * @param bool $published
   *   TRUE to set this Statistic to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\sapi\SapiStorageInterface
   *   The called Statistic entity.
   */
  public function setPublished($published);

}
