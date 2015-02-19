<?php

return array(
	'id'          => 'atom_post_format',
	'types'       => array('post','portfolio'),
	'title'       => __('Featured Video/Audio', 'atom'),
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(

		array(
			'type' => 'textarea',
			'name' => 'valuene',
			'label' => __('Embed Code', 'atom'),
			'description' => __('Fill with your video code/soundcloud code/embed code. If you use VIDEO or AUDIO post format.', 'atom'),
		),
			array(
			'type' => 'select',
			'name' => 'source',
			'label' => __('Source', 'atom'),
			'items' => array(
				array(
					'value' => 'soundcloud',
					'label' => __('Soundcloud', 'atom'),
				),
				array(
					'value' => 'vimeo',
					'label' => __('Vimeo', 'atom'),
				),
				array(
					'value' => 'youtube',
					'label' => __('Youtube', 'atom'),
				),
				array(
					'value' => 'other',
					'label' => __('Other (use iframe)', 'atom'),
				),
			),
			'default' => array(
				'youtube',
			),
		),
	),
);

/**
 * EOF
 */