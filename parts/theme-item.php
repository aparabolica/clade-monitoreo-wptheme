<?php
global $wp_the_query;
global $theme_id, $terms, $term, $data_query;
$group_type = get_field('group_type');
if($group_type == 'taxonomy') :
  // Taxonomy filterable terms
  $taxonomy = get_field('taxonomy')[0];
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
  $has_chart = get_field('has_chart');
  ?>
  <div class="container">
    <div class="twelve columns">
      <div class="theme-content">

        <?php
        /*
         * ** FIX **
         * -----------------------------------------
         * GROUP TYPE IS NOT FUNCTIONAL,
         * SHOULD WORK WITH BOTH TAX AND TREE NAV
         * NOT ONE OR THE OTHER
         * -----------------------------------------
         * Add tree nav if has chart and/or tax nav
         * DUMMY CONTENT BELOW
         */
        ?>
        <!-- START TREE NAV -->
        <?php if($group_type == 'tree_nav' && ($has_chart || (!$is_tax && $taxonomy))) : ?>
          <nav class="tree-nav">
            <div class="clearfix">
              <div class="tree-01 tree-item">
                <a href="#" class="active">Millones de dólares (US$)</a>
                <a href="#">Millones de Unidad Monetaria Nacional (UMN)</a>
              </div>
              <div class="tree-01 tree-item">
                <a href="#" class="active">Precios corrientes</a>
                <a href="#">Precios constantes (de 2005)</a>
              </div>
            </div>
            <div class="general-download">
              <p>
                <a class="button button-small">
                  <span class="fa fa-download"></span>
                  Descargar todos los datos
                </a>
              </div>
          </nav>
        <?php endif; ?>
        <!--- END TREE NAV -->

        <div>
          <!-- START TAX NAV -->
          <?php
          if(!$is_tax) :
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
          $data_columns = 'twelve';
          if(!$is_tax)
            $data_columns = 'eight';
          ?>
          <div class="<?php echo $data_columns; ?> columns">
            <?php
            if($has_chart) :
              // Loop through each term to display data
              foreach($terms as $term) :
                $data_query = clade_get_data_query($theme_id, $taxonomy, $term);
                ?>
                <div class="term-item">
                  <?php if(count($terms) > 1) : ?>
                    <h4><?php echo $term->name; ?></h4>
                  <?php endif; ?>
                  <?php if($data_query->have_posts()) : ?>
                    <?php get_template_part('parts/chart'); ?>
                  <?php else : ?>
                    <p>No data was found.</p>
                  <?php endif; ?>
                </div>
              <?php
              endforeach;
            endif;
            ?>
          </div>
          <!-- END CHART -->
        </div>
        <?php
        /* ** FIX **
         * Add table layout for tree nav if no chart AND no country list
         */
        ?>
        <!-- START TABLE -->
        <?php
        if($group_type == 'tree_nav' && !$has_chart && !$taxonomy && !$is_tax) :
          get_template_part('parts/table');
        endif;
        ?>
        <!-- END TABLE -->
      </div>
    </div>
  </div>
  <?php
endif;
?>
