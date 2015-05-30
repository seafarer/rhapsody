/**
 * JS for RMC
 */

var $, jQuery = window.jQuery;

$(function() {

  "use strict";

  var breakpoint = 960;

  var supportsOrientationChange = 'onorientationchange' in window,
      orientationEvent = supportsOrientationChange ? 'orientationchange' : 'resize';

  /**
   *   Returns a function, that, as long as it continues to be invoked, will not
   *   be triggered. The function will be called after it stops being called for
   *   N milliseconds. If `immediate` is passed, trigger the function on the
   *   leading edge, instead of the trailing. Copied from underscores.js.
   */
  function debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  /**
   * cache our global variables
   * @type {*|jQuery|HTMLElement}
   */

  var resorts = $('#resorts'),
      mountains = $('#mountains'),
      cities = $('#cities'),
      video = $('#wrmc-video'),
      videoEl = document.getElementById('wrmc-video'),
      header = $('#masthead'),
      section = $('.hero-block'),
      title = $('.hero-title');

  /**
   * Function to keep homepage video sized and centered in viewport
   */
  function videoDiv() {
    var videoContainer = $('.hero-video');

    if (videoContainer.length) {
      var videoWidth = video.outerWidth();
      var vpw = $(window).outerWidth();
      var vph = $(window).outerHeight() - 71; // subtract height of nav bar

      if (vpw > breakpoint) {
        videoContainer.css({'height': vph + 'px', 'width': vpw + 'px'});
        video.css({'margin-left': '-' + ((videoWidth - vpw) / 2) + 'px'});
      } else {
        videoContainer.css({'display': 'none'});
      }
    }
  }

  /**
   * Function for homepage fixed slides. Lots of magic numbers!
   */
  function heroFixed() {

    $(window).scroll(function () {

      var headerHeight = header.outerHeight(),
        viewportHeight = $(window).outerHeight() - headerHeight,
        scrollY = $(window).scrollTop();

      // Pause the video if it scrolls out of the view port
      if (scrollY <= viewportHeight) {
        videoEl.play();
      } else {
        videoEl.pause();
      }

      //Measure scroll position and add a fixed class when hero block meets top of viewport
      //The letter div is twice the height of the viewport so everything is a multiple of 2
      if (scrollY >= viewportHeight && scrollY <= (viewportHeight * 3)) {
        mountains.removeClass('fixed');
        cities.removeClass('fixed');
        resorts.addClass('fixed');

      } else if (scrollY >= (viewportHeight * 3) && scrollY < (viewportHeight * 5)) {
        resorts.removeClass('fixed');
        cities.removeClass('fixed');
        mountains.addClass('fixed');

      } else if (scrollY >= (viewportHeight * 5) && scrollY < (viewportHeight * 7)) {
        mountains.removeClass('fixed');
        cities.addClass('fixed');

      } else {
        resorts.removeClass('fixed');
        mountains.removeClass('fixed');
        cities.removeClass('fixed');
      }

      // Measure scroll position and fade in opacity when hero block scrolls into viewport
      var resortBlock = $('#resorts .hero-block'),
        mountainBlock = $('#mountains .hero-block'),
        citiesBlock = $('#cities .hero-block'),
        dim1 = Math.max(1, Math.min((((scrollY / 2.75) - viewportHeight / viewportHeight) - viewportHeight) * 2), 0),
        dim2 = Math.max(1, Math.min((((scrollY / 4.75) - viewportHeight / viewportHeight ) - viewportHeight) * 2), 0),
        dim3 = Math.max(1, Math.min((((scrollY / 6.66) - viewportHeight / viewportHeight) - viewportHeight) * 2), 0);


      if (scrollY >= viewportHeight / 2 && scrollY <= (viewportHeight)) {
        resortBlock.css({'opacity': ( 2 * ( scrollY - ( viewportHeight / 2 ) + 1 ) / viewportHeight )});

      } else if (scrollY > (viewportHeight * 2.75) && scrollY <= (viewportHeight * 3)) {
        resortBlock.css({'opacity': 1 / dim1 * 10});
        mountainBlock.css({'opacity': dim1 / 100});

      } else if (scrollY >= (viewportHeight * 3) && scrollY <= (viewportHeight * 4.75)) {
        mountainBlock.css({'opacity': 1});

      } else if (scrollY > (viewportHeight * 4.75) && scrollY <= (viewportHeight * 5)) {
        mountainBlock.css({'opacity': 1 / dim2 * 10});
        citiesBlock.css({'opacity': dim2 / 100});

      } else if (scrollY > (viewportHeight * 5) && scrollY <= (viewportHeight * 6.67)) {
        mountainBlock.css({'opacity': 0});
        citiesBlock.css({'opacity': 1});

      } else if (scrollY > (viewportHeight * 6.67) && scrollY < (viewportHeight * 7)) {
        citiesBlock.css({'opacity': 1 / dim3 * 10});

      } else if (scrollY > viewportHeight && scrollY < (viewportHeight * 2.75)) {
        resortBlock.css({'opacity': 1});

      } else {

        section.css({'opacity': 0});
      }
    });
  }

  function heroClear() {

  }

  /**
   * This keeps everything sized to fit into the viewport and fires the
   * hero and video functions when window width is wider than the breakpoint.
   * Strips it all out otherwise.
   */
  $(window).on(orientationEvent, debounce(function () {
    var viewportWidth = $(window).outerWidth();

    if (viewportWidth > breakpoint && $('.home').length) {

      var headerHeight = header.outerHeight(),
          viewportHeight = $(window).outerHeight() - headerHeight;

      section.each(function () {
        $(this).css({
          height: viewportHeight,
          width: viewportWidth
        });
      });

      title.each(function () {
        $(this).css({
          height: viewportHeight * 2
        });
      });

      // Sticky header: relies on sticky kit library, which is optimised to avoid jank
      header.stick_in_parent();

      // Call functions
      videoDiv();
      heroFixed();

    } else {

      // Unhook sticky header
      header.trigger("sticky_kit:detach");

      // Remove scroll styles
      section.each(function () {
        $(this).css({
          height: 'auto',
          width: 'auto',
          opacity: 1
        });
      });

      title.each(function () {
        $(this).css({
          height: 'auto'
        });
      });
    }
  }, 250)).trigger(orientationEvent);


  /**
   * Slick slider settings
   */
  $('.banner-slider').slick({
    appendArrows: $('.banner-nav'),
    prevArrow: '<a class="slick-prev">',
    nextArrow: '<a class="slick-next">',
    autoplay: true,
    autoplaySpeed: 4500,
    fade: true,
    adaptiveHeight: true
  });

  /**
   * Team member filter function
   */
  function isotopeTeam() {

    var $container = $('.team.landing-grid');
    $container.isotope({
      itemSelector: '.rmc_team_members',
      layoutMode: 'fitRows'
    });

    $('#location-filter').on( 'change', function() {
      var filterValue = this.value;
      $container.isotope({ filter: filterValue });
    });
  }

  /**
   * Fires video and isotope functions when the window loads.
   */
  $(window).load( function () {
    isotopeTeam();
  });

  /**
   * Give HTML a class so we can have parallax on interior pages
   */
  if($('body.single').length) {
    $('html').addClass('single');
  }

  $('#places-menu').click(function() {
    $('.places-list').slideToggle();
  });

}(jQuery));



