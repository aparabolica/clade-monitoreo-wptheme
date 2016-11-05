<?php
get_header();
$term = get_queried_object();
$report = get_field('country_report', $term);
$analysis = get_field('country_analysis', $term);
?>
<article id="country-page" class="single-page">
  <header class="page-header">
    <div class="container">
      <div class="eight columns">
        <div class="flag" style="background-image:url(<?php the_field('thumbnail', $term); ?>);"></div>
        <p class="header-label"><?php _e('Analysis from', 'clade'); ?></p><br/>
        <h1><?php single_term_title(); ?></h1>
      </div>
      <?php
      if($report) :
        ?>
        <div class="four columns">
          <aside class="files">
            <p>
              <a class="button" href="<?php echo $report; ?>">
                <span class="fa fa-download"></span>
                <?php _e('Download analysis', 'clade'); ?>
              </a>
            </p>
          </aside>
        </div>
        <?php
      endif;
      ?>
    </div>
  </header>
  <section class="page-welcome">
    <div class="container">
      <div class="nine columns">
        <p><?php echo $term->description; ?></p>
      </div>
    </div>
  </section>
  <section class="page-content">
    <?php
    query_posts('post_type=theme-group&posts_per_page=-1');
    if(have_posts()) :
      while(have_posts()) :
        the_post();
        get_template_part('parts/theme-group-item');
      endwhile;
    endif;
    wp_reset_query();
    ?>
    <?php if($analysis) : ?>
      <div class="page-section">
        <article id="country-analysis">
          <div class="container">
            <div class="twelve columns">
              <div class="section-title">
                <h2 class="h"><?php _e('Country analysis', 'clade'); ?></h2>
              </div>
              <div class="analysis-content">
                <?php echo $analysis; ?>
              </div>
            </div>
          </div>
        </article>
      </div>
    <?php endif; ?>
  </section>
</article>
<?php get_footer(); ?>
