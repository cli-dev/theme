<?php
$myoptions = get_option( 'themesettings_');
$sticky_header = $myoptions['sticky_header'];
$sticky = ($sticky_header == "1") ? 'sticky-header' : '';
$logoimg = $myoptions['logo'];
$logosvg = $myoptions['svg_desktop_logo'];
$logo = ($logosvg) ? $logosvg : $logoimg;
$is_header_in_grid = $myoptions['is_header_in_grid'];
$hide_menu_on_desktop = $myoptions['hide_menu_on_desktop'];
$hide_menu = ($hide_menu_on_desktop == 1) ? 'menu-container hidden-menu' : 'menu-container';
$hide_button = ($hide_menu_on_desktop == 0) ? ' hide_button' : '';
$header_in_grid = ($is_header_in_grid == 1) ? ' header-in-grid' : '';

if ($sticky_header == "1") {?>
  <div class="<?php echo $sticky; ?>">
    <nav class="sticky-nav-inner">
      <div class="desktop-menu-inner">
        <div class="sticky-logo"> 
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'theme' ); ?>" rel="home"></a>
        </div>
        <div class="menu-button-area<?php echo $hide_button; ?>">
          <button class="menu-button">
            <span>toggle menu</span>
          </button>
        </div>
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => $hide_menu, 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
      </div>   
    </nav>
  </div>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      var options = {
        offset: '.site-header',
        offsetSide: 'bottom',
      }
      var header = new Headhesive('.sticky-header', options);
    });
  </script>
<?php } ?>
<nav class="desktop-menu">
  <div class="desktop-menu-inner">
    <?php echo home_logo_link(); ?>
    <div class="menu-button-area<?php echo $hide_button; ?>">
      <button class="menu-button">
        <span>toggle menu</span>
      </button>
    </div>
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => $hide_menu, 'link_before' => '<span class="link-text">', 'link_after' => '</span>') ); ?>
  </div>
</nav>