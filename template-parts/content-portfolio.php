<?php
/**
 * The template part for displaying Portfolio.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blank Theme
 */

$args = array(
	'post_type'			=> 'sp_portfolio',
	'posts_per_page'    => 6,
);

$portfolio_posts = new WP_Query( $args );

if ( $portfolio_posts->have_posts() ) {
	?>

	<div id="st-portfolio-container" class="st-section-container">
		<div class="st-content-wrapper">

			<section class="st-portfolio">
				<header	class="st-page-header">
					<?php
					$st_portfolio_obj = get_post_type_object( 'sp_portfolio' );
					?>

					<h2 class="st-page-title line-height"><?php echo $st_portfolio_obj->labels->name; ?></h2>
				</header>

				<div class="st-page-content row">
					<?php

					while ( $portfolio_posts->have_posts() ) {
						$portfolio_posts->the_post();
						?>

							<div class="large-4 medium-6 small-12 column st-portfolio-outer">
								<div class="st-portfolio-content-wrapper">
									<?php the_post_thumbnail( 'st-portfolio', array( 'class' => 'st-portfolio-thumbnail' ) ); ?>
									<a href="<?php the_permalink(); ?>">
										<div class="st-portfolio-post-title-wrapper">
											<?php helper_span(); ?>
											<p class="st-portfolio-post-title v-align-middle"><?php the_title(); ?></p>
										</div>
									</a>
							</div>
							</div>

						<?php } ?>

						<div class="large-12 medium-12 small-12 column">
							<a href="<?php echo get_post_type_archive_link( 'sp_portfolio' ); ?>" class="st-portfolio-button">See all works</a>
						</div>

				</div>
			</section>

		</div>
	</div>

<?php }
