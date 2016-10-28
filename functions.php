<?php

// Provide support for the /web-template/ JSON endpoint.
include_once( 'includes/web-template.php' );
// Setup the widget used to display the footer area.
include_once( 'includes/admission-footer-snippets-widget.php' );

class WSU_Admission_Theme {
	/**
	 * @var string The version of the WSU Admission theme for cache breaking.
	 */
	var $version = '1.3.8';

	public function __construct() {
		// This theme supplies a minified stylesheet.
		add_filter( 'spine_child_min_css', '__return_true' );

		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_filter( 'body_class', array( $this, 'add_timing_class' ) );
		add_filter( 'theme_page_templates', array( $this, 'prune_page_templates' ) );
		add_filter( 'single_template', array( $this, 'single_template' ) );
		add_filter( 'bu_navigation_filter_item_attrs', array( $this, 'bu_navigation_filter_item_atts' ), 10, 2 );
		add_filter( 'wp_kses_allowed_html', array( $this, 'allow_download_attribute' ), 10 );
	}

	/**
	 * Setup functionality used by the theme.
	 */
	public function theme_setup() {
		// Add support for the BU Navigation plugin.
		add_theme_support( 'bu-navigation-primary' );
		remove_theme_support( 'bu-navigation-widget' );
	}


	/**
	 * Register the sidebars and custom widgets used by the theme.
	 */
	public function register_sidebars() {
		register_widget( 'Admission_Footer_Snippets_Widget' );

		$footer_args = array(
			'name' => 'Footer',
			'id' => 'admission-footer',
			'description' => 'Displays the action links on the top of every page.',
		);
		register_sidebar( $footer_args );
	}

	/**
	 * Enqueue child theme Scripts and Styles
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'calculators-scripts', get_stylesheet_directory_uri() . '/scripts/calculators.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'admissions-scripts', get_stylesheet_directory_uri() . '/scripts/admissions.js', array( 'jquery' ), $this->version, true );
	}

	public function add_timing_class( $classes ) {
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

	public function prune_page_templates( $templates ) {
		unset( $templates['templates/halves.php'] );
		unset( $templates['templates/margin-left.php'] );
		unset( $templates['templates/margin-right.php'] );
		unset( $templates['templates/side-left.php'] );
		unset( $templates['templates/side-right.php'] );
		unset( $templates['templates/single.php'] );
		return $templates;
	}

	/**
	 * Provide a specific single template for some categories.
	 *
	 * @param string $the_template The current template being loaded.
	 *
	 * @return string The modified template location.
	 */
	public function single_template( $the_template ) {
		foreach( (array) get_the_category() as $cat ) {
			if ( file_exists( TEMPLATEPATH . "/templates/single-{$cat->slug}.php" ) ) {
				return TEMPLATEPATH . "/templates/single-{$cat->slug}.php";
			}
		}

		return $the_template;
	}

	/**
	 * Filter BU Navigation to add the `current` tag to a nav item that matches the requested
	 * URL when loading one of the admission sub-sites.
	 *
	 * @param array  $item_classes
	 * @param object $page
	 *
	 * @return array
	 */
	public function bu_navigation_filter_item_atts( $item_classes, $page ) {
		$page_url = parse_url( $page->url );
		$page_path = '/';

		if ( ! empty( $page_url ) ) {
			$page_paths = explode( '/', $page_url['path'] );
			if ( ! empty( $page_paths[1] ) ) {
				$page_path = '/' . $page_paths[1] . '/';
			}
		}

		$request_paths = explode( '/', $_SERVER['REQUEST_URI'] );
		$request_path = false;

		if ( ! empty( $request_paths[1] ) ) {
			$request_path = '/' . $request_paths[1] . '/';
		}

		if ( in_array( $page_path, array( '/for-counselors/', '/for-parents/', '/for-advisors/' ) ) && $request_path == $page_path ) {
			$item_classes[] = 'current';
		}

		return $item_classes;
	}

	/**
	 * Allow the download attribute to be used inside an anchor. This is supported in modern browsers
	 * and allows a content publisher to tag a link to be downloaded rather than followed.
	 *
	 * @param array $tags List of elements and attributes allowed.
	 *
	 * @return mixed Modified list of elements and attributes.
	 */
	public function allow_download_attribute( $tags ) {
		$tags['a']['download'] = true;

		return $tags;
	}
}
new WSU_Admission_Theme();

/**
 * Retrieve the ID of the main site for admission.wsu.edu.
 *
 * @return int ID of the site.
 */
function admission_get_main_site_id() {
	// The primary domain can be filtered for local development.
	$home_domain = apply_filters( 'admission_home_domain', 'admission.wsu.edu' );

	$site = get_blog_details( array( 'domain' => $home_domain, 'path' => '/' ) );

	if ( $site ) {
		return $site->blog_id;
	}

	return get_current_blog_id();
}

/**
 * Determine whether to show the shared, primary navigation from admission.wsu.edu.
 *
 * @return bool
 */
function admission_show_main_navigation() {
	$site = get_blog_details();

	// The primary domain can be filtered for local development.
	$home_domain = apply_filters( 'admission_home_domain', 'admission.wsu.edu' );

	// Site paths that should show the primary navigation. This will include
	// page paths under these sites.
	$shared_nav_paths = array(
		'/',
		'/for-counselors/',
		'/for-parents/',
		'/for-advisors/',
	);

	// The shared nav paths can be filtered for local development.
	$shared_nav_paths = apply_filters( 'admission_shared_nav_paths', $shared_nav_paths );

	if ( $home_domain === $site->domain && in_array( $site->path, $shared_nav_paths ) ) {
		return true;
	}

	return false;
}
