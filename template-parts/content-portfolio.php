<?php
/**
 * The template part for displaying Portfolio.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blank Theme
 */
?>

<section class="st-portfolio">
	<header	class="st-page-header">
		<?php
		$st_portfolio_obj = get_post_type_object( 'st_portfolio' );
		?>

		<p class="st-page-title"><?php echo $st_portfolio_obj->labels->name; ?></p>
	</header>

	<div class="st-page-content row">
		<?php

		$args = array(
			'post_type'				=> 'st_portfolio',
			'posts_per_page'	=> 6,
		);

		$portfolio_posts = new WP_Query( $args );

		if ( $portfolio_posts->have_posts() ) {
			while ( $portfolio_posts->have_posts() ) {
				$portfolio_posts->the_post();
				?>

				<div class="large-4 column st-portfolio-outer">
					<div class="st-portfolio-content-wrapper">
						<?php the_post_thumbnail( 'st-portfolio', array( 'class' => 'st-portfolio-thumbnail' ) ); ?>
						<div class="st-portfolio-post-title-wrapper">
							<?php helper_span(); ?>
							<p class="st-portfolio-post-title v-align-middle"><?php the_title(); ?></p>
					</div>
				</div>
				</div>

			<?php } ?>

			<div class="large-12 medium-12 small-12 column">
				<a href="#" class="st-portfolio-button">See all works</a>
			</div>
			<?php
		} else {

		}
			?>
	</div>
</section>
