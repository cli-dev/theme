<?php

// Add Favicon
  function add_favicon() {
    $myoptions = get_option( 'themesettings_');
    $favicon = $myoptions['favicon'];
    if ($favicon) {
      echo '<link rel="shortcut icon" href="' . $favicon . '" type="image/x-icon" />';
    }
  }
  add_action('login_head', 'add_favicon');
  add_action('admin_head', 'add_favicon');

// Create variable length excerpt
  function bac_variable_length_excerpt($text, $length, $finish_sentence){
    $myoptions = get_option( 'themesettings_');

    $length = $myoptions['excerpt_length'];

    $finish_sentence = $myoptions['finish_sentence'];

    $tokens = array();
    $out = '';
    $word = 0;

    //Divide the string into tokens; HTML tags, or words, followed by any whitespace.
    $regex = '/(<[^>]+>|[^<>\s]+)\s*/u';
    preg_match_all($regex, $text, $tokens);
    foreach ($tokens[0] as $t){ 
      //Parse each token
      if ($word >= $length && !$finish_sentence){ 
      //Limit reached
        break;
      }
      if ($t[0] != '<'){ 
      //Token is not a tag. 
      //Regular expression that checks for the end of the sentence: '.', '?' or '!'
        $regex1 = '/[\?\.\!]\s*$/uS';
        if ($word >= $length && $finish_sentence && preg_match($regex1, $t) == 1){ 
        //Limit reached, continue until ? . or ! occur to reach the end of the sentence.
          $out .= trim($t);
          break;
        }   
        $word++;
      }
      //Append what's left of the token.
      $out .= $t;     
    }
    //Add the excerpt ending as a link.
    $excerpt_end = ' [&hellip;]';

    //Add the excerpt ending as a non-linked ellipsis with brackets.
    //$excerpt_end = ' [&hellip;]';

    //Append the excerpt ending to the token. 
    $out .= $excerpt_end;

    return trim(force_balance_tags($out)); 
  }

  function bac_excerpt_filter($text){
    //Get the full content and filter it.
    $finish_sentence = 1;

    $length = 15;

    $text = get_the_content('');
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);

    $text = str_replace(']]>', ']]&gt;', $text);

    /**By default the code allows all HTML tags in the excerpt**/
    //Control what HTML tags to allow: If you want to allow ALL HTML tags in the excerpt, then do NOT touch.

    //If you want to Allow SOME tags: THEN Uncomment the next line + Line 80.
    $allowed_tags = '<p>'; /* Here I am allowing p, a, strong tags. Separate tags by comma. */

    //If you want to Disallow ALL HTML tags: THEN Uncomment the next line + Line 80, 
    //$allowed_tags = ''; /* To disallow all HTML tags, keep it empty. The Excerpt will be unformated but newlines are preserved. */
    $text = strip_tags($text, $allowed_tags); /* Line 80 */

    //Create the excerpt.
    $text = bac_variable_length_excerpt($text, $length, $finish_sentence);  
    return $text;
  }
  add_filter('get_the_excerpt','bac_excerpt_filter',5);

// Allow shortcode in text widgets
  add_filter('widget_text', 'do_shortcode');

// Get page is with page slugs
  function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
      return $page->ID;
    } else {
      return null;
    }
  }

// Turn hex values into rgb values
  function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    
    if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    
    //return $rgb; // returns an array with the rgb values
    
    $Final_Rgb_color = implode(", ", $rgb);
    
    return $Final_Rgb_color;
  }

// Function to see if the current page is a posts page
  function is_blog () {
  	global  $post;
  	$posttype = get_post_type($post );
  	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
  }

// Add custom theme image sizes
  add_image_size( 'sidebar-thumb', 50, 50, true );
  add_image_size( 'theme_image_preview', 100, 100);
  add_image_size( 'team-headshot', 300, 300, array( 'center', 'top' ) );
  add_image_size( 'post-image', 1200, 800, array( 'center', 'center' ) );
  add_image_size( 'post-thumb', 300, 200, array( 'center', 'center' ) );

// Display list of availble fonts

  function theme_font_choice_labels( $field ) {
    $myoptions = get_option( 'themesettings_');
    $theme_fonts = $myoptions['theme_fonts'];

    $fonts = array();
    
    if($theme_fonts){  
      foreach($theme_fonts as $theme_font){
        $display_name = $theme_font['display_name'];
        $css_name = $theme_font['css_name'];
        $font_type = $theme_font['font_type'];
        $font_value = "'" . $css_name . "', " . $font_type;

        $fonts += [ $font_value => $display_name ];
      }
    }
    
    $field['choices'] = $fonts;
    return $field;

  }
  add_filter('acf/load_field/name=default_font_family', 'theme_font_choice_labels');
  add_filter('acf/load_field/name=menu_font_family', 'theme_font_choice_labels');
  add_filter('acf/load_field/name=headings_font_family', 'theme_font_choice_labels');
  add_filter('acf/load_field/name=paragraph_font_family', 'theme_font_choice_labels');
  add_filter('acf/load_field/name=mobile_menu_font_family', 'theme_font_choice_labels');

// Add Google Font url

  $myoptions = get_option( 'themesettings_');
  $add_google_fonts = $myoptions['add_google_fonts'];

  if ($add_google_fonts == 1) {
    function add_google_fonts_css() {

      $myoptions = get_option( 'themesettings_');
      $google_fonts_url = $myoptions['google_fonts_url'];

      wp_register_style( 'googleFonts', $google_fonts_url, false, false );
      wp_enqueue_style( 'googleFonts' );
      
    }
    add_action( 'wp_enqueue_scripts', 'add_google_fonts_css' );
  } 

// Get the colors repeater and use it as choices for button colors
  function theme_button_choices( $field ) {
    $myoptions = get_option( 'themesettings_');
    $theme_colors = $myoptions['theme_colors'];
    $colors = array();

    if($theme_colors){
      foreach($theme_colors as $theme_color){
        $themeColor = $theme_color['color_class_name'];
        array_push($colors, $themeColor);
      }
    }
    $field['choices'] = $colors;
    return $field;
  }
  add_filter('acf/load_field/name=solid_initial_state', 'theme_button_choices');
  add_filter('acf/load_field/name=solid_hover_state', 'theme_button_choices');
  add_filter('acf/load_field/name=outline_type', 'theme_button_choices');

// Add nav menus based on choice in theme settings
  function custom_navigation_menus() {
    $myoptions = get_option( 'themesettings_');
    $logo_position = $myoptions['logo_position'];

    $center_logo_menu_type = '';

    if ($logo_position === 'center') {
      $center_logo_menu_type = $myoptions['center_logo_menu_type'];
    }
    

    $locations = '';

    if($logo_position === 'center' && $center_logo_menu_type === 'divided'){
      $locations = array(
        'divided-right-menu' => __( 'Divided menu right side', 'cli_theme' ),
        'divided-left-menu' => __( 'Divided menu left side', 'cli_theme' ),
        );
    } else {
      $locations = array(
        'main-menu' => __( 'Main Menu', 'cli_theme' ),
        );
    }
    register_nav_menus( $locations );

  }
  add_action( 'init', 'custom_navigation_menus' );

// Add custom pagination
  function pagination($pages = '', $range = 1){  
    $showitems = ($range * 2)+1;  
    
    global $paged;
    if(empty($paged)) $paged = 1;
    
    if($pages == ''){
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages){
        $pages = 1;
      }
    }   
    if(1 != $pages){
      echo '<div class="pagination">';
      if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'.get_pagenum_link(1).'"><i class="fa fa-angle-double-left"></i></a>';
      if($paged > 1 && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged - 1).'"><i class="fa fa-angle-left"></i></a>';
      for ($i=1; $i <= $pages; $i++){
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
          echo ($paged == $i)? '<span class="current">'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a>';
        }
      }
      if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'"><i class="fa fa-angle-right"></i></a>';  
      if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($pages).'"><i class="fa fa-angle-double-right"></i></a>';
      echo '</div>';
    }
  }

// Update the default wordpress search form
  function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input type="search" value="' . get_search_query() . '" name="s" placeholder="Search" id="s" />
    <span class="search-btn-wrapper"><input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" class="btn" /></span></form>';

    return $form;
  }
  add_filter( 'get_search_form', 'my_search_form' );

// remove wp version param from any enqueued scripts
  function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
    return $src;
  }
  add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
  add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

// Allow svg uploads to wordpress media library
  function custom_upload_mimes ( $existing_mimes=array() ) {
    $existing_mimes['svg'] = 'mime/type';
    return $existing_mimes;
  }
  add_filter('upload_mimes', 'custom_upload_mimes');

  // Add SVG Support for Wordpress 4.7.1

    add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
      global $wp_version;
      if ( $wp_version !== '4.7.1' ) {
       return $data;
     }
      $filetype = wp_check_filetype( $filename, $mimes );
      return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
      ];
    }, 10, 4 );

// Load Theme scripts
  function add_header_scripts() {
    wp_register_script( 'headerJS', CDM_ROOT . '/js/header-scripts.min.js', array('jquery'),'', false);
    wp_enqueue_script( 'headerJS' );
  }
   
  add_action( 'wp_enqueue_scripts', 'add_header_scripts');

  function add_footer_scripts() {
    $myoptions = get_option( 'themesettings_');
    $header_type = $myoptions['header_type'];
    $detect = new Mobile_Detect;
    wp_register_script( 'mobileNav', CDM_ROOT . '/js/mobile-nav.js', array('jquery'),'', true);
    wp_register_script( 'desktopNav', CDM_ROOT . '/js/desktop-nav.js', array('jquery'),'', true);
    if ($header_type === 'Top Menu') {
      if($detect->isMobile()){
        wp_enqueue_script( 'mobileNav' );
      } else{
        wp_enqueue_script( 'desktopNav' );
      }
    }
    
    wp_register_script( 'footerJS', CDM_ROOT . '/js/footer-scripts.min.js', array('jquery'),'', true);
    wp_enqueue_script( 'footerJS' );
  }
   
  add_action( 'wp_enqueue_scripts', 'add_footer_scripts');

// Load backend styles
  function load_admin_style() {
    wp_register_style( 'acfStyles', CDM_ROOT . '/admin/css/admin-style.css', false, false );
    wp_enqueue_style( 'acfStyles' );

    wp_register_script( 'acfScripts', CDM_ROOT . '/admin/js/admin-scripts.js', array( 'jquery' ), false, false);
    wp_enqueue_script( 'acfScripts' );
  }
  add_action( 'admin_enqueue_scripts', 'load_admin_style', 999 );

// Time Elapsed Function

    function time_elapsed_string($datetime, $full = false) {
      $now = new DateTime;
      $ago = new DateTime($datetime);
      $diff = $now->diff($ago);

      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;

      $string = array(
          'y' => 'year',
          'm' => 'month',
          'w' => 'week',
          'd' => 'day',
          'h' => 'hour',
          'i' => 'minute',
          's' => 'second',
      );
      foreach ($string as $k => &$v) {
          if ($diff->$k) {
              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
          } else {
              unset($string[$k]);
          }
      }

      if (!$full) $string = array_slice($string, 0, 1);
      return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

// UTF-8 String Replace

    function utf8_substr_replace($original, $replacement, $position, $length){
      $startString = mb_substr($original, 0, $position, "UTF-8");
      $endString = mb_substr($original, $position + $length, mb_strlen($original), "UTF-8");

      $out = $startString . $replacement . $endString;

      return $out;
    }

// Function to easily add the current post slug to anything
  function the_slug() {
    global $post;
    $slug = $post->post_name;
    return $slug;
  }

// Function to Sanatize String for CSS Class use

  function seoUrl($string) {
      //Lower case everything
      $string = strtolower($string);
      //Make alphanumeric (removes all other characters)
      $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
      //Clean up multiple dashes or whitespaces
      $string = preg_replace("/[\s-]+/", " ", $string);
      //Convert whitespaces and underscore to dash
      $string = preg_replace("/[\s_]/", "-", $string);
      return $string;
  }