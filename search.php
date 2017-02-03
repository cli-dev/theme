<?php get_header(); ?>
<?php
$myoptions = get_option( 'themesettings_');
$page_for_posts = get_option( 'page_for_posts' ); 
$logo_position = $myoptions['logo_position'];
$site_header_type = $myoptions['header_type'];
$blog_post_layout = $myoptions['blog_post_layout'];
$animate_blog_section = $myoptions['animate_blog_section'];
$blog_animation_effect = ($animate_blog_section == 1) ? ' wow ' . $myoptions['blog_animation_effect'] : '';
$blog_animation_delay = ($animate_blog_section == 1) ? ' data-wow-delay="' . $myoptions['blog_animation_delay'] . '"' : '';
$blog_animation_offset = ($animate_blog_section == 1) ? ' data-wow-offset="' . $myoptions['blog_animation_offset'] . '"' : '';
$blog_animation = $blog_animation_delay . $blog_animation_offset;
$top_header_type = '';
if ($site_header_type === 'Top Menu') { $top_header_type = $myoptions['top_header_position']; }
$center_logo_menu_type = '';
if($logo_position === 'center'){$center_logo_menu_type = $myoptions['center_logo_menu_type'];}

$overlapping_header = '';

if($top_header_type === "header-overlap") {
  $overlapping_header = ' overlapping-header';
}
?>
<section id="content" role="main" class="blog-page not-found-page">
  <header class="page-header wow fadeIn overlapping-header" <?php $header_image = get_field( '404_header_image', 'option' );  echo 'style="background: url(' . $header_image . ') center no-repeat; background-size: cover;"';
  ?>>
    <div class="page-header-inner-wrapper">
      <div class="page-header-inner in-grid flex-row flex-direction-column flex-position-center flex-align-center">
        <div class="header-block title-404">   
          <h1 id="search-title" style="padding-bottom: 0;">
            <span>Search:</span>
            <?php printf( __( '<span>%s</span>', 'cdm_theme' ), get_search_query() ); ?>
          </h1>
        </div>
      </div>
    </div>
  </header>
  <article id="post-0" class="post not-found">
    <section class="entry-content">
    <?php if ( have_posts() ) : ?>
        <div class="blog-feed<?php echo $blog_animation_effect ?>"<?php echo $blog_animation ?>>
          <div class="blog-feed-inner">
            <?php while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'templates/post-layouts/post-layout', $blog_post_layout ); ?>
            <?php endwhile; ?>
          </div>
          <?php get_template_part( 'nav', 'below' ); ?>
        </div>
      <?php else : ?>
      <div class="row-wrapper">
        <div class="flex-row flex-direction-row flex-position-center flex-align-start nowrap in-grid">
          <div class="flex-col col-12"> 
            <div class="col-inner  flex-direction-column"> 
              <p style="text-align:center"><?php _e( 'Sorry, nothing matched your search. Try again?', 'cdm_theme' ); ?></p>
              <?php get_search_form(); ?>  
            </div>
          </div>   
        </div>
      </div>
    <?php endif; ?> 
    </section>
  </article>
</section>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(window).load(function() {
      $('#search-title').bigtext({
        minfontsize: 24 // default is null
      });
      BackgroundCheck.init({
        targets: '.header-block',
        images: '.page-header'
      });
    });
  });
</script>
<?php get_footer(); ?>
