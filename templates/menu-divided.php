<?php
$myoptions = get_option( 'themesettings_');
$sticky_header = $myoptions['sticky_header'];
$sticky = ($sticky_header == "1") ? 'sticky-header' : '';
$logoimg = $myoptions['logo'];
$logosvg = $myoptions['svg_desktop_logo'];
$logo = ($logosvg) ? $logosvg : $logoimg;
$sticky_logo = ($myoptions['sticky_header_logo']) ? $myoptions['sticky_header_logo'] : $logo;
$logo_max = ($myoptions['desktop_logo_maximum_width']) ? ' style="max-width: ' . $myoptions['desktop_logo_maximum_width'] . 'px;"' : '';
$header_in_grid = ($is_header_in_grid == 1) ? ' header-in-grid' : '';
$sticky_header_height = $myoptions['sticky_header_height'];
$sticky_height = ($sticky_header_height) ? ' style="height: ' . $sticky_header_height . 'px;"' : '';

if ($sticky_header == "1") {?>
<div class="<?php echo $sticky; ?>">
  <nav class="sticky-nav-inner"<?php echo $sticky_height; ?>>
    <?php wp_nav_menu( array( 'theme_location' => 'divided-left-menu', 'container_class' => 'left-side-menu divided-menu', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
    <div class="site-logo"<?php echo $logo_max; ?>> 
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'theme' ); ?>" rel="home" style="background: url('<?php $sticky_logo ?>') center no-repeat; background-size: contain;">
        <img src="<?php if ($logoimg) { echo $logoimg; }; ?>" alt="<?php esc_attr_e( get_bloginfo( 'name' ), 'theme' ); ?> Logo" class="site-main-logo"/>
      </a>
    </div>
    <?php wp_nav_menu( array( 'theme_location' => 'divided-right-menu', 'container_class' => 'right-side-menu divided-menu', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
  </nav>
</div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var header = new Headhesive('.sticky-header');
  });
</script>
<?php } ?>
<nav class="desktop-menu">
  <?php wp_nav_menu( array( 'theme_location' => 'divided-left-menu', 'container_class' => 'left-side-menu divided-menu', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
  <?php echo home_logo_link(); ?>
  <?php wp_nav_menu( array( 'theme_location' => 'divided-right-menu', 'container_class' => 'right-side-menu divided-menu', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
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