<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<?php
  wp_head();
  $myoptions = get_option( 'themesettings_');
  $favicon = $myoptions['favicon'];
  if ($favicon) { 
    echo '<link rel="shortcut icon" href="' . $favicon . '" type="image/x-icon" />';
  } 
  $url = "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCCi4NfyfjQhCvAdi1VHYKbQhLgl-0linc";
  $google_fonts = json_decode($url, true);
  $theme_fonts = $myoptions['theme_fonts'];
  $add_typekit_fonts = $myoptions['add_typekit_fonts'];
  if(isset($google_fonts['error'])){
    echo '<script>WebFont.load({ google: { families: [';  
    foreach($theme_fonts as $theme_font){
      $font = $theme_font['theme_font'];
      $variants = $theme_font['variants'];
      $googleVariants = implode(",",$variants);
      echo "'" . $font . ':' . $googleVariants . "', ";
    }
    echo ']}});</script>';
  }
  if($add_typekit_fonts == '1')
  {  
    $typekit = $myoptions['typekit_id'];
    echo '<script src="https://use.typekit.net/' . $typekit . '.js"></script><script>try{Typekit.load({ async: true });}catch(e){}</script>';
  }
  $slug = (!is_blog()) ? the_slug() . '-page' : '';
?>
</head>
<body <?php body_class($slug); ?> >
<div id="top"></div>
<div id="wrapper" class="hfeed">
<?php get_template_part('templates/site-header'); ?>
<div id="container">