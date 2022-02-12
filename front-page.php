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
		</div>
	</main>

<?php
get_footer();
