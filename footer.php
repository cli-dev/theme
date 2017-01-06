</div>
<footer id="footer" class="site-footer">
  <?php if ( is_active_sidebar( 'content-bottom' ) ) : ?> 
  <div id="content-bottom">   
    <?php dynamic_sidebar( 'content-bottom' ); ?>
  </div>
  <?php endif; ?>
  <div id="top-footer" class="top-footer" role="contentinfo">
    <div class="footer-inner">
    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?> 
      <div id="footer-1" class="footer-column">   
        <?php dynamic_sidebar( 'footer-1' ); ?>
      </div>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
      <div id="footer-2" class="footer-column">    
        <?php dynamic_sidebar( 'footer-2' ); ?>
      </div>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>  
      <div id="footer-3" class="footer-column">  
        <?php dynamic_sidebar( 'footer-3' ); ?>
      </div>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>  
      <div id="footer-4" class="footer-column">  
        <?php dynamic_sidebar( 'footer-4' ); ?>
      </div>
    <?php endif; ?>
    <?php if ( is_active_sidebar( 'footer-5' ) ) : ?>  
      <div id="footer-5" class="footer-column">  
        <?php dynamic_sidebar( 'footer-5' ); ?>
      </div>
    <?php endif; ?>
    </div>
  </div>
<?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>  
  <div id="bottom-footer" class="bottom-footer">  
    <div class="footer-inner">
      <?php dynamic_sidebar( 'footer-bottom' ); ?>
    </div>
  </div>
</footer>
<?php endif; ?>
</div>
</div>
<?php echo schemaInfo(); ?>
<?php wp_footer(); ?>
</body>
</html>