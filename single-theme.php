<?php get_header(); ?>
<?php
if(have_posts()) : while(have_posts()) :
  the_post();
  $theme_title = get_the_title();
  $theme_id = get_the_ID();
  $color = get_field('color');
  ?>
  <article id="analisis" class="single-page">
    <header class="page-header">
      <div class="container">
        <div class="twelve columns">
          <nav class="page-header-nav">
            <?php
            $theme_id = get_the_ID();
            query_posts('post_type=theme-group');
            while(have_posts()) : the_post();
              ?>
              <a href="<?php the_permalink(); ?>" class="<?php if($theme_id == get_the_ID()) echo 'active'; ?>"><?php the_title(); ?></a>
              <?php
              wp_reset_postdata();
            endwhile;
            wp_reset_query();
            ?>
          </nav>
          <h1><a href="<?php echo get_post_type_archive_link('theme-group'); ?>">Análisis</a></h1>
        </div>
      </div>
    </header>
    <section class="page-content theme-group-item">
      <div class="page-section">
        <div class="section-content">
          <div class="container">
            <div class="four columns">
              <h3 style="background-color: <?php echo $color; ?>">
                <?php the_title(); ?>
              </h3>
            </div>
          </div>
          <?php get_template_part('parts/theme-item'); ?>
        </div>
      </div>
    </section>
  </article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
