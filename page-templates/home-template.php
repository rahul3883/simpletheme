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
		if ( shortcode_exists( 'sp_slider' ) ) {
			echo do_shortcode( '[sp_slider]' );
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
		if ( post_type_exists( 'sp_portfolio' ) ) {
			get_template_part( 'template-parts/content', 'portfolio' );
		}

		if ( post_type_exists( 'sp_team' ) ) {
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
		if ( shortcode_exists( 'sp_slider' ) ) {
			echo do_shortcode( '[sp_slider id=1]' );
		}
		?>

		<?php
		/*
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

		<?php
        }
        */
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
