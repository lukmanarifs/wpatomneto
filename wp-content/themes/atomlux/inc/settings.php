<?php
/**
 * Configure theme settings.
 *
 * @package atom
 * @since atom 1.0
 * @license GPL 2.0
 */

/**
 * Setup theme settings.
 * 
 * @since atom 1.0
 */
function atom_theme_settings(){

	atomlabs_settings_add_section( 'logo', __('Logo', 'atom' ) );
	atomlabs_settings_add_section( 'layout', __('Layout', 'atom' ) );
	atomlabs_settings_add_section( 'home', __('Home', 'atom' ) );
	atomlabs_settings_add_section( 'navigation', __('Navigation', 'atom' ) );
	atomlabs_settings_add_section( 'blog', __('Blog', 'atom' ) );
	atomlabs_settings_add_section( 'social', __('Social', 'atom' ) );
	atomlabs_settings_add_section( 'general', __('General', 'atom' ) );

	/**
	 * Logo Settings
	 */

	atomlabs_settings_add_field('logo', 'image', 'media', __('Logo Image', 'atom'), array(
		'choose' => __('Choose Image', 'atom'),
		'update' => __('Set Logo', 'atom'),
		'description' => __('Your own custom logo.', 'atom')
	) );

	atomlabs_settings_add_teaser('logo', 'image_retina', __('Retina Logo', 'atom'), array(
		'choose' => __('Choose Image', 'atom'),
		'update' => __('Set Logo', 'atom'),
		'description' => __('A double sized version of your logo for retina displays. Must be used in addition to standard logo.', 'atom'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/retina-logo.png',
	) );

	atomlabs_settings_add_field('logo', 'header_text', 'text', __('Header Text', 'atom'), array(
		'description' => __('Text that appears to the right of your logo.', 'atom')
	) );

	/**
	 * Layout Settings
	 */

	atomlabs_settings_add_field('layout', 'responsive', 'checkbox', __('Responsive Layout', 'atom'), array(
		'description' => __('Scale your layout for small screen devices.', 'atom')
	));

	atomlabs_settings_add_field('layout', 'bound', 'select', __('Layout Bound', 'atom'), array(
		'options' => array(
			'boxed' => __('Boxed', 'atom'),
			'full' => __('Full Width', 'atom'),
		),
		'description' => __('Change the width of the bounding box.', 'atom')
	) );

	atomlabs_settings_add_field('layout', 'masthead', 'select', __('Masthead Layout', 'atom'), array(
		'options' => atomlabs_settings_template_part_names('parts/masthead', 'Part Name'),
		'description' => __("Change which header area layout you're using.", 'atom')
	) );

	atomlabs_settings_add_field('layout', 'menu', 'select', __('Masthead Menu', 'atom'), array(
		'options' => atomlabs_settings_template_part_names('parts/menu', 'Part Name'),
		'description' => __("Choose how the masthead menu is displayed.", 'atom')
	) );

	atomlabs_settings_add_field('layout', 'footer', 'select', __('Footer Layout', 'atom'), array(
		'options' => atomlabs_settings_template_part_names('parts/footer', 'Part Name'),
		'description' => __("Change which footer area layout you're using.", 'atom')
	) );

	/**
	 * Navigation settings
	 */

	atomlabs_settings_add_teaser('navigation', 'responsive_menu', __('Responsive Menu', 'atom'), array(
		'description' => __('Use a special responsive menu for small screen devices.', 'atom'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/mobile-nav.png',
	));

	atomlabs_settings_add_teaser('navigation', 'responsive_menu_text', __('Responsive Menu Text', 'atom'), array(
		'description' => __('The button used for the responsive menu.', 'atom')
	));

	atomlabs_settings_add_field('navigation', 'use_sticky_menu', 'checkbox', __('Sticky Menu', 'atom'), array(
		'description' => __('Sticks the menu to the top of the screen when a user scrolls down.', 'atom')
	));

	atomlabs_settings_add_field('navigation', 'menu_search', 'checkbox', __('Search in Menu', 'atom'), array(
		'description' => __('Display a search in the main menu.', 'atom')
	));

	atomlabs_settings_add_field('navigation', 'display_scroll_to_top', 'checkbox', __('Display Scroll To Top', 'atom'), array(
		'description' => __('Display a scroll-to-top button when a user scrolls down.', 'atom')
	));

	atomlabs_settings_add_field( 'navigation', 'post_nav', 'checkbox', __('Post Navigation', 'atom'), array(
		'description' => __('Display next/previous post navigation.', 'atom')
	) );

	atomlabs_settings_add_field( 'navigation', 'home_icon', 'checkbox', __('Home Page Icon', 'atom'), array(
		'description' => __('Display home icon for home page menu links.', 'atom')
	) );

	/**
	 * Home Page
	 */

	atomlabs_settings_add_field('home', 'slider', 'select', __('Home Page Slider', 'atom'), array(
		'options' => siteorigin_metaslider_get_options(true),
		'description' => sprintf(
			__('This theme supports <a href="%s" target="_blank">Meta Slider</a>. <a href="%s">Install it</a> for free to create beautiful responsive sliders - <a href="%s" target="_blank">More Info</a>', 'atom'),
			'http://sorig.in/metaslider',
			siteorigin_metaslider_install_link(),
			'http://siteorigin.com/atom-documentation/slider/'
		)
	));

	atomlabs_settings_add_field('home', 'slider_stretch', 'checkbox', __('Stretch Home Slider', 'atom'), array(
		'label' => __('Stretch', 'atom'),
		'description' => __('Stretch the home page slider to the width of the screen if using the full width layout.', 'atom'),
	) );

	/**
	 * Blog Settings
	 */

	atomlabs_settings_add_field('blog', 'archive_layout', 'select', __('Blog Archive Layout', 'atom'), array(
		'options' => atom_blog_layout_options(),
		'description' => __('Show the post author in blog archive pages.', 'atom')
	) );

	atomlabs_settings_add_field('blog', 'archive_content', 'select', __('Post Content', 'atom'), array(
		'options' => array(
			'full' => __('Full Post', 'atom'),
			'excerpt' => __('Post Excerpt', 'atom'),
		),
		'description' => __('Choose how to display posts on post archive when using default blog layout.', 'atom')
	));

	atomlabs_settings_add_field('blog', 'post_author', 'checkbox', __('Post Author', 'atom'), array(
		'label' => __('Display', 'atom'),
		'description' => __('Show the post author in blog archive pages.', 'atom')
	));

	atomlabs_settings_add_field('blog', 'post_date', 'checkbox', __('Post Date', 'atom'), array(
		'label' => __('Display', 'atom'),
		'description' => __('Show the post date.', 'atom')
	));

	atomlabs_settings_add_field('blog', 'featured_image', 'checkbox', __('Featured Image', 'atom'), array(
		'label' => __('Display', 'atom'),
		'description' => __('Show the featured image on a post single page.', 'atom')
	) );

	atomlabs_settings_add_field('blog', 'featured_image_type', 'select', __('Featured Image Type', 'atom'), array(
		'options' => array(
			'large' => __('Large', 'atom'),
			'icon' => __('Small Icon', 'atom'),
		),
		'description' => __('Size of the featured image in the blog post archives.', 'atom')
	) );

	/**
	 * Social Settings
	 */

	atomlabs_settings_add_teaser('social', 'ajax_comments', __('Ajax Comments', 'atom'), array(
		'description' => __('Keep your conversations flowing with ajax comments.', 'atom')
	));

	atomlabs_settings_add_teaser('social', 'share_post', __('Post Sharing', 'atom'), array(
		'description' => __('Show icons to share your posts on Facebook, Twitter and Google+.', 'atom'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/share.png',
	));

	atomlabs_settings_add_teaser('social', 'twitter', __('Twitter Handle', 'atom'), array(
		'description' => __('This handle will be recommended after a user shares one of your posts.', 'atom'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/share-rec.png',
	));

	/**
	 * General Settings
	 */

	atomlabs_settings_add_field( 'general', 'site_info_text', 'text', __( 'Site Information Text', 'atom' ), array(
		'description' => __( 'Text displayed in your footer. Useful for copyright information.', 'atom' )
	) );

}
add_action('admin_init', 'atom_theme_settings');

/**
 * Setup theme default settings.
 * 
 * @param $defaults
 * @return mixed
 * @since atom 1.0
 */
function atom_theme_setting_defaults($defaults){
	$defaults['logo_image'] = array(
		get_template_directory_uri().'/images/logo.png', 40, 181
	);

	$defaults['logo_image_retina'] = false;
	$defaults['logo_header_text'] = __('Call me! Maybe?', 'atom');

	$defaults['layout_responsive'] = true;
	$defaults['layout_bound'] = 'full';
	$defaults['layout_masthead'] = '';
	$defaults['layout_footer'] = '';

	$defaults['navigation_responsive_menu'] = true;
	$defaults['navigation_responsive_menu_text'] = '';
	$defaults['navigation_use_sticky_menu'] = true;
	$defaults['navigation_menu_search'] = true;
	$defaults['navigation_display_scroll_to_top'] = true;
	$defaults['navigation_post_nav'] = true;
	$defaults['navigation_home_icon'] = false;

	$defaults['home_slider'] = 'demo';
	$defaults['home_slider_stretch'] = true;

	$defaults['blog_archive_layout'] = 'blog';
	$defaults['blog_archive_content'] = 'full';
	$defaults['blog_post_author'] = true;
	$defaults['blog_post_date'] = true;
	$defaults['blog_featured_image'] = true;
	$defaults['blog_featured_image_type'] = 'large';

	$defaults['social_ajax_comments'] = true;
	$defaults['social_share_post'] = true;
	$defaults['social_twitter'] = '';

	$defaults['general_site_info_text'] = '';

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'atom_theme_setting_defaults');

function atom_blog_layout_options(){
	$layouts = array();
	foreach( glob(get_template_directory().'/loops/loop-*.php') as $template ) {
		$headers = get_file_data( $template, array(
			'loop_name' => 'Loop Name',
		) );

		preg_match('/loop\-(.*?)\.php/', basename($template), $matches);
		if(!empty($matches[1])) {
			$layouts[$matches[1]] = $headers['loop_name'];
		}
	}

	static $exclude = array(
		'carousel', 'slider'
	);

	foreach($exclude as $e) unset($layouts[$e]);
	return $layouts;
}

function atom_feature_suggestion_url($url){
	return 'http://sorig.in/atom-suggestions';
}
add_filter('atomlabs_settings_suggest_features_url', 'atom_feature_suggestion_url');