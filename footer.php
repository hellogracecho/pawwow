<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paw_Wow
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

	<?php
		echo "<div class='contact-link'>";
		if (function_exists("get_field")) :
			if ( !is_page('contact')) : ?>
			<a href="<?php echo get_permalink( get_page_by_path( 'contact' )) ?>">Contact Us</a>
		<?php endif;
		endif;
		echo "</div>";
		?>

		<div class="footer-container">
			<div class="company-info">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-company-info',
					'menu_id'        => 'footer-company-info',
				) );
				?>
			</div>
			<div class="footer-contact">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-contact',
					'menu_id'        => 'footer-contact',
				) );
				?>
			</div>
			<div class="footer-sitemap">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-sitemap',
					'menu_id'        => 'footer-sitemap',
				) );
				?>
			</div>
		</div>
		<div class="site-credit">
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( '&copy; %1$s 2019 %2$s.', 'pawwow' ), '', '<a href="https://hellogracecho.com/">Grace Cho</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
