<?php
  $myoptions = get_option( 'themesettings_');
  $sticky_header = $myoptions['sticky_header'];
?>
<nav class="mobile-nav">
  <div class="mobile-logo"> 
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
  </div>
  <div class="menu-button-area">
    <button class="menu-button">
      <span>toggle menu</span>
    </button>
  </div>
  <?php 
    wp_nav_menu( array( 
      'theme_location' => 'mobile-menu',
      'container_class' => 'menu-mobile-container', 
      'link_before' => '<span class="link-text">', 
      'link_after' => '</span>'
    )); 
  ?>
</nav>

<?php if ($sticky_header == "1") {?>
  <!-- <div class="mobile sticky">
    <nav class="mobile-nav">
      <div class="mobile-logo"> 
        <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
      </div>
      <div class="menu-button-area">
        <button class="menu-button">
          <span>toggle menu</span>
        </button>
      </div>
      <?php 
        wp_nav_menu( array( 
          'theme_location' => 'mobile-menu',
          'container_class' => 'menu-mobile-container', 
          'link_before' => '<span class="link-text">', 
          'link_after' => '</span>'
        )); 
      ?>
    </nav>
  </div> -->
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      var options = {
        offset: '.site-header',
        offsetSide: 'bottom',
      }
      //var header = new Headhesive('.sticky.mobile', options);

      //$('.sticky.mobile').midnight();
    });
  </script>
<?php } ?>