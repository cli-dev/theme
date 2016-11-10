<div class="post-meta">
  <div class="post-categories">
    <?php $categories = get_the_category();

    foreach( $categories as $category ) {
      echo '<span class="entry-cat ' . $category->slug . '" >' . $category->name . '</span>';
    } ?>
  </div>
  <div class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></div>
</div>