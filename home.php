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

<div id="primary" class="<?php blank_theme_primary_classes( 'blank-theme-full-page', 'large-12 medium-12 small-12' ); ?>">
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

		<div id="st-pages-container" class="st-section-container">
			<div class="st-content-wrapper">

				<?php get_sidebar( 'pages' ); ?>

			</div>
		</div>

		<div id="st-portfolio-container" class="st-section-container">
			<div class="st-content-wrapper">

				<?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

			</div>
		</div>

		<div id="st-team-container" class="st-section-container">
			<div class="st-content-wrapper">

				<?php get_template_part( 'template-parts/content', 'team' ); ?>

			</div>
		</div>

		<hr>

		<div id="st-pricing-container" class="st-section-container">
			<div class="st-content-wrapper">

				<?php get_sidebar( 'pricing' ); ?>

			</div>
		</div>



		<hr>

		<?php get_template_part( 'template-parts/content', 'testimonials' ); ?>

		<hr>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
