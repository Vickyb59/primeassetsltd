(function ($) {
  "user strict";
  // Preloader Js
  $(window).on('load', function () {
    $("[data-paroller-factor]").paroller();
    $('.preloader').fadeOut(1000);
    var img = $('.bg_img');
    img.css('background-image', function () {
      var bg = ('url(' + $(this).data('background') + ')');
      return bg;
    });
  });
  $(document).ready(function () {
    // Nice Select
    $('.select-bar').niceSelect();
    // PoPuP 
    $('.popup').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false,
      disableOn: 300
    });
    $("body").each(function () {
      $(this).find(".img-pop").magnificPopup({
        type: "image",
        gallery: {
          enabled: true
        }
      });
    });
    // aos js active
    new WOW().init()
    //Faq
    $('.faq-wrapper .faq-title').on('click', function (e) {
      var element = $(this).parent('.faq-item');
      if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('.faq-content').removeClass('open');
        element.find('.faq-content').slideUp(300, "swing");
      } else {
        element.addClass('open');
        element.children('.faq-content').slideDown(300, "swing");
        element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
        element.siblings('.faq-item').removeClass('open');
        element.siblings('.faq-item').find('.faq-title').removeClass('open');
        element.siblings('.faq-item').find('.faq-content').slideUp(300, "swing");
      }
    });
    //Menu Dropdown Icon Adding
    $("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
    // drop down menu width overflow problem fix
    $('ul').parent('li').hover(function () {
      var menu = $(this).find("ul");
      var menupos = $(menu).offset();
      if (menupos.left + menu.width() > $(window).width()) {
        var newpos = -$(menu).width();
        menu.css({
          left: newpos
        });
      }
    });
    $('.menu li a').on('click', function (e) {
      var element = $(this).parent('li');
      if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('li').removeClass('open');
        element.find('ul').slideUp(300, "swing");
      } else {
        element.addClass('open');
        element.children('ul').slideDown(300, "swing");
        element.siblings('li').children('ul').slideUp(300, "swing");
        element.siblings('li').removeClass('open');
        element.siblings('li').find('li').removeClass('open');
        element.siblings('li').find('ul').slideUp(300, "swing");
      }
    })
    // Scroll To Top 
    var scrollTop = $(".scrollToTop");
    $(window).on('scroll', function () {
      if ($(this).scrollTop() < 500) {
        scrollTop.removeClass("active");
      } else {
        scrollTop.addClass("active");
      }
    });
    //Click event to scroll to top
    $('.scrollToTop').on('click', function () {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
      return false;
    });
    //Header Bar
    $('.header-bar').on('click', function () {
      $(this).toggleClass('active');
      $('.overlay').toggleClass('active');
      $('.menu').toggleClass('active');
    })
    $('.overlay').on('click', function () {
      $(this).removeClass('active');
      $('.header-bar').removeClass('active');
      $('.menu').removeClass('active');
    })
    // Header Sticky Herevar prevScrollpos = window.pageYOffset;
    var scrollPosition = window.scrollY;
    if (scrollPosition >= 1) {
      $(".header-bottom").addClass('active');
      $(".header-section-2").removeClass('plan-header');
    }
    var header = $(".header-bottom");
    var headerT = $(".header-section-2");
    $(window).on('scroll', function () {
      if ($(this).scrollTop() < 1) {
        headerT.addClass("plan-header");
        header.removeClass("active");
      } else {
        headerT.removeClass("plan-header");
        header.addClass("active");
      }
    });
    $('.tab ul.tab-menu li').on('click', function (g) {
      var tab = $(this).closest('.tab'),
        index = $(this).closest('li').index();
      tab.find('li').siblings('li').removeClass('active');
      $(this).closest('li').addClass('active');
      tab.find('.tab-area').find('div.tab-item').not('div.tab-item:eq(' + index + ')').hide(10);
      tab.find('.tab-area').find('div.tab-item:eq(' + index + ')').fadeIn(10);
      g.preventDefault();
    });
    $('.hover-tab ul.tab-menu li').on('mouseover', function (g) {
      var tabT = $(this).closest('.hover-tab'),
        indexT = $(this).closest('li').index();
        tabT.find('li').siblings('li').removeClass('active');
      $(this).closest('li').addClass('active');
      tabT.find('.tab-area').find('div.tab-item').not('div.tab-item:eq(' + indexT + ')').hide();
      tabT.find('.tab-area').find('div.tab-item:eq(' + indexT + ')').show();
      g.preventDefault();
    });
    $(".counter--item").each(function () {
      $(this).isInViewport(function (status) {
        if (status === "entered") {
          for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
            var el = document.querySelectorAll('.odometer')[i];
            el.innerHTML = el.getAttribute("data-odometer-final");
          }
        }
      });
    });
    $(".counter-item").each(function () {
      $(this).isInViewport(function (status) {
        if (status === "entered") {
          for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
            var el = document.querySelectorAll('.odometer')[i];
            el.innerHTML = el.getAttribute("data-odometer-final");
          }
        }
      });
    });
    $('.client-slider').owlCarousel({
      loop: true,
      margin: 0,
      responsiveClass: true,
      nav: false,
      dots: false,
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      responsive:{
          0:{
              items:1,
          },
          500:{
              items:2,
          },
          992:{
              items:3,
          }
      }
    })
    $('.investor-slider').owlCarousel({
      loop: true,
      margin: 30,
      responsiveClass: true,
      nav: false,
      dots: false,
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      responsive:{
          0:{
              items:1,
          },
          500:{
              items:2,
          },
          992:{
              items:3,
          },
          1200:{
              items:4,
          }
      }
    })
    $('.mission-wrapper').owlCarousel({
      loop: true,
      margin: 30,
      responsiveClass: true,
      nav: false,
      dots: false,
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      responsive:{
          0:{
              items:1,
          },
          768:{
              items:2,
          },
          992: {
            items: 3,
          },
          1200: {
            items: 4,
          },
      }
    })
    $('.social-icons li a').on('mouseover', function(e) {
      var social = $(this).parent('li');
      if(social.children('a').hasClass('active')) {
        social.siblings('li').children('a').removeClass('active');
        $(this).addClass('active');
      } else {
        social.siblings('li').children('a').removeClass('active');
        $(this).addClass('active');
      }
    });
    $( function() {
      $( "#btc-range" ).slider({
        range: "min",
        value: 300,
        min: 1,
        max: 1000,
        slide: function( event, ui ) {
          $( "#btc-amount" ).val( ui.value + " BTC" );
        }
      });
      $( "#btc-amount" ).val( "BTC " +  $( "#btc-range" ).slider( "value" ) );
    } );
    $( function() {
      $( "#usd-range" ).slider({
        range: "min",
        value: 500,
        min: 1,
        max: 1000,
        slide: function( event, ui ) {
          $( "#usd-amount" ).val( ui.value + " USD" );
        }
      });
      $( "#usd-amount" ).val( "USD " +  $( "#usd-range" ).slider( "value" ) );
    } );
    $( function() {
      $( "#eth-range" ).slider({
        range: "min",
        value: 400,
        min: 1,
        max: 1000,
        slide: function( event, ui ) {
          $( "#eth-amount" ).val( ui.value + " ETH" );
        }
      });
      $( "#eth-amount" ).val( "ETH " +  $( "#eth-range" ).slider( "value" ) );
    } );
    $( function() {
      $( "#rub-range" ).slider({
        range: "min",
        value: 600,
        min: 1,
        max: 1000,
        slide: function( event, ui ) {
          $( "#rub-amount" ).val( ui.value + " RUB" );
        }
      });
      $( "#rub-amount" ).val( "RUB " +  $( "#rub-range" ).slider( "value" ) );
    } );
  });
})(jQuery);
