<?php

// Provide support for the /web-template/ JSON endpoint.
include_once( 'includes/web-template.php' );
// Setup the widget used to display the footer area.
include_once( 'includes/admission-footer-snippets-widget.php' );

add_action( 'after_setup_theme', 'admission_theme_setup' );
/**
 * Setup functionality used by the theme.
 */
function admission_theme_setup() {
	// Add support for the BU Navigation plugin.
	add_theme_support( 'bu-navigation-primary' );
	remove_theme_support( 'bu-navigation-widget' );
}

add_action( 'widgets_init', 'admission_register_sidebars' );
/**
 * Register the sidebars and custom widgets used by the theme.
 */
function admission_register_sidebars() {
	register_widget( 'Admission_Footer_Snippets_Widget' );

	$footer_args = array(
		'name' => 'Footer',
		'id' => 'admission-footer',
		'description' => 'Displays the action links on the top of every page.',
	);
	register_sidebar( $footer_args );
}

add_action( 'wp_enqueue_scripts', 'admissions_scripts_styles' );
/**
 * Enqueue child theme Scripts and Styles
 */
function admissions_scripts_styles() {
	wp_enqueue_script( 'calculators-scripts', get_stylesheet_directory_uri() . '/scripts/calculators.js', array( 'jquery' ), false, true );
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

add_filter( 'single_template', 'admission_single_template' );
/**
 * Provide a specific single template for some categories.
 *
 * @param string $the_template The current template being loaded.
 *
 * @return string The modified template location.
 */
function admission_single_template( $the_template ) {
	foreach( (array) get_the_category() as $cat ) {
		if ( file_exists( TEMPLATEPATH . "/templates/single-{$cat->slug}.php" ) ) {
			return TEMPLATEPATH . "/templates/single-{$cat->slug}.php";
		}
	}

	return $the_template;
}