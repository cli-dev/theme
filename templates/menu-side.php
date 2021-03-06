 <?php 
    $detect = new Mobile_Detect;
    $menu_classes = '';
    $myoptions = get_option( 'themesettings_');
    $hide_menu_on_desktop = $myoptions['hide_menu_on_desktop'];
    $hide_menu = ($hide_menu_on_desktop == 1) ? 'menu-container hidden-menu' : 'menu-container';
    $hide_button = ($hide_menu_on_desktop == 0) ? ' hide_button' : '';
    $header_type = $myoptions['header_type'];
    $top_header_type = $myoptions['top_header_position'];
    $overlapping_header = '';
    if($top_header_type === "header-overlap") {
      $overlapping_header = ' overlapping-header';
    }
    if ($detect->isMobile()) {
      $menu_classes = 'menu-mobile-container';
    } else{
      $menu_classes = 'menu-container';
    }

    if ($top_header_type === 'header-overlap') {
      $menu_inner_class = 'menu-mobile-container';
    }
  ?>
 <nav id="side-menu" class="side-menu <?php echo $hide_menu . $overlapping_header; if ($header_type === 'Right Side Menu') { echo ' right-menu';} else {echo ' left-menu';} ?>">
  <div class="side-menu-inner">
    <?php echo home_logo_link(); ?> 
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu-container', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
    <?php if ( is_active_sidebar( 'side-menu-bottom-widget' ) ) : ?>  
      <div id="side-widget-area">  
        <?php dynamic_sidebar( 'side-menu-bottom-widget' ); ?>
      </div>
    <?php endif; ?>
  </div>   
</nav>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.sub-menu').hide();
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
      $('.side-menu').toggleClass('active');
    });
  });
</script>