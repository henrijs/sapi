/**
 * @file
 * Dummy action plugin which utilizes Statistics API (sapi) JS library.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Instructs SAPI JS library to send the events of click on any link on the page.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attach behavior to all links on the page.
   */
  Drupal.behaviors.sapiDummyClick = {
    attach: function (context, settings) {
      $(document, context).once('sapi-dummy-click').each(function() {
        $('a').on('click', function() {
          event.preventDefault();
          var element = this;
          var callback = function() {
            window.location.assign($(element).attr('href'));
          };
          Drupal.sapi.send('click', $(element).attr('href'), {
            'successCallback': callback,
            'errorCallback': callback
          });
          return false;
        });
      });
    }
  };

})(jQuery, Drupal);
