<?php
  $prev_post = get_previous_post();
  $next_post = get_next_post();
?>

<nav class="single-post-nav" role="navigation">
  <?php if (!empty( $prev_post )) { ?>
    <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="previous-post btn">
      <i class="fa fa-angle-left"></i> 
      <span class="nav-txt">Previous Post</span>
    </a>
  <?php } ?>
  <?php if (is_a( $next_post , 'WP_Post' )) { ?>
    <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next-post btn">
      <span class="nav-txt">Next Post</span> 
      <i class="fa fa-angle-right"></i>
    </a>
  <?php } ?>
</nav>