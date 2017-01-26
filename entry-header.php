<?php 

$myoptions = get_option( 'themesettings_');
$logo_position = $myoptions['logo_position'];
$site_header_type = $myoptions['header_type'];
$top_header_type = '';
$top_header_type = $myoptions['top_header_position'];
$overlapping_header = '';
if($top_header_type === "header-overlap") {
  $overlapping_header = ' overlapping-header';
}
$detect = new Mobile_Detect;
$page_for_posts = get_option( 'page_for_posts' );
$placeholder_img = get_field('background_image', $page_for_posts);
$headerStyles = '';

if($detect->isMobile() && has_post_thumbnail()) {
  $image_id = get_post_thumbnail_id();
  $image_url_array = wp_get_attachment_image_src($image_id, 'medium', true);
  $image_url = $image_url_array[0];
  $headerStyles = 'style="background: url(' . $image_url . ') center no-repeat; background-size: cover;"';
}
elseif($detect->isMobile() && !has_post_thumbnail()){
  $headerStyles = 'style="background: url(' . $placeholder_img . ') center no-repeat; background-size: cover;"';
} 
elseif(!$detect->isMobile() && has_post_thumbnail()){
  $image_id = get_post_thumbnail_id();
  $image_url_array = wp_get_attachment_image_src($image_id, 'full', true);
  $image_url = $image_url_array[0];
  $headerStyles = 'style="background-image: url(' . $image_url . '); background-position: 50% 70%; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;"';
}
else{
  $headerStyles = ' style="background: url(' . $placeholder_img . ') center no-repeat; background-size: cover;"';
}
$post_title = get_the_title();
$post_image_id = get_post_thumbnail_id();
$post_image_array = wp_get_attachment_image_src($post_image_id, 'post-image', true);
$post_image_url = $post_image_array[0];
$post_image_width = $post_image_array[1];
$post_image_height = $post_image_array[2];
$post_image_thumb_array = wp_get_attachment_image_src($post_image_id, 'post-image', true);
$post_image_thumb_url = $post_image_thumb_array[0];
?>

<header class="post-header<?php echo $overlapping_header; ?>"<?php echo $headerStyles;?>>
  <?php if ( has_post_thumbnail() ) : ?>
    <div itemprop="image" itemscope itemtype="http://schema.org/ImageObject" class="post-img-inner">
      <img itemprop="url" src="<?php echo $post_image_url; ?>" title="<?php echo $post_title; ?>" alt="<?php echo $post_title; ?>" />
      <meta itemprop="thumbnail" content="<?php echo $post_image_thumb_url; ?>" />
      <meta itemprop="width" content="<?php echo $post_image_width; ?>" />
      <meta itemprop="height" content="<?php echo $post_image_height; ?>" />
    </div>
  <?php endif; ?>
</header>