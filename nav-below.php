<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
  <nav class="post-nav" role="navigation">
  <?php if (function_exists("pagination")) { pagination(); } ?>
  </nav>
<?php } ?>