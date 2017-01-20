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

<footer style="border:1px solid black;" id="colophon" class="site-footer" role="contentinfo">
	<h2>Contact Us</h2>

	<div>

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

		<div id="st-contact-headers">
			<h3><?php echo $contact_head; ?></h3>
			<p><?php echo $contact_text; ?></p>
		</div>

		<div id="st-social-links">

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

		<div id="st-contact-info">
			<a class="st-contact-text" href="<?php echo $contact_website_link; ?>"><?php echo $contact_website_name; ?></a>
			<p class="st-contact-text"><?php echo $contact_number; ?></p>
			<a class="st-contact-text" href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
		</div>

	</div>

	<div id="form-container" style="width:50%;">
		<?php gravity_form( 1, true, true, false, '', true, 10 ); ?>
	</div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
