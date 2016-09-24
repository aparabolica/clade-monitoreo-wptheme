<?php

/*
* CLADE
* Countries
*/

class Clade_Countries {

  function __construct() {
    add_action('init', array($this, 'register_taxonomy'));
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

}

$clade_countries = new Clade_Countries();
