<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Paw_Wow
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main contact">
			<h1>Contact Us</h1>
		<section class="general-message">
		<?php if (function_exists('get_field')) {
				$field = get_field_object('general_message');
				if ( $field ) { ?>
					<p><?php the_field('general_message'); ?></p>
				<?php }
			}?>	
		</section>
		<section class="map">
			<div class="map-image">
			<?php 
			$image = get_field('map_image');
			if( !empty( $image ) ): ?>
				<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>
			</div>
			<div class="map-info">
				<h2>Visit Us</h2>
			<?php the_field('map_info'); ?>
			</div>
		</section>
		<section class="contact-form">
		<?php $posts = get_field('contact_form');
		if( $posts ): 
			echo "<h2>Get in touch</h2>";
			foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) 
			$cf7_id= $p->ID;
			echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
			endforeach;
		endif; ?>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
