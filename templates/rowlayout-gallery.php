<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$images = get_sub_field('images', $item_id);
$gallery_id = get_sub_field('gallery_id', $item_id);
$custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
$is_slider = get_sub_field('is_slider', $item_id);
$columns_on_desktop = get_sub_field('columns_on_desktop', $item_id);
$columns = intval($columns_on_desktop);
$column_spacing = get_sub_field('grid_spacing', $item_id);
$gallery_negative_margin = ($column_spacing) ? ' style="margin: -' . ($column_spacing/2) . 'px"' : '"';
$gallery_spacing = ($column_spacing) ? ' style="padding: ' . ($column_spacing/2) . 'px"' : ''; 
$gallery_item_styles = ($is_slider == 1) ? '' : $gallery_spacing; 
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
$gallery_classes = ($is_slider == 1) ? 'class="image-gallery owl-carousel"' : 'class="image-gallery image-grid"' . $gallery_negative_margin;
?>
  <div class="col-item gallery<?php echo $animation_class . $item_animation_effect . $custom_class;?>"<?php echo $animation;?>>
    <?php if( $images ): ?>
    <div id="<?php echo $gallery_id; ?>" <?php echo $gallery_classes;?>>
      <?php foreach( $images as $image ): ?>
      <div class="gallery-img-wrap"<?php echo $gallery_item_styles; ?>>
        <a href="<?php echo $image['url']; ?>" rel="<?php echo $gallery_id; ?>" title="<?php echo $image['title']; ?>" class="gallery-img" data-original="<?php echo $image['sizes']['medium']; ?>"><span class="hover-panel"<?php echo $hover_bg; ?>><i class="img-zoom fa fa-search-plus"<?php echo $hover_icon_color; ?>></i></span></a>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
</div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var columns = <?php echo $columns; ?>;
    $(".gallery-img").fancybox({
      padding: 0,
      maxWidth: 700,
      margin: [50, 20, 20, 20]
    });
    var myLazyLoad = new LazyLoad({
      container: document.getElementById('<?php echo $gallery_id; ?>'),
      elements_selector: ".gallery-img",
    });
    <?php if ($is_slider == 1) { ?>
      var <?php echo $gallery_id; ?> = $('#<?php echo $gallery_id; ?>.owl-carousel');
      <?php if ($columns == 1) { ?>
        <?php echo $gallery_id; ?>.owlCarousel({
          items: 1,
          loop: false,
          margin: 0,
          nav: true,
          navText: ['<span class="nav-icon"></span>', '<span class="nav-icon"></span>'],
        });
      <?php } else if ($columns == 2) { ?>
        <?php echo $gallery_id; ?>.owlCarousel({
          items: 1,
          loop: false,
          margin: 0,
          slideBy: 'page',
          nav: true,
          navText: ['<span class="nav-icon"></span>', '<span class="nav-icon"></span>'],
          responsive:{
            500:{
              items:2,
              margin: <?php echo $column_spacing; ?>,
            }
          }
        });
      <?php } else if ($columns >= 3) { ?>
        <?php echo $gallery_id; ?>.owlCarousel({
          items: 1,
          loop: false,
          margin: 0,
          slideBy: 'page',
          nav: true,
          navText: ['<span class="nav-icon"></span>', '<span class="nav-icon"></span>'],
          responsive:{
            500:{
              items:2,
              margin: <?php echo $column_spacing; ?>,
            },
            800:{
              items:3,
              margin: <?php echo $column_spacing; ?>,
            },
            1200:{
              items:columns,
              margin: <?php echo $column_spacing; ?>,
            }
          }
        });
      <?php } ?>

      <?php echo $gallery_id; ?>.on('changed.owl.carousel', function(event) {
        var currentItem = event.item.index;
        var items = event.item.count;
        var lastItem = event.item.count - 1;
        var firstItem = 0;
        var currentPage = event.page.index;
        var pages = event.page.count;
        var lastPage = event.page.count - 1;
        var firstPage = 0;
        if (currentItem === lastItem || currentPage === lastPage) {
          $('#<?php echo $gallery_id; ?> .owl-next').addClass('disabled-nav-item');
        } else{
          $('#<?php echo $gallery_id; ?> .owl-next').removeClass('disabled-nav-item');
        }
        if (currentItem === firstItem || currentPage === firstPage) {
          $('#<?php echo $gallery_id; ?> .owl-prev').addClass('disabled-nav-item');
        } else{
          $('#<?php echo $gallery_id; ?> .owl-prev').removeClass('disabled-nav-item');
        }
      });

    <?php } else { ?>
      var maxWidth = 1/columns * 100;

      if($(window).width() >= 1000){
        $('#<?php echo $gallery_id; ?> .gallery-img-wrap').css('width', maxWidth + '%');
      }

      $(window).resize(function(event) {
        if($(window).width() >= 1000){
          $('#<?php echo $gallery_id; ?> .gallery-img-wrap').css('width', maxWidth + '%');
        } else if($(window).width() >= 600){
          $('#<?php echo $gallery_id; ?> .gallery-img-wrap').css('width','50%');
        }
        else{
          $('#<?php echo $gallery_id; ?> .gallery-img-wrap').css('width', '100%');
        }
      });
    <?php } ?>
  });
</script>