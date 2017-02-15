/*!
* Theme custom scripts v1.0
*/

jQuery(document).ready(function($) {

  // Lazy load images

    $("img.lazyload").each(function() {

      imgClass = $(this).attr('class');
      imgWidth = $(this).attr('width');
      imgHeight = $(this).attr('height');
      imgSrcSet = $(this).attr('srcset');
      imgSrc = $(this).attr('src');

      $(this).removeAttr('src').removeAttr('class').removeAttr('srcset').attr('data-original-set', imgSrcSet).attr('data-original', imgSrc).addClass('lazyload ' + imgClass);

    });

  // Code for lazy loading background images

    new LazyLoad({
      elements_selector: ".lazyload"
    });

  // Code for lightbox overlay
  
    $(".lightbox").fancybox({
      padding: 0,
      maxWidth: 700,
      margin: [50, 20, 20, 20]
    });

  // Code for overlapping header

    var siteHeaderHeight = $('.site-header').outerHeight();
    $('.overlapping-header').css('padding-top', siteHeaderHeight);
    $(window).resize(function(event) {
      var siteHeaderHeight2 = $('.site-header').outerHeight();
      $('.overlapping-header').css('padding-top', siteHeaderHeight2);
    });

  // Code for pushing footer to bottom of page if content is not at least the height of the window
    var wH = $(window).height(); 
    var fH = $('#footer').height();
    var cH = wH - fH;

    $('#container').css('min-height', cH);

    $(window).resize(function(event) {
      var wH2 = $(window).height(); 
      var fH2 = $('#footer').height();
      var cH2 = wH2 - fH2;
      $('#container').css('min-height', cH2);

    });

  // Add extra bottom padding to Owl Carousels for paging dots

    var dotsWrapper = $('.owl-dots').outerHeight();

    $('.owl-carousel').css('margin-bottom', dotsWrapper);

    $(window).resize(function(event) {
      var dotsWrapper2 = $('.owl-dots').outerHeight();

      $('.owl-carousel').css('margin-bottom', dotsWrapper2);
    });

  // Special Hover Button Functionality 
    $('.special-btn').each(function(){
      if($(this).hasClass('fill-space')){
        var maxHeight = $(this).height();
        $(this).children('.panel').height(maxHeight-4);
        $(this).css('max-height', maxHeight);
      }
      else{
        var elementHeights = $(this).children('.panel').map(function() {
          return $(this).outerHeight(true);
        }).get();
        var maxHeight2 = Math.max.apply(null, elementHeights);
        $(this).children('.panel').height(maxHeight2);
        $(this).height(maxHeight2);
        var elementWidths = $(this).find('.panel-inner').map(function() {
          return $(this).width();
        }).get();
        var maxWidth = Math.max.apply(null, elementWidths);
        $(this).find('.panel-inner').width(maxWidth);
      }
    }); 

  // Page Animation Functionality
    $(window).load(function() {
      var wow = new WOW({
        mobile: false, 
      });
      wow.init();
    });

  // Plugins for forms

    $('select').select2();

    $("input:checkbox, input:radio, input:file").uniform();

  // Hover box scripts

    $('.hover-box').each(function(index, el) {
      var boxTitle = $(this).find('.box-title').height();
      var boxTxt = $(this).find('.box-txt').height();

      $(this).find('.box-inner').css('min-height', boxTxt + boxTitle);

      $(this).find('.box-txt').css({
        '-webkit-transform' : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
        '-moz-transform'    : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
        '-ms-transform'     : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
        '-o-transform'      : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
        'transform'         : 'translate3d(0px, ' + boxTxt + 'px, 0px)'
      });
      $(this).find('.box-title').css({
        '-webkit-transform' : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
        '-moz-transform'    : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
        '-ms-transform'     : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
        '-o-transform'      : 'translate3d(0px, ' + boxTxt + 'px, 0px)',
        'transform'         : 'translate3d(0px, ' + boxTxt + 'px, 0px)'
      });
    });
    $(window).resize(function(event) {
      $('.hover-box').each(function(index, el) {
        var boxTitle2 = $(this).find('.box-title').height();
        var boxTxt2 = $(this).find('.box-txt').height();

        $(this).find('.box-inner').css('min-height', boxTxt2 + boxTitle2);

        $(this).find('.box-txt').css({
          '-webkit-transform' : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-moz-transform'    : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-ms-transform'     : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-o-transform'      : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          'transform'         : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)'
        });
        $(this).find('.box-title').css({
          '-webkit-transform' : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-moz-transform'    : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-ms-transform'     : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          '-o-transform'      : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)',
          'transform'         : 'translate3d(0px, ' + boxTxt2 + 'px, 0px)'
        });
      });
    });

});

