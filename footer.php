<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Blank Theme
 */
?>

</div><!-- #content -->


<footer id="colophon" class="site-footer" role="contentinfo">

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>

		<div id="st-contact-us" class="st-content-wrapper">

			<h2 class="st-footer-head">Contact Us</h2>

			<div class="row">

				<?php dynamic_sidebar( 'sidebar-2' ); ?>

			</div>

		</div>

	<?php } ?>

	<div class="site-info row-container">
		<span class="blank-theme-copyright-text"><?php echo blank_theme_copyright_text(); ?></span>
		<span class="sep"> | </span>
		<a class="blank-theme-author-footer" href="<?php echo esc_url( 'https://github.com/rahul3883/simpletheme' ); ?>" target="_blank"><?php esc_html_e( 'Simple Theme', 'blank-theme' ); ?></a>
	</div><!-- .site-info -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
