<?php

// Provide support for the /web-template/ JSON endpoint.
include_once( 'includes/web-template.php' );

add_action( 'after_setup_theme', 'admission_theme_setup' );
/**
 * Setup functionality used by the theme.
 */
function admission_theme_setup() {
	// Add support for the BU Navigation plugin.
	add_theme_support( 'bu-navigation-primary' );
	remove_theme_support( 'bu-navigation-widget' );
}

add_action( 'wp_enqueue_scripts', 'admissions_scripts_styles' );
/**
 * Enqueue child theme Scripts and Styles
 */
function admissions_scripts_styles() {
	wp_enqueue_script( 'fullpage', get_stylesheet_directory_uri() . '/scripts/fullpage/jquery.fullPage.js', array( 'jquery' ) );
	wp_enqueue_style( 'fullpage-styles', get_stylesheet_directory_uri() . '/scripts/fullpage/jquery.fullPage.css' );
	wp_enqueue_script( 'textillate', get_stylesheet_directory_uri() . '/scripts/textillate/jquery.textillate.js', array( 'jquery' ) );
	wp_enqueue_script( 'admissions-scripts', get_stylesheet_directory_uri() . '/scripts/admissions.js', array( 'jquery' ), false, true );
}

add_filter( 'body_class', 'admissions_timing_class' );

function admissions_timing_class( $classes ) {
	
	$interval = ( current_time( 'Ymd', $gmt = 0 ) - get_the_date('Ymd') );
	$interval_month = ( current_time( 'Ym', $gmt = -8 ) - get_the_date('Ym') );
		
	if ( !is_page() ) {
		
		if ( $interval <= 1 ) { $classes[] = 'past-day'; }
		if ( $interval <= 7 ) { $classes[] = 'past-week'; }
		if ( $interval_month < 1 ) { $classes[] = 'past-month'; }
		if ( $interval_month <= 3 ) { $classes[] = 'past-quarter'; }
		if ( $interval_month <= 6 ) { $classes[] = 'past-half'; }
		if ( $interval <= 365 ) { $classes[] = 'past-year'; }
		else { $classes[] = 'before-past-year'; }
	
	}
	
	$pst = get_the_date('H') - 7;
	
	if ( $pst > 6 && $pst < 18 ) { $classes[] = 'day-time'; }
	else { $classes[] = 'night-time'; }

	return $classes;

}

function prune_page_templates( $templates ) {
    unset( $templates['templates/halves.php'] );
    unset( $templates['templates/margin-left.php'] );
    unset( $templates['templates/margin-right.php'] );
    unset( $templates['templates/side-left.php'] );
    unset( $templates['templates/side-right.php'] );
    unset( $templates['templates/single.php'] );
    return $templates;
}
add_filter( 'theme_page_templates', 'prune_page_templates' );

function admissions_setup() {

//add_theme_support( 'html5', array(
//		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
//	) );
}
add_action( 'after_setup_theme', 'admissions_setup' );

add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/templates/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/templates/single-{$cat->slug}.php"; }
	return $the_template;' )
);