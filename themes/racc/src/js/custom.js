(function ($, Drupal) {
    Drupal.behaviors.customBehaviour = {
      attach: function (context, settings) {
        //tab info interactions
        $('.views-row:first-child .views-field-info').click(function(){

            if ($(window).width() < 560) {
                $('.views-row:first-child .views-field-field-nested-paragraph').toggle();
                $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
            }
             else {
                $('.views-row:first-child .views-field-field-nested-paragraph').show();
                $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
             }
        
            $('.views-row:first-child .views-field-info').css("background-color", "#f23522");
            $('.views-row:nth-child(2) .views-field-info').css("background-color", "#999ba1");
            $('.views-row:nth-child(3) .views-field-info').css("background-color", "#bbbbbf");
            $('.views-row:nth-child(4) .views-field-info').css("background-color", "#cfcfd2");
        })
    
        $('.views-row:nth-child(2) .views-field-info').click(function(){
            if ($(window).width() < 560) {
                $('.views-row:nth-child(2) .views-field-field-nested-paragraph').toggle();
                $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
            }
            else {
                $('.views-row:nth-child(2) .views-field-field-nested-paragraph').show();
                $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
            }

            $('.views-row:nth-child(2) .views-field-info').css("background-color", "#f23522");
            $('.views-row:first-child .views-field-info').css("background-color", "#87888e");
            $('.views-row:nth-child(3) .views-field-info').css("background-color", "#bbbbbf");
            $('.views-row:nth-child(4) .views-field-info').css("background-color", "#cfcfd2");
        })
    
        $('.views-row:nth-child(3) .views-field-info').click(function(){
            if ($(window).width() < 560) {
                $('.views-row:nth-child(3) .views-field-field-nested-paragraph').toggle();
                $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
            }
            else{
                $('.views-row:nth-child(3) .views-field-field-nested-paragraph').show();
                $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
            }
        
            $('.views-row:nth-child(3) .views-field-info').css("background-color", "#f23522");
            $('.views-row:first-child .views-field-info').css("background-color", "#87888e");
            $('.views-row:nth-child(2) .views-field-info').css("background-color", "#999ba1");
            $('.views-row:nth-child(4) .views-field-info').css("background-color", "#cfcfd2");
        })
    
        $('.views-row:nth-child(4) .views-field-info').click(function(){
            if ($(window).width() < 560) {
                $('.views-row:nth-child(4) .views-field-field-nested-paragraph').toggle();
                $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
            }
            else{
                $('.views-row:nth-child(4) .views-field-field-nested-paragraph').show();
                $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
                $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
            }
        
            $('.views-row:nth-child(4) .views-field-info').css("background-color", "#f23522");
            $('.views-row:first-child .views-field-info').css("background-color", "#87888e");
            $('.views-row:nth-child(2) .views-field-info').css("background-color", "#999ba1");
            $('.views-row:nth-child(3) .views-field-info').css("background-color", "#bbbbbf");
        })

        //Toggle for the search form
        $('i').unbind().click(function(){
            $('.search_form').toggle();
            if ($(window).width() < 1024) {
                $("i").toggleClass('fa-search');
                $("i").toggleClass('fa-times');
            }
        })

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

        //hover effect in social feed module
        $(".instagram_post").mouseover(function(){
            $(this).animate({padding: '15px'});
        });
        
        $(".instagram_post").mouseleave(function(){
            $(this).animate({padding: '0'});
        });

        $(".facebook_post").mouseover(function(){
            $(this).animate({padding: '15px'});
        });
        
        $(".facebook_post").mouseleave(function(){
            $(this).animate({padding: '0'});
        });


        //position the slider dots below the slider text
        if ($(window).width() > 1024){
            setInterval(function(){
                
                $('.slick-dots').css({
                    'top': $('.slick-current .slide__caption').offset().top - 20,
                    'margin-top': $('.slick-current .slide__caption').outerHeight()
                    })},
                333
            );
        }      
      }
    };
  })(jQuery, Drupal);