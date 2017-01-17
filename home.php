<?php
/**
 * Template Name: SimpleTheme Template
 *
 * Used for showing full width tempalte
 *
 * @package Blank Theme
 */
get_header();
?>

<div id="primary" class="<?php blank_theme_primary_classes( 'blank-theme-full-page', 'large-12 medium-12 small-12 column' ); ?>">
	<main id="main" class="" role="main">

		<div id="slider-main-div">
			<div id="blank-theme-slider">
				<div><img src="<?php echo get_template_directory_uri() . '/images/slicing/SlicingHomepage/banner.jpg'; ?>"></div>
				<div><img src="<?php echo get_template_directory_uri() . '/images/slicing/SlicingBlogpage/image.jpg'; ?>"></div>
			</div>

			<div id="slider-navigator">
				<img id="slider-arrow-left" class="slider-arrow arrow-left" src="wp-content/themes/simpletheme1/images/slicing/SlicingHomepage/arrow-left.png" />
				<img id="slider-arrow-right" class="slider-arrow arrow-right" src="wp-content/themes/simpletheme1/images/slicing/SlicingHomepage/arrow-right.png" />
			</div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
