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

    <div class="columns is-multiline is-marginless is-paddingless">
        <div class="column is-8 is-offset-2 ">
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
    <h1 style="    margin: 3rem;">
    <span class="header_span">
        Derniers articles :
    </span>
    </h1>
    <div class="columns is-marginless is-paddingless">
        <div class="column is-8 is-offset-2 ">
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
