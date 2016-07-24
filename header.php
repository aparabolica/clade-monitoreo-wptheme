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
  <header id="masthead">
    <div class="container">
      <div class="twelve columns">
        <div class="brand">
          <h1>
            <span class="first">Sistema de Monitoreo</span><br/>
            <span class="second">del Financiamiento<br/> del Derecho Humano</span><br/>
            <span class="third">a la Educación en América Latina y el Caribe</span>
          </h1>
        </div>
        <?php
        /*
        <nav>
          <?php wp_nav_menu(array('theme_location' => 'header_nav')); ?>
          <form class="search" action="<?php echo home_url('/'); ?>">
            <a href="#"><span class="fa fa-search"></span></a>
            <input type="text" name="s" placeholder="<?php _e('Search anything...', 'arp'); ?>" value="<?php if(isset($_GET['s'])) echo $_GET['s']; ?>" />
          </form>
          <?php if(function_exists('qtranxf_generateLanguageSelectCode')) : ?>
            <div class="language-selector">
              <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
            </div>
          <?php endif; ?>
        </nav>
        */
        ?>
      </div>
    </div>
  </header>
