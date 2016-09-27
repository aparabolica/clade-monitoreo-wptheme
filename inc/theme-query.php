<?php

function clade_get_data_query($theme_id, $tax_query = false) {
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
  if($tax_query) {
    $args['tax_query'] = $tax_query;
  }
  return new WP_Query($args);
}

function clade_get_tree_nav_tax_queries($post_id = false) {
  global $post;
  $post_id = $post_id ? $post_id : $post->ID;

  $rows = get_field('table_rows', $post_id);
  $cols = get_field('table_columns', $post_id);

  $tax_queries = array();

  if($rows) {
    if($cols) {
      foreach($rows as $row) {
        foreach($cols as $col) {
          $tax_queries[] = array(
            'taxonomy' => 'data-category',
            'terms' => array($col->term_id, $row->term_id),
            'operator' => 'AND'
          );
        }
      }
    } else {
      foreach($rows as $row) {
        $tax_queries[] = array(
          'taxonomy' => 'data-category',
          'terms' => array($row->term_id)
        );
      }
    }
  } elseif($cols) {
    foreach($cols as $col) {
      $tax_queries[] = array(
        'taxonomy' => 'data-category',
        'terms' => array($col->term_id)
      );
    }
  }

  return $tax_queries;
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
