<?php
/**
 * The template part for displaying Testimonials.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blank Theme
 */

$args = array(
	'post_type'				=> 'st_testimonials',
	'posts_per_page'	=> -1,
);

$testimonials = new WP_Query( $args );

if ( $testimonials->have_posts() ) {
	?>

	<div id="st-testimonials-container" class="st-section-container">
		<div class="st-content-wrapper">

			<section class="st-testimonials">

				<header	class="st-page-header">
					<h2 id="st-testimonial-header" class="st-page-title"><?php _e( 'What Clients Say', 'blank-theme' ); ?></h2>
				</header>

				<div id="st-slider-testimonial-wrapper" class="st-page-content row">

					<div class="large-2 medium-2 small-2 column">
						<img src="<?php echo BLANK_THEME_SLIDER_LEFT_ARROW; ?>" id="slider-tm-arrow-left" class="slider-arrow arrow-left" alt="Left" onmouseover="this.src='<?php echo BLANK_THEME_SLIDER_LEFT_HOVER_ARROW; ?>'" onmouseout="this.src='<?php echo BLANK_THEME_SLIDER_LEFT_ARROW; ?>'">
					</div>

					<div id="st-slider-testimonial" class="large-8 medium-8 small-8 column">

						<?php

						while ( $testimonials->have_posts() ) {
							$testimonials->the_post();
							?>

								<div class="st-slider-tm-content">

										<p class="st-testimonial-text">
											<?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 40 ) ); ?>
										</p>
										<p class="st-testimonial-name">
											<?php echo get_post_meta( get_the_ID(), '_testimonial_name_key', true ); ?>
										</p>

								</div>

								<?php
						}
						?>

					</div>

					<div class="large-2 medium-2 small-2 column">
						<img src="<?php echo BLANK_THEME_SLIDER_RIGHT_ARROW; ?>" id="slider-tm-arrow-right" class="slider-arrow arrow-right" alt="Right" onmouseover="this.src='<?php echo BLANK_THEME_SLIDER_RIGHT_HOVER_ARROW; ?>'" onmouseout="this.src='<?php echo BLANK_THEME_SLIDER_RIGHT_ARROW; ?>'">
					</div>

				</div>

			</section>

		</div>
	</div>

<?php }
