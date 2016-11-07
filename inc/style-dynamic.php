<?php

if( function_exists('get_field') ) :

$myoptions = get_option( 'themesettings_');

$header_type = $myoptions['header_type'];
$content_background_color = $myoptions['content_background_color'];
$main_font_color = $myoptions['main_font_color'];
$text_highlight_color = $myoptions['text_highlight_color'];
$header_color = $myoptions['header_color'];
$header_background_opacity = $myoptions['header_background_opacity'];
$desktop_header_height = $myoptions['desktop_header_height'];
$mobile_header_height = $myoptions['mobile_header_height'];
$sticky_header_height = $myoptions['sticky_header_height'];
$header_bg_rgb = hex2rgb($header_color);
$menu_link_color = $myoptions['menu_link_color'];
$menu_line_height = $myoptions['menu_line_height'];
$mobile_menu_item_divider_color = $myoptions['mobile_menu_item_divider_color'];
$menu_icon_top_bar_background_color = $myoptions['menu_icon_top_bar_background_color'];
$menu_icon_middle_bar_background_color = $myoptions['menu_icon_middle_bar_background_color'];
$menu_icon_bottom_bar_background_color = $myoptions['menu_icon_bottom_bar_background_color'];
$menu_icon_text_color_color = $myoptions['menu_icon_text_color_color'];
$menu_font_size = $myoptions['menu_font_size'];
$menu_background_color = $myoptions['menu_background_color']; 

$menu_font_family = get_field_object('menu_font_family', 'option'); 
$menu_font_family_value = get_field('menu_font_family', 'option');
$menu_font_family_label = $menu_font_family['choices'][ $menu_font_family_value ];

$menu_link_active_color = $myoptions['menu_link_active_color'];

$default_font_family = get_field_object('default_font_family', 'option'); 
$default_font_family_value = get_field('default_font_family', 'option');
$default_font_family_label = $default_font_family['choices'][ $default_font_family_value ];

$headings_font_family = get_field_object('headings_font_family', 'option'); 
$headings_font_family_value = get_field('headings_font_family', 'option');
$headings_font_family_label = $headings_font_family['choices'][ $headings_font_family_value ];
$headings_font_color = $myoptions['headings_font_color'];
$headings_text_transform = $myoptions['headings_text_transform'];
$headings_line_height = $myoptions['headings_line_height'];
$headings_font_weight = $myoptions['headings_font_weight'];

$paragraph_font_family = get_field_object('paragraph_font_family', 'option'); 
$paragraph_font_family_value = get_field('paragraph_font_family', 'option');
$paragraph_font_family_label = $paragraph_font_family['choices'][ $paragraph_font_family_value ];
$paragraph_font_color = $myoptions['paragraph_font_color'];
$paragraph_text_transform = $myoptions['paragraph_text_transform'];
$paragraph_line_height = $myoptions['paragraph_line_height'];
$paragraph_font_weight = $myoptions['paragraph_font_weight'];

$link_text_color = $myoptions['link_text_color'];
$link_text_hover_color = $myoptions['link_text_hover_color'];

$footer_top_background_color = $myoptions['footer_top_background_color'];
$footer_top_text_color = $myoptions['footer_top_text_color'];
$footer_top_link_color = $myoptions['footer_top_link_color'];
$footer_top_link_hover_color = $myoptions['footer_top_link_hover_color'];
$footer_bottom_background_color = $myoptions['footer_bottom_background_color'];
$footer_bottom_text_color = $myoptions['footer_bottom_text_color'];
$footer_bottom_link_color = $myoptions['footer_bottom_link_color'];
$footer_bottom_link_hover_color = $myoptions['footer_bottom_link_hover_color'];

$pagination_item_background_color = $myoptions['pagination_item_background_color'];
$pagination_item_text_color = $myoptions['pagination_item_text_color'];
$pagination_current_background_color = $myoptions['pagination_current_background_color'];
$pagination_current_text_color = $myoptions['pagination_current_text_color'];

$global_css = $myoptions['global_css'];
$tablet_portrait_css = $myoptions['tablet_portrait_css'];
$tablet_landscape_css = $myoptions['tablet_landscape_css'];
$desktop_css = $myoptions['desktop_css'];

$scroll_button_width = $myoptions['scroll_button_width'];
$scroll_button_border_width = $myoptions['scroll_button_border_width'];
$scroll_button_icon_font_size = $myoptions['scroll_button_icon_font_size'];
$scroll_button_bottom = $myoptions['scroll_button_bottom'];
$scroll_button_right = $myoptions['scroll_button_right'];
$scroll_button_border_color = $myoptions['scroll_button_border_color'];
$scroll_button_background_color = $myoptions['scroll_button_background_color'];
$scroll_button_icon_color = $myoptions['scroll_button_icon_color'];
$scroll_button_hover_border_color = $myoptions['scroll_button_hover_border_color'];
$scroll_button_hover_background_color = $myoptions['scroll_button_hover_background_color'];
$scroll_button_hover_icon_color = $myoptions['scroll_button_hover_icon_color'];

$sadie_effect_gradient_top_color = $myoptions['sadie_effect_gradient_top_color'];
$sadie_effect_gradient_top_color_opacity = $myoptions['sadie_effect_gradient_top_color_opacity'];
$sadie_effect_gradient_top = 'rgba(' . hex2rgb($sadie_effect_gradient_top_color) . ', ' . $sadie_effect_gradient_top_color_opacity . ')';
$sadie_effect_gradient_bottom_color = $myoptions['sadie_effect_gradient_bottom_color'];
$sadie_effect_gradient_bottom_color_opacity = $myoptions['sadie_effect_gradient_bottom_color_opacity'];
$sadie_effect_gradient_bottom = 'rgba(' . hex2rgb($sadie_effect_gradient_bottom_color) . ', ' . $sadie_effect_gradient_bottom_color_opacity . ')';

?>

<?php if ($text_highlight_color) : ?>

::-moz-selection { background: <?php echo $text_highlight_color; ?>; color: #FFF; }
::selection { background: <?php echo $text_highlight_color; ?>; color: #FFF;}

<?php endif; ?>

<?php if($content_background_color) { echo '#wrapper{background-color: ' . $content_background_color . ';} '; }?>

<?php if($main_font_color) { echo 'body{color: ' . $main_font_color . ';} '; }?>

<?php if($link_text_color) { echo 'a{color: ' . $link_text_color . ';} '; }?>

<?php if($link_text_hover_color) { echo 'a:hover{color: ' . $link_text_hover_color . ';} '; }?>

<?php if($header_color) { echo '.sticky-header.headhesive, .site-header, .mobile-nav{background-color: ' . $header_color . ';} '; }?>

<?php if($mobile_header_height) { echo '.mobile-nav { height: ' . $mobile_header_height . 'px;}'; }?>

<?php if($menu_background_color) { echo '#side-menu.menu-container, .menu-mobile-container, .sub-nav{ background-color: ' . $menu_background_color . ';}'; }?>

<?php if ($header_type === 'Top Menu') : ?>
@media screen and (min-width: 1000px){
  <?php if($header_color) { echo '.menu-container{ background-color: transparent; } .site-header { background-color: rgba(' . $header_bg_rgb . ', ' . $header_background_opacity . ');} .sub-menu { background-color: rgba(' . $header_bg_rgb . ', ' . $header_background_opacity . ');} '; }?>
  <?php if($desktop_header_height) { echo '.desktop-menu{ height: ' . $desktop_header_height . 'px;} .menu-container .sub-menu-icon{ line-height: ' . $desktop_header_height . 'px;}'; }?>
  <?php if($sticky_header_height) { echo '.sticky-header.headhesive .menu-container .sub-menu-icon{ line-height: ' . $sticky_header_height . 'px;}'; }?>
}
<?php endif ?>

.menu-mobile-container .menu a,
.menu-container .menu a{
  <?php if ($menu_link_color) { echo 'color: ' . $menu_link_color . '; '; }?>
  <?php if ($menu_font_family) { echo 'font-family: "' . $menu_font_family_value  . '"; '; }?>
}

.sub-menu-icon{
  <?php if ($menu_link_color) { echo 'color: ' . $menu_link_color . '; '; }?>
}

.menu-mobile-container .menu .current-menu-item > a, .menu-mobile-container .menu a:hover, .menu-mobile-container .menu .current_page_parent > a,
.menu-container .menu .current-menu-item > a, .menu-container .menu a:hover, .menu-container .menu .current_page_parent > a, li.menu-item-has-children:hover .sub-menu-icon{
  <?php if ($menu_link_active_color) { echo 'color: ' . $menu_link_active_color . '; '; }?>
}

<?php if($menu_icon_top_bar_background_color) :?>

.menu-button span::before{
  background-color: <?php echo $menu_icon_top_bar_background_color; ?>;
}

<?php endif ?>

<?php if($menu_icon_middle_bar_background_color) :?>

.menu-button span{
  background-color: <?php echo $menu_icon_middle_bar_background_color; ?>;
}

<?php endif ?>

<?php if($menu_icon_bottom_bar_background_color) :?>

.menu-button span::after{
  background-color: <?php echo $menu_icon_bottom_bar_background_color; ?>;
}

<?php endif ?>

<?php if($menu_icon_top_bar_background_color): ?>

.menu-button-txt{
  color: <?php echo $menu_icon_text_color_color; ?>;
}

<?php endif ?>

.site-header .menu a .link-text, 
.sub-menu-icon,
#side-menu .menu a{
  <?php 
    if($menu_line_height) { echo 'line-height: ' . $menu_line_height . 'px;'; }
    if($menu_font_size) { echo 'font-size: ' . $menu_font_size . 'px;';}
  ?>
}

<?php if($mobile_menu_item_divider_color): ?>

.mobile-nav .menu li{
  border-bottom: solid 1px <?php echo $menu_icon_text_color_color; ?>;
}

.mobile-nav .menu li:last-child{
  border-bottom: none;
}

<?php endif ?>

<?php if ($footer_top_background_color) : ?>

#top-footer{ 
  background-color: <?php echo $footer_top_background_color; ?>;
  <?php if ($footer_top_text_color) : ?>
  color: <?php echo $footer_top_text_color; ?>;
  <?php endif; ?>
}

<?php endif; ?>


<?php if ($footer_top_link_color) : ?>

#top-footer a{ 
  color: <?php echo $footer_top_link_color; ?>;
}

#top-footer .social-icon svg path,
#top-footer .social-icon svg polygon{
  stroke: <?php echo $footer_top_link_color; ?>;
}

<?php endif; ?>

<?php if ($footer_top_link_hover_color) : ?>

#top-footer a:hover{ 
  color: <?php echo $footer_top_link_hover_color; ?>;
}

<?php endif; ?>

<?php if ($footer_bottom_background_color) : ?>

#bottom-footer{ 
  background-color: <?php echo $footer_bottom_background_color; ?>;
  <?php if ($footer_bottom_text_color) : ?>
  color: <?php echo $footer_bottom_text_color; ?>;
  <?php endif; ?>
}

<?php endif; ?>


<?php if ($footer_bottom_link_color) : ?>

#bottom-footer a{ 
  color: <?php echo $footer_bottom_link_color; ?>;
}

#bottom-footer .social-icon svg path{
  stroke: <?php echo $footer_bottom_link_color; ?>;
}

<?php endif; ?>

<?php if ($footer_bottom_link_hover_color) : ?>

#bottom-footer a:hover{ 
  color: <?php echo $footer_bottom_link_hover_color; ?>;
}

<?php endif; ?>

<?php if($default_font_family) { echo 'body{ font-family: "' . $default_font_family_value . '"; }'; } ?>

h1,h2,h3,h4,h5,h6{<?php if($headings_font_family) { echo 'font-family: "' . $headings_font_family_value . '";'; } if($headings_line_height) { echo 'line-height: ' . $headings_line_height . ';'; } if($headings_font_color) { echo 'color: ' . $headings_font_color . ';'; } if($headings_font_weight) { echo 'font-weight: ' . $headings_font_weight . ';'; } if($headings_text_transform) { echo 'text-transform: ' . $headings_text_transform . ';'; }?>}

p, ul li, ol li, .ttf-tweet-text{<?php if($paragraph_font_family) { echo 'font-family: "' . $paragraph_font_family_value . '";'; } if($paragraph_line_height) { echo 'line-height: ' . $paragraph_line_height . ';'; } if($paragraph_font_color) { echo 'color: ' . $paragraph_font_color . ';'; } if($paragraph_font_weight) { echo 'font-weight: ' . $paragraph_font_weight . ';'; } if($paragraph_text_transform) { echo 'text-transform: ' . $paragraph_text_transform . ';'; }?>}

.pagination .current,.pagination a:hover{
  background-color: <?php echo $pagination_current_background_color; ?>;
  color: <?php echo $pagination_current_text_color; ?>;
}

.pagination a{
  background-color: <?php echo $pagination_item_background_color; ?>;
  color: <?php echo $pagination_item_text_color; ?>;
}

.effect-sadie .box-content:before{
  background: -webkit-linear-gradient(top, <?php echo $sadie_effect_gradient_top; ?> 0%, <?php echo $sadie_effect_gradient_bottom; ?> 75%);
  background: linear-gradient(to bottom, <?php echo $sadie_effect_gradient_top; ?> 0%, <?php echo $sadie_effect_gradient_bottom; ?> 75%);
}

#scrollTop{
  background: <?php if($scroll_button_background_color){echo $scroll_button_background_color;} else {echo "transparent";} ?>; 
  bottom: <?php echo $scroll_button_bottom; ?>px;
  right: <?php echo $scroll_button_right; ?>px;
  border: solid <?php echo $scroll_button_border_width; ?>px <?php echo $scroll_button_border_color; ?>;
  width: <?php echo $scroll_button_width; ?>px;
  height: <?php echo $scroll_button_width; ?>px;
}

#scrollTop i{
  color: <?php echo $scroll_button_icon_color; ?>;
  font-size: <?php echo $scroll_button_icon_font_size; ?>px;
}

#scrollTop:hover{
  background: <?php if($scroll_button_hover_background_color){echo $scroll_button_hover_background_color;} else {echo "transparent";} ?>; 
  border: solid <?php echo $scroll_button_border_width; ?>px <?php echo $scroll_button_hover_border_color; ?>;
}

#scrollTop:hover i{
  color: <?php echo $scroll_button_hover_icon_color; ?>;
}

<?php if( have_rows('theme_colors', 'option') ): while( have_rows('theme_colors', 'option') ): the_row(); 

  $color = get_sub_field('color', 'option');
  $color_class_name = get_sub_field('color_class_name', 'option');

  echo '.'. $color_class_name .'-border{ border-color:' . $color . ';  }';
  echo '.'. $color_class_name .'-bg{ background-color:' . $color . ';  }';
  echo '.'. $color_class_name .'-txt{ color:' . $color . ';  }';
  echo '.btn.'. $color_class_name .'.outline{ background: none; color:' . $color . ';  border: solid 2px ' . $color . ';}';
  echo '.btn.'. $color_class_name .'.outline:hover{ color: #FFF; background: ' . $color . ';}';
  echo '.btn.'. $color_class_name .'.solid{ color: #FFF; background: ' . $color . ';}';
  echo '.btn.'. $color_class_name .'-hover:hover{ color: #FFF; background: ' . $color . ' !important;}';
  echo '*[class*="hvr"].'. $color_class_name .':before{ background:' . $color . '; border-color:' . $color . ';}';
  
endwhile; endif; 
?>

<?php if ($global_css) { echo $global_css; }?>

<?php if ($tablet_portrait_css) { echo '@media screen and (min-width: 700px) and (orientation: portrait){' . $tablet_portrait_css . '}'; }?>

<?php if ($tablet_landscape_css) { echo '@media screen and (min-width: 700px) and (orientation: landscape){' . $tablet_landscape_css . '}'; }?>

<?php if ($desktop_css) { echo '@media screen and (min-width: 1100px){' . $desktop_css . '}'; }?>

<?php endif; ?>

