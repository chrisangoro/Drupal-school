(function ($, Drupal) {
  Drupal.behaviors.racc_social_feed_ajax = {
    attach: function (context, settings) {
      $(settings, context).once().each(function () {
        $("#social__feed__block").load("/racc_social_feed .social__feed");
      });
    }
  };
})(jQuery, Drupal);

var setHeight = function(){
  //set div in social feed height same as the width;
  var divWidth = $('.facebook_post').width();
  $('.facebook_post').css({
      'height':divWidth+'px'
  })
  $('.instagram_post').css({
      'height':divWidth+'px'
  })
  $('#get__connected').css({
      'height':divWidth+'px'
  })
  $('.twitter_post').css({
    'height':divWidth+'px'
  })
}


(function ($, Drupal) {
  Drupal.behaviors.racc_social_feed = {
    attach: function (context, settings) {
      setHeight();
      $(window).resize(function() {
        setHeight();
      })
    }
  };
})(jQuery, Drupal);
      