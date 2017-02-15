<?php 
$page_for_posts = get_option( 'page_for_posts' ); 
$myoptions = get_option( 'themesettings_');
$blog_post_layout = $myoptions['blog_post_layout'];
$animate_blog_section = $myoptions['animate_blog_section'];
$blog_animation_effect = ($animate_blog_section == 1) ? ' wow ' . $myoptions['blog_animation_effect'] : '';
$blog_animation_delay = ($animate_blog_section == 1) ? ' data-wow-delay="' . $myoptions['blog_animation_delay'] . '"' : '';
$blog_animation_offset = ($animate_blog_section == 1) ? ' data-wow-offset="' . $myoptions['blog_animation_offset'] . '"' : '';
$blog_animation = $blog_animation_delay . $blog_animation_offset;
$blog_type = $myoptions['blog_type'];
$mobile_cols     = intval($myoptions['columns_on_mobile']);
$tablet_cols     = intval($myoptions['columns_on_tablet']);
$desktop_cols    = intval($myoptions['columns_on_desktop']);
$mobile_gutters  = intval($myoptions['gutters_on_mobile']);
$tablet_gutters  = intval($myoptions['gutters_on_tablet']);
$desktop_gutters = intval($myoptions['gutters_on_desktop']);
$custom_class = ($myoptions['custom_blog_class']) ? ' ' . $myoptions['custom_blog_class'] : '';
?>

<?php if ( have_posts() ) : ?>
  <div class="news-page-loop<?php echo $blog_animation_effect ?>"<?php echo $blog_animation ?>>
    <div class="blog-feed-inner">
      <div class="blog-posts <?php echo $blog_type; ?>">
        <?php if ($blog_type === "masonry") { echo '<div class="gutter-sizer"></div>';} ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'templates/post-layouts/post-layout', $blog_post_layout ); ?>
        <?php endwhile; ?>
      </div>
    </div>
    <?php get_template_part( 'nav', 'below' ); ?>
  </div>
  <?php if ($blog_type === "masonry") { ?>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('.blog-posts').isotope({
          itemSelector: '.post-block',
          percentPosition: true,
          masonry: {
            gutter: '.gutter-sizer'
          }
        });
      });
    </script>
  <?php } elseif ($blog_type === "carousel") { ?>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('.blog-posts').owlCarousel({
          items: <?php echo $mobile_cols; ?>,
          loop: false,
          margin: <?php echo $mobile_gutters; ?>,
          slideBy: 'page',
          nav: true,
          navText: ['<span class="nav-icon"></span>', '<span class="nav-icon"></span>'],
          responsive:{
            768:{
              items:<?php echo $tablet_cols; ?>,
              margin: <?php echo $tablet_gutters; ?>,
            },
            1024:{
              items:<?php echo $desktop_cols; ?>,
              margin: <?php echo $desktop_gutters; ?>,
            }
          }
        });
      });
    </script>
  <?php } ?>
<?php endif; ?>