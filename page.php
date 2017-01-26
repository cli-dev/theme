<?php get_header(); ?>
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_template_part('templates/page', 'header'); ?>
    <section class="entry-content">
      <?php get_template_part('templates/pagebuilder', 'row'); ?>
    </section>
  </article>
<?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>