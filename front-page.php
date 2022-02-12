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
						<div class="site-section__content">
							<h2>About Me</h2>
							<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.</p>
							<p>Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
							<a href="#" class="site-button">Button</a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="site-section__image">
							<img src="http://localhost/elliemoatt/wp-content/uploads/2022/02/mid-shot-woman-therapist-taking-notes-with-laptop-lap-scaled.jpg">
						</div>
					</div>
				</div>
			</section>
		</div>
	</main>

<?php
get_footer();