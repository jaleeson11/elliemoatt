<?php
/**
 * The template for displaying services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ellie_Moatt
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<?php
			elliemoatt_hero( get_the_id() );

			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			
			$services = new WP_Query(
				array(
					'post_type'      => 'elliemoatt_service',
					'paged'          => $paged,
					'posts_per_page' => 5,
				)
			);

			if ( $services->have_posts() ) {
				while ( $services->have_posts() ) {
					$services->the_post();
					
					if ( '' !== get_post()->post_content ) :
						?>
						<div class="site-accordion">
							<?php if ( has_post_thumbnail() ) : ?>
							<div class="site-accordion__image" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-size: cover; background-position: center center;"></div>
							<?php endif; ?>
							<div class="site-accordion__content fade-in">
								<div class="site-accordion__header">
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
								</div>
								<div class="site-accordion__body">
									<p><?php the_content(); ?></p>
								</div>
								<span class="site-accordion__toggle">
									Read More
								</span>
							</div>
						</div>
						<?php 
					endif;
				}
					
				$total_pages = $services->max_num_pages;

				if ( $total_pages > 1 ) {

					$current_page = max( 1, get_query_var( 'paged' ) );
					?>
					<div class="site-page-links">
						<?php
						echo esc_html(
							paginate_links(
								array(
									'current'      => $current_page,
									'total'        => $total_pages,
									'prev_text'    => 'prev',
									'next_text'    => 'next',
								)
							) 
						);
						?>
					</div>
					<?php
				}

				wp_reset_postdata();
			} else {
				?>
				<div class="site-no-services">
					<p><?php echo esc_html( 'Looks like there\'s no services to display...' ); ?></p>
				</div>
				<?php
			}
			?>

		</div><!-- container -->

	</main><!-- #main -->

<?php
get_footer();
