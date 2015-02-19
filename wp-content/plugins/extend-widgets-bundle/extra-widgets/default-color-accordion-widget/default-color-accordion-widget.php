<?php

/*
Widget Name: Default Color Accordion widget
Description: An example widget which displays 'Default Color Accordion!'.
Author: Me
Author URI: http://example.com
*/

class Default_Color_Accordion_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'default-color-accordion-widget',
			__('Default Color Accordion Widget', 'default-color-accordion-widget-text-domain'),
			array(
				'description' => __('A Default Color Accordion widget.', 'default-color-accordion-widget-text-domain'),
			),
			array(

			),
			array(
				'text' => array(
					'type' => 'text',
					'label' => __('Default Color Accordion! goes here.', 'siteorigin-widgets'),
					'default' => 'Default Color Accordion!'
				),
				'caca' => array(
					'type' => 'media',
					'label' => __( 'Choose a media thing', 'widget-form-fields-text-domain' ),
					'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
					'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
					'library' => 'image'
			),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'default-color-accordion-widget-template';
	}

	function get_style_name($instance) {
		return 'default-color-accordion-widget-style';
	}

}

siteorigin_widget_register('default-color-accordion-widget', __FILE__, 'Default_Color_Accordion_Widget');
