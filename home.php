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

		<div style="width:100%; height:100px; border: 1px solid black;"></div>

		<?php get_sidebar( 'pages' ); ?>

		<hr>

		<?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

		<hr>

		<?php get_template_part( 'template-parts/content', 'team' ); ?>

		<hr>

		<?php get_sidebar( 'pricing' ); ?>

		<hr>

		<?php get_template_part( 'template-parts/content', 'testimonials' ); ?>

		<hr>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
