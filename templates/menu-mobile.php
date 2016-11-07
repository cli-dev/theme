<?php
  $myoptions = get_option( 'themesettings_');
  $logoimg = ($myoptions['mobile_logo']) ? $myoptions['mobile_logo'] : '';
  $logosvg = ($myoptions['svg_mobile_logo']) ? $myoptions['svg_mobile_logo'] : '';
  $logo = ($logosvg) ? $logosvg : $logoimg;
  $logo_max_width = ($myoptions['mobile_logo_maximum_width']) ? ' style="max-width: ' . $myoptions['mobile_logo_maximum_width'] . 'px;"' : '';
?>
<nav class="mobile-nav">
  <div class="site-logo"<?php echo $logo_max_width; ?>> 
    <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'theme' ); ?>" rel="home" style="background: url('<?php echo $logo; ?>') center no-repeat; background-size: contain;">
      <img src="<?php echo $logoimg;?>" alt="<?php esc_attr_e( get_bloginfo( 'name' ), 'theme' ); ?> Logo" class="site-main-logo"/>
    </a>
  </div>
  <div class="menu-button-area">
    <button class="menu-button">
      <span>toggle menu</span>
    </button>
  </div>
  <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'container_class' => 'menu-mobile-container', 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
</nav>
