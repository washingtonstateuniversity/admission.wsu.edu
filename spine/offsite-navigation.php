<?php
	
	$menu = "offsite";
		
	if (
		get_current_blog_id() == 15 ||
		get_current_blog_id() == 339 ||
		get_current_blog_id() == 340 ||
		get_current_blog_id() == 646 ||
		get_current_blog_id() == 903 ) {
	
		if ( defined( 'WSU_LOCAL_CONFIG') && WSU_LOCAL_CONFIG ) {
			switch_to_blog( 16 );
			$menu = "offsite-temp";
		if ( get_current_blog_id() == 903 ) {
			switch_to_blog( 267 );
			$menu = "offsite";
		} else {
			switch_to_blog( 267 );
			$menu = "offsite-temp";
		}
		
	}

?>

<nav id="spine-offsitenav" class="spine-offsitenav">
	<?php
	$spine_offsite_args = array(
		'theme_location'  => 'offsite',
		'menu'            => $menu,
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