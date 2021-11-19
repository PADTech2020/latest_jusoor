$(document).ready(function (t) {


    $('#search').click(function() {
        $('.search-form').animate({right: 0}, 50);
        $('.search-popup').show();
        $('.search-bg').click(function() {
          $('.search-popup').hide();
          $('.search-form').animate({right: '-100%'}, 50);
        });
      });
      
      $('#search-2').click(function() {
        $('.search-form').animate({right: 0}, 50);
        $('.search-popup').show();
        $('.search-bg').click(function() {
          $('.search-popup').hide();
          $('.search-form').animate({right: '-100%'}, 50);
        });
      });

});
