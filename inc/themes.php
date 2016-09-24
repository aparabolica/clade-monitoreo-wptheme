<?php

/*
* CLADE
* Themes
*/

class Clade_Themes {

  function __construct() {
    add_action('init', array($this, 'register_theme_post_type'));
    add_action('init', array($this, 'register_theme_group_post_type'));
  }

  function register_theme_post_type() {
    $labels = array(
      'name'               => _x( 'Themes', 'post type general name', 'clade' ),
      'singular_name'      => _x( 'Theme', 'post type singular name', 'clade' ),
      'menu_name'          => _x( 'Themes', 'admin menu', 'clade' ),
      'name_admin_bar'     => _x( 'Theme', 'add new on admin bar', 'clade' ),
      'add_new'            => _x( 'Add new', 'theme', 'clade' ),
      'add_new_item'       => __( 'Add new theme', 'clade' ),
      'new_item'           => __( 'New theme', 'clade' ),
      'edit_item'          => __( 'Edit theme', 'clade' ),
      'view_item'          => __( 'View theme', 'clade' ),
      'all_items'          => __( 'All themes', 'clade' ),
      'search_items'       => __( 'Search themes', 'clade' ),
      'parent_item_colon'  => __( 'Parent themes:', 'clade' ),
      'not_found'          => __( 'No themes found.', 'clade' ),
      'not_found_in_trash' => __( 'No themes found in trash.', 'clade' )
    );
    $args = array(
      'labels'             => $labels,
      'description'        => __( 'CLADE Theme Groups', 'clade' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'themes' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title' )
    );
    register_post_type( 'theme', $args );
  }

  function register_theme_group_post_type() {
    $labels = array(
      'name'               => _x( 'Theme groups', 'post type general name', 'clade' ),
      'singular_name'      => _x( 'Theme group', 'post type singular name', 'clade' ),
      'menu_name'          => _x( 'Theme groups', 'admin menu', 'clade' ),
      'name_admin_bar'     => _x( 'Theme group', 'add new on admin bar', 'clade' ),
      'add_new'            => _x( 'Add new', 'theme group', 'clade' ),
      'add_new_item'       => __( 'Add new theme group', 'clade' ),
      'new_item'           => __( 'New theme group', 'clade' ),
      'edit_item'          => __( 'Edit theme group', 'clade' ),
      'view_item'          => __( 'View theme group', 'clade' ),
      'all_items'          => __( 'All theme groups', 'clade' ),
      'search_items'       => __( 'Search theme groups', 'clade' ),
      'parent_item_colon'  => __( 'Parent theme groups:', 'clade' ),
      'not_found'          => __( 'No theme groups found.', 'clade' ),
      'not_found_in_trash' => __( 'No theme groups found in trash.', 'clade' )
    );
    $args = array(
      'labels'             => $labels,
      'description'        => __( 'CLADE Theme Groups', 'clade' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'theme-groups' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'excerpt', 'page-attributes' )
    );
    register_post_type( 'theme-group', $args );
  }


}

$clade_themes = new Clade_Themes();
