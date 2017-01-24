<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();

$item_id = (is_blog()) ? $page_for_posts : $postid;
$icon_family = get_sub_field('icon_family', $item_id);
$icon = '';
if ($icon_family === 'Font Awesome') {
  $icon = 'fa ' . get_sub_field('font_awesome_icon', $item_id);
} else if ($icon_family === 'Elegant Font') {
  $icon = 'elegant-icon ' . get_sub_field('elegant_icon', $item_id);
} else if ($icon_family === 'Theme Social Icons') {
  $icon = get_sub_field('theme_icon', $item_id);
} else {
  $icon = get_sub_field('custom_icon_class', $item_id);
}
$icon_family = get_sub_field('icon_family', $item_id);
$custom_class = get_sub_field('custom_class', $item_id);

$item_add_animation = get_sub_field('add_item_animation', $item_id);
$animation_class = ($item_add_animation == 1) ? ' wow' : '';
$item_animation_effect = (get_sub_field('item_animation_effect', $item_id)) ? ' ' . get_sub_field('item_animation_effect', $item_id)  : '';
$item_animation_duration = (get_sub_field('item_animation_duration')) ? ' data-wow-duration="' . get_sub_field('item_animation_duration', $item_id) . 's"'  : '';
$item_animation_delay = (get_sub_field('item_animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('item_animation_delay', $item_id) . 's"'  : '';
$item_animation_offset =  (get_sub_field('item_animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('item_animation_offset', $item_id) . '"'  : '';

$animation = ($item_add_animation == 1) ? $item_animation_duration . $item_animation_delay . $item_animation_offset : '';
?>
<div class="col-item icon-wrapper<?php echo $animation_class . $item_animation_effect . ' ' . $custom_class; ?>"<?php echo $animation;?>>
  <i class="<?php echo $icon; ?>"></i>
</div>