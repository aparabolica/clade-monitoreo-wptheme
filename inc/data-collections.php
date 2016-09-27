<?php

/*
* CLADE
* Data Collections
*/

class Clade_Data_Collections {

  function __construct() {
    add_action('init', array($this, 'register_post_type'));
    add_action('init', array($this, 'register_taxonomy'));

    add_filter('manage_posts_columns', array($this, 'admin_columns'));
    add_action('manage_posts_custom_column', array($this, 'admin_columns_content'), 10, 2);
  }

  function admin_columns($defaults) {
    global $wp_query;
    if($wp_query->get('post_type') == 'data-collection') {
      $columns = array();
      foreach($defaults as $key => $title) {
        // Replace title for theme
        if($key !== 'title') {
          $columns[$key] = $title;
        } else {
          $columns['theme'] = __('Theme', 'clade');
        }
        // Files after date
        if($key == 'date')
          $columns['files'] = __('Files', 'clade');
      }
      $defaults = $columns;
    }
    return $defaults;
  }

  function admin_columns_content($column_name, $post_id) {
    if($column_name == 'theme') {
      $theme = get_field('theme', $post_id);
      echo get_the_title($theme->ID);
    }
    if($column_name == 'files') {
      $files = array(
        'pdf' => get_field('pdf', $post_id),
        'csv' => get_field('csv', $post_id)
      );
      foreach($files as $format => $file) {
        if($file) {
          echo '<a class="button" href="' . $file['url'] . '">' . $format . '</a> ';
        }
      }
    }
  }

  function get_data_categories_ids($post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;

    $terms = get_the_terms($post_id, 'data-category');
    $ids = array();
    foreach($terms as $term) {
      $ids[] = $term->term_id;
    }
    return $ids;
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
      'edit_item'          => __( 'Edit data collection item', 'clade' ),
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
      'supports'           => array('excerpt')
    );
    register_post_type( 'data-collection', $args );
  }

  function register_taxonomy() {

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
      'name'                       => _x( 'Data categories', 'taxonomy general name', 'clade' ),
      'singular_name'              => _x( 'Data category', 'taxonomy singular name', 'clade' ),
      'search_items'               => __( 'Search data categories', 'clade' ),
      'popular_items'              => __( 'Popular data categories', 'clade' ),
      'all_items'                  => __( 'All data categories', 'clade' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit data category', 'clade' ),
      'update_item'                => __( 'Update data category', 'clade' ),
      'add_new_item'               => __( 'Add New data category', 'clade' ),
      'new_item_name'              => __( 'New data category Name', 'clade' ),
      'separate_items_with_commas' => __( 'Separate writers with commas', 'clade' ),
      'add_or_remove_items'        => __( 'Add or remove writers', 'clade' ),
      'choose_from_most_used'      => __( 'Choose from the most used writers', 'clade' ),
      'not_found'                  => __( 'No writers found.', 'clade' ),
      'menu_name'                  => __( 'Data categories', 'clade' ),
    );

    $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'data-category' ),
    );

    register_taxonomy( 'data-category', 'data-collection', $args );

  }

}

$clade_data_collections = new Clade_Data_Collections();

function clade_get_data_categories_ids($post_id = false) {
  global $clade_data_collections;
  return $clade_data_collections->get_data_categories_ids($post_id);
}
