<?php

function atom_customizer_init(){

	$sections = apply_filters( 'atom_premium_customizer_sections', array(
		'atom_fonts' => array(
			'title' => __('Fonts', 'atom'),
			'priority' => 30,
		),

		'atom_general' => array(
			'title' => __('General', 'atom'),
			'priority' => 40,
		),

		'atom_menu' => array(
			'title' => __('Menu', 'atom'),
			'priority' => 50,
		),

		'atom_widgets' => array(
			'title' => __('Widgets', 'atom'),
			'priority' => 52,
		),

		'atom_page' => array(
			'title' => __('Page', 'atom'),
			'priority' => 55,
		),

		'atom_footer' => array(
			'title' => __('Footer', 'atom'),
			'priority' => 100,
		),

	) );

	$settings = apply_filters( 'atom_premium_customizer_settings', array(
		// Fonts

		'atom_fonts' => array(

			'body_font' => array(
				'type' => 'font',
				'title' => __('Body Font', 'atom'),
				'default' => 'Helvetica Neue',
				'selector' => 'body,button,input,select,textarea',
			),

			'title_font' => array(
				'type' => 'font',
				'title' => __('Site Title Font', 'atom'),
				'default' => 'Helvetica Neue',
				'selector' => 'header#masthead h1',
			),

			'heading_font' => array(
				'type' => 'font',
				'title' => __('Heading Font', 'atom'),
				'default' => 'Helvetica Neue',
				'selector' => 'h1,h2,h3,h4,h5,h6',
			),

			// Font sizes

			'page_title_size' => array(
				'type' => 'measurement',
				'title' => __('Page Title Size', 'atom'),
				'default' => 20,
				'unit' => 'px',
				'selector' => '#page-title, article.post .entry-header h1.entry-title, article.page .entry-header h1.entry-title',
				'property' => array('font-size'),
			),

			'page_title_color' => array(
				'type' => 'color',
				'title' => __('Page Title Color', 'atom'),
				'default' => '#3b3b3b',
				'selector' => '#page-title, article.post .entry-header h1.entry-title, article.page .entry-header h1.entry-title',
				'property' => array('color'),
			),

			'content_size' => array(
				'type' => 'measurement',
				'title' => __('Content Size', 'atom'),
				'default' => 13,
				'unit' => 'px',
				'selector' => '.entry-content',
				'property' => array('font-size'),
			),

			'content_color' => array(
				'type' => 'color',
				'title' => __('Content Color', 'atom'),
				'default' => '#666666',
				'selector' => '.entry-content',
				'property' => array('color'),
			),

			'content_heading_color' => array(
				'type' => 'color',
				'title' => __('Content Heading Color', 'atom'),
				'default' => '#444444',
				'selector' => '.entry-content h1,.entry-content h2,.entry-content h3,.entry-content h4,.entry-content h5,.entry-content h6',
				'property' => array('color'),
			),

		),

		'atom_general' => array(

			'header_padding' => array(
				'type' => 'measurement',
				'title' => __('Header Padding', 'atom'),
				'default' => 45,
				'unit' => 'px',
				'selector' => 'header#masthead hgroup',
				'property' => array('padding-top', 'padding-bottom'),
			),

			'logo_centered' => array(
				'type' => 'checkbox',
				'title' => __('Center Logo', 'atom'),
				'default' => false,
				'callback' => 'atom_customizer_callback_logo_center',
			),

			'link_color' => array(
				'type' => 'color',
				'title' => __('Content Link Color', 'atom'),
				'default' => '#248cc8',
				'selector' => '.entry-content p a, .entry-content p a:visited, #secondary p a, #secondary p a:visited',
				'property' => 'color',
				'no_live' => true,
			),

			'link_hover_color' => array(
				'type' => 'color',
				'title' => __('Content Link Hover Color', 'atom'),
				'default' => '#f47e3c',
				'selector' => '.entry-content p a:hover, .entry-content p a:focus, .entry-content p a:active, #secondary p a:hover',
				'property' => 'color',
				'no_live' => true,
			),

		),

		// The main menu

		'atom_menu' => array(

			'background' => array(
				'type' => 'color',
				'title' => __('Background', 'atom'),
				'default' => '#343538',
				'selector' => '.main-navigation',
				'property' => 'background-color',
			),

			'text' => array(
				'type' => 'color',
				'title' => __('Text Color', 'atom'),
				'default' => '#e2e2e2',
				'selector' => '.main-navigation a',
				'property' => 'color',
			),

			'second_background' => array(
				'type' => 'color',
				'title' => __('Second Level Background', 'atom'),
				'default' => '#464646',
				'selector' => '.main-navigation ul ul',
				'property' => 'background-color',
			),

			'second_text' => array(
				'type' => 'color',
				'title' => __('Second Level Text', 'atom'),
				'default' => '#e2e2e2',
				'selector' => '.main-navigation ul ul a',
				'property' => 'color',
			),

			'hover_background' => array(
				'type' => 'color',
				'title' => __('Hover Background', 'atom'),
				'default' => '#00bcff',
				'selector' => '.main-navigation ul li:hover > a, #search-icon #search-icon-icon:hover',
				'property' => 'background-color',
				'no_live' => true,
			),

			'hover_text' => array(
				'type' => 'color',
				'title' => __('Hover Text', 'atom'),
				'default' => '#FFFFFF',
				'selector' => '.main-navigation ul li:hover > a, .main-navigation ul li:hover > a [class^="icon-"]',
				'property' => 'color',
				'no_live' => true,
			),

			'hover_background_second' => array(
				'type' => 'color',
				'title' => __('Second Level Hover', 'atom'),
				'default' => '#00bcff',
				'selector' => '.main-navigation ul ul li:hover > a',
				'property' => 'background-color',
				'no_live' => true,
			),

			'hover_text_second' => array(
				'type' => 'color',
				'title' => __('Second Level Hover Text', 'atom'),
				'default' => '#FFFFFF',
				'selector' => '.main-navigation ul ul li:hover > a',
				'property' => 'color',
				'no_live' => true,
			),

			'icon_color' => array(
				'type' => 'color',
				'title' => __('Icon Color', 'atom'),
				'default' => '#CCCCCC',
				'selector' => '.main-navigation [class^="icon-"], .main-navigation .mobile-nav-icon',
				'property' => 'color',
			),

			'icon_hover_color' => array(
				'type' => 'color',
				'title' => __('Icon Hover Color', 'atom'),
				'default' => '#FFFFFF',
				'selector' => '.main-navigation ul li:hover > a [class^="icon-"], .main-navigation ul li:hover > a .mobile-nav-icon',
				'property' => 'color',
				'no_live' => true,
			),

			'current_background' => array(
				'type' => 'color',
				'title' => __('Current Page Background', 'atom'),
				'default' => '#343538',
				'selector' => '.main-navigation ul li.current-menu-item > a',
				'property' => 'background-color',
				'no_live' => true,
			),

			'current_text' => array(
				'type' => 'color',
				'title' => __('Current Page Text', 'atom'),
				'default' => '#FFFFFF',
				'selector' => '.main-navigation ul li.current-menu-item > a, .main-navigation ul li.current-menu-item > a [class^="icon-"]',
				'property' => 'color',
				'no_live' => true,
			),

			'search' => array(
				'type' => 'color',
				'title' => __('Search Icon Background', 'atom'),
				'default' => '#303134',
				'selector' => '#search-icon #search-icon-icon',
				'property' => 'background-color',
			),

			'search_input' => array(
				'type' => 'color',
				'title' => __('Search Input Background', 'atom'),
				'default' => '#2d2e31',
				'selector' => '#search-icon .searchform',
				'property' => 'background-color',
			),

			'search_input_text' => array(
				'type' => 'color',
				'title' => __('Search Input Text', 'atom'),
				'default' => '#d1d1d1',
				'selector' => '#search-icon .searchform input[name=s]',
				'property' => 'color',
			),

			'topbottom_padding' => array(
				'type' => 'measurement',
				'title' => __('Menu Item Padding', 'atom'),
				'default' => 20,
				'unit' => 'px',
				'selector' => '.main-navigation ul li a',
				'property' => array('padding-top', 'padding-bottom'),
			),

			'widget_menu_border' => array(
				'type' => 'color',
				'title' => __('Header Widget Menu Border Color', 'atom'),
				'default' => '#00bcff',
				'selector' => '#header-sidebar .widget_nav_menu ul.menu > li > ul.sub-menu',
				'property' => array('border-top-color'),
				'no_live' => true,
			),

		),

		'atom_widgets' => array(
			'circle_icon_bg' => array(
				'type' => 'color',
				'title' => __('Circle Icon Widget Background', 'atom'),
				'default' => '#3a3b3e',
				'selector' => '.widget_circleicon-widget .circle-icon-box .circle-icon',
				'property' => 'background-color',
			),

			'circle_icon_icon' => array(
				'type' => 'color',
				'title' => __('Circle Icon Widget Icon', 'atom'),
				'default' => '#FFFFFF',
				'selector' => '.widget_circleicon-widget .circle-icon-box .circle-icon [class^="icon-"]',
				'property' => 'color',
			),
		),

		'atom_page' => array(

			'masthead_background' => array(
				'type' => 'color',
				'title' => __('Masthead Background', 'atom'),
				'default' => '#fcfcfc',
				'selector' => 'header#masthead',
				'property' => 'background-color',
			),

			'masthead_background_image' => array(
				'type' => 'image',
				'title' => __('Masthead Background Image', 'atom'),
				'default' => false,
				'selector' => 'header#masthead',
				'property' => 'background-image',
			),

			'page_background' => array(
				'type' => 'color',
				'title' => __('Page Background', 'atom'),
				'default' => '#fcfcfc',
				'selector' => '#main',
				'property' => 'background-color',
			),

			'page_background_image' => array(
				'type' => 'image',
				'title' => __('Page Background Image', 'atom'),
				'default' => false,
				'selector' => '#main',
				'property' => 'background-image',
			),

			'image_shadow' => array(
				'type' => 'checkbox',
				'title' => __('Image Shadow and Rounding', 'atom'),
				'default' => true,
				'callback' => 'atom_customizer_callback_image_shadow',
			),

		),

		'atom_footer' => array(

			'background' => array(
				'type' => 'color',
				'title' => __('Footer Background', 'atom'),
				'default' => '#2f3033',
				'selector' => '#colophon, body.layout-full',
				'property' => 'background-color',
			),

			'background_image' => array(
				'type' => 'image',
				'title' => __('Footer Background Image', 'atom'),
				'default' => false,
				'selector' => '#colophon',
				'property' => 'background-image',
			),

			'headings' => array(
				'type' => 'color',
				'title' => __('Headings', 'atom'),
				'default' => '#e2e2e2',
				'selector' => '#footer-widgets .widget .widget-title',
				'property' => 'color',
			),

			'text' => array(
				'type' => 'color',
				'title' => __('Text', 'atom'),
				'default' => '#b9b9b9',
				'selector' => '#footer-widgets .widget',
				'property' => 'color',
			),

			'links' => array(
				'type' => 'color',
				'title' => __('Links', 'atom'),
				'default' => '#cccccc',
				'selector' => '#footer-widgets .widget a',
				'property' => 'color',
			),

			'site_into' => array(
				'type' => 'color',
				'title' => __('Site Info Text', 'atom'),
				'default' => '#AAAAAA',
				'selector' => '#colophon #theme-attribution, #colophon #site-info',
				'property' => 'color',
			),

			'site_into_link' => array(
				'type' => 'color',
				'title' => __('Site Info Link', 'atom'),
				'default' => '#DDDDDD',
				'selector' => '#colophon #theme-attribution a, #colophon #site-info a',
				'property' => 'color',
			),
		),
	) );

	// Include all the SiteOrigin customizer classes
	global $siteorigin_atom_customizer;
	$siteorigin_atom_customizer = new SiteOrigin_Customizer_Helper($settings, $sections, 'atom');
}
add_action('init', 'atom_customizer_init');

/**
 * @param WP_Customize_Manager $wp_customize
 */
function atom_customizer_register($wp_customize){
	global $siteorigin_atom_customizer;
	$siteorigin_atom_customizer->customize_register($wp_customize);
}
add_action( 'customize_register', 'atom_customizer_register', 15 );

/**
 * Display the styles
 */
function atom_customizer_style() {
	global $siteorigin_atom_customizer;
	$builder = $siteorigin_atom_customizer->create_css_builder();

	// Add any extra CSS customizations
	echo $builder->css();
}
add_action('wp_head', 'atom_customizer_style', 20);

/**
 * @param SiteOrigin_Customizer_CSS_Builder $builder
 * @param mixed $val
 * @param array $setting
 */
function atom_customizer_callback_logo_center($builder, $val, $setting){
	if( $val ) {
		$builder->add_css('header#masthead hgroup .logo', 'float', 'none');
		$builder->add_css('header#masthead hgroup .logo img', 'display', 'block');
		$builder->add_css('header#masthead hgroup .logo img', 'margin', '0 auto');
	}

	return $builder;
}

/**
 * @param SiteOrigin_Customizer_CSS_Builder $builder
 * @param mixed $val
 * @param array $setting
 */
function atom_customizer_callback_image_shadow($builder, $val, $setting){
	if( !$val ) {
		$builder->add_css('.entry-content img', '-webkit-border-radius', '0 !important');
		$builder->add_css('.entry-content img', '-moz-border-radius', '0 !important');
		$builder->add_css('.entry-content img', 'border-radius', '0 !important');
		$builder->add_css('.entry-content img', '-webkit-box-shadow', 'none !important');
		$builder->add_css('.entry-content img', '-moz-box-shadow', 'none !important');
		$builder->add_css('.entry-content img', 'box-shadow', 'none !important');
	}

	return $builder;
}