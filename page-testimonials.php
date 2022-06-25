<?php
/**
 * The template for displaying testimonials
 *
 * @package Ellie_Moatt
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<?php elliemoatt_hero( get_the_id() ); ?>

			<div class="site-testimonials">

				<?php
				$testimonials = new WP_Query(
					array(
						'post_type'      => 'testimonial',
						'posts_per_page' => 5,
					)
				);

				if ( $testimonials->have_posts() ) {
					while ( $testimonials->have_posts() ) {
						$testimonials->the_post();

						?>
						<div class="site-card site-card--testimonial">
							<div class="site-card__title">
								<h3><?php the_title(); ?></h3>
							</div>
							<div class="site-card__body">
								<p><?php the_content(); ?></p>
								<span><?php echo esc_html( get_post_meta( get_the_id(), '_testimonial_client_name', true ) ); ?></span>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div><!-- site-testimonials -->

		</div><!-- container -->

	</main><!-- #main -->

<?php
get_footer();
