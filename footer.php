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
<div style="/*min-width: 100vh*/;">
    <img src="<?= get_template_directory_uri() ?>/img/footer-01.svg"/>
</div>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="site-info">
                    <a href="<?php echo esc_url(__('https://wordpress.org/', 'epiblog')); ?>">
                        <?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        printf(esc_html__('Proudly powered by %s', 'epiblog'), 'WordPress');
                        ?>
                    </a>
                    <span class="sep"> | </span>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf(esc_html__('Theme: %1$s by %2$s.', 'epiblog'), 'epiblog', '<a href="https://epistol.fr">Epistol</a>');
                    ?>
                </div><!-- .site-info -->

            </div>
            <div class="column">
                This site is protected by reCAPTCHA and the Google
                <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                <a href="https://policies.google.com/terms">Terms of Service</a> apply.
            </div>
            <div class="column"></div>
        </div>
    </div>
</footer><!-- #colophon -->
<script type='text/javascript' src='<?= get_template_directory_uri() ?>/js/waypoints/lib/jquery.waypoints.js'></script>
<script type='text/javascript'
        src='<?= get_template_directory_uri() ?>/js/waypoints/lib/shortcuts/sticky.min.js'></script>
<?php wp_footer(); ?>

</body>
</html>
