<?php
/*
 * Template name: Country
 */
?>
<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <article id="page" class="single-page">
    <header class="page-header">
      <div class="container">
        <div class="twelve columns">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </header>
    <section class="page-welcome">
      <div class="container">
        <div class="nine columns">
          <?php if($post->post_excerpt) : ?>
            <?php the_excerpt(); ?>
          <?php else : ?>
            <?php echo get_first_paragraph(); ?>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <section class="page-content">
      <div class="container">
        <div class="eight columns offset-by-one">
          <?php echo get_content_without_first_paragraph(); ?>
        </div>
      </div>
    </section>
  </article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
