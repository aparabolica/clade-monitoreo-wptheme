<?php
/*
 * Template name: Home
 */
?>

<?php get_header(); ?>

<section id="intro">
  <div class="container">
    <div class="eight columns offset-by-two">
      <div class="intro-content">
        <p>Cillum veniam nisi duis mollit pariatur in officia ullamco consectetur ullamco ipsum. Adipisicing eiusmod nisi eiusmod anim officia non exercitation sit cillum reprehenderit. Laborum do ad cupidatat amet dolore duis ipsum Lorem ad pariatur laborum nisi nostrud qui magna.</p>
        <p>Adipisicing eiusmod nisi eiusmod anim officia non exercitation sit cillum reprehenderit. Laborum do ad cupidatat amet dolore.</p>
        <p class="button-group">
          <span class="group-item">
            <a class="button button-secondary" href="<?php echo home_url('/introduccion'); ?>">
              <span class="fa fa-align-left"></span>
              Leer más
            </a>
          </span>
          <span class="group-item">
            <a class="button" href="<?php echo home_url('/analisis'); ?>">
              <span class="fa fa-bar-chart"></span>
              Analisis
            </a>
          </span>
        </p>
      </div>
    </div>
  </div>
</section>


<!-- <section id="methodology">
  <div class="container">
    <div class="four columns">
      <div class="page-section">
        <div class="section-icon">
          <span class="fa fa-cogs"></span>
        </div>
        <div class="section-title">
          <h2 class="h"><span>Cálculo</span> de los indicadores principales</h2>
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
      </div>
    </div>
  </div>
</section> -->
<?php
/*
<section id="countries">
  <div class="container">
    <div class="twelve columns">
      <div class="page-section">
        <div class="section-title">
          <h2>Análisis por país</h2>
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
*/
?>

<?php get_footer(); ?>
