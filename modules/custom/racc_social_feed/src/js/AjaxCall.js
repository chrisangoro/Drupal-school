(function ($, Drupal) {
  Drupal.behaviors.racc_social_feed_ajax = {
    attach: function (context, settings) {
      $(settings, context).once().each(function () {
        $("#social__feed__block").empty().load("/racc_social_feed .social__feed");
      });
    }
  };
})(jQuery, Drupal);