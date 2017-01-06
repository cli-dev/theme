<?php get_header(); ?>
<section id="content" role="main" class="blog-page single-post-wrapper">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>
      <meta itemprop='isFamilyFriendly' content='True'/>
      <?php get_template_part( 'entry', 'header' ); ?>
      <section class="entry-content">
        <?php get_template_part( 'entry', 'content' ); ?>
      </section>
    </article>
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>