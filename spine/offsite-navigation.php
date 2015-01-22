<?php
	
if ( defined( 'WSU_LOCAL_CONFIG') && 'WSU_LOCAL_CONFIG' ) {
	switch_to_blog( 16 );
} else {
	switch_to_blog( 267 );
}

?>

<nav id="spine-offsitenav" class="spine-offsitenav">
	<?php
	$spine_offsite_args = array(
		'theme_location'  => 'offsite',
		'menu'            => 'offsite',
		'container'       => false,
		'container_class' => false,
		'container_id'    => false,
		'menu_class'      => null,
		'menu_id'         => null,
		'fallback_cb'     => false,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 3,
	);
	wp_nav_menu( $spine_offsite_args );
	?>
</nav>

<?php restore_current_blog();