<article id="post-<?php the_ID(); ?>" <?php post_class('post-block post-layout-3'); ?>>
  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" >
    <div class="post-block-inner">
      <div class="entry-meta"><?php the_time( get_option( 'date_format' ) ); ?></div>
      <div class="post-block-content">
        <h3 class="post-block-title"><?php the_title(); ?></h3>
      </div>
    </div>
  </a>
</article>