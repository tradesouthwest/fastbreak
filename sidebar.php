<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Fastbreak
 * @since Fastbreak 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-first' ) ) : ?>
	<div id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-first' ); ?>
</div><!-- .sidebar .widget-area -->
<?php endif; ?>
