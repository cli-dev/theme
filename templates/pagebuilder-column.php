<?php
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();
$item_id = (is_blog()) ? $page_for_posts : $postid;
$detect = new Mobile_Detect;
$col_index = 0;
?>

<?php if( have_rows('columns', $item_id) ): while( have_rows('columns', $item_id) ): the_row(); ?>
  <?php 
    $col_custom_class = get_sub_field('column_custom_class', $item_id) ? ' ' .  get_sub_field('column_custom_class', $item_id) : '';
    $inner_column_class = get_sub_field('inner_column_class', $item_id) ? ' ' . get_sub_field('inner_column_class', $item_id) : '';
    $header_class = get_sub_field('header_class', $item_id);
    $header_class_light = ($header_class === 'light') ? ' data-midnight="light"' : '';
    $header_class_dark = ($header_class === 'dark') ? ' data-midnight="dark"' : '';
    $header_class_structure = '';
    if($header_class_dark){
      $header_class_structure = $header_class_dark;
    }
    else{
      $header_class_structure = $header_class_light;
    }
    $column_width = get_sub_field('column_width', $item_id) ? ' col-' . get_sub_field('column_width', $item_id) : '';
    $custom_column_alignment = get_sub_field('custom_column_alignment', $item_id) ? ' flex-single-align-' . get_sub_field('custom_column_alignment', $item_id) : '';
    $content_direction = get_sub_field('content_direction', $item_id);
    $content_horizontal_alignment = get_sub_field('content_horizontal_alignment', $item_id) ? ' flex-align-' . get_sub_field('content_horizontal_alignment', $item_id) : '';
    $content_horizontal_position = get_sub_field('content_horizontal_position', $item_id) ? ' flex-position-' . get_sub_field('content_horizontal_position', $item_id) : '';
    $content_vertical_alignment = get_sub_field('content_vertical_alignment', $item_id) ? ' flex-align-' . get_sub_field('content_vertical_alignment', $item_id) : '';
    $content_vertical_position = get_sub_field('content_vertical_position', $item_id) ? ' flex-position-' . get_sub_field('content_vertical_position', $item_id) : '';
    $remove_col_padding = (get_sub_field('remove_col_padding', $item_id) == 1) ? ' no-padding' : '';
    $column_add_animation = get_sub_field('column_add_animation', $item_id);
    $column_animation_effect = get_sub_field('column_animation_effect', $item_id) ? ' ' . get_sub_field('column_animation_effect', $item_id) : '';
    $column_animation_delay = get_sub_field('column_animation_delay', $item_id) ? ' data-wow-delay="' . get_sub_field('column_animation_delay', $item_id) . 's"' : '';
    $column_animation_offset = get_sub_field('column_animation_offset', $item_id) ? ' data-wow-offset="' . get_sub_field('column_animation_offset', $item_id) . '"' : '';
    $column_background_image = get_sub_field('column_background_image', $item_id) ? get_sub_field('column_background_image', $item_id) : '';
    $column_background_color = get_sub_field('column_background_color', $item_id) ? get_sub_field('column_background_color', $item_id) : '';
    $column_background_color_opacity = get_sub_field('column_background_color_opacity', $item_id) ? get_sub_field('column_background_color_opacity', $item_id) : '';
    $column_bg_rgb = hex2rgb($column_background_color);
    $link_column = get_sub_field('link_column', $item_id);
    $column_link = get_sub_field('column_link', $item_id);

    $link_type = get_sub_field('link_type', $item_id);

    $internal_link = get_permalink( get_sub_field('internal_link', $item_id));
    $external_link = get_sub_field('external_link', $item_id);

    $link = ($link_type === 'Internal') ? $internal_link : $external_link;

    $target = ($link_type === 'Internal') ? '_self' : '_blank';

    $col_slug = ' ' . the_slug($item_id);
    $col_index++;

    $column_styles = '';

    $bg_type = '';

    if($column_background_image && $column_background_color){
      $bg_type = ' lazyload has-bg-image';
      $column_styles = 'data-original="' . $column_background_image . '" style="box-shadow: inset 0 0 0 1000px rgba(' . $column_bg_rgb . ', ' . $column_background_color_opacity . ');"'; 
    } 
    else if($column_background_image && !$column_background_color){ 
      $bg_type = ' lazyload has-bg-image';
      $column_styles = 'data-original="' . $column_background_image . '"';
    } 
    else if(!$column_background_image && $column_background_color) {
      $column_styles = ' style="background: rgba(' . $column_bg_rgb . ', ' . $column_background_color_opacity . ');"';
    }  
    else{
      $column_styles = '';  
    }

    $add_classes_to_outer_column = ' class="flex-col' . $bg_type . $column_width . $custom_column_alignment . ' column-' . $col_index . $col_custom_class . (($column_add_animation == 1) ? ' wow' : '' ) . $column_animation_effect . '"' . $header_class_structure;
    $add_animation = $column_animation_delay . $column_animation_offset;

    if($content_direction === 'row'){
      $content_position = $content_horizontal_position;
      $content_alignment = $content_horizontal_alignment;
      $item_direction = ' flex-direction-row';
    }
    else{
      $content_position = $content_vertical_position;
      $content_alignment = $content_vertical_alignment;
      $item_direction = ' flex-direction-column';
    }


    $add_classes_to_inner_column = 'class="col-inner ' . $item_direction . $remove_col_padding . $content_position . $content_alignment . $inner_column_class . '"';

    $start_outer_column = ($link_column == 1) ? '<a href="' . $link . '" target="' . $target . '" ' . $add_classes_to_outer_column . (($column_add_animation == 1) ? $add_animation : '' ) . $column_styles . '>' : '<div ' . $add_classes_to_outer_column . (($column_add_animation == 1) ? $add_animation : '' ) . $column_styles . '>';
    $end_outer_column = ($link_column == 1) ? '</a>' : '</div>';

    $start_inner_column = '<div ' . $add_classes_to_inner_column . ' >';
    $end_inner_column = '</div>';
  ?>

<?php echo $start_outer_column ; ?> 
  <?php echo $start_inner_column ; ?> 
    <?php if( have_rows('column_content', $item_id) ) : while ( have_rows('column_content', $item_id) ) : the_row(); ?>     
      <?php 
        if ( get_row_layout() == 'text' ) { 
          get_template_part('templates/rowlayout', 'text');
        }
        else if ( get_row_layout() == 'raw_html' ) { 
          get_template_part('templates/rowlayout-html');
        }         
        else if ( get_row_layout() == 'special_button' ) { 
          get_template_part('templates/rowlayout', 'specialbutton'); 
        } 
        else if ( get_row_layout() == 'simple_button' ) { 
          get_template_part('templates/rowlayout', 'button'); 
        }
        else if ( get_row_layout() == 'single_image' ) { 
          get_template_part('templates/rowlayout', 'singleimg'); 
        } 
        else if ( get_row_layout() == 'facebook' ) { 
          get_template_part('templates/rowlayout', 'facebook'); 
        } 
        else if ( get_row_layout() == 'twitter_feed' ) { 
          get_template_part('templates/rowlayout', 'twitter'); 
        }  
        else if ( get_row_layout() == 'instagram_block' ) { 
          get_template_part('templates/rowlayout', 'instagram'); 
        } 
        else if ( get_row_layout() == 'blog_feed' ) { 
          get_template_part('templates/rowlayout', 'blogfeed'); 
        } 
        else if ( get_row_layout() == 'open_positions_grid' ) { 
          get_template_part('templates/rowlayout', 'positionsgrid'); 
        }
        else if ( get_row_layout() == 'single_position_box' ) { 
          get_template_part('templates/rowlayout', 'singleposition'); 
        } 
        else if ( get_row_layout() == 'divider' ) { 
          get_template_part('templates/rowlayout', 'divider');
        } 
        else if ( get_row_layout() == 'social_profiles' ) { 
          get_template_part('templates/rowlayout', 'socialprofiles');
        }
        else if ( get_row_layout() == 'team_grid' ) { 
          get_template_part('templates/rowlayout', 'team');
        }
        else if ( get_row_layout() == 'google_map' ) { 
          get_template_part('templates/rowlayout', 'map');
        } 
        else if ( get_row_layout() == 'quote_block' ) { 
          get_template_part('templates/rowlayout', 'quoteblock');
        }
        else if ( get_row_layout() == 'flickr_feed' ) { 
          get_template_part('templates/rowlayout', 'flickr');
        }
        else if ( get_row_layout() == 'hover_box' ) { 
          get_template_part('templates/rowlayout', 'hoverbox');
        }
        else if ( get_row_layout() == 'image_gallery' ) { 
          get_template_part('templates/rowlayout', 'gallery');
        }
        else if ( get_row_layout() == 'vertical_accordion' ) { 
          get_template_part('templates/rowlayout', 'accordion');
        }
        else if ( get_row_layout() == 'tabs' ) { 
          get_template_part('templates/rowlayout', 'tabs');
        }
        else if ( get_row_layout() == 'custom_icon' ) { 
          get_template_part('templates/rowlayout', 'icon');
        }
        else if ( get_row_layout() == 'inline_svg' ) { 
          get_template_part('templates/rowlayout', 'svg');
        }
      ?>
   <?php endwhile; endif; ?>
  <?php echo $end_inner_column ; ?>
<?php echo $end_outer_column ; ?> 

<?php endwhile; endif; ?>