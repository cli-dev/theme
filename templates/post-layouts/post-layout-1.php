<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
$thumb_url = $thumb_url_array[0];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-block post-layout-1'); ?>>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" >
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="post-img lazyload" data-original="<?php echo $thumb_url; ?>" style="background-position: center top; background-repeat: no-repeat; background-size: cover;">
        <?php 
        $title = get_the_title();
        $attr = array('class' => "post-img-inner", 'alt' => $title,);
        the_post_thumbnail( 'thumbnail', $attr );
        ?>
      </div>
    <?php endif; ?>
    <div class="post-block-inner">
      <?php get_template_part( 'entry-meta' ); ?>
      <div class="post-block-content">
        <h3 class="post-block-title"><?php the_title(); ?></h3>
        <div class="post-excerpt">
          <?php the_excerpt(); ?>
        </div>
      </div>
    </div>
  </a>
</article>