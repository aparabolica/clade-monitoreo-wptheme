<?php get_header(); ?>

<article id="analisis" class="single-page">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <h1>Análisis</h1>
        <nav class="page-header-nav">
          <?php while(have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <?php endwhile; ?>
        </nav>
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
              $countries = get_terms('country', array(
                'hide_empty' => false
              ));
              ?>
              <ul class="term-list">
                <?php
                foreach($countries as $country) :
                  $thumb = get_field('thumbnail', 'country_' . $country->term_id);
                  ?>
                  <li style="background-image: url(<?php echo $thumb; ?>);" title="<?php echo $country->term_title; ?>">
                    <a href="<?php echo get_term_link($country); ?>" title="<?php $country->name; ?>"></a>
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
