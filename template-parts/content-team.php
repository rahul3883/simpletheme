<?php
/**
 * The template part for displaying Team.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blank Theme
 */

$args = array(
	'post_type'				=> 'st_team',
	'posts_per_page'	=> 4,
	'order'						=> 'ASC',
);

$team_members = new WP_Query( $args );

if ( $team_members->have_posts() ) {
	?>

	<div id="st-team-container" class="st-section-container">
		<div class="st-content-wrapper">

			<section class="st-team">
				<header	class="st-page-header">
					<?php
					$st_team_obj = get_post_type_object( 'st_team' );
					?>

					<h2 class="st-page-title line-height"><?php echo $st_team_obj->labels->name; ?></h2>
				</header>

				<div class="st-page-content row">
					<?php

					while ( $team_members->have_posts() ) {
						$team_members->the_post();
						?>

							<div class="large-3 medium-6 small-12 column">
								<div class="st-team-member-thumbnail">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'st-team' ); ?>
									</a>
								</div>
								<a href="<?php the_permalink(); ?>">
									<p class="st-team-member-title st-team-text"><?php the_title(); ?></p>
								</a>
								<p class="st-team-member-designation st-team-text"><?php echo get_post_meta( get_the_ID(), '_team_member_designation', true ) ?></p>
								<p class="st-team-member-excerpt st-team-text"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 15 ) ); ?></p>
							</div>

						<?php } ?>

				</div>
			</section>

		</div>
	</div>

<?php }
