<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Epistol_Blog
 */

get_header();
?>
    <div class="container">

    <div class="columns">
        <div class="column is-8 is-offset-2">
            <?php
            if (have_posts()) :
            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
            <?php
            endif;

            /* Start the Loop */
            $count = 0;
            while (have_posts()) :
            the_post();
            if (is_sticky()) {
                get_template_part('template-parts/sticky', get_post_type());
            }
            else {
            if ($count <= 0) :
            ?>
        </div>
    </div>
    <div class=" index-menu-icons" id="index-menu-icons">
        <div class="columns is-mobile is-multiline  is-paddingless is-marginless">
            <div class="column has-text-centered" id="laravel">
                <a href="<?php get_site_url()?>?s=laravel">
                <p class="marginless"> <i class="fab fa-laravel fa-2x"></i></p>
                <p class="marginless brand-name">Laravel</p>
                </a>
            </div>
            <div class="column has-text-centered" id="vuejs">
                <a href="<?php get_site_url()?>?s=vuejs">
                <p class="marginless"> <i class="fab fa-vuejs fa-2x"></i></p>
                <p class="marginless brand-name">VueJS</p>
                </a>
            </div>
            <div class="column has-text-centered" id="wp">
                <a href="<?php get_site_url()?>?s=wordpress">
                <p class="marginless"><i class="fab fa-wordpress fa-2x"></i></p>
                <p class="marginless brand-name"> Wordpress</p>
                </a>
            </div>
            <div class="column has-text-centered" id="code">
                <a href="<?php get_site_url()?>?s=code">
                <p class="marginless"><i class="fas fa-code fa-2x"></i></p>
                <p class="marginless brand-name"> Code</p>
                </a>
            </div>
            <div class="column has-text-centered" id="art">
                <a href="<?php get_site_url()?>?s=design">
                <p class="marginless"> <i class="fas fa-palette fa-2x"></i> </p>
                <p class="marginless brand-name">Design</p>
                </a>
            </div>
        </div>
    </div>


    <div class="columns">
        <div class="column is-8 is-offset-2">
            <?php
            endif;
            get_template_part('template-parts/content', get_post_type());
            $count++;
            }

            endwhile;
            the_posts_navigation();
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>

        </div>
    </div>


<?php
get_footer();
