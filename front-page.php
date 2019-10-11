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
		<div class="front-slider">
			<?php 
			// ** Gallery Image Slider
			$images = get_field('image_sliders');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)`

			if( $images ): ?>
			<div class="slider slick-slider alignfull">
				<?php foreach( $images as $image ): ?>
				<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<!-- Insert LOGO -->
			<div  class="hero-text">
				<?php
				// ** Welcoming message
				if (function_exists('get_field')) :
					$field = get_field_object('welcoming_message_main_title');
					if ( $field ) { ?>
						<h1><?php echo $field[ 'value' ]; ?></h1>
					<?php }
				endif;
				
				if (function_exists('get_field')) :
					$field = get_field_object('welcoming_message_sub_title');
					if ( $field ) { ?>
						<h2><?php echo $field[ 'value' ]; ?></h2>
					<?php }
				endif;
				?>	
			</div>
		</div><!-- End of Slider -->
		<main id="main" class="site-main">
		<section class="who-we-are">
			<?php if (function_exists('get_field')) {
				$field = get_field_object('who_we_are');
				if ( $field ) { ?>
					<h2>About Us</h2>
					<p><?php echo $field[ 'value' ]; ?></p>
					<a href="<?php echo get_permalink( get_page_by_path( 'about' )) ?>">Learn More</a>
				<?php }
			}?>	
		</section><!-- End of Who -->
		<section class="feat-link">
		<?php 
		if ( get_field('featured_service') ) :
		$post_object = get_field('featured_service');

			if( $post_object ): 

			$post = $post_object;
			setup_postdata( $post ); 

			?>
			<div>
				<h2>Featured Service - <?php the_title(); ?></h2>
				<h3><?php the_content() ?></h3>
				<?php 
					if (function_exists('get_field')) :
						the_post_thumbnail('medium');
						if (get_field('description')) : ?>
						<p><?php echo custom_field_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>">Read More</a>
						<?php endif;
					endif; 				
				?>
			</div>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; 
		endif;?>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
