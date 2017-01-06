<div class="post-wrapper" >
  <header class="post-sub-header">
    <h1 itemprop="name headline"><a href="<?php echo the_permalink(); ?>" class="post-title" itemprop="url"><?php the_title(); ?></a></h1>
    <?php get_template_part( 'entry-meta' ); ?>
    <?php get_template_part( 'entry-author' ); ?>
  </header>
  <section itemprop="articleBody" class="post-content">
    <?php the_content(); ?>
  </section>
  <?php get_template_part( 'entry-footer' ); ?>
</div>
