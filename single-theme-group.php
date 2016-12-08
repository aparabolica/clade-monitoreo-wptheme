<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post();
  $theme_id = get_the_ID();
  $cats = get_the_terms($theme_id, 'theme-group-category');
  if($cats)
    $single_cat = $cats[0];
  ?>
  <article id="analisis" class="single-page">
    <header class="page-header">
      <div class="container">
        <div class="twelve columns">
          <?php if($cats) : ?>
            <h1><a href="<?php echo get_term_link($single_cat); ?>"><?php echo $single_cat->name; ?></a></h1>
          <?php else : ?>
            <h1><a href="<?php echo get_post_type_archive_link('theme-group'); ?>">Análisis</a></h1>
          <?php endif; ?>
          <nav class="page-header-nav">
            <?php
            if($cats) :
              $cats_ids = array();
              foreach($cats as $cat) {
                $cats_ids[] = $cat->term_id;
              }
              $query = array(
                'post_type' => 'theme-group',
                'tax_query' => array(
                  array(
                    'taxonomy' => 'theme-group-category',
                    'field' => 'term_id',
                    'terms' => $cats_ids
                  )
                )
              );
              query_posts($query);
              while(have_posts()) : the_post();
                ?>
                <a href="<?php the_permalink(); ?>" class="<?php if($theme_id == get_the_ID()) echo 'active'; ?>"><?php the_title(); ?></a>
                <?php
                wp_reset_postdata();
              endwhile;
              wp_reset_query();
            endif;
            ?>
          </nav>
        </div>
      </div>
    </header>
    <section class="page-content theme-group">
      <?php get_template_part('parts/theme-group-item'); ?>
    </section>
  </article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
