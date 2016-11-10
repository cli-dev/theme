<div class="post-wrapper">
  <header class="post-sub-header">
    <h1><?php the_title(); ?></h1>
    <?php get_template_part( 'entry-meta' ); ?>
  </header>
  <section class="post-content">
    <?php the_content(); ?>
  </section>
  <?php get_template_part( 'entry-footer' ); ?>
</div>
