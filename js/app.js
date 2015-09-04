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



  $('#hero-slider').slippry({
    transition: 'horizontal',
    pause: 7000,
    onSliderLoad: function() {
      $('#hero-slider').css({'opacity': 1});
    }
  });

}(jQuery));



