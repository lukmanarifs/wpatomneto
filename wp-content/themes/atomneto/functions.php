<?php
get_template_part("inc/widget-atom-facebook");
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 788;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links and post formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since ATOM 1.0
 */


/**
 * Sets up theme defaults styles and scripts.
 *
 * @since ATOM 1.0
 */
function atom_init_styles_scripts() {
	global $atom_options;

	//get template directory url
	$dir = get_template_directory_uri();

	//get theme version
	$theme_data = wp_get_theme();
	$ver = $theme_data['Version'];

	/* bootstrap & fontawesome css files */
	wp_enqueue_style( 'bootstrap', $dir.'/bootstrap/css/bootstrap.css' , array() , $ver );
	wp_enqueue_style( 'font-awesome', $dir.'/fonts/font-awesome/css/font-awesome.css' , array() , $ver );
	wp_enqueue_style( 'fontello', $dir.'/fonts/fontello/css/fontello.css' , array() , $ver );


	wp_enqueue_style( 'magnific-popup', $dir.'/plugins/magnific-popup/magnific-popup.css' , array() , $ver );
	wp_enqueue_style( 'mainstyle', $dir.'/css/style.css' , array() , $ver );
	wp_enqueue_style( 'animations', $dir.'/css/animations.css' , array() , $ver );
	wp_enqueue_style( 'owl-carousel', $dir.'/plugins/owl-carousel/owl.carousel.css' , array() , $ver );
	wp_enqueue_style( 'customcss', $dir.'/css/custom.css' , array() , $ver );

	//Javascripts
	wp_enqueue_script('jquery');
	if ( is_singular() && comments_open() ) { wp_enqueue_script( 'comment-reply' );	}
	wp_enqueue_script( 'bootstrap' , $dir.'/bootstrap/js/bootstrap.min.js' , array('jquery') , $ver , true);
	wp_enqueue_script( 'modernizr' , $dir . '/plugins/modernizr.js' , array('jquery') , $ver , true);
	wp_enqueue_script( 'isotope' , $dir . '/plugins/isotope/isotope.pkgd.min.js' , array('jquery') , $ver , true);
	wp_enqueue_script( 'owl-carousel' , $dir . '/plugins/owl-carousel/owl.carousel.js' , array('jquery') , $ver , true);
	wp_enqueue_script( 'magnific-popup' , $dir . '/plugins/magnific-popup/jquery.magnific-popup.min.js' , array('jquery') , $ver , true);
	wp_enqueue_script( 'jquery-appear' , $dir . '/plugins/jquery.appear.js' , array('jquery') , $ver , true);
	wp_enqueue_script( 'jquery-countto' , $dir . '/plugins/jquery.countTo.js' , array('jquery') , $ver , true);
	wp_enqueue_script( 'jquery-parallax' , $dir . '/plugins/jquery.parallax-1.1.3.js' , array('jquery') , $ver , true);
	wp_enqueue_script( 'template' , $dir . '/js/template.js' , array('jquery') , $ver , true);

}
add_action('wp_enqueue_scripts', 'atom_init_styles_scripts');

/**
 * Sets up custom title
 *
 * @since ATOM 1.0
 */
function atom_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ){return $title;	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ){
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ){
		$title = "$title $sep " . sprintf( __( 'Page %s', 'atom' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'atom_wp_title', 10, 2 );

/**
 * Sets up custom theme styles
 *
 * @since ATOM 1.0
 */
function atom_custom_styles(){


	echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->';
}
add_action( 'wp_head', 'atom_custom_styles' );


global $pagenow;
 if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
 {
      wp_redirect( admin_url( 'admin.php?page=install-required-plugins' ) );
      exit;
 }

if ( ( ! class_exists( 'OT_Loader' ) ) && ( is_front_page() ) ) {
die('<center><h1>This theme require <a href="'.get_bloginfo('url').'/wp-admin/admin.php?page=install-required-plugins">ATOMLABS Option</a></h1></center>');
}

/**
 * atom functions and definitions
 *
 * @since ATOM 1.0
 */
define("THEME_URL", get_template_directory_uri());
define("THEME_IMG_URL",THEME_URL."/img/");

/**
 * All ATOM common functions.
 * Don't remove it.
 *
 * @since ATOM 1.0
 */

require_once("inc/atomstore-functions.php");

if ( ! function_exists( 'ot_options_id' ) ) {

function ot_options_id() {

    return apply_filters( 'ot_options_id', 'option_tree' );

  }
}

/**
 * Filter the return values through WPML
 *
 * @param     array     $options The current options
 * @param     string    $option_id The option ID
 * @return    mixed
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_wpml_filter' ) ) {

  function ot_wpml_filter( $options, $option_id ) {

    // Return translated strings using WMPL
    if ( function_exists('icl_t') ) {

      $settings = get_option( ot_settings_id() );

      if ( isset( $settings['settings'] ) ) {

        foreach( $settings['settings'] as $setting ) {

          // List Item & Slider
          if ( $option_id == $setting['id'] && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {

            foreach( $options[$option_id] as $key => $value ) {

              foreach( $value as $ckey => $cvalue ) {

                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );

                if ( ! empty( $_string ) ) {

                  $options[$option_id][$key][$ckey] = $_string;

                }

              }

            }

          // List Item & Slider
          } else if ( $option_id == $setting['id'] && $setting['type'] == 'social-links' ) {

            foreach( $options[$option_id] as $key => $value ) {

              foreach( $value as $ckey => $cvalue ) {

                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );

                if ( ! empty( $_string ) ) {

                  $options[$option_id][$key][$ckey] = $_string;

                }

              }

            }

          // All other acceptable option types
          } else if ( $option_id == $setting['id'] && in_array( $setting['type'], apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple' ) ) ) ) {

            $_string = icl_t( 'Theme Options', $option_id, $options[$option_id] );

            if ( ! empty( $_string ) ) {

              $options[$option_id] = $_string;

            }

          }

        }

      }

    }

    return $options[$option_id];

  }

}

if ( ! function_exists( 'ot_get_option' ) ) {
function ot_get_option( $option_id, $default = '' ) {

/* get the saved options */
$options = get_option( ot_options_id() );

/* look for the saved value */
if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {

  return ot_wpml_filter( $options, $option_id );

}

return $default;

}
}

function atom_get_options_key( $name , $default = '' ){
	return ot_get_option( $name , $default );
}


/**
 * Sets up theme custom options, post, update notifier.
 * Don't remove it.
 *
 * @since ATOM 1.0
 */
include_once("inc/atomcore-config.php");


/**
 * Get all ATOM options value
 */
global $atom_options;
$atom_options = get_option("atom_options");

require_once('inc/plugins-config.php');
require_once('woocommerce/woocommerce-config.php');

// Register your custom function to override some LayerSlider data
add_action('layerslider_ready', 'my_layerslider_overrides');
function my_layerslider_overrides() {
	// Disable auto-updates
	$GLOBALS['lsAutoUpdateBox'] = false;
}


add_action('wp_ajax_nopriv_post-like', 'atomcore_post_like');
add_action('wp_ajax_post-like', 'atomcore_post_like');

// Generate options CSS
add_action('admin_init', 'atom_generate_options_css');

// Theme Upgrader


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 788;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links and post formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since ATOM 1.0
 */
function atom_setup() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link');
	remove_action( 'wp_head', 'wlwmanifest_link');

	// Load the Themes' Translations through domain
	load_theme_textdomain( 'atom', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'atom_menu', __( 'ATOM Main Menus', 'atom' ) );
	register_nav_menu( 'atom_topbar_menu', __( 'ATOM Topbar Menus', 'atom' ) );
	register_nav_menu( 'atom_bottom_menu', __( 'ATOM Bottom Menus', 'atom' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// Add Woocommerce Support
	add_theme_support( 'woocommerce' );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( 788, 445, true );

	//atom theme image size
	atom_add_image_size( 'atom-l-thumbs' , 750 , 423 , true);
	atom_add_image_size( 'atom-m-thumbs' , 555 , 313 , true);
	atom_add_image_size( 'atom-s-thumbs' , 450 , 254 , true);
	atom_add_image_size( 'atom-square-thumbs' , 750 , 750 , true);
	atom_add_image_size( 'atom-nocrop-thumbs' , 750 , 1500 , false);

	//woocommerce image size
	if (class_exists( 'woocommerce' )) {
		$shop_thumbnail = array('width'=> '120','height'=> '120','crop'=> 1);
		$shop_catalog = array('width'=> '500','height'=> '666','crop'=> 0);
		$shop_single = array('width' => '545','height'=> '999','crop'=> 0);

		update_option( 'shop_thumbnail_image_size', $shop_thumbnail );
		update_option( 'shop_catalog_image_size', $shop_catalog );
		update_option( 'shop_single_image_size', $shop_single );
	}

}
add_action( 'after_setup_theme', 'atom_setup' );


/**
 * Sets up theme defaults styles and scripts.
 *
 * @since ATOM 1.0
 */


/**
 * Sets up custom title
 *
 * @since ATOM 1.0
 */



/**
 * Sets up footer custom theme styles
 *
 * @since ATOM 1.0
 */
function atom_wp_footer_scripts(){
	global $atom_map_id,$atom_page_custom_scripts;
	//get template directory url
	$dir = get_template_directory_uri();

	if(isset($atom_map_id) && intval($atom_map_id > 0)){
		/* google map */
		wp_enqueue_script( 'googleapis', '//maps.googleapis.com/maps/api/js?v=3&amp;sensor=false');
		wp_enqueue_script( 'map-infobox', $dir . '/assets/js/infobox.js');
	}
	if((atom_get_options_key('custom-enable-scripts') == "on" && atom_get_options_key('custom-scripts-content') != "") || (isset($atom_page_custom_scripts) && $atom_page_custom_scripts != '')){
?>
	<script type="text/javascript">
    <?php
		if(atom_get_options_key('custom-enable-scripts') == "on" && atom_get_options_key('custom-scripts-content') != ""){
			echo atom_get_options_key('custom-scripts-content');
		}
		if(isset($atom_page_custom_scripts) && $atom_page_custom_scripts != ''){
			echo $atom_page_custom_scripts;
		}
	?>
    </script>
<?php
	}

	echo intval(atom_get_options_key('google_analytics-position')) == 1 ? atom_get_options_key('google_analytics-content') : "";
}
add_action( 'wp_footer', 'atom_wp_footer_scripts' );

/**
 * Add shortcode
 *
 * @since ATOM 1.0
 */

// Use shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');
include("inc/shortcodes.php");

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since ATOM 1.0
 */
function atom_widgets_init() {

	register_sidebar( array(
		'id'	 => 'global',
		'name' => __( 'Global Sidebar', 'atom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="line"></div><div class="clear"></div>'
	));

	register_sidebar( array(
		'id'	=>'sidebar-footer-1',
		'name' => __( 'Footer 1', 'atom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));

	register_sidebar( array(
		'id'	=>'sidebar-footer-2',
		'name' => __( 'Footer 2', 'atom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));

	register_sidebar( array(
		'id'	=>'sidebar-footer-3',
		'name' => __( 'Footer 3', 'atom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));

	register_sidebar( array(
		'id'	=>'sidebar-footer-4',
		'name' => __( 'Footer 4', 'atom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	));

	register_sidebar( array(
		'id'	=>'shop',
		'name' => __( 'Woocommerce Shop', 'atom' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="line"></div><div class="clear"></div>'
	));

}
add_action( 'widgets_init', 'atom_widgets_init' );
include_once("inc/custom-widgets.php");

/**
 * Redesign login page
 */
function atom_login_logo() {
	global $atom_options;
?>
    <style type="text/css">
        body.login div#login h1 a {
			width:<?php echo atom_get_options_key('logo-image-width'); ?>px;
			height:<?php echo atom_get_options_key('logo-image-height'); ?>px;
			background-image:url(<?php echo atom_get_options_key('logo-image') == "" ?  get_template_directory_uri()."/img/logo.png" : atom_get_options_key('logo-image'); ?>);
    		background-size: <?php echo atom_get_options_key('logo-image-width'); ?>px <?php echo atom_get_options_key('logo-image-height'); ?>px;
        }
		@media only screen and (-Webkit-min-device-pixel-ratio: 1.5),
		only screen and (-moz-min-device-pixel-ratio: 1.5),
		only screen and (-o-min-device-pixel-ratio: 3/2),
		only screen and (min-device-pixel-ratio: 1.5) {
		body.login div#login h1 a {
			background-image: url(<?php echo atom_get_options_key('logo-retina-image') == "" ?  get_template_directory_uri()."/img/logo@2x.png" : atom_get_options_key('logo-retina-image'); ?>);
        }
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'atom_login_logo' );

function atom_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'atom_login_logo_url' );

function atom_login_logo_url_title() {
    return get_bloginfo('title');
}
add_filter( 'login_headertitle', 'atom_login_logo_url_title' );

add_action( 'init', 'create_portofolio_post_type' );
function create_portofolio_post_type() {
  register_post_type( 'portofolio',
    array(
      'labels' => array(
        'name' => __( 'Portofolio' ),
        'singular_name' => __( 'Portofolio' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
