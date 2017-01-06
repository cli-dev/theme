<?php
$myoptions = get_option( 'themesettings_');
$sticky_header = $myoptions['sticky_header'];
$sticky = ($sticky_header == "1") ? 'sticky-header' : '';
$is_header_in_grid = $myoptions['is_header_in_grid'];
$header_in_grid = ($is_header_in_grid == 1) ? ' header-in-grid' : '';

if ($sticky_header == "1") {?>
<div class="<?php echo $sticky; ?>">
  <nav class="sticky-nav-inner">
    <div class="desktop-menu-inner divided-menu-wrapper">
      <?php wp_nav_menu( array( 'theme_location' => 'divided-left-menu', 'container_class' => 'left-side-menu divided-menu', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
      <div class="sticky-logo"> 
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'theme' ); ?>" rel="home"></a>
      </div>
      <?php wp_nav_menu( array( 'theme_location' => 'divided-right-menu', 'container_class' => 'right-side-menu divided-menu', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
      </div>
  </nav>
</div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var header = new Headhesive('.sticky-header');
  });
</script>
<?php } ?>
<nav class="desktop-menu">
  <div class="desktop-menu-inner divided-menu-wrapper">
    <?php wp_nav_menu( array( 'theme_location' => 'divided-left-menu', 'container_class' => 'left-side-menu divided-menu', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
    <?php echo home_logo_link(); ?>
    <?php wp_nav_menu( array( 'theme_location' => 'divided-right-menu', 'container_class' => 'right-side-menu divided-menu', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
  </div>
</nav>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(window).load(function(){
      var navWidths = $('.divided-menu').map(function() {
        return $(this).outerWidth();
      }).get();
      var navWidth = Math.max.apply(null, navWidths);
      $('.divided-menu').css('min-width', navWidth);
    });
  });
</script>