<?php

/*
* CLADE
* Countries
*/

class Clade_Countries {

  function __construct() {
    add_action('init', array($this, 'register_taxonomy'));
    add_shortcode('country_list', array($this, 'country_list_shortcode'));
  }

  function register_taxonomy() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'              => _x( 'Countries', 'taxonomy general name', 'clade' ),
      'singular_name'     => _x( 'Country', 'taxonomy singular name', 'clade' ),
      'search_items'      => __( 'Search countries', 'clade' ),
      'all_items'         => __( 'All countries', 'clade' ),
      'parent_item'       => __( 'Parent country', 'clade' ),
      'parent_item_colon' => __( 'Parent country:', 'clade' ),
      'edit_item'         => __( 'Edit country', 'clade' ),
      'update_item'       => __( 'Update country', 'clade' ),
      'add_new_item'      => __( 'Add new country', 'clade' ),
      'new_item_name'     => __( 'New country name', 'clade' ),
      'menu_name'         => __( 'Countries', 'clade' ),
    );
    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'country' ),
    );
    register_taxonomy( 'country', array( 'data-collection' ), $args );
  }

  function country_list_shortcode($atts) {
    $atts = shortcode_atts(array(
      'title' => false
    ), $atts, 'country_list');
    ob_start();
    ?>
    </div></div>
    <div class="country-list-shortcode">
    <?php
    $this->country_list($atts['title']);
    ?>
    </div>
    <div class="container"><div class="eight columns offset-by-one">
    <?php
    return ob_get_clean();
  }

  function country_list($title = false) {
    ?>
    <section id="countries">
      <div class="container">
        <div class="twelve columns">
          <div class="page-section">
            <?php if($title) : ?>
              <div class="section-title">
                <h2><?php echo $title; ?></h2>
              </div>
            <?php endif; ?>
            <div class="section-content">
              <?php
              $countries = get_terms('country', array(
                'hide_empty' => false
              ));
              ?>
              <ul class="term-list">
                <?php
                foreach($countries as $country) :
                  $thumb = get_field('thumbnail', 'country_' . $country->term_id);
                  ?>
                  <li style="background-image: url(<?php echo $thumb; ?>);" title="<?php echo $country->term_title; ?>">
                    <a href="<?php echo get_term_link($country); ?>" title="<?php $country->name; ?>"></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
  }

}

$clade_countries = new Clade_Countries();

function clade_country_list() {
  global $clade_countries;
  $clade_countries->country_list();
}
