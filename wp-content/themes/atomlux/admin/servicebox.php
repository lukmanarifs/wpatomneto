<?php
return array(
	'id'          => 'atom_post_format_service',
	'types'       => array('service'),
	'title'       => __('Additional Info', 'atom'),
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(
			array(
				'type' => 'fontawesome',
				'name' => 'icone',
				'label' => __('Service Icon', 'atom'),
				'default' => array(
					'{{first}}',
				),
			),
			array(
				'type' => 'textarea',
				'name' => 'servicex',
				'label' => __('Service Excerpt', 'atom'),				
			),
			array(
				'type' => 'textbox',
				'name' => 'readmoree',
				'label' => __('Readmore Button', 'atom'),				
				'default' => 'READMORE',
					
			),
	),
);

/**
 * EOF
 */