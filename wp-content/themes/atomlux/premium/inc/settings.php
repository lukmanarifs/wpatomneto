<?php

/**
 * Setup all the premium settings.
 * 
 * @package atom
 * @since atom 1.0
 */
function atom_premium_theme_settings(){
	// Implement all the teaser settings
	atomlabs_settings_add_field('logo', 'image_retina', 'media');

	atomlabs_settings_add_field('navigation', 'responsive_menu', 'checkbox');
	atomlabs_settings_add_field('navigation', 'responsive_menu_text', 'text');

	atomlabs_settings_add_field('navigation', 'responsive_menu_collapse', 'number', __('Mobile Menu Collapse', 'atom'), array(
		'description' => __('The resolution when the menu collapses into a mobile navigation menu.', 'atom')
	) );

	atomlabs_settings_add_field('social', 'ajax_comments', 'checkbox');
	atomlabs_settings_add_field('social', 'share_post', 'checkbox');
	atomlabs_settings_add_field('social', 'twitter', 'text', null, array(
		'validator' => 'twitter',
	));
}
add_action('admin_init', 'atom_premium_theme_settings', 15);


function atom_premium_theme_setting_defaults($defaults){
	$defaults['navigation_responsive_menu_collapse'] = 480;

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'atom_premium_theme_setting_defaults');