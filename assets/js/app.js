/**
 * JS for Rhapsody
 */

var $, jQuery = window.jQuery;

/**
 * Log function
 *
 * usage: log('inside coolFunc',this,arguments);
 * source: http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
 */
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console){
    console.log( Array.prototype.slice.call(arguments) );
  }
};

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

  var homeSlider = $('#hero-slider').bxSlider({
    auto: true,
    easing: 'ease-in-out',
    mode: 'fade',
    pager: false,
    pause: 6000,
    speed: 800,
    onSliderLoad: function() {
      $('.bkgd-slider').css({'opacity': 1});
    }
  });

  $(window).on(orientationEvent,  debounce(function() {

    if (homeSlider.length) {
      homeSlider.reloadSlider();
    }
  }, 250)).trigger(orientationEvent);

}(jQuery));



