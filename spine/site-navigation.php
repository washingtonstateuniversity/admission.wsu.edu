<?php

$menu = "site";

if ( get_current_blog_id() == 15 || get_current_blog_id() == 339 || get_current_blog_id() == 340 || get_current_blog_id() == 646  ) {

	if ( defined( 'WSU_LOCAL_CONFIG') && WSU_LOCAL_CONFIG ) {
		switch_to_blog( 16 );
		$menu = "network-temp";
	} else {
		switch_to_blog( 267 );
		$menu = "network-temp";
	}
	
}

?>

<nav id="spine-sitenav" class="spine-sitenav">
	<?php
	$spine_site_args = array(
		'theme_location'  => 'site',
		'menu'            => $menu,
		'container'       => false,
		'container_class' => false,
		'container_id'    => false,
		'menu_class'      => null,
		'menu_id'         => null,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 5,
	);
	wp_nav_menu( $spine_site_args );
	?>
</nav>

<?php restore_current_blog();