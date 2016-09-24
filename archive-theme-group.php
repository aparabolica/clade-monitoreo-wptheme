<?php get_header(); ?>

<article id="analisis" class="single-page">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <nav class="page-header-nav">
          <?php while(have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <?php endwhile; ?>
        </nav>
        <h1>Análisis</h1>
      </div>
    </div>
  </header>
  <section class="page-content list-page">
    <div class="container">
      <div class="twelve columns">
        <?php if(have_posts()) : ?>
          <div class="analisis-theme-groups">
            <ul class="theme-groups">
              <?php while(have_posts()) : the_post(); ?>
                <li>
                  <article class="theme-group">
                    <h3 class="h"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                  </article>
                </li>
              <?php endwhile; ?>
            </ul>
          </div>
        <?php endif; ?>
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
