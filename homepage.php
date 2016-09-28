<?php
/*
 * Template name: Home
 */
?>

<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post();
  $learn_more_page = get_field('learn_more_page');
  ?>

  <section id="intro">
    <div class="container">
      <div class="eight columns offset-by-two">
        <div class="intro-content">
          <?php the_field('home_intro'); ?>
          <p class="button-group">
            <?php if($learn_more_page) : ?>
              <span class="group-item">
                <a class="button button-secondary" href="<?php echo get_permalink($learn_more_page); ?>">
                  <span class="fa fa-align-left"></span>
                  Leer más
                </a>
              </span>
            <?php endif; ?>
            <span class="group-item">
              <a class="button" href="<?php echo get_post_type_archive_link('theme-group'); ?>">
                <span class="fa fa-bar-chart"></span>
                Analisis
              </a>
            </span>
          </p>
        </div>
      </div>
    </div>
  </section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
