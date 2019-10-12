<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Paw_Wow
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="banner">
		<div class="banner-image">
			<?php the_post_thumbnail('full'); ?>
		</div>
		<div class="banner-text">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
	</div>
	<div class="entry-content">
	
		<?php

		if (function_exists('get_field')) :
			if (get_field('sub_title')) : ?>
			<section>
			<h3><?php the_field('sub_title'); ?></h3></section>
			<?php endif;
		endif; 

		if (function_exists('get_field')) :
			if (get_field('description')) : ?>
			<section><p><?php the_field('description'); ?></p></section>
			<?php endif;
		endif; 

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pawwow' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php pawwow_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
