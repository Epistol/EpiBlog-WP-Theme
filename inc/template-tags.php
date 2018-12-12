<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Epistol_Blog
 */

if(!function_exists('epiblog_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function epiblog_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if(get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf($time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x('%s', 'post date', 'epiblog'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<div class="posted-on column"><p>Posté le ' . $posted_on . '</p></div>'; // WPCS: XSS OK.

	}
endif;

if(!function_exists('epiblog_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function epiblog_posted_by()
	{
		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'epiblog'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if(!function_exists('epiblog_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function epiblog_entry_footer()
	{
		// Hide category and tag text for pages.
		if('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__('> ', 'epiblog'));
//			if($categories_list) {
//				/* translators: 1: list of categories. */
//				printf('<div class="cat-footer-links">' . esc_html__('%1$s', 'epiblog') . '</div>', $categories_list); // WPCS: XSS OK.
//			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'epiblog'));
			if($tags_list) {
				/* translators: 1: list of tags. */
				printf('<div class="tags-links"><span class="tag_header"> TAGS :</span> ' . esc_html__(' %1$s', 'epiblog') . '</div>', $tags_list); // WPCS: XSS OK.
			}
		}

		if(!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__('Voir les commentaires<span class="screen-reader-text"> on %s</span>', 'epiblog'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'epiblog'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);
	}
endif;
if(!function_exists('epiblog_category')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function epiblog_category()
	{
		// Hide category and tag text for pages.
		if('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = "<a href='".get_site_url()."'>Accueil</a> / " .get_the_category_list(esc_html__('/ ', 'epiblog'));
			if($categories_list) {
				/* translators: 1: list of categories. */
				printf('<div class="cat-links column">' . esc_html__('%1$s', 'epiblog') . '</div>', $categories_list); // WPCS: XSS OK.
			}
		}

	}
endif;
if(!function_exists('epiblog_ariane')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function epiblog_ariane()
	{
		// Hide category and tag text for pages.
		if('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			if(function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
			}

		}
	}
endif;

if(!function_exists('epiblog_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function epiblog_post_thumbnail()
	{
		if(post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if(is_singular()) :
			?>

			<?php
			$thumb = get_the_post_thumbnail_url(get_the_ID(),'full' ); ?>
			<a href="<?= esc_url(get_permalink()); ?>"><div class="image-class" style="background-image: url('<?php echo $thumb; ?>')"></div></a>

		<?php else : ?>

			<?php
			$thumb = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
            <a href="<?= esc_url(get_permalink()); ?>"><div class="image-class" style="background-image: url('<?php echo $thumb; ?>')"></div></a>
			<?php
			/*				the_post_thumbnail('post-thumbnail', array(
								'alt' => the_title_attribute(array(
									'echo' => false,
								)),
							));
							*/ ?>

		<?php
		endif; // End is_singular().
	}
endif;
if(!function_exists('epiblog_post_sticky_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function epiblog_post_sticky_thumbnail()
	{
		if(post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if(is_singular()) :
			?>

			<?php
			$thumb = get_the_post_thumbnail_url(); ?>
            <a href="<?= esc_url(get_permalink()); ?>"><div class="image-class mask sticky" style="background-image: url('<?php echo $thumb; ?>')"></div></a>

		<?php else : ?>

			<?php
			$thumb = get_the_post_thumbnail_url(); ?>
            <a href="<?= esc_url(get_permalink()); ?>"><div class="image-class mask sticky" style="background-image: url('<?php echo $thumb; ?>')"></div></a>
			<?php
			/*				the_post_thumbnail('post-thumbnail', array(
								'alt' => the_title_attribute(array(
									'echo' => false,
								)),
							));
							*/ ?>

		<?php
		endif; // End is_singular().
	}
endif;
