<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Epistol_Blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<!--	<a class="skip-link screen-reader-text" href="#content">--><?php //esc_html_e( 'Skip to content', 'epiblog' ); ?><!--</a>-->
    <div class="container">
        <header id="masthead" class="site-header">


            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
				    <?php
				    the_custom_logo();
				    if ( is_front_page() && is_home() ) :
					    ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="<?php bloginfo( 'name' ); ?>">
                            <figure class="image is-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/blog_design_logo.svg">
                            </figure>

                        </a>
				    <?php
				    else :
					    ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="<?php bloginfo( 'name' ); ?>">
                            <figure class="image is-logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/blog_design_logo.svg">
                            </figure>

                        </a>
				    <?php
				    endif;
				    $epiblog_description = get_bloginfo( 'description', 'display' );
				    if ( $epiblog_description || is_customize_preview() ) :
					    ?>
                        <!--                        <p class="site-description">--><?php //echo $epiblog_description; /* WPCS: xss ok. */ ?><!--</p>-->
				    <?php endif; ?>

                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'epiblog' ); ?></button>


			    <?php

			    wp_nav_menu(array('items_wrap'=> '%3$s', 'walker' => new Nav_Footer_Walker(), 'container'=>false, 'menu_class' => '', 'theme_location'=>'menu-1', 'fallback_cb'=>false ));

			    /*
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class' => 'navbar-start',
					'container'       => false,
					'echo'            => false,
					'items_wrap'      => '%3$s',
					'depth'           => 0,
				) );*/
			    ?>
            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->
    </div>

	<div id="content" class="site-content container">
