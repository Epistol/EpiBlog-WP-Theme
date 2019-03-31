<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Epistol_Blog
 */

?>
<div class="column rezos is-paddingless ">
	<?php // the_ID(); ?>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= the_title(); ?>  <?= esc_url(get_permalink()); ?>
<?php
	$tags_list = get_the_tags();
	if($tags_list) {
		foreach($tags_list as $tag) {
			echo '%20%23' . $tag->name . ' ';
		}
	}
	?>

">
        <div class="fb icon">
            <i class="fab fa-facebook-f"></i>
        </div>
    </a>


    <a href="https://twitter.com/home?status=<?= the_title(); ?>  <?= esc_url(get_permalink()); ?>
<?php
	$tags_list = get_the_tags();
	if($tags_list) {
		foreach($tags_list as $tag) {
			echo '%20%23' . $tag->name . ' ';
		}
	}
	?>

">
        <div class="twitter icon">
            <i class="fab fa-twitter"></i>
        </div>
    </a>


</div>
