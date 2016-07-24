<?php

function clade_setup_theme() {

  load_theme_textdomain('clade', get_template_directory() . '/languages');

  add_theme_support( 'custom-header' );
  add_theme_support( 'post-thumbnails' );

  // add_image_size('wide-thumbnail', 400, 225, true);
  // add_image_size('highlight', 860, 392, true);

  register_nav_menus(array(
    'header_nav' => __('Header navigation', 'clade'),
    'footer_nav' => __('Footer navigation', 'clade')
  ));

}
add_action('after_setup_theme', 'clade_setup_theme');

function clade_scripts() {

  wp_register_style('normalize', get_template_directory_uri() . '/assets/skeleton/css/normalize.css');
  wp_register_style('skeleton', get_template_directory_uri() . '/assets/skeleton/css/skeleton.css');
  wp_register_style('fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('normalize', 'skeleton', 'fontawesome'), '0.0.1');

  wp_register_script('highcharts', get_template_directory_uri() . '/assets/highcharts/highcharts.js', array('jquery'));
  wp_register_script('fitvids', get_template_directory_uri() . '/assets/jquery.fitvids/jquery.fitvids.js', array('jquery'));
  wp_register_script('site', get_template_directory_uri() . '/js/site.js', array('jquery', 'highcharts', 'fitvids'), '0.0.1');

  wp_enqueue_style('main');
  wp_enqueue_script('site');
}
add_action('wp_enqueue_scripts', 'clade_scripts');

function clade_get_countries() {
  return array(
    'ar' => __('Argentina', 'clade'),
    'bo' => __('Bolivia', 'clade'),
    'br' => __('Brazil', 'clade'),
    'cl' => __('Chile', 'clade'),
    'co' => __('Colombia', 'clade'),
    'cr' => __('Costa Rica', 'clade'),
    'cu' => __('Cuba', 'clade'),
    'ec' => __('Ecuador', 'clade'),
    'sv' => __('El Salvador', 'clade'),
    'gt' => __('Guatemala', 'clade'),
    'ht' => __('Haiti', 'clade'),
    'hn' => __('Honduras', 'clade'),
    'mx' => __('México', 'clade'),
    'ni' => __('Nicaragua', 'clade'),
    'pa' => __('Panamá', 'clade'),
    'py' => __('Paraguay', 'clade'),
    'pe' => __('Peru', 'clade'),
    'do' => __('Republica Dominicana', 'clade'),
    'uy' => __('Uruguay', 'clade'),
    've' => __('Venezuela', 'clade')
  );
}

/**
 * Get first paragraph from a WordPress post. Use inside the Loop.
 *
 * @return string
 */
function get_first_paragraph() {
	global $post;

	$str = apply_filters( 'the_content', get_the_content() );
	$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
	$str = strip_tags($str, '<a><strong><em>');
	return '<p>' . $str . '</p>';
}

function get_content_without_first_paragraph() {
  global $post;
  $content = apply_filters('the_content', $post->post_content);
  return str_replace(get_first_paragraph(), '', $content);
}
