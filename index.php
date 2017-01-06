<?php get_header(); 
$page_for_posts = get_option( 'page_for_posts' ); 
$myoptions = get_option( 'themesettings_');
$blog_post_layout = $myoptions['blog_post_layout'];
$animate_blog_section = $myoptions['animate_blog_section'];
$blog_animation_effect = ($animate_blog_section == 1) ? ' wow ' . $myoptions['blog_animation_effect'] : '';
$blog_animation_delay = ($animate_blog_section == 1) ? ' data-wow-delay="' . $myoptions['blog_animation_delay'] . '"' : '';
$blog_animation_offset = ($animate_blog_section == 1) ? ' data-wow-offset="' . $myoptions['blog_animation_offset'] . '"' : '';
$blog_animation = $blog_animation_delay . $blog_animation_offset;
?>
<section id="content" role="main" class="blog-page">
  <?php get_template_part('templates/page', 'header') ; ?>
  <section class="entry-content">
    <?php get_template_part('templates/pagebuilder', 'row') ; ?>
    <?php if ( have_posts() ) : ?>
      <div class="blog-feed<?php echo $blog_animation_effect ?>"<?php echo $blog_animation ?>>
        <div class="blog-feed-inner">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'templates/post-layouts/post-layout', $blog_post_layout ); ?>
          <?php endwhile; ?>
        </div>
        <?php get_template_part( 'nav', 'below' ); ?>
      </div>
    <?php endif; ?>
  </section>
</section>
<?php get_footer(); ?>