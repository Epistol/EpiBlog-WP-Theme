<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Epistol_Blog
 */

get_header();
?>
    <div class="columns" style="margin-left: 10%;margin-right: 10%;">
    <div class="column is-9 ">
    <div id="primary" class="content-area">
    <main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
                echo "<div class='comments'>";
				comments_template();
				echo "</div>";
			endif;

		endwhile; // End of the loop.
		?>

    </main><!-- #main -->
    </div><!-- #primary -->
    </div>
        <div class="column">
		    <?php get_sidebar();
		    ?>
        </div>
    </div>

<?php
get_footer();
