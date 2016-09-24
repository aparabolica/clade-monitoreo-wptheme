<?php

function clade_get_data_query($theme_id, $taxonomy, $term = false) {
  $args = array(
    'posts_per_page' => -1,
    'post_type' => 'data-collection',
    'meta_query' => array(
      array(
        'key' => 'theme',
        'value' => $theme_id
      )
    )
  );
  if($taxonomy) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => $term->taxonomy,
        'terms' => $term->term_id
      )
    );
  }
  return new WP_Query($args);
}

class CLADE_Theme_Query {

  public $config;

  function init() {
    $this->config = array();
  }

  public function __construct($config = '') {
    $this->init();
    $this->config = wp_parse_args($config);
  }

  public function set($config_var, $value) {
    $this->config[$config_var] = $value;
  }

}
