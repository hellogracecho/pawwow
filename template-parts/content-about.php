<?php
/**
 * Template part for displaying page content in page.php
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
	<section class="about-general">
		<?php
			if (function_exists('get_field')) :
				$field = get_field_object('about_general');
				if ( $field ) { ?>
				<h2>About Us</h2>
					<p><?php echo $field[ 'value' ]; ?></p>
				<?php }
			endif;?>	
	</section>

	<section class="about-special">
	<?php 
		if ( get_field('our_special') ) :
		$post_object = get_field('our_special');

			if( $post_object ): 

			$post = $post_object;
			setup_postdata( $post ); 

			?>
			<div>
				<h2>Our Specialty - <?php the_title(); ?></h2>
				<div class="feat-sub-title"><?php the_content() ?></div>
				<div class="feat-service-conatiner">
					<span class="feat-image">
				<?php 
					if (function_exists('get_field')) :
						the_post_thumbnail('large');
						if (get_field('description')) : ?>
						</span>
						<span class="feat-content">
						<?php echo custom_field_excerpt(); ?>
						<a class="button" href="<?php the_permalink(); ?>">Read More</a>
						<?php endif;
					endif; 				
				?></span>
				</div>
			</div>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; 
		endif;?>
	</section>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
