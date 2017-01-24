<div id="blank-theme-slider">

	<?php

	$custom_query = new WP_Query( array( 'post_type' => 'st_slider' ) );
	if ( $custom_query->have_posts() ) {
		while ( $custom_query->have_posts() ) {
			$custom_query->the_post();
			?>

			<div class="st-slides">

				<?php the_post_thumbnail(); ?>
				<div class="st-slider-content-wrapper">
					<div class="st-content-wrapper st-slider-content-wrapper-inner">

						<h3 class="st-slider-title">

							<?php the_title(); ?>

						</h3>
						<p class="st-slider-content">

							<?php echo wp_kses_post( wp_trim_words( get_the_content(), 15 ) ); ?>

						</p>
						<a class="st-slider-button" href="#">

							<?php echo esc_html__( 'Learn More', 'blank-theme' ); ?>

						</a>

					</div>

					<?php helper_span(); ?>

				</div>

			</div>

			<?php
		}
	}
	?>

	<div><img src="<?php echo get_template_directory_uri() . '/images/slicing/SlicingBlogpage/image.jpg'; ?>"></div>

</div>

<div id="slider-navigator">
	<img id="slider-arrow-left" class="slider-arrow arrow-left">
	<img id="slider-arrow-right" class="slider-arrow arrow-right">
</div>
