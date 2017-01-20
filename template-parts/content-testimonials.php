<?php
/**
 * The template part for displaying Testimonials.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blank Theme
 */
?>

<section class="st-testimonials">
	<header	class="st-page-header">
		<h2 class="st-page-title"><?php _e( 'What Clients Say', 'blank-theme' ); ?></h2>
	</header>

	<div class="st-page-content row">
		<?php

		$args = array(
			'post_type'				=> 'st_testimonials',
			'posts_per_page'	=> -1,
		);

		$testimonials = new WP_Query( $args );

		if ( $testimonials->have_posts() ) {
			while ( $testimonials->have_posts() ) {
				$testimonials->the_post();
				?>

				<div style="text-align:center;" class="">
					<p class="st-testimonial-excerpt"><?php the_excerpt(); ?></p>
					<h4 class="st-testimonial-person-name"><?php echo get_post_meta( get_the_ID(), '_testimonial_name_key', true ) ?></h4>
				</div>

			<?php } ?>

			<?php
		} else {

		}
			?>
	</div>
</section>
