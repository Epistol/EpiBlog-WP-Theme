<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Epistol_Blog
 */

?>

	</div><!-- #content -->


</div><!-- #page -->
<img src="<?= get_template_directory_uri()?>/img/footer-01.svg" />

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'epiblog' ) ); ?>">
					    <?php
					    /* translators: %s: CMS name, i.e. WordPress. */
					    printf( esc_html__( 'Proudly powered by %s', 'epiblog' ), 'WordPress' );
					    ?>
                    </a>
                    <span class="sep"> | </span>
				    <?php
				    /* translators: 1: Theme name, 2: Theme author. */
				    printf( esc_html__( 'Theme: %1$s by %2$s.', 'epiblog' ), 'epiblog', '<a href="https://epistol.fr">Epistol</a>' );
				    ?>
                </div><!-- .site-info -->

            </div>
            <div class="column"></div>
            <div class="column"></div>
        </div>

    </div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>
</html>
