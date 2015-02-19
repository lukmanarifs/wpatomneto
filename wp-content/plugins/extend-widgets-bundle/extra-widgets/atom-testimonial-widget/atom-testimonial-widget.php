<?php

/*
Widget Name: Atom Testimonial widget
Description: An example widget which displays 'Hello world!'.
Author: Me
Author URI: http://example.com
*/

class Atom_Testimonial_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'atom-testimonial-widget',
			__('Atom Testimonial Widget', 'atom-text-domain'),
			array(
				'description' => __('A hello world widget.', 'atom-text-domain'),
			),
			array(

			),
			array(
				'testi_title' => array(
					'type' => 'text',
					'label' => __('Testimonial Title', 'atom-text-domain'),
					'default' => 'Awesome Project!'
				),
					'testi_name' => array(
						'type' => 'text',
						'label' => __('Name', 'atom-text-domain'),
						'default' => 'Lukman'
					),
						'testi_desc' => array(
							'type' => 'textarea',
							'label' => __('Description', 'atom-text-domain'),
							'default' => 'Hello world! goes here. Hello world! goes here. '
						),
							'testi_company' => array(
								'type' => 'text',
								'label' => __('Company', 'atom-text-domain'),
								'default' => 'Gogle'
							),
				'testi_image' => array(
					'type' => 'media',
					'label' => __( 'Choose a media thing', 'atom-text-domain' ),
					'choose' => __( 'Choose image', 'atom-text-domain' ),
					'update' => __( 'Set image', 'atom-text-domain' ),
					'library' => 'image'
			),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'atom-testimonial-widget-template';
	}

	function get_style_name($instance) {
		return 'atom-testimonial-widget-style';
	}

}

siteorigin_widget_register('atom-testimonial-widget', __FILE__, 'Atom_Testimonial_Widget');
