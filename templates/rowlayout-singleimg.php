<?php 
  $page_for_posts = get_option( 'page_for_posts' );  
  $postid = get_the_ID();
  
  $item_id = (is_blog()) ? $page_for_posts : $postid;
              
  $image = get_sub_field('single_image', $item_id);
  $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
  $title_position = (get_sub_field('title_position', $item_id)) ? get_sub_field('title_position', $item_id) : '';
  $layout_classes = (get_sub_field('display_title', $item_id) == 1) ? 'class="single-image-wrapper ' . $title_position . '"' : 'class="single-image-wrapper no-title"';
  $display_title = (get_sub_field('display_title', $item_id) == 1) ? '<div class="single-image-title">' . $image['title'] . '</div>' : '';
  $width = (get_sub_field('single_image_size', $item_id)) ? 'style="max-width:' . get_sub_field('single_image_size', $item_id) . 'px;"' : '';
 
  $item_add_animation = get_sub_field('add_item_animation', $item_id);
  $animation_class = ($item_add_animation == 1) ? ' wow' : '';
  $item_animation_effect = (get_sub_field('item_animation_effect', $item_id)) ? ' ' . get_sub_field('item_animation_effect', $item_id)  : '';
  $item_animation_duration = (get_sub_field('item_animation_duration')) ? ' data-wow-duration="' . get_sub_field('item_animation_duration', $item_id) . 's"'  : '';
  $item_animation_delay = (get_sub_field('item_animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('item_animation_delay', $item_id) . 's"'  : '';
  $item_animation_offset =  (get_sub_field('item_animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('item_animation_offset', $item_id) . '"'  : '';

  $animation = ($item_add_animation == 1) ? $item_animation_duration . $item_animation_delay . $item_animation_offset : '';
  $img_srcset = wp_get_attachment_image_srcset($image[id], 'full');
?>
<div class="col-item single-image<?php echo $custom_class . $animation_class . $item_animation_effect; ?>"<?php echo $animation;?>>
  <div <?php echo $layout_classes; ?>>
    <img data-original="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" data-original-set="<?php echo $img_srcset; ?>" class="single-image lazyload" <?php echo $width; ?> />
    <?php echo $display_title ?>
  </div>
</div>