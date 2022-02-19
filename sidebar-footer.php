<?php
/**
 * The sidebar containing the footer widget
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ellie_Moatt
 */

if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'footer' ); ?>
