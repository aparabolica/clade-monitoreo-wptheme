<?php get_header(); ?>

<section id="intro">
  <div class="container">
    <div class="four columns">
      <div class="page-section">
        <div class="section-icon">
          <span class="fa fa-cogs"></span>
        </div>
        <div class="section-title">
          <h2 class="h"><span>Cálculo</span> de los indicadores principales</h2>
        </div>
        <div class="section-content">
          <p>Ullamco in dolore consequat aliquip do quis aliqua cillum ad laboris duis non dolore pariatur est amet est. Cillum mollit aliqua dolor sunt nisi aute commodo. Aliqua mollit exercitation velit laborum aliqua ullamco ea officia veniam eu pariatur veniam officia incididunt labore sint.</p>
          <p><a class="button" href="#">Leer más</a></p>
        </div>
      </div>
    </div>
    <div class="four columns">
      <div class="page-section">
        <div class="section-icon">
          <span class="fa fa-bar-chart"></span>
        </div>
        <div class="section-title">
          <h2 class="h"><span>Construcción</span> del Índice Compuesto</h2>
        </div>
        <div class="section-content">
          <p>Ullamco in dolore consequat aliquip do quis aliqua cillum ad laboris duis non dolore pariatur est amet est. Cillum mollit aliqua dolor sunt nisi aute commodo. Aliqua mollit exercitation velit laborum aliqua ullamco ea officia veniam eu pariatur veniam officia incididunt labore sint.</p>
          <p><a class="button" href="#">Leer más</a></p>
        </div>
      </div>
    </div>
    <div class="four columns">
      <div class="page-section">
        <div class="section-icon">
          <span class="fa fa-sitemap"></span>
        </div>
        <div class="section-title">
          <h2 class="h"><span>Instrucciones</span> de Navegación</h2>
        </div>
        <div class="section-content">
          <p>Ullamco in dolore consequat aliquip do quis aliqua cillum ad laboris duis non dolore pariatur est amet est. Cillum mollit aliqua dolor sunt nisi aute commodo. Aliqua mollit exercitation velit laborum aliqua ullamco ea officia veniam eu pariatur veniam officia incididunt labore sint.</p>
          <p><a class="button" href="#">Leer más</a></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="countries">
  <div class="container">
    <div class="twelve columns">
      <div class="page-section">
        <div class="section-title">
          <h2>Datos por país</h2>
        </div>
        <div class="section-content">
          <?php
          $countries = clade_get_countries();
          ?>
          <ul class="country-list">
            <?php foreach($countries as $c_key => $country) : ?>
              <li style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/flags/<?php echo $c_key; ?>.png);" title="<?php echo $country; ?>">
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
