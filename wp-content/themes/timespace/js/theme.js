$(document).ready(function() {
  console.log('👋🏻')
  console.log('Design: Kati Forner');
  console.log('https://katiforner.com/');
  console.log('Web Development: Sarah Holden');
  console.log('https://saraheholden.com/');
  console.log('👀');

  /* ---------------------------------------------
  HAMBURGER MENU
  ------------------------------------------------ */
  $('.hamburger').on('click', function(e) {
    e.preventDefault();

    $('body').addClass('open-navigation');

  });

  $('.js-close-nav').on('click', function (e) {
    e.preventDefault();
    $('body').removeClass('open-navigation');
  });


  /* ---------------------------------------------
    ANIMATED BUTTON / LINK ARROW LINE
  ------------------------------------------------ */
  let xs = [];
  for (var i = 0; i <= 35; i++) {
    xs.push(i);
  }

  var animationReq;
  var arrowToAnimate;

  let t = 11;

  function animate() {
    let points = xs.map(x => {
      let y = 5 + 2.8 * Math.sin((x + t) / 2.35);
      return [x, y];
    });

    let path = "M" + points.map(p => {
      return p[0] + "," + p[1];
    }).join(" L");

    // document.querySelector("path").setAttribute("d", path);
    $(arrowToAnimate).attr('d', path);
    t += 0.5;

    animationReq = requestAnimationFrame(animate);
  }


  $('.btn, .link-btn, .text-btn').on('mouseenter', function () {
    arrowToAnimate = $(this).find('.animated-wavy-line');
    animate();
  });

  $('.btn, .link-btn, .text-btn').on('mouseleave', function () {
    cancelAnimationFrame(animationReq);
  });

  // IFRAME EMBED CONTACT FORM
  $('.contact-form').on('mouseenter', 'button', function () {
    arrowToAnimate = $(this).find('.animated-wavy-line');
    animate();
  });

  $('.contact-form').on('mouseleave', 'button', function () {
    cancelAnimationFrame(animationReq);
  });


  /* ---------------------------------------------
    LAZY LOADING IMAGES
  ------------------------------------------------ */

  // LOAD AND SCALE IN CORRECT SIZED IMAGE
  if ($('.smooth-load').find('.bg-image').length > 0) {
    var previousWidth = $(window).innerWidth();

    function swapHeader (browserWidth) {
      $('.smooth-load').removeClass('animate-in');
      var bgImage = new Image();
      var $bgImageWrapper = $('.smooth-load').find('.bg-image');
      var imageSrc = $bgImageWrapper.data('monitor-bg');

      if (browserWidth < 768) {
        // Mobile
        imageSrc = $bgImageWrapper.data('mobile-bg');
      } else if (browserWidth < 1440) {
        // Desktop
        imageSrc = $bgImageWrapper.data('bg');
      } else {
        // If the monitor image has been loaded, stop swapping out images! Leave the highest res image
        $(window).off('resize.swapbg');
      }

      bgImage.src = imageSrc;

      $(bgImage).on('load', function() {
        $bgImageWrapper.css('background-image', 'url('+ $(this).attr('src') +')');
        $('.smooth-load').addClass('animate-in');
      });

      previousWidth = $(window).innerWidth();
    }

    // Scale and fade in BG image on load
    swapHeader($(window).innerWidth());

    $(window).on('resize.swapbg', function () {
      var browserWidth = $(window).innerWidth();
      if (previousWidth < 768 && browserWidth > 768 || previousWidth < 1440 && browserWidth > 1440 ) {
        swapHeader(browserWidth);
      }
    });
  }


  /* ---------------------------------------------
    PARALLAX & SCROLLING ZOOM EFFECTS
  ------------------------------------------------ */
  var controller = new ScrollMagic.Controller();
  var homeTopOffset = $('header').length > 0 && $('header').offset().top || 0;

  $(window).on('resize', function () {
    homeTopOffset = $('header').offset().top;
  });

  $('.scale-bg-trigger').each(function() {
    var tl = new TimelineMax();
    var bgImage = $(this).find('.scale-image');
    tl.fromTo(bgImage, 1, {scale: 1}, {scale: 1.14});

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      offset: -homeTopOffset,
      triggerHook: 0,
      duration: '100%'
    })
    .setTween(tl)
    .addTo(controller);
  });

  $('.scale-down-trigger').each(function() {
    var tl2 = new TimelineMax();
    var imageToAnimate = $(this).find('.scale-image');
    tl2.fromTo(imageToAnimate, 1, {scale: 1.14}, {scale: 1});

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 0.4,
      duration: "100%"
    })
    .setTween(tl2)

    .addTo(controller);
  });

  $('.scale-up-trigger').each(function() {
    var tl3 = new TimelineMax();
    var imageToAnimate = $(this).find('.scale-image');
    tl3.fromTo(imageToAnimate, 1, {scale: 1}, {scale: 1.14});

    var scene = new ScrollMagic.Scene({
      triggerElement: this,
      triggerHook: 0.4,
      duration: "100%"
    })
    .setTween(tl3)
    .addTo(controller);
  });

  $('.scroll-wrapper').each(function() {
    var scrollOffset = $(this).data('offset') || 0;
    new ScrollMagic.Scene({triggerElement: this, offset: scrollOffset})
      .setClassToggle(this, "scrolled") // add class toggle
      .reverse(false)
      .addTo(controller);
  });

  $('.list-animation-wrapper').each(function() {
    var scrollOffset = $(this).data('offset') || 0;
    var $thisWrapper = $(this);
    new ScrollMagic.Scene({triggerElement: this, offset: scrollOffset})
      .setClassToggle(this, "scrolled") // add class toggle
      .reverse(false)

      .addTo(controller)
      .on("enter", function (e) {
        if ($thisWrapper.find('.animate-item').length > 0) {
          $listItems = $thisWrapper.find('.animate-item');
        } else {
          $listItems = $thisWrapper.find('li');
        }
        $listItems.each(function(i) {
          var delay = i * 200;
          var self = this;
          setTimeout(function() {
            $(self).addClass('fade-in');
          }, delay);
        });
      });
  });



    /* ---------------------------------------------
      SWIPER
    ------------------------------------------------ */
    var gallerySwiper = new Swiper('.swiper-container-gallery', {
      spaceBetween: 0,
      slidesPerView: 'auto',
      allowTouchMove: false,
      loop: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        // when window width is <= 768px
        768: {
          slidesPerView: 'auto',
        }
      },
    });

    $('.range-pagination').on('input change', '.range-input', function() {
      var $currentRangeInput = $(this);
      var slideIndex = parseInt($currentRangeInput.val()) - 1;
      var galleryIndex = $currentRangeInput.closest('.js-gallery-row').data('gallery-index');
      gallerySwiper[galleryIndex].slideTo(slideIndex, 300);
    });


    $.each($('.range-slider'), function( index, currentRangeInput ) {
      console.log(index, currentRangeInput);
      var maxSlides = $(currentRangeInput).data('slide-count');
      console.log(maxSlides);
      var slider = $(currentRangeInput).slider({
        min: 1,
        range: false,
        step: .0001,
        max: maxSlides,
        value: 1,
        animate: 'slow',
        orientation: 'horizontal',
        slide: function( event, ui ) {
          var slideIndex = Math.round(ui.value) - 1;
          var galleryIndex = $(ui.handle).closest('.js-gallery-row').data('gallery-index');
          gallerySwiper[galleryIndex].slideTo(slideIndex, 300);
        },
        stop: function( event, ui ) {
          $(this).slider('value', Math.round(ui.value));
        }
      })
    });



    /* ---------------------------------------------
    SMOOTH SCROLL
    ------------------------------------------------ */
    // $('.scroll-to').on('click', function(e) {
    //   e.preventDefault();
    //
    //   var thisTarget = $(this).attr('href');
    //
    //   if (thisTarget == '#bottom') {
    //     var targetOffset = $('#top').offset().top + $('#top').outerHeight() - $(window).height();
    //   } else {
    //     var targetOffset = $(thisTarget).offset().top;
    //   }
    //
    //   $('html, body').animate({
    //     scrollTop: targetOffset
    //   }, 600);
    // });


  /* ---------------------------------------------
  Accordion
  ------------------------------------------------ */
  $('.accordion').on('click', '.accordion-toggle', function() {
    $(this)
      .closest('.accordion-panel')
      .toggleClass('expanded');
  });

  /* ---------------------------------------------
  SCROLL NAV ANIMATION
  ------------------------------------------------ */
  $(window).on('scroll', animateNav);
  animateNav();

  function animateNav () {
    if ($(window).scrollTop() > 10) {
      $('.js-navbar').addClass('scrolled');
    } else {
      $('.js-navbar').removeClass('scrolled');
    }
  }

});
