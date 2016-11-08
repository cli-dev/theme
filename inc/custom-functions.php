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

add_filter('widget_text', 'do_shortcode');

function get_id_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
    return $page->ID;
  } else {
    return null;
  }
}

function displayfullAddress() {
  $myoptions = get_option( 'themesettings_');
  $address_1 = $myoptions['address_line_1'];
  $city = $myoptions['city'];
  $state= '';
  $country = $myoptions['country'];
  $zip = $myoptions['zip'];
  $phone = $myoptions['phone'];
  $email = $myoptions['email'];

  $addressCode = '';
  $cityCode = '';
  $stateCode = '';
  $zipCode = '';
  $phoneCode = '';
  $emailCode = '';

  if($country === "AU") { 
    $state = $myoptions['au_state'];
  } else if($country === "CA"){ 
    $state = $myoptions['ca_state'];
  } else if($country === "UK"){ 
    $state = $myoptions['postcode_area'];
  } else { 
    $state = $myoptions['us_state'];
  }

  if($address_1){
    $addressCode = '<span class="schema-info address1" itemprop="streetAddress">' . $address_1 . '</span>';  
  }
  
  if($city){
    $cityCode = '<span class="schema-info city" itemprop="addressLocality">' . $city . ', </span>';  
  }
  
  if($state){
    $stateCode = '<span class="schema-info state" itemprop="addressRegion">' . $state . '</span>';  
  }
  
  if($zip){
    $zipCode = '<span class="schema-info zip" itemprop="postalCode">' . $zip . '</span>';  
  }
  
  if($phone){
    $phoneCode = '<div class="schema-info phone"><a href="tel:' . $phone . '"  itemprop="telephone">' . $phone . '</a></div>';  
  }
  
  if($email){
    $emailCode = '<div class="schema-info email"><a href="mailto:' . $email  . '" itemprop="email">' . $email . '</a></div>';  
  }

  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness"><a href="http://maps.google.com/?q=' . $address_1 . ' ' . $city . ' ' . $state . ' ' . $zip . '" target="_blank" class="schema-info address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><div class="address-wrapper">' . $addressCode . '<div class="schema-info address2">' . $cityCode . $stateCode . ' ' . $zipCode . '</div></div></a>' . $phoneCode . $emailCode . '</div>';
}

function displayAddress() {
  $myoptions = get_option( 'themesettings_');
  $address_1 = $myoptions['address_line_1'];
  $city = $myoptions['city'];
  $state= '';
  $country = $myoptions['country'];
  $zip = $myoptions['zip'];

  $addressCode = '';
  $cityCode = '';
  $stateCode = '';
  $zipCode = '';

  if($country === "AU") { 
    $state = $myoptions['au_state'];
  } else if($country === "CA"){ 
    $state = $myoptions['ca_state'];
  } else if($country === "UK"){ 
    $state = $myoptions['postcode_area'];
  } else { 
    $state = $myoptions['us_state'];
  }
  
  if($address_1){
    $addressCode = '<span class="schema-info address-line-1" itemprop="streetAddress">' . $address_1 . '</span>';  
  }
  
  if($city){
    $cityCode = '<span class="schema-info city" itemprop="addressLocality">' . $city . ', </span>';  
  }
  
  if($state){
    $stateCode = '<span class="schema-info state" itemprop="addressRegion">' . $state . '</span>';  
  }
  
  if($zip){
    $zipCode = '<span class="schema-info zip" itemprop="postalCode">' . $zip . '</span>';  
  }

  return 
  '<a href="http://maps.google.com/?q=' . $address_1 . ' ' . $city . ' ' . $state . ' ' . $zip . '" target="_blank" class="company-address" itemscope itemtype="http://schema.org/LocalBusiness"><div class="address-wrapper">
    <span class="schema-info address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      ' . $addressCode . '
      <span class="schema-info address-line-2">' . $cityCode . $stateCode . ' ' . $zipCode . '</span>
    </span>
    </div>
  </a>';
}

function displayContactInfo() {
  $myoptions = get_option( 'themesettings_');
  $phone = $myoptions['phone'];
  $email = $myoptions['email'];

  $phoneCode = '';
  $emailCode = '';
  
  if($phone){
    $phoneCode = '<div class="schema-info phone"><a href="tel:' . $phone . '"  itemprop="telephone">' . $phone . '</a></div>';  
  }
  
  if($email){
    $emailCode = '<div class="schema-info email"><a href="mailto:' . $email  . '" itemprop="email">' . $email . '</a></div>';  
  }

  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness">' . $phoneCode . $emailCode . '</div>';
}

function displayPhone() {
  $myoptions = get_option( 'themesettings_');
  $phone = $myoptions['phone'];

  $phoneCode = '';
  
  if($phone){
    $phoneCode = '<div class="schema-info phone"><a href="tel:' . $phone . '"  itemprop="telephone">' . $phone . '</a></div>';  
  }

  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness">' . $phoneCode . '</div>';
}

function displayEmail() {
  $myoptions = get_option( 'themesettings_');
  $email = $myoptions['email'];

  $emailCode = '';
  
  if($email){
    $emailCode = '<div class="schema-info email"><a href="mailto:' . $email  . '" itemprop="email">' . $email . '</a></div>';  
  }

  return '<div class="company-address" itemscope itemtype="http://schema.org/LocalBusiness">' . $emailCode . '</div>';
}

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

function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

add_image_size( 'sidebar-thumb', 50, 50, true );

add_image_size( 'theme_image_preview', 100, 100);

function filter_ptags_on_images($content){
 return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');


function push_google_font_families($field){

  $url = "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCCi4NfyfjQhCvAdi1VHYKbQhLgl-0linc";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_REFERER, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($ch);
  curl_close($ch);

  $google_fonts = json_decode($result, true);

  $fonts = array();

  if(!array_key_exists('error', $google_fonts)){
    foreach($google_fonts['items'] as $val){
      $fontName = $val['family'];
      $fonts[$fontName] = $fontName;
    }

    $field['choices'] = $fonts;

    return $field;
    
  } else {
    return null;
  } 
}

add_filter('acf/load_field/name=theme_font', 'push_google_font_families');


function theme_font_choices( $field ) {
  $myoptions = get_option( 'themesettings_');
  $theme_fonts = $myoptions['theme_fonts'];
  $typekit_fonts = $myoptions['typekit_fonts'];

  $typekitFonts = array();
  $googleFonts = array();
  
  if($theme_fonts)
  {  
    foreach($theme_fonts as $theme_font)
    {
      $font = $theme_font['theme_font'];

      $googleFonts[$font] = $font;
    }
  }

  if($typekit_fonts)
  {  
    foreach($typekit_fonts as $typekit_font)
    {
      $fontName = $typekit_font['typekit_font'];
      $cssName = $typekit_font['css_name'];

      $typekitFonts[$cssName] = $fontName;
    }
  }
  
  $field['choices'] = array_merge($googleFonts, $typekitFonts);
  
  return $field;

}
add_filter('acf/load_field/name=default_font_family', 'theme_font_choices');
add_filter('acf/load_field/name=menu_font_family', 'theme_font_choices');
add_filter('acf/load_field/name=headings_font_family', 'theme_font_choices');
add_filter('acf/load_field/name=paragraph_font_family', 'theme_font_choices');

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

function my_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
  <input type="text" value="' . get_search_query() . '" name="s" id="s" />
  <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" class="btn" /></form>';

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

function the_slug() {
  global $post;
  $slug = $post->post_name;
  return $slug;
}

add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {

  // add the file extension to the array

  $existing_mimes['svg'] = 'mime/type';

        // call the modified list of extensions

  return $existing_mimes;

}

add_image_size( 'team-headshot', 300, 300, array( 'center', 'top' ) );

// Load Theme scripts
function add_theme_scripts() {
  wp_register_script( 'headerJS', get_template_directory_uri() . '/js/header-scripts.js', array('jquery'),'2.0', false);
  wp_enqueue_script( 'headerJS' );
  
  wp_register_script( 'footerJS', get_template_directory_uri() . '/js/footer-scripts.js', array('jquery'),'', true);
  wp_enqueue_script( 'footerJS' );
}
 
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function load_admin_style() {
  wp_register_style( 'acfStyles', CDM_ROOT . '/admin/css/admin-style.css', false, false );
  wp_enqueue_style( 'acfStyles' );

  wp_register_script( 'acfScripts', CDM_ROOT . '/admin/js/admin-scripts.js', array( 'jquery' ), false, false);
  wp_enqueue_script( 'acfScripts' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style', 999 );