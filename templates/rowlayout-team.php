<?php 
  $page_for_posts = get_option( 'page_for_posts' );  
  $postid = get_the_ID();
  $item_id = (is_blog()) ? $page_for_posts : $postid;
  $team_id = (get_sub_field('team_grid_id', $item_id)) ? seoUrl(get_sub_field('team_grid_id', $item_id)) : 'team-grid';
  $team_type = get_sub_field('team_type', $item_id);
  $team_category = (get_sub_field('team_category', $item_id)) ? get_sub_field('team_category', $item_id) : '';
  $team_category_ids = '';
  if ($team_category) {
    $team_category_ids = array(
      array(
        'taxonomy' => 'team_cat',
        'field' => 'term_id',
        'terms' => $team_category,
      )
    );
  }
  $hover_panel_background_color = (get_sub_field('hover_panel_background_color', $item_id)) ? hex2rgb(get_sub_field('hover_panel_background_color', $item_id)) : '';
  $bg_color_opacity = (get_sub_field('bg_color_opacity', $item_id)) ? get_sub_field('bg_color_opacity', $item_id) : '';
  $hover_bg = ($hover_panel_background_color) ? ' style="background-color: rgba(' . $hover_panel_background_color . ',' . $bg_color_opacity . ');"' : '';
  $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
  $mobile_cols = intval(get_sub_field('columns_on_mobile', $item_id));
  $tablet_cols = intval(get_sub_field('columns_on_tablet', $item_id));
  $desktop_cols = intval(get_sub_field('columns_on_desktop', $item_id));
  $mobile_gutters = intval(get_sub_field('gutters_on_mobile', $item_id));
  $tablet_gutters = intval(get_sub_field('gutters_on_tablet', $item_id));
  $desktop_gutters = intval(get_sub_field('gutters_on_desktop', $item_id));
  $team_info_in_hover_panel = get_sub_field('team_info_in_hover_panel', $item_id);
  $team_title_color = (get_sub_field('team_title_color', $item_id)) ? ' style="color:' . get_sub_field('team_title_color', $item_id) . ';"' : '';
  $position_title_color = (get_sub_field('position_title_color', $item_id)) ? ' style="color:' . get_sub_field('position_title_color', $item_id) . ';"' : '';
  $bio_button_classes = (get_sub_field('bio_button_classes', $item_id)) ? ' ' . get_sub_field('bio_button_classes', $item_id) : '';
  $item_add_animation = get_sub_field('add_item_animation', $item_id);
  $animation_class = ($item_add_animation == 1) ? ' wow' : '';
  $item_animation_effect = (get_sub_field('item_animation_effect', $item_id)) ? ' ' . get_sub_field('item_animation_effect', $item_id)  : '';
  $item_animation_duration = (get_sub_field('item_animation_duration')) ? ' data-wow-duration="' . get_sub_field('item_animation_duration', $item_id) . 's"'  : '';
  $item_animation_delay = (get_sub_field('item_animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('item_animation_delay', $item_id) . 's"'  : '';
  $item_animation_offset =  (get_sub_field('item_animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('item_animation_offset', $item_id) . '"'  : '';
  $animation = ($item_add_animation == 1) ? $item_animation_duration . $item_animation_delay . $item_animation_offset : '';
?>
<?php 
$args1 = array (
  'post_type' => array( 'team_member' ),
  'posts_per_page' => '-1',
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'tax_query' => $team_category_ids,
);
$query1 = new WP_Query( $args1 );
?>
<?php if ( $query1->have_posts() ) : ?>
  <style type="text/css">
    <?php if ($team_type === "standard") { ?>
      #<?php echo $team_id; ?>{
        width: calc(100% + <?php echo $mobile_gutters; ?>px);
        margin-right: -<?php echo $mobile_gutters; ?>px;
        margin-bottom: -<?php echo $mobile_gutters; ?>px;
      }

      #<?php echo $team_id; ?> .team-member{
        width: calc(<?php echo abs(1/$mobile_cols * 100); ?>% - <?php echo $mobile_gutters; ?>px);
        margin-bottom: <?php echo $mobile_gutters; ?>px;
        margin-right: <?php echo $mobile_gutters; ?>px;
      }
      @media screen and (min-width: 768px){
        #<?php echo $team_id; ?>{
          width: calc(100% + <?php echo $tablet_gutters; ?>px);
          margin-right: -<?php echo $tablet_gutters; ?>px;
          margin-bottom: -<?php echo $tablet_gutters; ?>px;
        }
        #<?php echo $team_id; ?> .team-member{
          width: calc(<?php echo abs(1/$tablet_cols * 100); ?>% - <?php echo $tablet_gutters; ?>px);
          margin-bottom: <?php echo $tablet_gutters; ?>px;
          margin-right: <?php echo $tablet_gutters; ?>px;
        }
      }
      @media screen and (min-width: 1024px){
        #<?php echo $team_id; ?>{
          width: calc(100% + <?php echo $desktop_gutters; ?>px);
          margin-right: -<?php echo $desktop_gutters; ?>px;
          margin-bottom: -<?php echo $desktop_gutters; ?>px;
        }
        #<?php echo $team_id; ?> .team-member{
          width: calc(<?php echo abs(1/$desktop_cols * 100); ?>% - <?php echo $desktop_gutters; ?>px);
          margin-bottom: <?php echo $desktop_gutters; ?>px;
          margin-right: <?php echo $desktop_gutters; ?>px;
        }
      }
    <?php } elseif ($team_type === "masonry") { ?>
      #<?php echo $team_id; ?>{
        width: calc(100% + <?php echo $mobile_gutters; ?>px);
        margin-right: -<?php echo $mobile_gutters; ?>px;
        margin-bottom: -<?php echo $mobile_gutters; ?>px;
      }
      #<?php echo $team_id; ?> .team-member{
        width: <?php echo abs(1/$mobile_cols * 100); ?>%;
        margin-bottom: <?php echo $mobile_gutters; ?>px;
      }
      #<?php echo $team_id; ?> .gutter-sizer{
        width: <?php echo $mobile_gutters; ?>px;
      }
      @media screen and (min-width: 768px){
        #<?php echo $team_id; ?>{
          width: calc(100% + <?php echo $tablet_gutters; ?>px);
          margin-right: -<?php echo $tablet_gutters; ?>px;
          margin-bottom: -<?php echo $tablet_gutters; ?>px;
        }
        #<?php echo $team_id; ?> .team-member{
          width: calc(<?php echo abs(1/$tablet_cols * 100); ?>% - <?php echo $tablet_gutters; ?>px);
          margin-bottom: <?php echo $tablet_gutters; ?>px;
        }  
        #<?php echo $team_id; ?> .gutter-sizer{
          width: <?php echo $tablet_gutters; ?>px;
        }
      }
      @media screen and (min-width: 1024px){
        #<?php echo $team_id; ?>{
          width: calc(100% + <?php echo $desktop_gutters; ?>px);
          margin-right: -<?php echo $desktop_gutters; ?>px;
          margin-bottom: -<?php echo $desktop_gutters; ?>px;
        }
        #<?php echo $team_id; ?> .team-member{
          width: calc(<?php echo abs(1/$desktop_cols * 100); ?>% - <?php echo $desktop_gutters; ?>px);
          margin-bottom: <?php echo $desktop_gutters; ?>px;
        } 
        #<?php echo $team_id; ?> .gutter-sizer{
          width: <?php echo $desktop_gutters; ?>px;
        } 
      }
    <?php } elseif ($team_type === "carousel") { ?>
      #<?php echo $team_id; ?> .team-member{
        width: 100%;
      }
    <?php } ?>
  </style>
<div class="col-item team-grid<?php echo $animation_class . $item_animation_effect . $custom_class; ?>"<?php echo $animation;?>>
  <div id="<?php echo $team_id; ?>" class="<?php echo $team_type; ?>">
    <?php if ($team_type === "masonry") { echo '<div class="gutter-sizer"></div>';} ?>
    <?php while ( $query1->have_posts() ) : $query1->the_post(); ?>
      <?php
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'team-headshot', true);
        $thumb_url = $thumb_url_array[0];
        $position = get_field('position');
        $bio = get_field('bio');
        $team_img = '';
        if( has_post_thumbnail() ){
          $team_img = ' style="background: url(' . $thumb_url . ') center top no-repeat; background-size: cover;"';
        }
        $team_img = ($thumb_url) ? ' lazyload" data-original="' . $thumb_url . '" style="background-position: center top; background-repeat: no-repeat; background-size: cover;"' : '" ';
        $team_open_tag = ($bio) ? '<a class="team-member-inner lightbox' . $team_img . 'href="#' . the_slug() . '">' : '<div class="team-member-inner' . $team_img . '>';
        $team_close_tag = ($bio) ? '</a>' : '</div>';
      ?>
      <div class="team-member">
        <?php echo $team_open_tag; ?>
          <?php if ($team_info_in_hover_panel == 1) { ?>
            <div class="team-hover-panel"<?php echo $hover_bg; ?>>
              <div class="hover-panel-inner">
                <h3 class="team-title"<?php echo $team_title_color; ?>><?php the_title(); ?></h3>
                <?php if($position){ ?>
                  <div class="team-position"<?php echo $position_title_color; ?>><?php echo $position; ?></div>
                <?php } ?>
                <?php if($bio){ ?>
                  <div class="bio-btn<?php echo $bio_button_classes; ?>">View Bio</div>
                <?php } ?>
              </div>
            </div>
          <?php } elseif ($team_info_in_hover_panel !== 1 && $bio !== ''){ ?>
            <div class="team-hover-panel"<?php echo $hover_bg; ?>>
              <div class="hover-panel-inner">
                <div class="btn bio-btn<?php echo $bio_button_classes; ?>">View Bio</div>
              </div>
            </div>
          <?php } ?> 
        <?php echo $team_close_tag; ?>
        <?php if ($team_info_in_hover_panel != 1) { ?>
          <div class="team-info">
            <h3 class="team-title"<?php echo $team_title_color; ?>><?php the_title(); ?></h3>
            <?php if($position){ ?>
              <p class="team-position"<?php echo $position_title_color; ?>><?php echo $position; ?></p>
            <?php } ?>
          </div>
          <?php } ?> 
      </div>
    <?php endwhile; ?>
  </div>
</div>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      <?php if ($team_type === "masonry") { ?>
        $('#<?php echo $team_id; ?>').imagesLoaded( function() {
          var $grid = $('#<?php echo $team_id; ?>').isotope({
            itemSelector: '.team-member',
            percentPosition: true,
            masonry: {
              gutter: '.gutter-sizer'
            }
          });
        });
      <?php } ?>
      <?php if ($team_type === "carousel") { ?>
        var myLazyLoad = new LazyLoad({
          container: document.getElementById('<?php echo $team_id; ?>'),
          elements_selector: ".team-member-inner",
        });
        $('#<?php echo $team_id; ?>').owlCarousel({
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

      var teamInfoHeights = $('#<?php echo $team_id; ?> .team-info').map(function() {
        return $(this).height();
      }).get();

      var minTeamInfoHeight = Math.max.apply(null, teamInfoHeights);

      $('#<?php echo $team_id; ?> .team-info').css('min-height', minTeamInfoHeight);
      $(window).resize(function(event) {
        var teamInfoHeights2 = $('#<?php echo $team_id; ?> .team-info').map(function() {
          return $(this).height();
        }).get();

        var minTeamInfoHeight2 = Math.max.apply(null, teamInfoHeights2);

        $('#<?php echo $team_id; ?> .team-info').css('min-height', minTeamInfoHeight2);
      });
    });
  </script>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php 
  $args2 = array (
    'post_type' => array( 'team_member' ),
    'posts_per_page' => '-1',
    'order' => 'ASC',
    'orderby' => 'title',
    'tax_query' => $team_category_ids,
  );
  $query2 = new WP_Query( $args2 );
?>
<?php if ( $query2->have_posts() ) : ?>
  <div class="team-bios">
    <?php while ( $query2->have_posts() ) : $query2->the_post(); ?>
      <?php
        $bio = get_field('bio');
        $position = get_field('position');
        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
        $thumb_url = $thumb_url_array[0];
      ?>
      <?php if($bio){?>
        <div id="<?php echo the_slug(); ?>" class="team-bio">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="team-member-img">
              <?php 
              $title = get_the_title();
              $attr = array('class' => "team-img", 'alt' => $title,);
              the_post_thumbnail( 'team-headshot', $attr );
              ?>
            </div>
          <?php endif; ?>
          <div class="team-title-area">
            <h3 class="team-title"><?php the_title(); ?></h3>
            <p class="team-position"><?php echo $position; ?></p>
          </div>
          <div class="bio"><?php echo $bio; ?></div>
        </div>
      <?php } ?> 
    <?php endwhile; ?>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>