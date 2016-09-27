<?php
/*
 * Template name: Methodology
 */
?>
<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="analisis" class="single-page">
  <header class="page-header">
    <div class="container">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </header>
  <section class="page-content list-page">
    <section id="methodology">
      <?php
      if(have_rows('methodology_item')) :
        while(have_rows('methodology_item')) :
          the_row();
          ?>
          <article class="method">
            <div class="container">
              <div class="four columns">
                <div class="page-section">
                  <div class="section-icon">
                    <span class="fa <?php the_sub_field('icon'); ?>"></span>
                  </div>
                  <div class="section-title">
                    <h2 class="h"><?php the_sub_field('title'); ?></h2>
                  </div>
                </div>
              </div>
              <div class="eight columns">
                <div class="method-description">
                  <?php the_sub_field('content'); ?>
                </div>
              </div>
            </div>
          </article>
          <?php
        endwhile;
      endif;
      ?>
    </section>
  </section>
</article>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
