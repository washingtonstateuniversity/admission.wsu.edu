<?php

// Provide support for the /web-template/ JSON endpoint.
include_once( 'includes/web-template.php' );
// Setup the widget used to display the footer area.
include_once( 'includes/admission-footer-snippets-widget.php' );

class WSU_Admission_Theme {
	/**
	 * @var string The version of the WSU Admission theme for cache breaking.
	 */
	var $version = '1.3.12';

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
		add_action( 'wp_footer', array( $this, 'carnegie_tracking_tags' ), 101 );
		add_action( 'wp_footer', array( $this, 'chegg_conversion_pixels' ), 102 );
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

	/**
	 * Insert tracking tags used for retargeting with Carnegie Communications
	 */
	public function carnegie_tracking_tags() {
		$site = get_site();

		// Conversion pixels only show on the main admission site.
		if ( 'admission.wsu.edu' !== $site->domain || '/' !== $site->path ) {
			return;
		}

		$request_uri = explode( '?', $_SERVER['REQUEST_URI'] );

		if ( '/visits/spring/out-of-state-experience/why-attend/' === $request_uri[0] || '/confirm/' === $request_uri[0] ) {
			?>
			<!-- Google Code for Remarketing Tag -->
			<!--------------------------------------------------
			Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
			--------------------------------------------------->
			<script type="text/javascript">
				/* <![CDATA[ */
				var google_conversion_id = 864713563;
				var google_custom_params = window.google_tag_params;
				var google_remarketing_only = true;
				/* ]]> */
			</script>
			<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
				<div style="display:inline;">
					<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/864713563/?guid=ON&amp;script=0"/>
				</div>
			</noscript>
			<?php
		}

		if ( '/visits/' === $request_uri[0] ) {
			?>
			<!-- Google Code for Remarketing Tag -->
			<!--------------------------------------------------
			Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
			--------------------------------------------------->
			<script type="text/javascript">
				/* <![CDATA[ */
				var google_conversion_id = 864713563;
				var google_custom_params = window.google_tag_params;
				var google_remarketing_only = true;
				/* ]]> */
			</script>
			<script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
				<div style="display:inline;">
					<img height="1" width="1" style="border-style:none;" alt="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/864713563/?guid=ON&amp;script=0"/>
				</div>
			</noscript>
			<!-- Facebook Pixel Code -->
			<script>
				!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
					n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
					n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
					t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
					document,'script','https://connect.facebook.net/en_US/fbevents.js');
				fbq('init', '1283395071698859'); // Insert your pixel ID here.
				fbq('track', 'PageView');
			</script>
			<noscript><img height="1" width="1" style="display:none"
						   src="https://www.facebook.com/tr?id=1283395071698859&ev=PageView&noscript=1"
				/></noscript>
			<!-- DO NOT MODIFY -->
			<!-- End Facebook Pixel Code -->
			<?php
		}
	}

	/**
	 * Displays various conversion pixels (via Chegg) on the appropriate pages.
	 *
	 * @since 1.3.11
	 */
	public function chegg_conversion_pixels() {
		$site = get_site();

		// Conversion pixels only show on the main admission site.
		if ( 'admission.wsu.edu' !== $site->domain || '/' !== $site->path ) {
			return;
		}

		$request_uri = explode( '?', $_SERVER['REQUEST_URI'] );

		if ( '/' === $request_uri[0] ) {
			?>
			<!-- Washington State University JavaScript Conversion; Goal ID: 'admissions' -->
			<script type="text/javascript">var ordnumber = Math.random() * 10000000000000;var sscUrl = ("https:" == document.location.protocol ? "https://" : "http://") + "trkn.us/pixel/c?ppt=719&g=admissions&gid=3689&ord="+ordnumber+"&v=114";var x = document.createElement("IMG");x.setAttribute("src", sscUrl);x.setAttribute("width", "1");x.setAttribute("height", "1");document.body.appendChild(x);</script>
			<?php
		}

		if ( '/visits/' === $request_uri[0] ) {
			?>
			<!-- Washington State University JavaScript Conversion; Goal ID: 'visit' -->
			<script type="text/javascript">var ordnumber = Math.random() * 10000000000000;var sscUrl = ("https:" == document.location.protocol ? "https://" : "http://") + "trkn.us/pixel/c?ppt=719&g=visitslong&gid=3849&ord="+ordnumber+"&v=115";var x = document.createElement("IMG");x.setAttribute("src", sscUrl);x.setAttribute("width", "1");x.setAttribute("height", "1");document.body.appendChild(x);</script>
			<?php
		}

		if ( '/apply/as/freshmen/requirements/' === $request_uri[0] ) {
			?>
			<!-- Washington State University JavaScript Conversion; Goal ID: 'requirements' -->
			<script type="text/javascript">var ordnumber = Math.random() * 10000000000000;var sscUrl = ("https:" == document.location.protocol ? "https://" : "http://") + "trkn.us/pixel/c?ppt=719&g=requirementslong&gid=3848&ord="+ordnumber+"&v=115";var x = document.createElement("IMG");x.setAttribute("src", sscUrl);x.setAttribute("width", "1");x.setAttribute("height", "1");document.body.appendChild(x);</script>
			<?php
		}
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
