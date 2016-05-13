<?php

/**
 * @file
 * Contains sapi_storage.page.inc..
 *
 * Page callback for Statistic entities.
 */

use Drupal\Core\Render\Element;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Prepares variables for Statistic templates.
 *
 * Default template: sapi_storage.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_sapi_storage(array &$variables) {
  // Fetch SapiStorage Entity Object.
  $sapi_storage = $variables['elements']['#sapi_storage'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}

/**
* Prepares variables for a custom entity type creation list templates.
*
* Default template: sapi_storage-content-add-list.html.twig.
*
* @param array $variables
*   An associative array containing:
*   - content: An array of sapi_storage-types.
*
* @see block_content_add_page()
*/
function template_preprocess_sapi_storage_content_add_list(&$variables) {
  $variables['types'] = array();
  $query = \Drupal::request()->query->all();
  foreach ($variables['content'] as $type) {
    $variables['types'][$type->id()] = array(
      'link' => Link::fromTextAndUrl($type->label(), new Url('entity.sapi_storage.add_form', array(
        'sapi_storage_type' => $type->id()
      ), array('query' => $query))),
      'description' => array(
      '#markup' => $type->label(),
      ),
      'title' => $type->label(),
      'localized_options' => array(
      'query' => $query,
      ),
    );
  }
}
