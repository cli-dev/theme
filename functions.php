<?php

define('CDM_ROOT', get_template_directory_uri());

// Theme setup
function cdm_theme_setup(){
	load_theme_textdomain( 'cdm_theme', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) 
		$content_width = 640;
  register_nav_menus(
   array( 'mobile-menu' => __( 'Mobile Menu', 'cdm_theme' ) )
   );
}
add_action( 'after_setup_theme', 'cdm_theme_setup' );

// Add main stylesheet
function main_stylesheet() {
  wp_register_style( 'main', CDM_ROOT . '/css/production/style.css', false, false, 'all' );
  wp_enqueue_style( 'main' );
}
add_action( 'wp_enqueue_scripts', 'main_stylesheet' );

// Combine theme options into one mySQL row
function combine_theme_options() {
  $fields = get_fields('option');
  $field_values = array();
  if( $fields ){
    foreach( $fields as $field_name => $value ){
      if (!is_object($value)){ // checking for value is not an post object
        $field_values[$field_name]=$value; // storing data to array
      }
    }
    $field_values_fordb = serialize($field_values); //serializing our array
    update_option('themesettings_',$field_values); //trying to store our values to db using ADD method
  }
}
add_action( 'acf/save_post', 'combine_theme_options', 20 );

// Create dynamic stylesheet
function generate_dynamic_css() {
  $css_dir = dirname(__FILE__) . '/css/';
  ob_start(); 
  require(dirname(__FILE__) . '/inc/style-dynamic.php'); 
  $css = ob_get_clean(); 
  file_put_contents($css_dir . 'dynamic-styles.css', $css, LOCK_EX); 
}
add_action( 'acf/save_post', 'generate_dynamic_css' );

// Add dynamic stylesheet to head of wordpress
function add_dynamic_css(){
  wp_enqueue_style("style_dynamic", CDM_ROOT . "/css/dynamic-styles.css", array(), filemtime(dirname(__FILE__) ."/css/dynamic-styles.css"));
}
add_action( 'wp_enqueue_scripts', 'add_dynamic_css', 50 );

//Add jQuery 
function load_jquery() {
  wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'load_jquery' );

// Comment functions
function enqueue_comment_reply_script(){
  if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'comment_form_before', 'enqueue_comment_reply_script' );

// Ping functions
function cdm_theme_custom_pings( $comment ){
  $GLOBALS['comment'] = $comment;
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
  <?php }

  add_filter( 'get_comments_number', 'cdm_theme_comments_number' );
  function cdm_theme_comments_number( $count ){
   if ( !is_admin() ) {
    global $id;
    $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}

// Add a symbol if there is no post title
function cdm_theme_title( $title ) {
   if ( $title == '' ) {
    return '&rarr;';
  } else {
    return $title;
  }
}
add_filter( 'the_title', 'cdm_theme_title' );

// Add website name
function cdm_theme_filter_wp_title( $title ){
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_filter( 'wp_title', 'cdm_theme_filter_wp_title' );

require_once('inc/mobile-detect.php');
require_once('inc/custom-css.php');
require_once('inc/theme-options-acf.php');
require_once('inc/custom-functions.php');
require_once('inc/custom-post-types.php');
require_once('inc/social.php');
require_once('inc/shortcodes.php');
require_once('inc/widget-areas.php');
require_once('inc/company-info.php');
require_once('inc/job-position-acf.php');
require_once('inc/page-builder-acf.php');
require_once('inc/page-header-acf.php');
require_once('inc/team-member-acf.php');
require_once('inc/theme-fields-acf.php');