<?php

$custom_query = new WP_Query( array( 'post_type' => 'st_slider' ) );
if ( $custom_query->have_posts() ) {
	?>

	<div id="st-slider-container" class="st-section-container">

		<div id="blank-theme-slider">

			<?php

			while ( $custom_query->have_posts() ) {
				$custom_query->the_post();
				?>

					<div class="st-slides">

						<?php the_post_thumbnail( 'st-slider' ); ?>
						<div class="st-slider-content-wrapper">
							<div class="st-content-wrapper st-slider-content-wrapper-inner">

								<h3 class="st-slider-title">

									<?php the_title(); ?>

								</h3>
								<p class="st-slider-content">

									<?php echo wp_kses_post( wp_trim_words( get_the_content(), 15 ) ); ?>

								</p>
								<a class="st-slider-button" href="<?php the_permalink(); ?>">

									<?php echo esc_html__( 'Learn More', 'blank-theme' ); ?>

								</a>

							</div>

							<?php helper_span(); ?>

						</div>

					</div>

					<?php
			}
			?>

		</div>

		<div id="slider-navigator">
			<img src="<?php echo BLANK_THEME_SLIDER_LEFT_ARROW; ?>" id="slider-arrow-left" class="slider-arrow arrow-left" alt="Left" onmouseover="this.src='<?php echo BLANK_THEME_SLIDER_LEFT_HOVER_ARROW; ?>'" onmouseout="this.src='<?php echo BLANK_THEME_SLIDER_LEFT_ARROW; ?>'">
			<img src="<?php echo BLANK_THEME_SLIDER_RIGHT_ARROW; ?>" id="slider-arrow-right" class="slider-arrow arrow-right" alt="Right" onmouseover="this.src='<?php echo BLANK_THEME_SLIDER_RIGHT_HOVER_ARROW; ?>'" onmouseout="this.src='<?php echo BLANK_THEME_SLIDER_RIGHT_ARROW; ?>'">
		</div>

	</div>

<?php }
