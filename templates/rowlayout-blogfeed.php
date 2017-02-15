<?php 
  $page_for_posts = get_option( 'page_for_posts' );  
  $postid = get_the_ID();

  $item_id = (is_blog()) ? $page_for_posts : $postid;
  $blog_id = (get_sub_field('blog_id', $item_id)) ? seoUrl(get_sub_field('blog_id', $item_id)) : 'blog-grid';
  $blog_type = get_sub_field('blog_type', $item_id);
  $blog_posts = get_sub_field('blog_posts', $item_id);
  $post_offset = get_sub_field('post_offset', $item_id);
  $mobile_cols = intval(get_sub_field('columns_on_mobile', $item_id));
  $tablet_cols = intval(get_sub_field('columns_on_tablet', $item_id));
  $desktop_cols = intval(get_sub_field('columns_on_desktop', $item_id));
  $mobile_gutters = intval(get_sub_field('gutters_on_mobile', $item_id));
  $tablet_gutters = intval(get_sub_field('gutters_on_tablet', $item_id));
  $desktop_gutters = intval(get_sub_field('gutters_on_desktop', $item_id));
  $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
  $categories = (get_sub_field('blog_category', $item_id)) ? get_sub_field('blog_category', $item_id) : '';
  $blog_category_ids = '';
  if ($categories) {
  foreach ($categories as $category) {
    $blog_category_ids .= $category . ',';
  }
  }
  $post_layout = get_sub_field('post_layout', $item_id);
  $item_add_animation = get_sub_field('add_item_animation', $item_id);
  $animation_class = ($item_add_animation == 1) ? ' wow' : '';
  $item_animation_effect = (get_sub_field('item_animation_effect', $item_id)) ? ' ' . get_sub_field('item_animation_effect', $item_id)  : '';
  $item_animation_duration = (get_sub_field('item_animation_duration')) ? ' data-wow-duration="' . get_sub_field('item_animation_duration', $item_id) . 's"'  : '';
  $item_animation_delay = (get_sub_field('item_animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('item_animation_delay', $item_id) . 's"'  : '';
  $item_animation_offset =  (get_sub_field('item_animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('item_animation_offset', $item_id) . '"'  : '';

  $animation = ($item_add_animation == 1) ? $item_animation_duration . $item_animation_delay . $item_animation_offset : '';
?>
<div class="col-item blog-feed-wrapper<?php echo $animation_class . $item_animation_effect . $custom_class; ?>"<?php echo $animation;?>>
  <?php 
  $args = array (
    'posts_per_page' => $blog_posts, 
    'offset' => $post_offset, 
    'cat' => "'" . $blog_category_ids . "'",
    ); 

  $query = new WP_Query( $args ); 
  if ( $query->have_posts() ) : ?>
    <style type="text/css">
      <?php if ($blog_type === "standard") { ?>
        #<?php echo $blog_id; ?>{
          width: calc(100% + <?php echo $mobile_gutters; ?>px);
          margin-right: -<?php echo $mobile_gutters; ?>px;
          margin-bottom: -<?php echo $mobile_gutters; ?>px;
        }

        #<?php echo $blog_id; ?> .post-block{
          width: calc(<?php echo abs(1/$mobile_cols * 100); ?>% - <?php echo $mobile_gutters; ?>px);
          margin-bottom: <?php echo $mobile_gutters; ?>px;
          margin-right: <?php echo $mobile_gutters; ?>px;
        }
        @media screen and (min-width: 768px){
          #<?php echo $blog_id; ?>{
            width: calc(100% + <?php echo $tablet_gutters; ?>px);
            margin-right: -<?php echo $tablet_gutters; ?>px;
            margin-bottom: -<?php echo $tablet_gutters; ?>px;
          }
          #<?php echo $blog_id; ?> .post-block{
            width: calc(<?php echo abs(1/$tablet_cols * 100); ?>% - <?php echo $tablet_gutters; ?>px);
            margin-bottom: <?php echo $tablet_gutters; ?>px;
            margin-right: <?php echo $tablet_gutters; ?>px;
          }
        }
        @media screen and (min-width: 1024px){
          #<?php echo $blog_id; ?>{
            width: calc(100% + <?php echo $desktop_gutters; ?>px);
            margin-right: -<?php echo $desktop_gutters; ?>px;
            margin-bottom: -<?php echo $desktop_gutters; ?>px;
          }
          #<?php echo $blog_id; ?> .post-block{
            width: calc(<?php echo abs(1/$desktop_cols * 100); ?>% - <?php echo $desktop_gutters; ?>px);
            margin-bottom: <?php echo $desktop_gutters; ?>px;
            margin-right: <?php echo $desktop_gutters; ?>px;
          }
        }
      <?php } elseif ($blog_type === "masonry") { ?>
        #<?php echo $blog_id; ?>{
          width: calc(100% + <?php echo $mobile_gutters; ?>px);
          margin-right: -<?php echo $mobile_gutters; ?>px;
          margin-bottom: -<?php echo $mobile_gutters; ?>px;
        }
        #<?php echo $blog_id; ?> .post-block{
          width: <?php echo abs(1/$mobile_cols * 100); ?>%;
          margin-right: <?php echo $mobile_gutters; ?>px;
          margin-bottom: <?php echo $mobile_gutters; ?>px;
        }
        #<?php echo $blog_id; ?> .gutter-sizer{
          width: <?php echo $mobile_gutters; ?>px;
        }
        @media screen and (min-width: 768px){
          #<?php echo $blog_id; ?>{
            width: calc(100% + <?php echo $tablet_gutters; ?>px);
            margin-right: -<?php echo $tablet_gutters; ?>px;
            margin-bottom: -<?php echo $tablet_gutters; ?>px;
          }
          #<?php echo $blog_id; ?> .post-block{
            width: calc(<?php echo abs(1/$tablet_cols * 100); ?>% - <?php echo $tablet_gutters; ?>px);
            margin-bottom: <?php echo $tablet_gutters; ?>px;
          }  
          #<?php echo $blog_id; ?> .gutter-sizer{
            width: <?php echo $tablet_gutters; ?>px;
          }
        }
        @media screen and (min-width: 1024px){
          #<?php echo $blog_id; ?>{
            width: calc(100% + <?php echo $desktop_gutters; ?>px);
            margin-right: -<?php echo $desktop_gutters; ?>px;
            margin-bottom: -<?php echo $desktop_gutters; ?>px;
          }
          #<?php echo $blog_id; ?> .post-block{
            width: calc(<?php echo abs(1/$desktop_cols * 100); ?>% - <?php echo $desktop_gutters; ?>px);
            margin-bottom: <?php echo $desktop_gutters; ?>px;
          } 
          #<?php echo $blog_id; ?> .gutter-sizer{
            width: <?php echo $desktop_gutters; ?>px;
          } 
        }
      <?php } elseif ($blog_type === "carousel") { ?>
        #<?php echo $blog_id; ?> .post-block{
          width: 100%;
        }
      <?php } ?>
    </style>  
    <div id="<?php echo $blog_id; ?>" class="<?php echo $blog_type; ?>">
      <?php if ($blog_type === "masonry") { echo '<div class="gutter-sizer"></div>';} ?>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php get_template_part('templates/post-layouts/post-layout-' . $post_layout); ?>
      <?php endwhile; ?>
    </div>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        <?php if ($blog_type === "masonry") { ?>
          $('#<?php echo $blog_id; ?>').isotope({
            itemSelector: '.post-block',
            percentPosition: true,
            masonry: {
              gutter: '.gutter-sizer'
            }
          });
        <?php } ?>
        <?php if ($blog_type === "carousel") { ?>
          $('#<?php echo $blog_id; ?>').owlCarousel({
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
        <?php } ?>
      });
    </script>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</div>