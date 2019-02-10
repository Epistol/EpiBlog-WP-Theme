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
<html <?php language_attributes(); ?> class="">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" rel="stylesheet">
    <link href="<?= get_template_directory_uri(); ?>/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Icon in the highest resolution we need it for -->
    <link rel="icon" sizes="192x192" href="<?= get_template_directory_uri(); ?>/img/favicon.png">
    <meta name="google-site-verification" content="upkTmLxNKht1MSf9tfx4QzbjSiZHGnDQF82i8DoWLdU"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-39203770-7"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-39203770-7');
    </script>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <!--	<a class="skip-link screen-reader-text" href="#content">-->
            <?php //esc_html_e( 'Skip to content', 'epiblog' ); ?><!--</a>-->
            <header id="masthead" class="site-header">
                <nav class="navbar" role="navigation" aria-label="main navigation">

                    <div class="container">

                        <div class="navbar-brand">
                            <?php
                            the_custom_logo();
                            //				    if ( is_front_page() && is_home() ) :
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" id="<?php bloginfo('name'); ?>">
                                <figure class="image is-logo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/blog_design_logo.svg">
                                </figure>
                            </a>

                            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                               data-target="navbarBasicExample">
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="navbar-menu">
                            <div class="navbar-start">
                                <?php
                                wp_nav_menu(array(
                                    'walker' => new Nav_Footer_Walker(),
                                    'depth' => 2,
                                    'container' => false,
                                    'menu_class' => 'navbar-menu',
                                    'menu_id' => 'primary-menu',
                                    'theme_location' => 'menu-1',
                                    'after' => "</div>",
                                ));
                                ?>
                            </div>
                            <div class="navbar-end">
                                <div class="navbar-item">
                                    <form role="search" method="get" id="searchform" action="<?= get_site_url() ?>">
                                        <div class="field">
                                            <p class="control has-icons-left" style="margin-bottom: 0px; line-height: 2.3rem;">
                                                <input type="text" class="input" value="" placeholder="Recherche" name="s"
                                                       id="s"/>
                                                <span class="icon is-small is-left">
                                                     <i class="fas fa-search"></i>
                                                </span>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                                <div class="navbar-item  jetpack_widget_social_icons">
                                    <?php include('sociaux.php'); ?>
                                </div>
                            </div>

                </nav><!-- #site-navigation -->
            </header><!-- #masthead -->
        </div>
    </div>
    <div id="content" class="site-content">
