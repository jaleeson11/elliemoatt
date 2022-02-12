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
		</div>
	</main>

<?php
get_footer();