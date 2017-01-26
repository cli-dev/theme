<?php get_header(); ?>
<?php 
  $news_header = $myoptions['news_header']; 
  $post_title = get_the_title();
  $post_image_id = get_post_thumbnail_id();
  $post_image_array = wp_get_attachment_image_src($post_image_id, 'post-image', true);
  $post_image_url = $post_image_array[0];
  $post_image_width = $post_image_array[1];
  $post_image_height = $post_image_array[2];
  $post_image_thumb_array = wp_get_attachment_image_src($post_image_id, 'post-thumb', true);
  $post_image_thumb_url = $post_image_thumb_array[0];
  $post_image_srcset = wp_get_attachment_image_srcset($post_image_id, 'post-image');
?>
<section id="content" role="main" class="blog-page single-post-wrapper">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>
      <meta itemprop='isFamilyFriendly' content='True'/>
      <?php ($news_header == 1) ? get_template_part('templates/page', 'header') : get_template_part( 'entry', 'header' ); ?>
      <section class="entry-content">
        <?php if ($news_header == 1 && has_post_thumbnail()){ ?>
          <div class="single-post-img lazyload" data-original="<?php echo $post_image_url; ?>">
            <img itemprop="url" data-original="<?php echo $post_image_url; ?>" data-original-set="<?php echo $post_image_srcset; ?>"  title="<?php echo $post_title; ?>" width="<?php echo $post_image_width; ?>" height="<?php echo $post_image_height; ?>" alt="<?php echo $post_title; ?>" class="lazyload" />
            <meta itemprop="thumbnail" content="<?php echo $post_image_thumb_url; ?>" />
            <meta itemprop="width" content="<?php echo $post_image_width; ?>" />
            <meta itemprop="height" content="<?php echo $post_image_height; ?>" />
          </div>
        <?php } ?>
        <?php get_template_part( 'entry', 'content' ); ?>
      </section>
    </article>
  <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>