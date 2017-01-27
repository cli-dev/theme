jQuery(document).ready(function($) {
  $('.sub-menu').hide();
  $('.menu-mobile-container').hide();
  $('.site-header li.menu-item-has-children').append('<span class="sub-menu-icon genericon genericon-expand"></span>');
  $('.site-header li.menu-item-has-children').click(function(){
    if($(this).children('.sub-menu').css('display') === 'none'){
      $('.sub-menu').slideUp(200);
      $('.sub-menu-icon').removeClass('genericon-collapse').addClass('genericon-expand');
      $(this).children('.sub-menu').slideDown(200);
      $(this).children('.sub-menu-icon').removeClass('genericon-expand').addClass('genericon-collapse');
    } else{
      $(this).children('.sub-menu').slideUp(200);
      $(this).children('.sub-menu-icon').removeClass('genericon-collapse').addClass('genericon-expand');
    }
  });
    
  $('.menu-button').click(function(){
    console.log('menu button clicked');
    if($('.menu-mobile-container').css('display') === 'none'){
      $(this).addClass('active');
      $('.menu-mobile-container').slideDown();
      $('#wrapper').addClass('active-menu');
    }
    else{
      $(this).removeClass('active');
      $('.menu-mobile-container').slideUp();
      $('#wrapper').removeClass('active-menu');
    } 
  });
});