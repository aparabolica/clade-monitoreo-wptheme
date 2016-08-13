<?php
/*
 * Template name: Analisis Archive
 */

$countries = clade_get_countries();
?>
<?php get_header(); ?>
<article id="analisis" class="single-page">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <nav class="page-header-nav">
          <a href="#">Dimension de esfuerzo</a>
          <a href="#">Dimension de disponibilidad</a>
          <a href="#">Dimension de equidad</a>
          <a href="#">Analisis agregado</a>
        </nav>
        <h1>Análisis</h1>
      </div>
    </div>
  </header>
  <section class="page-content list-page">
    <div class="container">
      <div class="twelve columns">
        <div class="analisis-theme-groups">
          <ul class="theme-groups">
            <li>
              <article class="theme-group">
                <h3 class="h"><a href="#"><span>Dimension</span> de esfuerzo</a></h3>
                <p>Duis et dolor mollit mollit nisi dolore ad nulla. Lorem ex nulla ipsum culpa anim adipisicing do. Ad ea reprehenderit enim mollit est excepteur et elit est in voluptate nulla nostrud sit in aliquip.</p>
              </article>
            </li>
            <li>
              <article class="theme-group">
                <h3 class="h"><a href="#"><span>Dimension</span> de disponibilidad</a></h3>
                <p>Duis et dolor mollit mollit nisi dolore ad nulla. Lorem ex nulla ipsum culpa anim adipisicing do. Ad ea reprehenderit enim mollit est excepteur et elit est in voluptate nulla nostrud sit in aliquip.</p>
              </article>
            </li>
            <li>
              <article class="theme-group">
                <h3 class="h"><a href="#"><span>Dimension</span> de equidad</a></h3>
                <p>Duis et dolor mollit mollit nisi dolore ad nulla. Lorem ex nulla ipsum culpa anim adipisicing do. Ad ea reprehenderit enim mollit est excepteur et elit est in voluptate nulla nostrud sit in aliquip.</p>
              </article>
            </li>
            <li>
              <article class="theme-group">
                <h3 class="h"><a href="#"><span>Analisis</span> agregado</a></h3>
                <p>Duis et dolor mollit mollit nisi dolore ad nulla. Lorem ex nulla ipsum culpa anim adipisicing do. Ad ea reprehenderit enim mollit est excepteur et elit est in voluptate nulla nostrud sit in aliquip.</p>
              </article>
            </li>
          </ul>
        </div>
      </div>
    </div>
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
                    <a href="<?php echo home_url('/brasil/'); ?>"></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
</article>

<?php get_footer(); ?>
