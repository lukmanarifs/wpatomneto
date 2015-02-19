<?php

/*
Widget Name: Atomneto Search Widget
Description: Search widget with Atomneto looks and feel.
Author: Me
Author URI: http://example.com
*/

class Atomneto_Search_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'atomneto-search-widget',
			__('Atomneto Search Widget', 'atomneto-search-widget-text-domain'),
			array(
				'description' => __('An Atomneto Search widget.', 'atomneto-search-widget-text-domain'),
			),
			array(

			),
			array(
			
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'atomneto-search-widget-template';
	}

	function get_style_name($instance) {
		return 'atomneto-search-widget-style';
	}

}

siteorigin_widget_register('atomneto-search-widget', __FILE__, 'Atomneto_Search_Widget');