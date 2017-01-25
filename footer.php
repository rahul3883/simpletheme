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
	<div class="st-content-wrapper">

		<h2 class="st-footer-head">Contact Us</h2>

		<div class="row">

			<?php

			global $st_customizer;

			$contact_head					= get_theme_mod( 'contact_head', $st_customizer['contact_head'] );
			$contact_text					= get_theme_mod( 'contact_text', $st_customizer['contact_text'] );
			$link_facebook				= get_theme_mod( 'link_facebook', $st_customizer['link_facebook'] );
			$link_twitter					= get_theme_mod( 'link_twitter', $st_customizer['link_twitter'] );
			$link_google_plus			= get_theme_mod( 'link_google_plus', $st_customizer['link_google_plus'] );
			$contact_website_name	= get_theme_mod( 'contact_website_name', $st_customizer['contact_website_name'] );
			$contact_website_link	= get_theme_mod( 'contact_website_link', $st_customizer['contact_website_link'] );
			$contact_number				= get_theme_mod( 'contact_number', $st_customizer['contact_number'] );
			$contact_email				= get_theme_mod( 'contact_email', $st_customizer['contact_email'] );

			?>

			<div class="large-6 medium-6 small-6 column">

				<h3 class="st-contact-head nomargin-bottom"><?php echo $contact_head; ?></h3>
				<p class="st-contact-text large-10 medium-10 small-10"><?php echo $contact_text; ?></p>

				<div class="st-social-links">
					<a href="<?php echo $link_facebook; ?>">
						<img src="<?php echo BLANK_THEME_IMAGE_DIRECTORY . '/Facebook.png'; ?>">
					</a>

					<a href="<?php echo $link_twitter; ?>">
						<img src="<?php echo BLANK_THEME_IMAGE_DIRECTORY . '/Twitter.png'; ?>">
					</a>

					<a href="<?php echo $link_google_plus; ?>">
						<img src="<?php echo BLANK_THEME_IMAGE_DIRECTORY . '/g+.png'; ?>">
					</a>
				</div>

				<a class="st-contact-info" href="<?php echo $contact_website_link; ?>"><?php echo $contact_website_name; ?></a>
				<a class="st-contact-info" href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a>
				<a class="st-contact-info" href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>

			</div>

			<div id="form-container" class="large-6 medium-6 small-6 column st-gform-wrapper">
				<?php gravity_form( 1, false, false, false, '', true, 10 ); ?>
			</div>

		</div>

	</div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
