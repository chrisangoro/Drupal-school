//function menu1(){
  //  document.getElementById("dropdown-menu-1").classList.toggle("show");
//}

(function ($, Drupal) {
    Drupal.behaviors.myModuleBehavior = {
      attach: function (context, settings) {

        console.log('holi');
        //tab info interactions
        $('.views-row:first-child .views-field-info').click(function(){
            $('.views-row:first-child .views-field-field-nested-paragraph').show();
            $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
            $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
            $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
    
            $('.views-row:first-child .views-field-info').css("background-color", "#f23522");
            $('.views-row:nth-child(2) .views-field-info').css("background-color", "#999ba1");
            $('.views-row:nth-child(3) .views-field-info').css("background-color", "#bbbbbf");
            $('.views-row:nth-child(4) .views-field-info').css("background-color", "#cfcfd2");
        })
    
        $('.views-row:nth-child(2) .views-field-info').click(function(){
            $('.views-row:nth-child(2) .views-field-field-nested-paragraph').show();
            $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
            $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
            $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
    
            $('.views-row:nth-child(2) .views-field-info').css("background-color", "#f23522");
            $('.views-row:first-child .views-field-info').css("background-color", "#87888e");
            $('.views-row:nth-child(3) .views-field-info').css("background-color", "#bbbbbf");
            $('.views-row:nth-child(4) .views-field-info').css("background-color", "#cfcfd2");
        })
    
        $('.views-row:nth-child(3) .views-field-info').click(function(){
            $('.views-row:nth-child(3) .views-field-field-nested-paragraph').show();
            $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
            $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
            $('.views-row:nth-child(4) .views-field-field-nested-paragraph').hide(false);
    
            $('.views-row:nth-child(3) .views-field-info').css("background-color", "#f23522");
            $('.views-row:first-child .views-field-info').css("background-color", "#87888e");
            $('.views-row:nth-child(2) .views-field-info').css("background-color", "#999ba1");
            $('.views-row:nth-child(4) .views-field-info').css("background-color", "#cfcfd2");
        })
    
        $('.views-row:nth-child(4) .views-field-info').click(function(){
            $('.views-row:nth-child(4) .views-field-field-nested-paragraph').show();
            $('.views-row:first-child .views-field-field-nested-paragraph').hide(false);
            $('.views-row:nth-child(2) .views-field-field-nested-paragraph').hide(false);
            $('.views-row:nth-child(3) .views-field-field-nested-paragraph').hide(false);
    
            $('.views-row:nth-child(4) .views-field-info').css("background-color", "#f23522");
            $('.views-row:first-child .views-field-info').css("background-color", "#87888e");
            $('.views-row:nth-child(2) .views-field-info').css("background-color", "#999ba1");
            $('.views-row:nth-child(3) .views-field-info').css("background-color", "#bbbbbf");
        })

      }
    };
  })(jQuery, Drupal);

    //red filter on tabs images
        // if ($('#row1').css('backgroun-color') == "#f23522") {
        //     $('#row1').hover(function(){
        //         $('#filter').show();
        //     })
        // }
