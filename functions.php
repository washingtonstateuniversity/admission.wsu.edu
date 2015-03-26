<?php

add_filter( 'body_class', 'post_freshness_class' );
add_filter( 'post_class', 'post_freshness_class' );

function post_freshness_class( $classes ) {
	
	$interval = ( current_time( 'Ymd', $gmt = -8 ) - get_the_date('Ymd') );
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

	return $classes;

}