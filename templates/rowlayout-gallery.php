<?php 
  $page_for_posts = get_option( 'page_for_posts' );  
  $postid = get_the_ID();
  $item_id = (is_blog()) ? $page_for_posts : $postid;
  $images = get_sub_field('images', $item_id);
  $gallery_id = (get_sub_field('gallery_id', $item_id)) ? seoUrl(get_sub_field('gallery_id', $item_id)) : 'gallery-grid';
  $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
  $is_slider = get_sub_field('is_slider', $item_id);
  $gallery_type = get_sub_field('gallery_type', $item_id);
  $mobile_cols = intval(get_sub_field('columns_on_mobile', $item_id));
  $tablet_cols = intval(get_sub_field('columns_on_tablet', $item_id));
  $desktop_cols = intval(get_sub_field('columns_on_desktop', $item_id));
  $mobile_gutters = intval(get_sub_field('gutters_on_mobile', $item_id));
  $tablet_gutters = intval(get_sub_field('gutters_on_tablet', $item_id));
  $desktop_gutters = intval(get_sub_field('gutters_on_desktop', $item_id));
  $hover_panel_background_color = (get_sub_field('hover_color', $item_id)) ? hex2rgb(get_sub_field('hover_color', $item_id)) : '';
  $bg_color_opacity = (get_sub_field('hover_color_opacity', $item_id)) ? get_sub_field('hover_color_opacity', $item_id) : '';
  $hover_bg = ($hover_panel_background_color) ? ' style="background-color: rgba(' . $hover_panel_background_color . ',' . $bg_color_opacity . ');"' : '';
  $hover_icon_color = (get_sub_field('hover_icon_color', $item_id)) ? ' style="color: ' . get_sub_field('hover_icon_color', $item_id) . '"' : '';
  $item_add_animation = get_sub_field('add_item_animation', $item_id);
  $animation_class = ($item_add_animation == 1) ? ' wow' : '';
  $item_animation_effect = (get_sub_field('item_animation_effect', $item_id)) ? ' ' . get_sub_field('item_animation_effect', $item_id)  : '';
  $item_animation_duration = (get_sub_field('item_animation_duration')) ? ' data-wow-duration="' . get_sub_field('item_animation_duration', $item_id) . 's"'  : '';
  $item_animation_delay = (get_sub_field('item_animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('item_animation_delay', $item_id) . 's"'  : '';
  $item_animation_offset =  (get_sub_field('item_animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('item_animation_offset', $item_id) . '"'  : '';
  $animation = ($item_add_animation == 1) ? $item_animation_duration . $item_animation_delay . $item_animation_offset : '';
?>
<div class="col-item image-gallery<?php echo $animation_class . $item_animation_effect . $custom_class;?>"<?php echo $animation;?>>
  <?php if( $images ): ?>
    <style type="text/css">
      <?php if ($gallery_type === "standard") { ?>
        #<?php echo $gallery_id; ?>{
          width: calc(100% + <?php echo $mobile_gutters; ?>px);
          margin-right: -<?php echo $mobile_gutters; ?>px;
          margin-bottom: -<?php echo $mobile_gutters; ?>px;
        }

        #<?php echo $gallery_id; ?> .gallery-img-wrap{
          width: calc(<?php echo abs(1/$mobile_cols * 100); ?>% - <?php echo $mobile_gutters; ?>px);
          margin-bottom: <?php echo $mobile_gutters; ?>px;
          margin-right: <?php echo $mobile_gutters; ?>px;
        }
        @media screen and (min-width: 768px){
          #<?php echo $gallery_id; ?>{
            width: calc(100% + <?php echo $tablet_gutters; ?>px);
            margin-right: -<?php echo $tablet_gutters; ?>px;
            margin-bottom: -<?php echo $tablet_gutters; ?>px;
          }
          #<?php echo $gallery_id; ?> .gallery-img-wrap{
            width: calc(<?php echo abs(1/$tablet_cols * 100); ?>% - <?php echo $tablet_gutters; ?>px);
            margin-bottom: <?php echo $tablet_gutters; ?>px;
            margin-right: <?php echo $tablet_gutters; ?>px;
          }
        }
        @media screen and (min-width: 1024px){
          #<?php echo $gallery_id; ?>{
            width: calc(100% + <?php echo $desktop_gutters; ?>px);
            margin-right: -<?php echo $desktop_gutters; ?>px;
            margin-bottom: -<?php echo $desktop_gutters; ?>px;
          }
          #<?php echo $gallery_id; ?> .gallery-img-wrap{
            width: calc(<?php echo abs(1/$desktop_cols * 100); ?>% - <?php echo $desktop_gutters; ?>px);
            margin-bottom: <?php echo $desktop_gutters; ?>px;
            margin-right: <?php echo $desktop_gutters; ?>px;
          }
        }
      <?php } elseif ($gallery_type === "masonry") { ?>
        #<?php echo $gallery_id; ?>{
          width: calc(100% + <?php echo $mobile_gutters; ?>px);
          margin-right: -<?php echo $mobile_gutters; ?>px;
          margin-bottom: -<?php echo $mobile_gutters; ?>px;
        }
        #<?php echo $gallery_id; ?> .gallery-img-wrap{
          width: <?php echo abs(1/$mobile_cols * 100); ?>%;
          margin-bottom: <?php echo $mobile_gutters; ?>px;
        }
        #<?php echo $gallery_id; ?> .gutter-sizer{
          width: <?php echo $mobile_gutters; ?>px;
        }
        @media screen and (min-width: 768px){
          #<?php echo $gallery_id; ?>{
            width: calc(100% + <?php echo $tablet_gutters; ?>px);
            margin-right: -<?php echo $tablet_gutters; ?>px;
            margin-bottom: -<?php echo $tablet_gutters; ?>px;
          }
          #<?php echo $gallery_id; ?> .gallery-img-wrap{
            width: calc(<?php echo abs(1/$tablet_cols * 100); ?>% - <?php echo $tablet_gutters; ?>px);
            margin-bottom: <?php echo $tablet_gutters; ?>px;
          }  
          #<?php echo $gallery_id; ?> .gutter-sizer{
            width: <?php echo $tablet_gutters; ?>px;
          }
        }
        @media screen and (min-width: 1024px){
          #<?php echo $gallery_id; ?>{
            width: calc(100% + <?php echo $desktop_gutters; ?>px);
            margin-right: -<?php echo $desktop_gutters; ?>px;
            margin-bottom: -<?php echo $desktop_gutters; ?>px;
          }
          #<?php echo $gallery_id; ?> .gallery-img-wrap{
            width: calc(<?php echo abs(1/$desktop_cols * 100); ?>% - <?php echo $desktop_gutters; ?>px);
            margin-bottom: <?php echo $desktop_gutters; ?>px;
          } 
          #<?php echo $gallery_id; ?> .gutter-sizer{
            width: <?php echo $desktop_gutters; ?>px;
          } 
        }
      <?php } elseif ($gallery_type === "carousel") { ?>
        #<?php echo $gallery_id; ?> .gallery-img-wrap{
          width: 100%;
        }
      <?php } ?>
    </style>
    <div id="<?php echo $gallery_id; ?>" class="<?php echo $gallery_type; ?>">
      <?php if ($gallery_type === "masonry") { echo '<div class="gutter-sizer"></div>';} ?>
      <?php foreach( $images as $image ): ?>
        <div class="gallery-img-wrap">
          <?php if ($gallery_type === "masonry") { ?>
            <?php $img_srcset = wp_get_attachment_image_srcset($image['id'], 'full'); ?>
            <a href="<?php echo $image['url']; ?>" rel="<?php echo $gallery_id; ?>" title="<?php echo $image['title']; ?>" class="gallery-img-link lightbox">
              <span class="hover-panel"<?php echo $hover_bg; ?>><i class="img-zoom elegant-icon icon_zoom-in_alt"<?php echo $hover_icon_color; ?>></i></span>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" srcset="<?php echo $img_srcset; ?>" class="gallery-img" />
            </a>
          <?php } else { ?>
            <a href="<?php echo $image['url']; ?>" rel="<?php echo $gallery_id; ?>" title="<?php echo $image['title']; ?>" class="gallery-img-link lightbox lazyload" data-original="<?php echo $image['url']; ?>">
              <span class="hover-panel"<?php echo $hover_bg; ?>><i class="img-zoom elegant-icon icon_zoom-in_alt"<?php echo $hover_icon_color; ?>></i></span>
            </a>
          <?php } ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
<script type="text/javascript">
  jQuery(document).ready(function($) {  
    <?php if ($gallery_type === "masonry") { ?>
      $('#<?php echo $gallery_id; ?>').imagesLoaded( function() {
        var $grid = $('#<?php echo $gallery_id; ?>').isotope({
          itemSelector: '.gallery-img-wrap',
          percentPosition: true,
          masonry: {
            gutter: '.gutter-sizer'
          }
        });
      });
    <?php } ?>
    <?php if ($gallery_type === "carousel") { ?>
      var myLazyLoad = new LazyLoad({
        container: document.getElementById('<?php echo $gallery_id; ?>'),
        elements_selector: ".gallery-img",
      });
      $('#<?php echo $gallery_id; ?>').owlCarousel({
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