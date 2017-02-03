
<section itemprop="articleBody" class="post-content">
  <header class="post-title">
    <h1 itemprop="name headline"><a href="<?php echo the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a></h1>
    <?php get_template_part( 'entry-meta' ); ?>
    <?php get_template_part( 'entry-author' ); ?>
  </header>
  <?php the_content(); ?>
  <?php get_template_part( 'entry-footer' ); ?>
</section>

