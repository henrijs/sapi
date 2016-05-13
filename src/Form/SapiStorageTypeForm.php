<?php

/**
 * @file
 * Contains \Drupal\sapi\Form\SapiStorageTypeForm.
 */

namespace Drupal\sapi\Form;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SapiStorageTypeForm.
 *
 * @package Drupal\sapi\Form
 */
class SapiStorageTypeForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $sapi_storage_type = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $sapi_storage_type->label(),
      '#description' => $this->t("Label for the Statistic type."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $sapi_storage_type->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\sapi\Entity\SapiStorageType::load',
      ),
      '#disabled' => !$sapi_storage_type->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $sapi_storage_type = $this->entity;
    $status = $sapi_storage_type->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Statistic type.', [
          '%label' => $sapi_storage_type->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Statistic type.', [
          '%label' => $sapi_storage_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($sapi_storage_type->urlInfo('collection'));
  }

}
