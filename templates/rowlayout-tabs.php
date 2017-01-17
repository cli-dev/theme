<?php 

$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();

$item_id = (is_blog()) ? $page_for_posts : $postid;

$tabs_class = get_sub_field('tabs_class', $item_id);
$tabs_location = get_sub_field('tabs_location', $item_id);
$tabs_location_class = ' ' . $tabs_location . '-tabs';
$open_icon = get_sub_field('open_tab_icon', $item_id);
$close_icon = get_sub_field('close_tab_icon', $item_id);
$tab_title_bg_color = get_sub_field('tab_title_background_color', $item_id);
$tab_content_bg_color = get_sub_field('tab_content_background_color', $item_id);
$tab_bg_hover_color = get_sub_field('tab_background_hover_color', $item_id);
$active_tab_bg_color = get_sub_field('active_tab_background_color', $item_id);

?>

<?php if( have_rows('tabs', $item_id) ): ?>
  <?php $i = 0; $t = 0; ?>
  <?php if ($tab_title_bg_color || $tab_content_bg_color || $tab_bg_hover_color || $active_tab_bg_color) { ?>
    <style type="text/css">
      <?php if ($tab_title_bg_color ) { ?>
        .tabs-container.<?php echo $tabs_class; ?> .tab-title{
          background-color: <?php echo $tab_title_bg_color; ?>;
        }
      <?php } ?>
      <?php if ($tab_content_bg_color) { ?>
        .tabs-container.<?php echo $tabs_class; ?> .tabs-content-wrapper{
          background-color: <?php echo $tab_content_bg_color; ?>;
        }
      <?php } ?>
      <?php if ($tab_bg_hover_color) { ?>
        .tabs-container.<?php echo $tabs_class; ?> .tab-title:hover{
          background-color: <?php echo $tab_bg_hover_color; ?>;
        }
      <?php } ?>
      <?php if ($active_tab_bg_color) { ?>
        .tabs-container.<?php echo $tabs_class; ?> .tab-title.active-tab{
          background-color: <?php echo $active_tab_bg_color; ?>;
        }
      <?php } ?>
    </style>

  <?php } ?>

  <div class="col-item tabs-container<?php echo ' ' . $tabs_class . $tabs_location_class; ?>">
    <div class="tabs-wrapper<?php echo $tabs_location_class; ?>">
      <?php while( have_rows('tabs', $item_id) ): the_row(); ?>
        <?php 
          $title = get_sub_field('tab_title');
          $custom_class = get_sub_field('custom_class');
          $i++
        ?>
        <div class="tab-title<?php echo ' ' . $custom_class; ?>" data-tab-link="#<?php echo $tabs_class . '-tab-' . $i; ?>">
          <div class="tab-title-content"><?php echo $title; ?></div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="tabs-content-wrapper<?php echo $tabs_location_class; ?>">
      <?php while( have_rows('tabs', $item_id) ): the_row(); ?>
        <?php 
          $content = get_sub_field('tab_content');
          $custom_class = get_sub_field('custom_class');
          $t++
        ?>
        <div id="<?php echo $tabs_class . '-tab-' . $t; ?>" class="tab-content">
          <div class="tab-content-inner">
            <?php echo $content; ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

  <script>
    jQuery(document).ready(function($){
      $('.tab-content:first-child').addClass('active-tab-content');
      $('.tab-title:first-child').addClass('active-tab');

      $('.tab-title').click(function() {
        tabLink = $(this).data('tab-link');
        $('.tab-title').removeClass('active-tab');
        $(this).addClass('active-tab');
        $('.tab-content').removeClass('active-tab-content');
        $(tabLink).addClass('active-tab-content');
      });

    });
  </script>

<?php endif; ?>