<?php 
  $myoptions = get_option( 'themesettings_');
  $page_for_posts = get_option( 'page_for_posts' );  
  $postid = get_the_ID();

  $item_id = '';

  $news_header = $myoptions['news_header'];

  if($news_header == 1){
    if(is_blog() || is_single()){ 
       $item_id = $page_for_posts;
     }
     else{ 
       $item_id = $postid;
     }
  } else {
    if(is_blog()){ 
       $item_id = $page_for_posts;
     }
     else{ 
       $item_id = $postid;
     }
  } 
?>

<?php if( have_rows('header_content', $item_id) ): while ( have_rows('header_content', $item_id) ) : the_row(); ?>
  <?php if( get_row_layout() == 'header_text' ) {?>
    <?php $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : ''; ?>  
    <div class="header-block<?php echo $custom_class; ?>"> 
      <?php the_sub_field('header_text', $item_id); ?>
    </div>
  <?php } ?>
  
  <?php if( get_row_layout() == 'image' ) { $image = get_sub_field('header_image', $item_id);?>
    <?php $custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : ''; $img_srcset = wp_get_attachment_image_srcset($image[id], 'full');?>  
    <div class="header-block<?php echo $custom_class; ?>"> 
      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" srcset="<?php echo $img_srcset; ?>" class="single-image" />
    </div>
  <?php } ?>
<?php endwhile; endif; ?>  