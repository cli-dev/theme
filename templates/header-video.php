<?php 
  $myoptions = get_option( 'themesettings_');
  $page_for_posts = get_option( 'page_for_posts' );  
  $postid = get_the_ID();
  if(is_blog()){ 
    $item_id = $page_for_posts;
  }
  else{ 
    $item_id = $postid;
  } 
  $video_mp4 = get_field('video_mp4', $item_id);
  $video_ogg = get_field('video_ogg', $item_id);
  $video_webm = get_field('video_webm ', $item_id);
  $video_placeholder_image = get_field('video_placeholder_image', $item_id); 
?>

<video autoplay loop poster="<?php echo $video_placeholder_image; ?>" class="bgvid">
  <source src="<?php echo $video_webm; ?>" type="video/webm">
  <source src="<?php echo $video_mp4; ?>" type="video/mp4">
  <source src="<?php echo $video_ogg; ?>" type="video/ogv">
</video>
