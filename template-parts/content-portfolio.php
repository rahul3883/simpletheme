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

		<h2 class="st-page-title"><?php echo $st_portfolio_obj->labels->name; ?></h2>
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

				<div style="text-align:center;" class="large-4 column">
					<?php the_post_thumbnail( 'st-portfolio' ); ?>

					<h3 class="st-portfolio-post-title"><?php the_title(); ?></h3>
				</div>

			<?php } ?>

			<a href="#">See all works</a>
			<?php
		} else {

		}
			?>
	</div>
</section>
