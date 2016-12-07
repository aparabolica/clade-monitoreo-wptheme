<?php get_header(); ?>

<article id="analisis" class="single-page">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <?php if(is_tax('theme-group-category')) : ?>
          <h1><?php single_term_title(); ?></h1>
        <?php else : ?>
          <h1><?php _e('Analysis', 'clade'); ?></h1>
        <?php endif; ?>
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
                  <article class="theme-group-list-item">
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
    <?php //clade_country_list(); ?>
  </section>
</article>

<?php get_footer(); ?>
