<?php
$testi  = array(
	'id'          => 'atom_post_format_testi',
	'types'       => array('testimonial'),
	'title'       => __('Testimonial Info', 'atom'),
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(			
			array(
				'type' => 'textbox',
				'name' => 'name',
				'label' => __('Client Name', 'atom'),				
			),	
			array(
				'type' => 'textbox',
				'name' => 'website',
				'label' => __('Client Website', 'atom'),				
				'description' => __('<em>ex: atomlabs.me</em>', 'atom'),				
			),
	),
);
$testi2  = array(
	'id'          => 'atom_post_format_testi2',
	'types'       => array('testimonial'),
	'title'       => __('Testimonial Content', 'atom'),
	'priority'    => 'high',
	'template'    => array(			
			array(
				'type' => 'textarea',
				'name' => 'isitesti',
				'label' => __('Testimonial Content', 'atom'),				
			),			
	),
);
$testi3= array(
	'id'          => 'atom_pricing',
	'types'       => array('pricing'),
	'title'       => __('Pricing Table', 'atom'),
	'priority'    => 'high',
	'template'    => array(
		
		array(
				'type' => 'textbox',
				'name' => 'subtitle',
				'label' => __('Sub Title', 'atom'),				
				'description' => __('Your Package Subtitle', 'atom'),				
			),
		array(
				'type' => 'textbox',
				'name' => 'price',
				'label' => __('Price', 'atom'),				
				'description' => __('Your Package Price', 'atom'),				
			),
		array(
				'type' => 'textbox',
				'name' => 'perprice',
				'label' => __('Package Subscription Length', 'atom'),				
				'description' => __('Package Subscription Length', 'atom'),				
			),
		array(
				'type' => 'textbox',
				'name' => 'button',
				'label' => __('Button Text', 'atom'),				
				'description' => __('Button Text', 'atom'),				
			),
		array(
				'type' => 'textbox',
				'name' => 'buttonlink',
				'label' => __('Button Link', 'atom'),				
				'description' => __('Button Link', 'atom'),				
			),
		array(
			'type'      => 'group',
			'repeating' => true,
			'name'      => 'features',
			'title'     => __('Features', 'atom'),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'isi',
					'label' => __('Value', 'atom'),
					'description' => __('Features Value', 'atom'),
				),
				
				
			),
		),
	),
);

$menuicone = array(
	'id'          => 'atom_menu_icon',
	'types'       => array('page'),
	'title'       => __('Menu Icon', 'atom'),
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(
			array(
				'type' => 'fontawesome',
				'name' => 'iconeshow',
				'label' => __('Menu Icon', 'atom'),
				'default' => array(
					'{{first}}',
				),
			),
			
	),
);

$pageslider = array(
	'id'          => 'atom_pageslider',
	'types'       => array('page'),
	'title'       => __('Slider Setting', 'atom'),
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(
			array(
				'type' => 'select',
				'name' => 'pageslider',
				'label' => __('Display page slider', 'atom'),
				'items' => array(
					'data' => array(
							array(
								'source' => 'function',
								'value'  => 'atomlabs_get_metaslider',
							),
						),											
				),
				'default' => array(
					'none',
				),
			),
			
	),
);

$galleryfoldere = array(
	'id'          => 'atom_pagegallery',
	'types'       => array('page'),
	'title'       => __('Gallery Folder', 'atom'),
	'priority'    => 'low',
	'context'     => 'side',
	'template'    => array(
			array(
				'type' => 'select',
				'name' => 'pagegallery',
				'label' => __('Choose Gallery Folder', 'atom'),
				'items' => array(
					'data' => array(
							array(
								'source' => 'function',
								'value'  => 'atomlabs_get_galleryfolder',
							),
						),											
				),
				'default' => array(
					'none',
				),
			),
			
	),
);
$galleryfoldere = new VP_Metabox($galleryfoldere);
$pageslider = new VP_Metabox($pageslider);
$menuicone = new VP_Metabox($menuicone);
$testi = new VP_Metabox($testi);
$testi2 = new VP_Metabox($testi2);
$testi3 = new VP_Metabox($testi3);
/**
 * EOF
 */