<?php 
$myoptions = get_option( 'themesettings_');
$icon_type = $myoptions['social_share_icon_type'];
?>

<footer class="post-footer">
  <div class="post-footer-inner">
    <div class="social-share-wrap">
      <h4>Share:</h4>
      <?php echo displaySocialShare($icon_type, 'social-share'); ?>
    </div>
    <?php get_template_part( 'nav', 'below-single' ); ?>
  </div>
</footer> 