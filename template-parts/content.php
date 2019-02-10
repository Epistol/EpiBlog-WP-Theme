<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Epistol_Blog
 */

?>


        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="header_article">
                <header class="entry-header">
                    <?php


                    if(is_singular()) :
                        the_title('<h1 class="entry-title">', '</h1>');
                    else :
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif;

                    ?>
                </header><!-- .entry-header -->
                <?php epiblog_post_thumbnail();
                ?>

            </div>
            <div class="reste-article">
                <div class="entry-content">
                    <?php
                    if('post' === get_post_type()) :
                        ?>

                    <?php endif;
                    ?>
                    <?php
                    the_content(sprintf(wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('LIRE LA SUITE<span class="screen-reader-text"> "%s"</span>', 'epiblog'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ), get_the_title()));

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'epiblog'),
                        'after' => '</div>',
                    ));
                    ?>
                </div><!-- .entry-content -->
            </div>
            <footer class="entry-footer">
                <div class="columns is-marginless is-paddingless">
                    <?php epiblog_entry_footer(); ?>

                </div>
            </footer><!-- .entry-footer -->
        </article>


