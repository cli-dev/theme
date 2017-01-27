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
  $add_typekit_fonts = $typekit = $myoptions['add_typekit_fonts'];
  if($add_typekit_fonts == '1')
  {  
    $typekit = $myoptions['typekit_id'];
    echo '<script src="https://use.typekit.net/' . $typekit . '.js"></script><script>try{Typekit.load({ async: true });}catch(e){}</script>';
  }
  $slug = (!is_blog()) ? the_slug() . '-page' : '';
  $detect = new Mobile_Detect;
?>
<?php if(!$detect->isMobile()){ ?>
  <style type="text/css">
    @media screen and (min-width: 1024px){
      nav.mobile-nav{
        display: none;
      }
    }
  </style>
<?php } ?>

</head>
<body <?php body_class($slug); ?> >
<div id="top"></div>
<div id="wrapper" class="hfeed">
<?php get_template_part('templates/site-header'); ?>
<div id="container">