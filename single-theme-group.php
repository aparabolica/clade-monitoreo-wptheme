<?php
$countries = clade_get_countries();
?>
<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
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
    <section class="page-content theme-group">
      <?php get_template_part('parts/theme-group-item'); ?>
    </section>
  </article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
