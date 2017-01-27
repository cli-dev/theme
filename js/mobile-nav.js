jQuery(document).ready(function($) {
  $('.sub-menu').hide();
  $('.menu-mobile-container').hide();
  $('li.menu-item-has-children').append('<span class="sub-menu-icon"></span>');
  $('.menu-mobile-container li.menu-item-has-children').click(function(){
    if($(this).children('.sub-menu').css('display') === 'none'){
      $('.sub-menu').slideUp(200);
      $('.sub-menu-icon').removeClass('active-sub-icon');
      $(this).children('.sub-menu-icon').addClass('active-sub-icon');
      $(this).children('.sub-menu').slideDown(200);
    } else{
      $(this).children('.sub-menu').slideUp(200);
      $(this).children('.sub-menu-icon').removeClass('active-sub-icon');
    }
  });  
  $('.menu-button').click(function(){
    $(this).toggleClass('active');
    $('#wrapper').toggleClass('active-menu');
    $('.menu-mobile-container').slideToggle();
  });
});