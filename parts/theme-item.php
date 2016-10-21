<?php

global $wp_the_query;
global $has_chart, $theme_id, $terms, $term, $data_query;

$rows = get_field('table_rows');
$cols = get_field('table_columns');

// Taxonomy filterable terms
$taxonomy = get_field('taxonomy');
if($taxonomy) {
  $taxonomy = array_shift($taxonomy);
  if($wp_the_query->is_tax($taxonomy)) {
    // Use single term if accessing filterable taxonomy term
    $is_tax = true;
    $terms = array($wp_the_query->get_queried_object());
  } else {
    // Use all taxonomy terms
    $is_tax = false;
    $terms = get_terms($taxonomy, array(
      'hide_empty' => false
    ));
  }
} else {
  if($wp_the_query->is_tax())
    return;
}

$has_chart = get_field('has_chart');

$theme_class = '';

?>
<section id="theme-<?php the_ID(); ?>" class="theme-item">
  <div class="container">
    <div class="twelve columns">
      <div class="theme-content">
        <span class="arrow"></span>
        <!-- START TREE NAV -->
        <?php
        if(($rows || $cols) && ($has_chart || (!$is_tax && $taxonomy))) :
          ?>
          <nav class="tree-nav">
            <div class="clearfix">
              <div class="tree-item">
                <?php
                if($rows) :
                  foreach($rows as $row) :
                    ?>
                    <a href="#" data-category="<?php echo $row->term_id; ?>"><?php echo $row->name; ?></a>
                    <?php
                  endforeach;
                endif;
                ?>
              </div>
              <div class="tree-item">
                <?php
                if($cols) :
                  foreach($cols as $col) :
                    ?>
                    <a href="#" data-category="<?php echo $col->term_id; ?>"><?php echo $col->name; ?></a>
                    <?php
                  endforeach;
                endif;
                ?>
              </div>
            </div>
            <?php
            /*
             * FIX
             * Support "download all data" (theme-wide)
             */
            ?>
            <!-- <div class="general-download">
              <p>
                <a class="button button-small">
                  <span class="fa fa-download"></span>
                  Descargar todos los datos
                </a>
              </p>
            </div> -->
          </nav>
        <?php endif; ?>
        <!--- END TREE NAV -->
        <div>
          <!-- START TAX NAV -->
          <?php
          if($taxonomy && !$is_tax) :
            // Display terms for filtering charts or download PDF data
            $terms_columns = 'twelve';
            if(get_field('has_chart'))
              $terms_columns = 'four';
            ?>
            <div class="<?php echo $terms_columns; ?> columns">
              <?php get_template_part('parts/term-list'); ?>
            </div>
            <?php
          endif;
          ?>
          <!-- END TAX NAV -->

          <!-- START CHART -->
          <?php
          if($has_chart) :
            $data_columns = 'twelve';
            if(!$is_tax && $taxonomy)
              $data_columns = 'eight';
            ?>
            <div class="<?php echo $data_columns; ?> columns">
              <?php
              if($terms) :
                // Case for charts for each custom taxonomy data
                foreach($terms as $term) :
                  $tax_query = array(
                    array(
                      'taxonomy' => $term->taxonomy,
                      'terms' => $term->term_id
                    )
                  );
                  $data_query = clade_get_data_query($theme_id, $tax_query);
                  ?>
                  <div id="data-<?php the_ID(); ?>" class="term-item" data-termid="<?php echo $term->term_id; ?>">
                    <?php if(count($terms) > 1) : ?>
                      <h4><?php echo $term->name; ?></h4>
                    <?php endif; ?>
                    <?php if($data_query->have_posts()) : ?>
                      <?php get_template_part('parts/chart'); ?>
                    <?php else : ?>
                      <p><?php _e('There\'s not enough data to display', 'clade'); ?></p>
                    <?php endif; ?>
                  </div>
                <?php
                endforeach;
              elseif($rows || $cols) :
                // Case for charts with table layout
                $tax_queries = clade_get_tree_nav_tax_queries($theme_id);
                foreach($tax_queries as $tax_query) :
                  $data_query = clade_get_data_query($theme_id, array($tax_query));
                  ?>
                  <div class="term-item" data-categories="<?php echo implode(',', $tax_query['terms']); ?>">
                    <?php if($data_query->have_posts()) : ?>
                      <?php get_template_part('parts/chart'); ?>
                    <?php else : ?>
                      <p><?php _e('There\'s not enough data to display', 'clade'); ?></p>
                    <?php endif; ?>
                  </div>
                  <?php
                endforeach;
              else :
                // Case for one chart (one data for the theme)
                $data_query = clade_get_data_query($theme_id);
                ?>
                <div class="term-item">
                  <?php if($data_query->have_posts()) : ?>
                    <?php get_template_part('parts/chart'); ?>
                  <?php else : ?>
                    <p><?php _e('There\'s not enough data to display', 'clade'); ?></p>
                  <?php endif; ?>
                </div>
                <?php
              endif;
              ?>
            </div>
            <?php
          endif;
          ?>
          <!-- END CHART -->
        </div>
        <!-- START TABLE -->
        <?php
        if(!$has_chart && !$taxonomy && !$is_tax && ($rows || $cols)) :
          $data_query = clade_get_data_query($theme_id);
          get_template_part('parts/table');
        endif;
        ?>
        <!-- END TABLE -->
        <!-- DOWNLOAD BUTTONS -->
        <?php
        if(!$has_chart && !$taxonmy && !$is_tax && !($rows || $cols)) :
          $data_query = clade_get_data_query($theme_id);
          if($data_query->have_posts()) :
            while($data_query->have_posts()) :
              $data_query->the_post();
              clade_data_download_button();
              wp_reset_postdata();
            endwhile;
          endif;
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
