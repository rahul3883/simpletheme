<?php
/**
 * Template Name: Home Page Template
 *
 * Used for showing full width tempalte
 *
 * @package Blank Theme
 */
get_header();
?>

<div id="primary" class="<?php blank_theme_primary_classes( 'blank-theme-full-page', 'large-12 medium-12 small-12' ); ?>">
	<main id="main" class="" role="main">

		<?php
		global $st_theme_options;
		$toogle_cpt = $st_theme_options['toogle_cpt'];

		if ( 1 == $toogle_cpt['st_slider'] ) {
			get_template_part( 'template-parts/content', 'slider' );
		}
		?>

		<?php if ( is_active_sidebar( 'sidebar-widget-pages' ) ) { ?>
			<div id="st-pages-container" class="st-section-container">
				<div class="st-content-wrapper">

					<?php get_sidebar( 'pages' ); ?>

				</div>
			</div>
		<?php } ?>

		<?php
		if ( 1 == $toogle_cpt['st_portfolio'] ) {
			get_template_part( 'template-parts/content', 'portfolio' );
		}

		if ( 1 == $toogle_cpt['st_team'] ) {
			get_template_part( 'template-parts/content', 'team' );
		}
		?>

		<?php if ( is_active_sidebar( 'sidebar-widget-pricing' ) ) { ?>
			<div id="st-pricing-container" class="st-section-container">
				<div class="st-content-wrapper">

					<?php get_sidebar( 'pricing' ); ?>

				</div>
			</div>
		<?php } ?>

		<?php
		if ( 1 == $toogle_cpt['st_testimonials'] ) {
			get_template_part( 'template-parts/content', 'testimonials' );
		}
		?>

		<?php
		global $post;

		$custom_query = new WP_Query( array(
			'page_id'	=> 44,
			'meta_key'	=> '_wp_page_template',
			'meta_value'	=> 'page-templates/home-template.php',
		) );

		if ( $custom_query->have_posts() ) {
			?>

			<div style="width:100%; padding:10%; background:lightgrey; text-align:center;">

				<?php $custom_query->the_post(); ?>
				<h3>
					<?php echo get_post_meta( $post->ID, '_test_text', true ); ?>
				</h3>

			</div>

		<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
