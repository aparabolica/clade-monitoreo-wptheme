<footer id="colophon">
  <?php if ( is_active_sidebar( 'footer_widgets' ) ) : ?>
    <section id="colophon-widgets">
      <div class="container">
        <div class="twelve columns">
          <ul class="widgets">
            <?php dynamic_sidebar( 'footer_widgets' ); ?>
          </ul>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <section id="colophon-copyright">
    <div class="container">
      <div class="twelve columns">
        <p class="copyright">
          <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="<?php _e('Create Commons License', 'clade'); ?>" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>
          <?php _e('This work is licensed under a', 'clade'); ?> <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><?php _e('Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License', 'clade'); ?></a>.</p>
        <p class="social">
          <a class="fa fa-facebook-official" href="https://facebook.com/campanaderechoeducacion/" target="_blank" rel="external"></a>
          <a class="fa fa-twitter" href="https://twitter.com/redclade" target="_blank" rel="external"></a>
        </p>
      </div>
    </div>
  </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>
