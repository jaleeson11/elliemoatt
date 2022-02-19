<?php
/**
 * The template for displaying the home page
 *
 * @package Ellie_Moatt
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<?php elliemoatt_hero( get_the_id() ); ?>

			<section class="site-section site-section--about">
				<div class="row align-items-center">
					<div class="col-sm-12 col-md-6">
						<div class="site-section__content fade-in">
							<h2><?php echo get_theme_mod( 'home_about_heading' ); ?></h2>
							<p><?php echo get_theme_mod( 'home_about_text' ); ?></p>
							<a href="<?php echo get_the_permalink( get_theme_mod( 'home_about_button_link' ) );  ?>" class="site-button">
								<?php echo get_theme_mod( 'home_about_button_text' ); ?>
							</a>
						</div>
					</div>
					<?php if ( get_theme_mod( 'home_about_image' ) ) : ?>
					<div class="col-sm-12 col-md-6">
						<div class="site-section__image">
							<img src="<?php echo get_theme_mod( 'home_about_image' ); ?>">
						</div>
					</div>
					<?php endif; ?>
				</div>
			</section>
			
			<section class="site-section site-section--services">
				<div class="row g-0">
					<?php
					$posts = new WP_Query( array(
						'post_type' => 'elliemoatt_service',
						'posts_per_page' => 3
					));
					if ( $posts->have_posts() ) {
						while ( $posts->have_posts() ) {
							$posts->the_post(); ?>
	
							<div class="col-md-4">
								<div class="site-section__service">
									<div class="site-section__service-content fade-in">
										<h3><?php the_title(); ?></h3>
										<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
									</div>
								</div>
							</div>
							<?php
						} ?>
						<?php
					} else { ?>
						<div class="col-12">
							<p><?php echo esc_html( 'Looks like there\'s no services to display...' ); ?></p>
						</div>
						<?php
					} ?>
				</div>
				<div class="site-section__footer">
					<a href="<?php the_permalink( 'services' ) ?>" class="fade-in">
						<?php echo esc_html( 'View Services' ); ?>
						<span class="dashicons dashicons-arrow-right-alt2"></span>
					</a>
				</div>
			</section>
		</div>
	</main>

<?php
get_footer();
