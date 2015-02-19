<?php

define('SITEORIGIN_IS_PREMIUM', true);

// Include all the premium extras
include get_template_directory() . '/premium/extras/ajax-comments/ajax-comments.php';
include get_template_directory() . '/premium/extras/customizer/customizer.php';

// Theme specific files
include get_template_directory() . '/premium/inc/customizer.php';
//include get_template_directory() . '/premium/inc/panels.php';

function atom_premium_setup(){
	if( atomlabs_setting('social_ajax_comments') ) siteorigin_ajax_comments_activate();

	if( atomlabs_setting('navigation_responsive_menu') ) { 
		include get_template_directory() . '/premium/extras/mobilenav/mobilenav.php';
	}
}
add_action('after_setup_theme', 'atom_premium_setup', 15);


function atom_premium_logo_retina($attr){
	$logo = atomlabs_setting( 'logo_image_retina' );
	if( $logo ) {
		$image = wp_get_attachment_image_src($logo, 'full');

		// Ignore empty images
		if(empty($image)) return $attr;
		list ($src, $height, $width) = $image;

		$attr['data-retina-image'] = $src;
	}

	return $attr;
}
add_filter('atom_logo_image_attributes', 'atom_premium_logo_retina');

function atom_premium_filter_mobilenav($text){
	if( atomlabs_setting('navigation_responsive_menu_text') ) {
		$text['navigate'] = atomlabs_setting('navigation_responsive_menu_text');
	}

	return $text;
}
add_filter('siteorigin_mobilenav_text', 'atom_premium_filter_mobilenav');

function atom_premium_filter_mobilenav_collapse($collpase){
	return atomlabs_setting('navigation_responsive_menu_collapse');
}
add_filter('siteorigin_mobilenav_resolution', 'atom_premium_filter_mobilenav_collapse');