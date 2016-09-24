<?php

/*
* CLADE
* Data Collections
*/

class Clade_Data_Collections {

  function __construct() {
    add_action('init', array($this, 'register_post_type'));
  }

  function register_post_type() {
    $labels = array(
      'name'               => _x( 'Data collections', 'post type general name', 'clade' ),
      'singular_name'      => _x( 'Data collection', 'post type singular name', 'clade' ),
      'menu_name'          => _x( 'Data collections', 'admin menu', 'clade' ),
      'name_admin_bar'     => _x( 'Data collection', 'add new on admin bar', 'clade' ),
      'add_new'            => _x( 'Add new', 'data collection', 'clade' ),
      'add_new_item'       => __( 'Add new data collection', 'clade' ),
      'new_item'           => __( 'New data collection', 'clade' ),
      'edit_item'          => __( 'Edit data collection', 'clade' ),
      'view_item'          => __( 'View data collection', 'clade' ),
      'all_items'          => __( 'All data collections', 'clade' ),
      'search_items'       => __( 'Search data collections', 'clade' ),
      'parent_item_colon'  => __( 'Parent data collections:', 'clade' ),
      'not_found'          => __( 'No data collections found.', 'clade' ),
      'not_found_in_trash' => __( 'No data collections found in trash.', 'clade' )
    );
    $args = array(
      'labels'             => $labels,
      'description'        => __( 'CLADE Data Collections', 'clade' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'data-collections' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title' )
    );
    register_post_type( 'data-collection', $args );
  }

}

$clade_data_collections = new Clade_Data_Collections();
