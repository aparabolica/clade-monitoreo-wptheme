<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php
  $head_css = '';
  $head_image = get_header_image();
  if(is_front_page() && $head_image)
    $head_css = 'style="background-image:url(' . $head_image . ')"';
  ?>
  <header id="masthead" <?php echo $head_css; ?>>
    <div class="container">
      <div class="twelve columns">
        <div class="brand">
          <h1>
            <a href="<?php echo home_url('/'); ?>">
              <span class="first">Sistema de Monitoreo</span><br/>
              <span class="second">del Financiamiento<br/> del Derecho Humano a la Educación</span><br/>
              <span class="third">en América Latina y el Caribe</span>
            </a>
          </h1>
        </div>
        <nav>
          <?php wp_nav_menu(array('theme_location' => 'header_nav')); ?>
          <?php
          /*
          <form class="search" action="<?php echo home_url('/'); ?>">
            <a href="#"><span class="fa fa-search"></span></a>
            <input type="text" name="s" placeholder="<?php _e('Search anything...', 'arp'); ?>" value="<?php if(isset($_GET['s'])) echo $_GET['s']; ?>" />
          </form>
          <?php if(function_exists('qtranxf_generateLanguageSelectCode')) : ?>
            <div class="language-selector">
              <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
            </div>
          <?php endif; ?>
          */
          ?>
        </nav>
        <div class="clade hide-if-mobile">
          <img class="vertical" src="<?php echo get_template_directory_uri(); ?>/img/logo-clade-vertical.png" />
          <img class="horizontal" src="<?php echo get_template_directory_uri(); ?>/img/logo-clade-horizontal.png" />
        </div>
      </div>
    </div>
  </header>
