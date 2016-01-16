<?php
/**
 * The Footer Sidebar
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>
<div class="col-md-3 footer-grid">
	<?php dynamic_sidebar( 'sidebar-31' ); ?>				
</div>
<div class="col-md-3 footer-grid">
	<?php dynamic_sidebar( 'sidebar-32' ); ?>				
</div>
<div class="col-md-3 footer-grid">
	<?php dynamic_sidebar( 'sidebar-33' ); ?>				
</div>
<div class="col-md-3 footer-grid icons">
	<?php dynamic_sidebar( 'sidebar-34' ); ?>
</div>				
	