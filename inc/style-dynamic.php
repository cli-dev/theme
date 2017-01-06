<?php

if( function_exists('get_field') ) {

  $myoptions = get_option( 'themesettings_');
  $content_background_color = $myoptions['content_background_color'];

  if ($content_background_color) {
    echo '#wrapper{background-color: ' . $content_background_color . ';}';
  }

  // Header Styles
    $header_type = $myoptions['header_type'];
    $header_bg_color = $myoptions['header_color'];
    $header_background_opacity = $myoptions['header_background_opacity'];
    $desktop_header_height = $myoptions['desktop_header_height'];
    $menu_dropdown_bg_color = $myoptions['menu_dropdown_bg_color'];
    $mobile_header_height = $myoptions['mobile_header_height'];
    $header_bg_rgb = hex2rgb($header_bg_color);

    if($header_bg_color) { echo '.mobile-nav, .desktop-menu, .side-menu { background-color: rgba(' . $header_bg_rgb . ', ' . $header_background_opacity . ');}'; }

    if($mobile_header_height) { echo '.mobile-nav { height: ' . $mobile_header_height . 'px;}'; }

    if($menu_dropdown_bg_color) { echo '.desktop-menu-inner .sub-menu{ background-color: ' . $menu_dropdown_bg_color . ';}'; }

    if($desktop_header_height) { echo '.site-header.has-side-menu, .desktop-menu{ height: ' . $desktop_header_height . 'px;} .desktop-menu .sub-menu-icon{ line-height: ' . $desktop_header_height . 'px;}'; }

    // Header Top Bar

      $header_widget_bg_color = ($myoptions['header_widget_bg_color']) ? 'background-color: ' . $myoptions['header_widget_bg_color'] . ';' : '';
      $header_widget_txt_color = ($myoptions['header_widget_txt_color']) ? 'color: ' . $myoptions['header_widget_txt_color'] . ';' : '';
      $header_widget_link_color = ($myoptions['header_widget_link_color']) ? 'color: ' . $myoptions['header_widget_link_color'] . ';' : '';
      $header_widget_link_hover_color = ($myoptions['header_widget_link_hover_color']) ? 'color: ' . $myoptions['header_widget_link_hover_color'] . ';' : '';

    echo '.header-widgets{' . $header_widget_bg_color . '} .header-widgets p, .header-widgets li, .header-widgets span, .header-widgets div, .header-widgets input, .header-widgets textarea, .header-widgets label{' . $header_widget_txt_color . '}.header-widgets a, .header-widgets a span{' . $header_widget_link_color . '}.header-widgets a:hover, .header-widgets a:hover span{' . $header_widget_link_hover_color . ';}';



  // Logos

    // Desktop Logo Styles

      $desktop_logo_img = $myoptions['logo'];
      $desktop_logo_img_url = $desktop_logo_img['url'];
      $desktop_logo_svg = $myoptions['svg_desktop_logo'];
      $desktop_logo = ($desktop_logo_svg) ? $desktop_logo_svg : $desktop_logo_img_url;
      $desktop_logo_bg = 'background-image: url(' . $desktop_logo . ');';
      $desktop_logo_max_width = ($myoptions['desktop_logo_maximum_width']) ? 'max-width: ' . $myoptions['desktop_logo_maximum_width'] . 'px;' : '';

      echo '.site-logo{' . $desktop_logo_max_width . '}.site-logo a{' . $desktop_logo_bg . '}';

    // Mobile Logo Styles

      $mobile_logo_img = $myoptions['mobile_logo'];
      $mobile_logo_svg = $myoptions['svg_mobile_logo'];
      $mobile_logo = ($myoptions['svg_mobile_logo']) ? $myoptions['svg_mobile_logo'] : $myoptions['mobile_logo'];
      $mobile_logo_bg = 'background-image: url(' . $mobile_logo . ');';
      $mobile_logo_max_width = ($myoptions['mobile_logo_maximum_width']) ? 'max-width: ' . $mobile_logo_max_width . 'px;' : '';
      
      echo '.mobile-logo a{' . $mobile_logo_bg . $mobile_logo_max_width . '}';

  // Menus

    // Global

      $menu_dropdown_bg_color = $myoptions['menu_dropdown_bg_color'];
      $menu_link_color = ($myoptions['menu_link_color']) ? 'color: ' . $myoptions['menu_link_color'] . ';' : '';
      $menu_line_height = ($myoptions['menu_line_height']) ? 'line-height: ' . $myoptions['menu_line_height'] . 'px;' : '';
      $menu_font_size = ($myoptions['menu_font_size']) ? 'font-size: ' . $myoptions['menu_font_size'] . 'px;' : '';
      $menu_font_family = ($myoptions['menu_font_family']) ? 'font-family: ' . $myoptions['menu_font_family'] . ';' : '';
      $menu_link_active_color = ($myoptions['menu_link_active_color']) ? 'color: ' . $myoptions['menu_link_active_color'] . ';' : '';

      if ($menu_dropdown_bg_color) {
        echo '.desktop-nav .sub-menu{ background-color: ' . $menu_dropdown_bg_color. ';}';
      }

      echo '.desktop-menu .link-text, .side-menu .link-text, .headhesive .link-text{' . $menu_link_color . $menu_line_height . $menu_font_size . $menu_font_family . '}';

      if ($menu_link_color) {
        echo '.desktop-menu .sub-menu-icon, .side-menu .sub-menu-icon, .headhesive  .sub-menu-icon{' . $menu_link_color . '}';
      }

      if($menu_link_active_color){
        echo '.desktop-menu a:hover .link-text, .desktop-menu a:hover .sub-menu-icon, .desktop-menu li.current-menu-item a .link-text, .desktop-menu li.current_page_parent a .link-text, .side-menu a:hover .link-text, .side-menu a:hover .sub-menu-icon, .side-menu li.current-menu-item a .link-text, .side-menu li.current_page_parent a .link-text, .headhesive a:hover .link-text, .headhesive a:hover .link-text, .headhesive a:hover .sub-menu-icon, .headhesive li.current-menu-item a .link-text, headhesive li.current_page_parent a .link-text{' . $menu_link_active_color . '}';
      }


    // Mobile Menu
      $mobile_menu_bg_color = $myoptions['mobile_menu_bg_color']; 
      $mobile_menu_item_divider_color = $myoptions['mobile_menu_item_divider_color'];
      $mobile_menu_link_color = ($myoptions['mobile_menu_link_color']) ? 'color: ' . $myoptions['mobile_menu_link_color'] . ';' : '';
      $mobile_menu_line_height = ($myoptions['mobile_menu_line_height']) ? 'line-height: ' . $myoptions['mobile_menu_line_height'] . 'px;' : '';
      $mobile_menu_font_size = ($myoptions['mobile_menu_font_size']) ? 'font-size: ' . $myoptions['mobile_menu_font_size'] . 'px;' : '';
      $mobile_menu_font_family = ($myoptions['mobile_menu_font_family']) ? 'font-family: ' . $myoptions['mobile_menu_font_family'] . ';' : '';
      $mobile_menu_link_active_color = ($myoptions['mobile_menu_link_active_color']) ? 'color: ' . $myoptions['mobile_menu_link_active_color'] . ';' : '';

      if ($mobile_menu_bg_color) {
        echo '.menu-mobile-container{ background-color: ' . $mobile_menu_bg_color . ';}';
      }

      if($mobile_menu_item_divider_color){
        echo '.mobile-nav li{ border-bottom: solid 1px' . $mobile_menu_item_divider_color . ';}';
      }

      echo '.mobile-nav a span{' . $mobile_menu_link_color . $mobile_menu_line_height . $mobile_menu_font_size . $mobile_menu_font_family . '}';

      if ($mobile_menu_line_height) {
        echo '.mobile-nav .sub-menu-icon{' . $mobile_menu_line_height . '}';
      }

      if($mobile_menu_link_active_color){
        echo '.mobile-nav a:hover span, .mobile-nav li.current-menu-item a span{' . $mobile_menu_link_active_color . '}';
      }

      // if($light_menu_icon_color){
      //   echo '.menu-button span::before, .menu-button span, .menu-button span::after{ background-color: ' . $light_menu_icon_color . ';}';
      // }

  // Sticky Header Styles

      $sticky_header_height = $myoptions['sticky_header_height'];

      if($sticky_header_height) { echo '.headhesive .sub-menu-icon{ line-height: ' . $sticky_header_height . 'px;} .headhesive .sticky-nav-inner{ height: ' . $sticky_header_height . 'px;}'; }

    // Light Style
      // $light_menu_icon_color = $myoptions['light_menu_icon_color'];
      // $light_sticky_logo = $myoptions['light_sticky_logo'];
      // $light_sticky_link = $myoptions['light_sticky_link'];
      // $light_sticky_bg = $myoptions['light_sticky_bg'];
      // $light_sticky_link_hover = $myoptions['light_sticky_link_hover'];

      // if ($light_sticky_logo) {
      //   $light_sticky_logo_bg = 'background-image: url(' . $light_sticky_logo . ');';
      //   echo '.headhesive .light .sticky-logo a{' . $light_sticky_logo_bg . '}';
      // }

      // if ($light_sticky_link) {
      //   $light_sticky_link_color = 'color: ' . $light_sticky_link . ';';
      //   echo '.headhesive .light a .link-text, .headhesive .light a .sub-menu-icon{' . $light_sticky_link_color . '}';
      // }

      // if ($light_sticky_link_hover) {
      //   $light_sticky_link_hover_color = 'color: ' . $light_sticky_link_hover . ';';
      //   echo '.headhesive .light a:hover .link-text, .headhesive .light a:hover .sub-menu-icon{' . $light_sticky_link_hover_color . '}';
      // }

      // if ($light_sticky_bg) {
      //   $light_sticky_bg_color = 'background-color: ' . $light_sticky_bg . ';';
      //   echo '.headhesive .light .sticky-nav-inner{' . $light_sticky_bg_color . '}';
      // }

    // Dark Style

      $dark_sticky_logo = $myoptions['dark_sticky_logo'];
      $dark_sticky_link = $myoptions['dark_sticky_link'];
      $dark_sticky_bg = $myoptions['dark_sticky_bg'];
      $dark_sticky_link_hover = $myoptions['dark_sticky_link_hover'];

      if ($dark_sticky_logo) {
        $dark_sticky_logo_bg = 'background-image: url(' . $dark_sticky_logo . ');';
        echo '.headhesive .sticky-logo a{' . $dark_sticky_logo_bg . '}';
      }

      if ($dark_sticky_link) {
        $dark_sticky_link_color = 'color: ' . $dark_sticky_link . ';';
        echo '.headhesive a .link-text, .headhesive a .sub-menu-icon{' . $dark_sticky_link_color . '}';
      }

      if ($dark_sticky_link_hover) {
        $dark_sticky_link_hover_color = 'color: ' . $dark_sticky_link_hover . ';';
        echo '.headhesive a:hover .link-text, .headhesive .dark a:hover .sub-menu-icon{' . $dark_sticky_link_hover_color . '}';
      }

      if ($dark_sticky_bg) {
        $dark_sticky_bg_color = 'background-color: ' . $dark_sticky_bg . ';';
        echo '.headhesive .sticky-nav-inner{' . $dark_sticky_bg_color . '}';
      }

  // Text Styles

    $default_font_family = ($myoptions['default_font_family']) ? 'font-family: ' . $myoptions['default_font_family'] . ';' : '';
    $main_font_color = ($myoptions['main_font_color']) ? 'color: ' . $myoptions['main_font_color'] . ';' : '';
    $text_highlight_color = $myoptions['text_highlight_color'];
    $link_text_color = ($myoptions['link_text_color']) ? 'color: ' . $myoptions['link_text_color'] . ';' : '';
    $link_text_hover_color = ($myoptions['link_text_hover_color']) ? 'color: ' . $myoptions['link_text_hover_color'] . ';' : '';

    $headings_font_family = ($myoptions['headings_font_family']) ? 'font-family: ' . $myoptions['headings_font_family'] . ';' : '';
    $headings_font_color = ($myoptions['headings_font_color']) ? 'color: ' . $myoptions['headings_font_color'] . ';' : '';
    $headings_text_transform = ($myoptions['headings_text_transform']) ? 'text-transform: ' . $myoptions['headings_text_transform'] . ';' : '';
    $headings_line_height = ($myoptions['headings_line_height']) ? 'line-height: ' . $myoptions['headings_line_height'] . ';' : '';
    $headings_font_weight = ($myoptions['headings_font_weight']) ? 'font-weight: ' . $myoptions['headings_font_weight'] . ';' : '';

    $paragraph_font_family = ($myoptions['paragraph_font_family']) ? 'font-family: ' . $myoptions['paragraph_font_family'] . ';' : '';
    $paragraph_font_color = ($myoptions['paragraph_font_color']) ? 'color: ' . $myoptions['paragraph_font_color'] . ';' : '';
    $paragraph_text_transform = ($myoptions['paragraph_text_transform']) ? 'text-transform: ' . $myoptions['paragraph_text_transform'] . ';' : '';
    $paragraph_line_height = ($myoptions['paragraph_line_height']) ? 'line-height: ' . $myoptions['paragraph_line_height'] . ';' : '';
    $paragraph_font_weight = ($myoptions['paragraph_font_weight']) ? 'font-weight: ' . $myoptions['paragraph_font_weight'] . ';' : '';

    // Global Text

      echo 'body{' . $default_font_family . $main_font_color . '}';

      if ($text_highlight_color) {
        echo '::-moz-selection{background:' . $text_highlight_color . '; color: #FFF;}::selection{background:' . $text_highlight_color . '; color: #FFF;}';
      }

    // Links

      echo 'a{' . $link_text_color . '} ';

      echo 'a:hover{' . $link_text_hover_color . ';} ';

    // Headings

      echo 'h1,h2,h3,h4,h5,h6{' . $headings_font_family . $headings_font_color . $headings_text_transform . $headings_line_height . $headings_font_weight . '}';

    // Body Text

      echo 'p, li, span, div, a, input, textarea, label{' . $paragraph_font_family . $paragraph_font_color . $paragraph_text_transform . $paragraph_line_height . $paragraph_font_weight . '}';

  // Footer Styles

    // Footer Top

    $footer_top_background_color = ($myoptions['footer_top_background_color']) ? 'background-color: ' . $myoptions['footer_top_background_color'] . ';' : '';
    $footer_top_text_color = ($myoptions['footer_top_text_color']) ? 'color: ' . $myoptions['footer_top_text_color'] . ';' : '';
    $footer_top_link_color = ($myoptions['footer_top_link_color']) ? 'color: ' . $myoptions['footer_top_link_color'] . ';' : '';
    $footer_top_link_hover_color = ($myoptions['footer_top_link_hover_color']) ? 'color: ' . $myoptions['footer_top_link_hover_color'] . ';' : '';

    echo '.top-footer{' . $footer_top_background_color . '} top-footer p, .top-footer li, .top-footer span, .top-footer div, .top-footer input, .top-footer textarea, .top-footer label{' . $footer_top_text_color . '}.top-footer a, .top-footer a span{' . $footer_top_link_color . '}.top-footer a:hover, .top-footer a:hover span{' . $footer_top_link_hover_color . ';}';

    $footer_bottom_background_color = ($myoptions['footer_bottom_background_color']) ? 'background-color: ' . $myoptions['footer_bottom_background_color'] . ';' : '';
    $footer_bottom_text_color = ($myoptions['footer_bottom_text_color']) ? 'color: ' . $myoptions['footer_bottom_text_color'] . ';' : '';
    $footer_bottom_link_color = ($myoptions['footer_bottom_link_color']) ? 'color: ' . $myoptions['footer_bottom_link_color'] . ';' : '';
    $footer_bottom_link_hover_color = ($myoptions['footer_bottom_link_hover_color']) ? 'color: ' . $myoptions['footer_bottom_link_hover_color'] . ';' : '';

    echo '.bottom-footer{' . $footer_bottom_background_color . '} .bottom-footer p, .bottom-footer li, .bottom-footer span, .bottom-footer div, .bottom-footer input, .bottom-footer textarea, .bottom-footer label{' . $footer_bottom_text_color . '}.bottom-footer a, .bottom-footer a span{' . $footer_bottom_link_color . '}.bottom-footer a:hover, .bottom-footer a:hover span{' . $footer_bottom_link_hover_color . ';}';

  // Blog Styles

    // Pagination 

      $pagination_item_background_color = $myoptions['pagination_item_background_color'];
      $pagination_item_text_color = $myoptions['pagination_item_text_color'];
      $pagination_current_background_color = $myoptions['pagination_current_background_color'];
      $pagination_current_text_color = $myoptions['pagination_current_text_color'];

      echo '.pagination .current,.pagination a:hover{ background-color: ' . $pagination_current_background_color . '; color: ' . $pagination_current_text_color . ';}.pagination a{background-color: ' . $pagination_item_background_color . '; color: ' . $pagination_item_text_color . ';}';

  // Hover Box Styles

    // Sadie Style Hover

      $sadie_effect_gradient_top_color = $myoptions['sadie_effect_gradient_top_color'];
      $sadie_effect_gradient_top_color_opacity = $myoptions['sadie_effect_gradient_top_color_opacity'];
      $sadie_effect_gradient_top = 'rgba(' . hex2rgb($sadie_effect_gradient_top_color) . ', ' . $sadie_effect_gradient_top_color_opacity . ')';
      $sadie_effect_gradient_bottom_color = $myoptions['sadie_effect_gradient_bottom_color'];
      $sadie_effect_gradient_bottom_color_opacity = $myoptions['sadie_effect_gradient_bottom_color_opacity'];
      $sadie_effect_gradient_bottom = 'rgba(' . hex2rgb($sadie_effect_gradient_bottom_color) . ', ' . $sadie_effect_gradient_bottom_color_opacity . ')';

      if ($sadie_effect_gradient_top_color) {
        echo '.effect-sadie .box-content:before{background: -webkit-linear-gradient(top,' . $sadie_effect_gradient_top . ' 0%, ' . $sadie_effect_gradient_bottom . ' 75%); background: linear-gradient(to bottom, ' . $sadie_effect_gradient_bottom . ' 75%);}';
      }

  // Global Classes

    if( have_rows('theme_colors', 'option') ): while( have_rows('theme_colors', 'option') ): the_row(); 

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

  // Dynamic CSS

    $global_css = $myoptions['global_css'];
    $tablet_portrait_css = $myoptions['tablet_portrait_css'];
    $tablet_landscape_css = $myoptions['tablet_landscape_css'];
    $desktop_css = $myoptions['desktop_css'];

    if ($global_css) { echo $global_css; }

    if ($tablet_portrait_css) { echo '@media screen and (min-width: 700px) and (orientation: portrait){' . $tablet_portrait_css . '}'; }

    if ($tablet_landscape_css) { echo '@media screen and (min-width: 700px) and (orientation: landscape){' . $tablet_landscape_css . '}'; }

    if ($desktop_css) { echo '@media screen and (min-width: 1100px){' . $desktop_css . '}'; }

} ?>