<?php 
$page_for_posts = get_option( 'page_for_posts' );  
$postid = get_the_ID();

$item_id = (is_blog()) ? $page_for_posts : $postid;

$username = get_sub_field('username', $item_id);
$num_tweets = get_sub_field('number_of_tweets', $item_id);
$add_links_to_tweet_text = get_sub_field('add_links_to_tweet_text', $item_id);
$display_username = get_sub_field('display_username', $item_id);
$link_username = get_sub_field('link_username', $item_id);
$display_twitter_icon = get_sub_field('display_twitter_icon', $item_id);
$twitter_icon_type = get_sub_field('twitter_icon_type', $item_id);
$twitter_icon = '';
if($display_twitter_icon == 1){
  if ($twitter_icon_type === '1'){
    $twitter_icon = '<div class="twitter-icon"><i class="cli-twitter"></i></div>';  
  }
  else if ($twitter_icon_type === '2'){
    $twitter_icon = '<div class="twitter-icon"><i class="cli-twitter-square"></i></div>';  
  }
  else if ($twitter_icon_type === '3'){
    $twitter_icon = '<div class="twitter-icon"><i class="cli-twitter-circle"></i></div>';  
  }
  else if ($twitter_icon_type === '4'){
    $twitter_icon = '<div class="twitter-icon"><i class="cli-twitter-square-round"></i></div>';  
  }
  else if($twitter_icon_type === '5'){
    $twitter_icon = '<div class="twitter-icon"><i class="cli-twitter-circle-outline"></i></div>';  
  }
}
$is_slider = get_sub_field('is_slider', $item_id);
$custom_class = (get_sub_field('custom_class', $item_id)) ? ' ' . get_sub_field('custom_class', $item_id) : '';
$item_add_animation = get_sub_field('add_item_animation', $item_id);
$animation_class = ($item_add_animation == 1) ? ' wow' : '';
$item_animation_effect = (get_sub_field('item_animation_effect', $item_id)) ? ' ' . get_sub_field('item_animation_effect', $item_id)  : '';
$item_animation_duration = (get_sub_field('item_animation_duration')) ? ' data-wow-duration="' . get_sub_field('item_animation_duration', $item_id) . 's"'  : '';
$item_animation_delay = (get_sub_field('item_animation_delay', $item_id)) ? ' data-wow-delay="' . get_sub_field('item_animation_delay', $item_id) . 's"'  : '';
$item_animation_offset =  (get_sub_field('item_animation_offset', $item_id)) ? ' data-wow-offset="' . get_sub_field('item_animation_offset', $item_id) . '"'  : '';

$animation = ($item_add_animation == 1) ? $item_animation_duration . $item_animation_delay . $item_animation_offset : '';

?>
<div class="col-item<?php echo $animation_class . $item_animation_effect . $custom_class; ?>"<?php echo $animation;?>>
  <div class="twitter-wrapper<?php if ($is_slider == 1) { echo ' twitter-slider'; }?>">
    <?php echo $twitter_icon; ?>
    <?php echo returnTweet($username, $num_tweets, $add_links_to_tweet_text, $display_username, $link_username);?>
  </div>
  <?php if ($is_slider == 1) { ?>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('.twitter-slider .twitter-feed').owlCarousel({
          items: 1,
          nav: true,
          navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });
      });
    </script>
  <?php } ?>
</div>