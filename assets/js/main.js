$(document).ready(function(){
  'use strict';
  
  //===== Profile Image Upload =====*/
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#profile-display').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#profile-upload").on("change", function(){
    readURL(this);
  });

  //===== Dropdown Anmiation =====// 
  var drop = $('.gallery-info-btns > a');
  $('.gallery-info-btns').each(function(){
    var delay = 0;
    $(this).find(drop).each(function(){
      $(this).css({transitionDelay: delay+'ms'});
      delay += 100;
    });
  });  
 
  new WOW().init();

  $('.rating-wrapper > a').on('click',function(){
    $(this).next('.rate-share').toggleClass('active');
    return false;
  });

  //===== Login Popup Script =====//
  $('.log-popup-btn').on('click',function(){
    $('html').addClass('log-popup-active');
    return false;
  });

  $('.log-close-btn').on('click',function(){
    $('html').removeClass('log-popup-active');
    return false;
  });

  //===== Sign Up Popup Script =====//
  $('.sign-popup-btn').on('click',function(){
    $('html').addClass('sign-popup-active');
    return false;
  });

  $('.sign-close-btn').on('click',function(){
    $('html').removeClass('sign-popup-active');
    return false;
  });

  //===== Newsletter Popup Script =====//
  $('a.close-btn').on('click',function(){
    $('.newsletter-popup-wrapper').fadeOut('slow');
    return false;
  });

  $('a.remove-noti').on('click',function(){
    $(this).parent().slideUp('slow');
    return false;
  });

  $('a.track-close').on('click',function(){
    $('.track-order-popup').fadeOut('slow');
    return false;
  });

  //===== Order Popup Script =====//
  $('.order-popup-btn').on('click',function(){
    $('html').addClass('order-popup-active');
    return false;
  });

  $('a.close-buyer').on('click',function(){
    $('html').removeClass('order-popup-active');
    return false;
  });

  //===== Cash Method Popup Script =====//
  $('.cash-popup-btn').on('click',function(){
    $('html').addClass('cash-method-popup-active');
  });

  $('.cash-method a.payment-close-btn').on('click',function(){
    $('html').removeClass('cash-method-popup-active');
    return false;
  });

  //===== Card Method Popup Script =====//
  $('.card-popup-btn').on('click',function(){
    $('html').addClass('card-method-popup-active');
  });

  $('.card-method a.payment-close-btn').on('click',function(){
    $('html').removeClass('card-method-popup-active');
    return false;
  });

  //===== Thanks Message Popup Script =====//
  $('.confrm-order-btn > a').on('click',function(){
    $('html').addClass('thanks-message-popup-active');
    return false;
  });

  $('a.thanks-close').on('click',function(){
    $('html').removeClass('thanks-message-popup-active');
    return false;
  });

  //===== Counter Up =====//
  if ($.isFunction($.fn.counterUp)) {
    $('.counter').counterUp({
      delay: 10,
      time: 2000
    });
  }

  //===== Accordion =====//
  $('.toggle .content').hide();
    $('.toggle h4:first').addClass('active').next().slideDown(500).parent().addClass("activate");
    $('.toggle h4').on("click", function() {
        if ($(this).next().is(':hidden')) {
            $('.toggle h4').removeClass('active').next().slideUp(500).parent().removeClass("activate");
            $(this).toggleClass('active').next().slideDown(500).parent().toggleClass("activate");
        }
    });

  //===== Sticky Header =====//
  var menu_height = $('header').innerHeight();
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll >= menu_height) {
      $('.stick').addClass('sticky');
    } else {
      $('.stick').removeClass('sticky');
    }
  });
  if ($('header').hasClass('stick')) {
    $('main').css({'padding-top': menu_height});
  }

  //===== Responsive Header =====//
  $('.menu-btn').on('click', function () {
    $('.responsive-menu').addClass('slidein');
    return false;
  });
  $('.menu-close').on('click', function () {
    $('.responsive-menu').removeClass('slidein');
    return false;
  });
  $('.responsive-menu li.menu-item-has-children > a').on('click', function () {
    $(this).parent().siblings().children('ul').slideUp();
    $(this).parent().siblings().removeClass('active');
    $(this).parent().children('ul').slideToggle();
    $(this).parent().toggleClass('active');
    return false;
  });

  //===== Scroll Up Bar =====//
  if ($.isFunction($.fn.scrollupbar)) {
    $('header').scrollupbar({});
  }

  //===== Scroll Animation =====//
  $(window).on("scroll", function () {
    var scroll2 = $(window).scrollTop();
    if (scroll2 >= 300) {
      $('.left-scooty-mockup').addClass('easein');
    }
  });

  //===== LightBox =====//
  if ($.isFunction($.fn.fancybox)) {
    $('[data-fancybox],[data-fancybox="gallery"]').fancybox({});
  }

  //===== Chosen =====//
  if ($.isFunction($.fn.chosen)) {
    $('select').chosen({});
  }

  //===== Custom Scrollbar =====//
  if ($.isFunction($.fn.niceScroll)) {
    $('.menu-lst > ul').niceScroll();
  }

  //===== Datepicker =====//
  if ($.isFunction($.fn.datepicker)) {
    $('.datepicker').datepicker({
      autoHide: true,
    });
  }

  //===== Timepicker =====//
  if ($.isFunction($.fn.timepicker)) {
    $('.timepicker').timepicker({
      autoHide: true,
    });
  }

  //===== Count Down =====//
  if ($.isFunction($.fn.downCount)) {
      $('.countdown').downCount({
          date: '12/12/2018 12:00:00',
          offset: +5
      });
  }

  //===== Touch Spin =====//
  if ($.isFunction($.fn.TouchSpin)) {
    $('input.qty').TouchSpin({});
  }

  //===== Owl Carousel =====//
  if ($.isFunction($.fn.owlCarousel)) {
    //=== Top Restaurants Carousel ===//
    $('.top-restaurants-carousel').owlCarousel({
      autoplay: false,
      smartSpeed: 600,
      loop: true,
      items: 1,
      dots: true,
      slideSpeed: 2000,
      nav: false,
      margin: 0,
      animateOut: 'slideOutDown',
      animateIn: 'slideInDown'
    });

    //=== Featured Restaurants Carousel ===//
    $('.featured-restaurant-carousel').owlCarousel({
      autoplay: true,
      smartSpeed: 600,
      loop: true,
      items: 1,
      dots: false,
      slideSpeed: 2000,
      nav: true,
      margin: 0,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
    });

    //=== Blog Detail Gallery Carousel ===//
    $('.blog-detail-gallery-carousel').owlCarousel({
      autoplay: true,
      smartSpeed: 600,
      loop: true,
      items: 1,
      dots: false,
      slideSpeed: 2000,
      nav: true,
      margin: 0,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
    });

    //=== Top Restaurants Carousel 2 ===//
    $('.top-restaurant-carousel2').owlCarousel({
      autoplay: true,
      smartSpeed: 600,
      loop: true,
      items: 6,
      dots: false,
      slideSpeed: 2000,
      nav: false,
      margin: 0,
      navText: [
      "<i class='fa fa-caret-left'></i>",
      "<i class='fa fa-caret-right'></i>"
      ],
      responsive: {
          0: {items: 1,nav: false},
          480: {items: 3,nav: false},
          768: {items: 6,nav: false},
          1200: {items: 6}
      }
    });

    //=== Dish carousel home1 ===//
    $('.dishes-caro').owlCarousel({
      autoplay: false,
      smartSpeed: 600,
      loop: true,
      items: 1,
      dots: true,
      slideSpeed: 2000,
      nav: false,
      margin: 30,
      navText: [
      "<i class='fa fa-caret-left'></i>",
      "<i class='fa fa-caret-right'></i>"
      ],
      responsive: {
          0: {items: 1,nav: false, dots: false},
          480: {items: 1,nav: false, dots: false},
          768: {items: 1,nav: false, dots: false},
          1200: {items: 1}
      }
    });

  }

  //===== Slick Carousel =====//
  if ($.isFunction($.fn.slick)) {
    //=== Restaurant Detail Carousel ===//
    $('.restaurant-detail-img-carousel').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      slide: 'li',
      fade: false,
      asNavFor: '.restaurant-detail-thumb-carousel'
    });        

    $('.restaurant-detail-thumb-carousel').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.restaurant-detail-img-carousel',
      dots: false,
      arrows: false,
      slide: 'li',
      centerPadding: '0',
      focusOnSelect: true,
      responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          centerMode: true,
        }
      }
      ]
    });

    //=== Featured Restaurant Carousel ===//
    $('.featured-restaurant-food-img-carousel').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      slide: 'li',
      fade: false,
      asNavFor: '.featured-restaurant-food-thumb-carousel'
    });        

    $('.featured-restaurant-food-thumb-carousel').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.featured-restaurant-food-img-carousel',
      dots: false,
      arrows: false,
      slide: 'li',
      centerPadding: '0',
      focusOnSelect: true,
      responsive: [
      {
        breakpoint: 980,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          centerMode: true,
        }
      }
      ]
    });
  }

  //===== Ajax Contact Form =====//
  $('#contactform').on('submit', function () {
   var action = $(this).attr('action');
	  
   var msg = $('#message');
   $(msg).hide();
   var data = 'name=' + $('#name').val() + '&email=' + $('#email').val() + '&phone=' + $('#phone').val() + '&comments=' + $('#comments').val() + '&verify=' + $('#verify').val() + '&captcha=' + $(".g-recaptcha-response").val();
	 
   $.ajax({
     type: 'POST',
     url: action,
     data: data,
     beforeSend: function () {
      $('#submit').attr('disabled', true);
      $('img.loader').fadeIn('slow');
    },
    success: function (data) {
      $('#submit').attr('disabled', false);
      $('img.loader').fadeOut('slow');
      $(msg).empty();
      $(msg).html(data);
      $('#message').slideDown('slow');
      if (data.indexOf('success') > 0) {
        $('#contactform').slideUp('slow');
      }
    }
  });
   return false;
 });

});//===== Document Ready Ends =====//

jQuery(window).on('load', function ($) {
  'use strict';
  //===== Page Loader =====//
  jQuery('.preloader').fadeOut('slow');

  //===== Isotope =====//
  if (jQuery('.filter-item').length > 0) {
    if (jQuery().isotope) {
      var jQuerycontainer = jQuery('.masonry'); // cache container
      jQuerycontainer.isotope({
        itemSelector: '.filter-item',
        columnWidth:.5,
      });
      jQuery('.filter-buttons a').on('click', function () {
        var selector = jQuery(this).attr('data-filter');
        jQuery('.filter-buttons li').removeClass('active');
        jQuery(this).parent().addClass('active');
        jQuerycontainer.isotope({filter: selector});
        return false;
      });
      jQuerycontainer.isotope('layout'); // layout/layout
    }

    jQuery(window).resize(function () {
      if (jQuery().isotope) {
        jQuery('.masonry').isotope('layout'); // layout/relayout on window resize
      }
    });
  }

});



