<?php get_header(); ?>
<section id="content" role="main" class="blog-page">
  <?php get_template_part('templates/page', 'header') ; ?>
  <section class="entry-content">
    <?php get_template_part('templates/pagebuilder', 'row') ; ?>
    <?php get_template_part('templates/blog-loop') ; ?>
  </section>
</section>
<?php get_footer(); ?>