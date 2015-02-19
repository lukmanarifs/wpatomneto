<?php

/**
 * Add networks to the social media widget.
 *
 * @param $networks
 * @return array
 */
function atom_premium_social_widget_add_networks($networks) {
	$networks = array_merge( $networks, array(
		// Add networks that have FontAwesome icons
		'linkedin' => __('LinkedIn', 'atom'),
		'dribbble' => __('Dribbble', 'atom'),
		'flickr' => __('Flickr', 'atom'),
		'instagram' => __('Instagram', 'atom'),
		'pinterest' => __('Pinterest', 'atom'),
		'skype' => __('Skype', 'atom'),
		'youtube' => __('YouTube', 'atom'),
		'github' => __('GitHub', 'atom'),

		// These ones don't have FontAwesome Icons
		'vimeo' => __('Vimeo', 'atom'),
	) );

	return $networks;
}
add_filter('atom_social_widget_networks', 'atom_premium_social_widget_add_networks');

/**
 * Add sizes to the social media widget.
 *
 * @param $sizes
 */
function atom_premium_social_widget_add_sizes($sizes) {
	$sizes['small'] = __('Small', 'atom');
	$sizes['large'] = __('Large', 'atom');
	return $sizes;
}
add_filter('atom_social_widget_sizes', 'atom_premium_social_widget_add_sizes');

/**
 * Display the Vimeo icon
 * @return string
 */
function atom_premium_social_widget_icon_vimeo(){
	return '<img src="'.get_template_directory_uri().'/premium/images/brands/vimeo.png" />';
}
add_filter('atom_social_widget_icon_vimeo', 'atom_premium_social_widget_icon_vimeo');