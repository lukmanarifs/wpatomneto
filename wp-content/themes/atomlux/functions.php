<?php
global $pagenow;
 if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
 {
      wp_redirect( admin_url( 'admin.php?page=atom-license' ) );
      exit;
 }
add_filter('widget_text', 'do_shortcode');
/**
 * atom functions and definitions
 *
 * @package atom
 * @since atom 1.0
 * @license GPL 2.0
 */

define("THEME_PATH", get_stylesheet_directory());
define("THEME_INCLUDES", "inc/");
define("THEME_WIDGETS", THEME_INCLUDES."widgets/");
define("THEME_FUNGSI", THEME_INCLUDES."fungsi/");
define("THEME_URL", get_template_directory_uri());
define("THEME_CSS_URL",THEME_URL."/css/");
define("THEME_JS_URL",THEME_URL."/js/");
define("THEME_IMG_URL",THEME_URL."/images/");
define("THEME_PLUGIN_URL",THEME_URL."/inc/plugins/");

/**
 * Include Vafpress Framework
 */
require_once 'vafpress-framework/bootstrap.php';
/**
 * Include Custom Data Sources 
 * Include automatic updater
 */
require_once 'admin/data_sources.php';
require_once(THEME_FUNGSI.'update.php');
$tmpl_mb1  = get_template_directory() . '/admin/servicebox.php';
$tmpl_mb2  = get_template_directory() . '/admin/metabox.php';
$mb1 = new VP_Metabox($tmpl_mb1);
$mb2 = new VP_Metabox($tmpl_mb2);
include get_template_directory() . '/admin/testibox.php';


/**
 * Create instance of Options
 */
$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => 'atom_option',                           // options key in db, required
	'page_slug'             => 'vpt_option',                           // options page slug, required
	'template'              => THEME_OPTION,                              // template file path or array, required
	'menu_page'             => 'atom-support',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fixed',                                // fluid or fixed, default to fixed
	'page_title'            => __( 'Theme Options', THEME_NAME ), // page title
	'menu_label'            => __( 'Theme Options', THEME_NAME ), // menu label
));


function atomlabs_setting( $name ) {return vp_option( "atom_option." . $name );}
function atomlabs_metabox( $name ) {return vp_metabox( $name );}


if ( ! function_exists( 'atom_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since atom 1.0
 */


function atom_setup() {
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');

	// Make the theme translatable
	load_theme_textdomain( 'atom', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'atom' ),
	) );

	// Enable support for Post Formats
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

	// We support WooCommerce
	//add_theme_support('woocommerce');
	// define('WOOCOMMERCE_USE_CSS', false);

	set_post_thumbnail_size(720, 380, true);
	add_image_size('atom-thumbnail-no-sidebar', 1080, 380, true);
	add_image_size('atom-slide', 960, 480, true);
	add_image_size('atom-carousel', 272, 182, true);
	add_image_size('atom-grid-loop', 436, 272, true);

	add_theme_support('siteorigin-premium-teaser', array(
		'customizer' => true,
		'settings' => true,
	));

	global $content_width, $atom_site_width;
	if ( ! isset( $content_width ) ) $content_width = 720; /* pixels */

	if ( ! isset( $atom_site_width ) ) {
		$atom_site_width = atomlabs_setting('layout_bound') == 'full' ? 1080 : 1010;
	}
}
endif; // atom_setup
add_action( 'after_setup_theme', 'atom_setup' );

/**
 * Setup the WordPress core custom background feature.
 * 
 * @since atom 1.0
 */
function atom_register_custom_background() {

	if(atomlabs_setting('layout_bound') == 'boxed') {
		$args = array(
			'default-color' => 'e8e8e8',
			'default-image' => '',
		);

		$args = apply_filters( 'atom_custom_background_args', $args );
		add_theme_support( 'custom-background', $args );
	}

}
add_action( 'after_setup_theme', 'atom_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since atom 1.0
 */
function atom_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'atom' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer', 'atom' ),
		'id' => 'sidebar-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
}
add_action( 'widgets_init', 'atom_widgets_init' );

function atom_print_styles(){
	if( !atomlabs_setting('layout_responsive') ) return;

	// Create the footer widget CSS
	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = isset($sidebars_widgets['sidebar-footer']) ? count($sidebars_widgets['sidebar-footer']) : 1;
	$count = max($count,1);

	?>
	<style type="text/css" media="screen">
		#footer-widgets .widget { width: <?php echo round(100/$count,3) . '%' ?>; }
		@media screen and (max-width: 640px) {
			#footer-widgets .widget { width: auto; float: none; }
		}
	</style>
	<?php
}
add_action('wp_head', 'atom_print_styles', 11);


/**
 * Add custom body classes.
 * 
 * @param $classes
 * @package atom
 * @since 1.0
 */
function atom_body_class($classes){
	if( atomlabs_setting('layout_responsive') ) $classes[] = 'responsive';
	$classes[] = 'layout-'.atomlabs_setting('layout_bound');
	$classes[] = 'no-js';

	if( !is_active_sidebar('sidebar-1') ) {
		$classes[] = 'no-sidebar';
	}

	if( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}

	if(atomlabs_setting('navigation_menu_search')) {
		$classes[] = 'has-menu-search';
	}

	return $classes;
}
add_filter('body_class', 'atom_body_class');

/**
 * Display the scroll to top link.
 */
function atom_back_to_top() {
	if( !atomlabs_setting('navigation_display_scroll_to_top') ) return;
	?><a href="#" id="scroll-to-top"><?php __('Back To Top', 'atom') ?></a><?php
}
add_action('wp_footer', 'atom_back_to_top');

/**
 * @return mixed
 */
function atom_get_query_variables(){
	global $wp_query;
	$vars = $wp_query->query_vars;
	foreach($vars as $k => $v) {
		if(empty($vars[$k])) unset ($vars[$k]);
	}
	unset($vars['update_post_term_cache']);
	unset($vars['update_post_meta_cache']);
	unset($vars['cache_results']);
	unset($vars['comments_per_page']);

	return $vars;
}

/**
 * Render the slider.
 */
function atom_render_slider(){

	if( is_front_page() && atomlabs_setting('home_slider') != 'none' ) {
		$settings_slider = atomlabs_setting('home_slider');

		if(!empty($settings_slider)) {
			$slider = $settings_slider;
		}
	}

	if( is_page() && atomlabs_metabox('atom_pageslider.pageslider') != 'none' ) {
		$page_slider = atomlabs_metabox('atom_pageslider.pageslider');
		if( !empty($page_slider) ) {
			$slider = $page_slider;
		}
	}

	if( empty($slider) ) return;

	global $atom_is_main_slider;
	$atom_is_main_slider = true;

	?><div id="main-slider" <?php if( atomlabs_setting('home_slider_stretch') ) echo 'data-stretch="true"' ?>><?php


	if($slider == 'demo') get_template_part('slider/demo');
	elseif( substr($slider, 0, 5) == 'meta:' ) {
		list($null, $slider_id) = explode(':', $slider);
		$slider_id = intval($slider_id);
		
		echo do_shortcode("[metaslider id=" . $slider_id . "]");
		
	}elseif( substr($slider, 0, 4) == 'rev:' ) {
		$slider_id = explode(':', $slider);
		$slider_id = $slider_id[1];

		echo do_shortcode("[rev_slider " . $slider_id . "]");
	}

	?></div><?php
	$atom_is_main_slider = false;
}

function atom_post_class_filter($classes){
	$classes[] = 'post';

	if( has_post_thumbnail() && !is_singular() ) {
		$classes[] = 'post-with-thumbnail';
		$classes[] = 'post-with-thumbnail-' . atomlabs_setting('blog_featured_image_type');
	}

	$classes = array_unique($classes);
	return $classes;
}
add_filter('post_class', 'atom_post_class_filter');

/**
 * Filter the posted on parts to remove the ones disabled in settings.
 *
 * @param $parts
 * @return mixed
 */
function atom_filter_atom_post_on_parts($parts){
	if(!atomlabs_setting('blog_post_author')) $parts['by'] = '';
	if(!atomlabs_setting('blog_post_date')) $parts['on'] = '';

	return $parts;
}
add_filter('atom_post_on_parts', 'atom_filter_atom_post_on_parts');

/**
 * Get the site width.
 *
 * @return int The side width in pixels.
 */
function atom_get_site_width(){
	return apply_filters('atom_site_width', !empty($GLOBALS['atom_site_width']) ? $GLOBALS['atom_site_width'] : 1080);
}

/**
 * Add the responsive header
 */
function atom_responsive_header(){
	if( atomlabs_setting('layout_responsive') ) {
		?><meta name="viewport" content="width=device-width, initial-scale=1" /><?php
	}
}
add_action('wp_head', 'atom_responsive_header');

// Add SoundCloud oEmbed
function add_oembed_soundcloud(){
wp_oembed_add_provider( 'http://soundcloud.com/*', 'http://soundcloud.com/oembed' );
}
add_action('init','add_oembed_soundcloud');