<?php
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$detect = new Mobile_Detect;
$row_index = 0;
?>

<?php if( have_rows('row', $item_id) ): ?>
  <?php while( have_rows('row', $item_id) ): the_row(); ?>
    <?php 
      $col_direction = get_sub_field('column_direction', $item_id);
      $col_horizontal_position = (get_sub_field('horizontal_position', $item_id)) ? ' flex-position-' . get_sub_field('horizontal_position', $item_id) : '';
      $col_horizontal_alignment = (get_sub_field('horizontal_alignment', $item_id)) ? ' flex-align-' . get_sub_field('horizontal_alignment', $item_id) : '';
      $col_vertical_position = (get_sub_field('vertical_position', $item_id)) ? ' flex-position-' . get_sub_field('vertical_position', $item_id) : '';
      $col_vertical_alignment = (get_sub_field('vertical_alignment', $item_id)) ? ' flex-align-' . get_sub_field('vertical_alignment', $item_id) : '';
      $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
      $header_class = (get_sub_field('header_class', $item_id)) ? ' data-midnight="' . get_sub_field('header_class', $item_id) . '"' : '';
      $remove_row_padding = (get_sub_field('remove_row_padding', $item_id) == 1) ? ' no-padding' : '';
      $wrap = (get_sub_field('wrap', $item_id) == 1) ? ' nowrap' : '';
      $is_in_grid = (get_sub_field('is_in_grid', $item_id) == 1) ? ' in-grid' : '';
      $row_id = (get_sub_field('row_id', $item_id)) ? ' id="' . get_sub_field('row_id', $item_id) . '"' : '';
      $row_add_animation = get_sub_field('row_add_animation', $item_id);
      $animation_class = ($row_add_animation == 1 ? ' wow' : '');
      $row_animation_effect = ($row_add_animation == 1 ? ' ' . get_sub_field('row_animation_effect', $item_id)  : '');
      $row_animation_duration = ($row_add_animation == 1 ? 'data-wow-duration="' . get_sub_field('row_animation_duration', $item_id) . 's"'  : '');
      $row_animation_delay= ($row_add_animation == 1 ? 'data-wow-delay="' . get_sub_field('row_animation_delay', $item_id) . 's"'  : '');
      $row_animation_offset = ($row_add_animation == 1 ? 'data-wow-offset="' . get_sub_field('row_animation_offset', $item_id) . '"'  : '');
      $row_video_mp4 = (get_sub_field('video_mp4', $item_id)) ? get_sub_field('video_mp4', $item_id) : '';
      $row_video_ogg = (get_sub_field('video_ogg', $item_id)) ? get_sub_field('video_ogg', $item_id) : '';
      $row_video_webm = (get_sub_field('video_webm', $item_id)) ? get_sub_field('video_webm', $item_id) : '';
      $row_video_placeholder_image = (get_sub_field('video_placeholder_image', $item_id)) ? get_sub_field('video_placeholder_image', $item_id) : '';
        
      $background_type = get_sub_field('background_type', $item_id);
      $row_background_color = (get_sub_field('row_background_color', $item_id)) ? get_sub_field('row_background_color', $item_id) : '';
      $row_background_color_opacity = (get_sub_field('row_background_color_opacity', $item_id)) ? get_sub_field('row_background_color_opacity', $item_id) : '';
      $row_bg_rgb = (get_sub_field('row_background_color', $item_id)) ? hex2rgb($row_background_color) : '';
      $row_background_image = (get_sub_field('row_background_image', $item_id)) ? get_sub_field('row_background_image', $item_id) : '';
      $background_image_overlay = (get_sub_field('background_image_overlay', $item_id)) ? get_sub_field('background_image_overlay', $item_id) : '';
      $background_image_overlay_opacity = (get_sub_field('background_image_overlay_opacity', $item_id)) ? get_sub_field('background_image_overlay_opacity', $item_id) : '';
      $overlay_rgb = (get_sub_field('background_image_overlay', $item_id)) ? hex2rgb($background_image_overlay) : '';
      $parallax_image = get_sub_field('parallax_image', $item_id);
      $parallax_horizontal_position = get_sub_field('parallax_horizontal_position', $item_id);
      $parallax_vertical_positon = get_sub_field('parallax_vertical_positon', $item_id);
      $speed = (get_sub_field('column_direction', $item_id)) ? 'data-speed="' . get_sub_field('speed', $item_id) . '"' : '';
      $bg_type = '';

      $row_wrapper_styles = '';

      if($background_type === 'color'){
        $row_wrapper_styles = ' style="background: rgba(' . $row_bg_rgb . ', ' . $row_background_color_opacity . ');"';
      }
      else if ($background_type === 'image'){
        $bg_type = ' lazyload has-bg-image';
        if($row_background_image && $background_image_overlay){
          $row_wrapper_styles =  ' data-original="' . $row_background_image . '" style="box-shadow: inset 0 0 0 1000px rgba(' . $overlay_rgb . ', ' . $background_image_overlay_opacity . ');"'; 
        } 
        else if($row_background_image && !$background_image_overlay){ 
          $row_wrapper_styles = ' data-original="' . $row_background_image . '"';
        } 
      }
      else if ($background_type === 'parallax'){
        $bg_type = ' lazyload has-bg-image';
        if ( !$detect->isMobile() ) {
          if($parallax_image && $background_image_overlay){
            $row_wrapper_styles = ' data-original="' . $parallax_image . '" style="background-position: ' . $parallax_horizontal_position . ' ' . $parallax_vertical_positon .  '; background-attachment: fixed; box-shadow: inset 0 0 0 1000px rgba(' . $overlay_rgb . ', ' . $background_image_overlay_opacity . ');"';
          } 
          else if($parallax_image && !$background_image_overlay){ 
            $row_wrapper_styles = ' data-original="' . $parallax_image . '" style="background-position: ' . $parallax_horizontal_position . ' ' . $parallax_vertical_positon .  '; background-attachment: fixed;"';
          } 
        } else{
          if($parallax_image && $background_image_overlay){
            $row_wrapper_styles = ' data-original="' . $parallax_image . '" style="background-position: ' . $parallax_horizontal_position . ' ' . $parallax_vertical_positon .  '; background-repeat: no-repeat; background-size: cover; box-shadow: inset 0 0 0 1000px rgba(' . $overlay_rgb . ', ' . $background_image_overlay_opacity . ');"'; 
          } 
          else if($parallax_image && !$background_image_overlay){ 
            $row_wrapper_styles = ' data-original="' . $parallax_image . '" style="background-position: ' . $parallax_horizontal_position . ' ' . $parallax_vertical_positon .  '; background-repeat: no-repeat; background-size: cover;"';
          } 
        }
      }
      else{
        $row_wrapper_styles = '';  
      }

      if($col_direction === 'row'){
        $col_position = $col_horizontal_position;
        $col_alignment = $col_horizontal_alignment;
        $row_direction = ' flex-direction-row';
      }
      else{
        $col_position = $col_vertical_position;
        $col_alignment = $col_vertical_alignment;
        $row_direction = ' flex-direction-column';
      }
      $row_slug = (is_blog()) ? ' blog' : ' ' . the_slug($item_id);
      $row_index++;
      $row_wrapper_classes = ' class="row-wrapper' . $custom_class . $bg_type . $remove_row_padding . $animation_class . $row_animation_effect . $row_slug . '-row-' . $row_index . '"';
      $row_wrapper_animation = $row_animation_duration . $row_animation_delay . $row_animation_offset;

      $row_wrapper = $row_id . $row_wrapper_classes . $header_class . $row_wrapper_animation . $row_wrapper_styles;

      $add_classes_to_inner_row = 'class="flex-row' . $row_direction . $col_position . $col_alignment .  $wrap . $is_in_grid . '"';
    ?>
    <div<?php echo $row_wrapper; ?>>
      <?php if(!$detect->isMobile() && $background_type === 'video') { ?>
        <div class="bg-video">
          <video autoplay loop poster="<?php echo $row_video_placeholder_image; ?>" class="bgvid">
            <source src="<?php echo $row_video_webm; ?>" type="video/webm">
            <source src="<?php echo $row_video_mp4; ?>" type="video/mp4">
            <source src="<?php echo $row_video_ogg; ?>" type="video/ogv">
          </video>
          <div class="bg-video-overlay"></div>
        </div>
      <?php } else if($detect->isMobile() && $background_type === 'video'){?>
        <div class="header-bg-video bg-video" style="background: url('<?php echo $row_video_placeholder_image; ?>') center no-repeat; background-size: cover;">
          <div class="bg-video-overlay"></div>
        </div>
      <?php } ?>
      <div <?php echo $add_classes_to_inner_row; ?>>
        <?php get_template_part('templates/pagebuilder', 'column') ; ?> 
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>