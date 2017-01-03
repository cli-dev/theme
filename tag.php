<?php get_header(); 
$page_for_posts = get_option( 'page_for_posts' ); 
$post_template = get_field( 'post_template', $page_for_posts); 
?>
<section id="content" role="main" class="blog-page">
  <?php get_template_part('templates/page', 'header') ; ?>
  <section class="entry-content">
    <?php if( have_rows('row', $page_for_posts) ): ?>
      <?php while( have_rows('row', $page_for_posts) ): the_row(); ?>
        <?php get_template_part('templates/pagebuilder', 'row') ; ?>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php if ( have_posts() ) : ?>
      <div class="blog-feed">
        <div class="blog-feed-inner">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'templates/post-layouts/post-layout', $post_template ); ?>
          <?php endwhile; ?>
        </div>
        <?php get_template_part( 'nav', 'below' ); ?>
      </div>
    <?php endif; ?>
  </section>
</section>
<?php get_footer(); ?>