<?php

/*
* CLADE
* Themes
*/

class Clade_Themes {

  function __construct() {
    add_action('init', array($this, 'register_theme_post_type'));
    add_action('init', array($this, 'register_theme_group_post_type'));
    add_action('init', array($this, 'register_theme_group_taxonomy'));
    add_action('pre_get_posts', array($this, 'pre_get_posts'));
    add_shortcode('theme', array($this, 'theme_shortcode'));
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
    register_post_type( 'data-theme', $args );
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

  function register_theme_group_taxonomy() {
    $labels = array(
      'name'              => _x( 'Theme group categories', 'taxonomy general name', 'clade' ),
      'singular_name'     => _x( 'Theme group category', 'taxonomy singular name', 'clade' ),
      'search_items'      => __( 'Search theme group categories', 'clade' ),
      'all_items'         => __( 'All theme group categories', 'clade' ),
      'parent_item'       => __( 'Parent theme group category', 'clade' ),
      'parent_item_colon' => __( 'Parent theme group category:', 'clade' ),
      'edit_item'         => __( 'Edit theme group category', 'clade' ),
      'update_item'       => __( 'Update theme group category', 'clade' ),
      'add_new_item'      => __( 'Add new theme group category', 'clade' ),
      'new_item_name'     => __( 'New theme group category name', 'clade' ),
      'menu_name'         => __( 'Theme group categories', 'clade' ),
    );
    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'theme-group-category' ),
    );
    register_taxonomy( 'theme-group-category', array( 'theme-group' ), $args );
  }


  function get_theme($post_id = false) {
    global $post;
    $post_id = $post_id ? $post_id : $post->ID;

    global $theme_id;
    $theme_id = $post_id;
    $post = get_post($post_id);
    $color = get_field('color');
    ob_start();
    ?>
    <section class="page-content theme-group-item theme-shortcode">
      <div class="page-section">
        <div class="section-content">
          <div class="container">
            <div class="twelve columns">
              <h3 style="background-color: <?php echo $color; ?>">
                <?php the_title(); ?>
              </h3>
            </div>
          </div>
          <?php get_template_part('parts/theme-item'); ?>
        </div>
      </div>
    </section>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
  }

  function theme_shortcode($atts) {
    $atts = shortcode_atts(array(
      'id' => false
    ), $atts, 'theme');

    return $this->get_theme($atts['id']);
  }

  function pre_get_posts($query) {

    if($query->get('post_type') == 'theme-group' || $query->get('post_type') == array('theme-group')) {
      $query->set('order_by', 'menu_order');
      $query->set('order', 'ASC');
    }

  }


}

$clade_themes = new Clade_Themes();
