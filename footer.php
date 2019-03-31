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
                <div class="presentation">
                    <h5>Epistol.fr</h5>

                    <p>Bienvenue sur mon blog dédié aux sujets liés au webdev, principalement Laravel et PHP, mais
                        aussi du web en général.
                    </p>
                    <p>
                        Je travaille principalement avec PHP / Laravel - en entreprise mais également sur mes propres
                        projets, sites et services.
                    </p>
                    <p>
                        En savoir <a href="/about"> plus ici</a>.
                    </p>
                    <p>
                        Si vous avez besoin d'aide en développement Web (en particulier Laravel), vous pouvez <a href="/contact">me contacter sur ce formulaire</a>.</p>
                </div>


            </div>
            <div class="column is-2 is-offset-1">

                <div class="navigation_footer">
                    <h5>Navigation</h5>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/sitemap">Sitemap</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/about">A propos</a></li>
                    </ul>
                </div>


            </div>
            <div class="column">
                <i class="fas fa-rss"></i> Flux RSS
                <br/>

                This site is protected by reCAPTCHA and the Google
                <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                <a href="https://policies.google.com/terms">Terms of Service</a> apply.

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
        </div>
    </div>
</footer><!-- #colophon -->
<script type='text/javascript' src='<?= get_template_directory_uri() ?>/js/waypoints/lib/jquery.waypoints.js'></script>
<script type='text/javascript'
        src='<?= get_template_directory_uri() ?>/js/waypoints/lib/shortcuts/sticky.min.js'></script>
<?php wp_footer(); ?>

</body>
</html>
