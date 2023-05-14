const BASE_URL = window.location.origin;
const BASES_URL = "https://localhost/jumppace";
// sticky header
/*$(window).scroll(function() {    
var scroll = $(window).scrollTop();
//>=, not <=
if (scroll >= 300) {
//clearHeader, not clearheader - caps H
$("header").addClass("stickyheader");
} else {
$("header").removeClass("stickyheader");  
}
});*/
// sticky header end

// wow start
new WOW().init();
// wow end
$(window).on('load',function () {
  setTimeout(function() { 
    if ($('body').hasClass('dark')) {
      $('.navbar-brand img,.footlogo').attr('src', BASE_URL +'/public/customer/assets/images/logo-white.png')
    } 
    else  { 
      $('.navbar-brand img,.footlogo').attr('src', BASE_URL +'/public/customer/assets/images/logo.png')
    }
  }, 500);
});
// sticky social
$(document).scroll(function () {
  "use strict";
  var y = $(this).scrollTop();
  if (y > 200) {
    $('.sticky-container').fadeIn();
  } else {
    $('.sticky-container').fadeOut();
  }

  if (y >= 70) {
    $(".header-main").addClass("stickyyy");
  } else {
    $(".header-main").removeClass("stickyyy");
  }
  if (y > 500) {
    $('.floating_wrap').addClass('visible');
    $('.floatbutton').addClass('visible');


  } else {
    $('.floating_wrap').removeClass('visible');
    $('.floatbutton').removeClass('visible');

  }

});

$('.minimize-chat').on('click', function(e) {
  $('.chat-pop .chat-body').slideToggle();
  e.preventDefault();
});

// sticky social end
$(document).ready(function () {
  $('.minus').click(function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $('.plus').click(function () {
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });
});
$('.inner-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  adaptiveHeight: true,
  fade: true,
  asNavFor: '.dots-slider'
});
$('.dots-slider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.inner-slider',
  dots: false,
  centerMode: false,
  focusOnSelect: true
});
////// footer year
$(function () {
  "use strict";
  var theYear = new Date().getFullYear();
  $('#year').html(theYear);
});


function setButtonURL() {
  javascript: $zopim.livechat.window.show();
}

$(function () {
  //Slim Scroller

  $.mCustomScrollbar.defaults.theme = "light-1"; //set "light-2" as the default theme
  $(".ticklist,.testlist").mCustomScrollbar({
    scrollButtons: {
      enable: true
    },
    callbacks: {
      onTotalScroll: function () { addContent(this) },
      onTotalScrollOffset: 100,
      alwaysTriggerOffsets: false
    }
  });


});






function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}
var a = getURLParameter('pack');

$('#packages option:eq(' + a + ')').prop('selected', true);

// var val = location.href.match(/[?&]days=(.*?)(?:$|&)/)[1];   // get params from URL
// $('#days').val(val); 

$(".edit-profile-item").click(function () {
  // var id = $(this).data("id");
  var token = $("meta[name='csrf-token']").attr("content");

  $.ajax(
    {
      url: "customer/" + id,
      type: 'DELETE',
      data: {
        "id": id,
        "_token": token,
      },
      success: function () {
        console.log("it Works");
      }
    });

});


// Porfolio isotope and filter
$(window).on('load', function () {
  var portfolioIsotope = $('.portfolio-container').isotope({
    itemSelector: '.portfolio-item'
    // filter: '.illustrative'
  });

  $('#portfolio-flters li').on('click', function () {
    $("#portfolio-flters li").removeClass('filter-active');
    $(this).addClass('filter-active');

    portfolioIsotope.isotope({
      filter: $(this).data('filter')
      // filter: '.design'
    });

  });

  // Initiate venobox (lightbox feature used in portofilo)
  $(document).ready(function () {
    $('.venobox').venobox({
      'share': false
    });
  });
});