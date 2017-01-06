<?php 
  $myoptions = get_option( 'themesettings_');
  $company_name = get_bloginfo('name');
  $site_url = get_bloginfo('url');
  $logo_img = $myoptions['logo'];
  $logo_img_url = $logo_img['url'];
  $logo_img_width = $logo_img['width'];
  $logo_img_height = $logo_img['height'];
?>
<div itemscope itemprop="publisher author" itemtype="http://schema.org/Organization" class="post-author">
  <span itemprop="name"><a itemprop="url" href="<?php echo $site_url; ?>"><?php echo $company_name; ?></a></span>
  <div itemprop="image logo" itemscope itemtype="http://schema.org/ImageObject">
    <img itemprop="url" src="<?php echo $logo_img_url; ?>" title="<?php echo $company_name; ?> Logo" alt="<?php echo $company_name; ?> Logo" class="publisher-logo" />
    <meta itemprop="width" content="<?php echo $logo_img_width; ?>" />
    <meta itemprop="height" content="<?php echo $logo_img_height; ?>" />
  </div>
</div>