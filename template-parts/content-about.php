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
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php pawwow_post_thumbnail(); ?>

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
	<section class="about-services">
	<?php if( have_rows('our_services') ): ?>

	<table class="service-table">
	<thead>
		<tr>
			<th>Service List</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<?php while( have_rows('our_services') ): the_row(); 
		// vars
		$service_name = get_sub_field('service_name');
		$service_description = get_sub_field('service_description');
		?>
		<tr class="one-service">
			<td><?php echo $service_name; ?></td>
			<td><?php echo $service_description; ?></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
	</table>

<?php endif; ?>
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
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
