<?php

/*
Widget Name: Background Porto Widget
Description: An example widget which displays 'Background Porto!'.
Author: Me
Author URI: http://example.com
*/

class Background_Porto_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'background-porto-widget',
			__('Background Porto Widget', 'background-porto-widget-text-domain'),
			array(
				'description' => __('A Background Porto widget.', 'background-porto-widget-text-domain'),
			),
			array(

			),
			array(
				'texttop' => array(
					'type' => 'text',
					'label' => __('Background Porto! goes here.', 'siteorigin-widgets'),
					'default' => 'Background Porto!'
				),
				'some_media' => array(
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
		return 'background-porto-widget-template';
	}

	function get_style_name($instance) {
		return 'background-porto-widget-style';
	}

}

siteorigin_widget_register('background-porto-widget', __FILE__, 'Background_Porto_Widget');
