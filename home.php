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

		<div id="st-slider-container" class="st-section-container">

			<?php get_template_part( 'template-parts/content', 'slider' ); ?>

		</div>

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

		<div id="st-pricing-container" class="st-section-container">
			<div class="st-content-wrapper">

				<?php get_sidebar( 'pricing' ); ?>

			</div>
		</div>

		<div id="st-testimonials-container" class="st-section-container">
			<div class="st-content-wrapper">

				<?php get_template_part( 'template-parts/content', 'testimonials' ); ?>

			</div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
