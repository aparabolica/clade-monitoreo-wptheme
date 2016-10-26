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
        <p class="copyright"><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licença Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>
          Este trabalho está licenciado com uma Licença <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons - Atribuição-NãoComercial-CompartilhaIgual 4.0 Internacional</a>.</p>
        <p class="social">
          <a class="fa fa-facebook-official"></a>
          <a class="fa fa-twitter"></a>
        </p>
      </div>
    </div>
  </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>
