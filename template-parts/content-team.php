<?php
/**
 * The template part for displaying Team.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blank Theme
 */
?>

<section class="st-team">
	<header	class="st-page-header">
		<?php
		$st_team_obj = get_post_type_object( 'st_team' );
		?>

		<h2 class="st-page-title"><?php echo $st_team_obj->labels->name; ?></h2>
	</header>

	<div class="st-page-content row">
		<?php

		$args = array(
			'post_type'				=> 'st_team',
			'posts_per_page'	=> 4,
		);

		$team_members = new WP_Query( $args );

		if ( $team_members->have_posts() ) {
			while ( $team_members->have_posts() ) {
				$team_members->the_post();
				?>

				<div style="text-align:center;" class="large-3 column">
          <div class="st-team-member-thumbnail">
            <?php the_post_thumbnail( 'st-team' ); ?>
          </div>
					<h3 class="st-team-member-title"><?php the_title(); ?></h3>
          <h4 class="st-team-member-designation"><?php echo get_post_meta( get_the_ID(), '_team_member_designation', true ) ?></h4>
          <p class="st-team-member-excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 15 ) ); ?></p>
				</div>

			<?php } ?>

			<?php
		} else {

		}
			?>
	</div>
</section>
