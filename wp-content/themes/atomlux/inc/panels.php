<?php
/**
 * Integrates this theme with SiteOrigin Page Builder.
 * 
 * @package atom
 * @since 1.0
 * @license GPL 2.0
 */

/**
 * Adds default page layouts
 *
 * @param $layouts
 */
function atom_prebuilt_page_layouts($layouts){
	$layouts['demo-home'] = array (
		'name' => __('Demo Site Home Page', 'atom'),
		'widgets' =>
		array(
			0 =>
			array(
				'isine' => __("<span>AtomLux is a clean and fully responsive incredible Template.</span>
<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi  vehicula sem ut volutpat. Ut non libero magna fusce condimentum eleifend enim a feugiat.</p>",'atom'),
				'button' => __("PURCHASE",'atom'),
				'buttonlink' => '#',
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_cta_widget',
					'id' => '1',
					'grid' => '0',
					'cell' => '0',
				),
			),
			1 =>
			array(
				'service' => '84',
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_service_widget',
					'id' => '2',
					'grid' => '1',
					'cell' => '0',
				),
			),
			2 =>
			array(
				'service' => '85',
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_service_widget',
					'id' => '3',
					'grid' => '1',
					'cell' => '1',
				),
			),
			3 =>
			array(
				'service' => '86',
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_service_widget',
					'id' => '4',
					'grid' => '1',
					'cell' => '2',
				),
			),
			4 =>
			array(
				'service' => '87',
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_service_widget',
					'id' => '5',
					'grid' => '1',
					'cell' => '3',
				),
			),
			5 =>
			array(
				'title' => __("OUR FACILITIES",'atom'),
				'desc' => 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. Praesent tempus eleifend risus ut congue eset nec sit amet, tempor sem.',
				'portfolio' => '180',
				'button' => 'See All Our Facilities',
				'orderbye' => 'date',
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_port_widget',
					'id' => '6',
					'grid' => '2',
					'cell' => '0',
				),
			),
			6 =>
			array(
				'color' => '#4BAAD3',
				'price1' => '79',
				'price2' => '81',
				'price3' => '82',
				'price4' => '83',
				'featured' => '2',
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_pricing_widget',
					'id' => '7',
					'grid' => '3',
					'cell' => '0',
				),
			),			
			7 =>
			array(
				'title' => 'GALLERY',
				'orderbye' => 'date',
				'count' => '8',
				'id' => '62197',
				'cat' => 'Gallery',
				'desc' => 'Find the comfort in luxury we offer and make your special moment unforgetable. Don’t waste it.',
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_gallery_widget',
					'id' => '9',
					'grid' => '4',
					'cell' => '0',
				),
			),		
			8 =>
			array(
				'title' => 'Join Our Community',
				'url' => 'https://facebook.com/atomlabsproject',
				'width' => '300',
				'height' => '290',
				'colorscheme' => 'light',				
				'show_faces' => '1',				
				'box' => false,
				'info' =>
				array(
					'class' => 'agcmaster_fb',
					'id' => '10',
					'grid' => '5',
					'cell' => '0',
				),
			),		
			10 =>
			array(
				'title' => 'WHAT THEY SAY',
				'orderbye' => 'date',
				'count' => '5',			
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_testi_widget',
					'id' => '11',
					'grid' => '5',
					'cell' => '1',
				),
			),		
			11 =>
			array(
				'title' => 'OUR PARTNER',
				'orderbye' => 'date',
				'count' => '10',			
				'box' => false,
				'info' =>
				array(
					'class' => 'atomlabs_client_widget',
					'id' => '12',
					'grid' => '6',
					'cell' => '0',
				),
			),
		),
		'grids' =>
		array(
			0 =>
			array(
				'cells' => '1',
				'style' => '',
			),
			1 =>
			array(
				'cells' => '4',
				'style' => 'wide-grey',
			),
			2 =>
			array(
				'cells' => '1',
				'style' => '',
			),
			3 =>
			array(
				'cells' => '1',
				'style' => '',
			),
			4 =>
			array(
				'cells' => '1',
				'style' => 'wide-blue',
			),
			5 =>
			array(
				'cells' => '2',
				'style' => '',
			),
			6 =>
			array(
				'cells' => '1',
				'style' => '',
			),
		),
		'grid_cells' =>
		array(
			0 =>
			array(
				'weight' => '1',
				'grid' => '0',
			),
			1 =>
			array(
				'weight' => '0.25',
				'grid' => '1',
			),
			2 =>
			array(
				'weight' => '0.25',
				'grid' => '1',
			),
			3 =>
			array(
				'weight' => '0.25',
				'grid' => '1',
			),
			4 =>
			array(
				'weight' => '0.25',
				'grid' => '1',
			),
			5 =>
			array(
				'weight' => '1',
				'grid' => '2',
			),
			6 =>
			array(
				'weight' => '1',
				'grid' => '3',
			),
			7 =>
			array(
				'weight' => '1',
				'grid' => '4',
			),
			8 =>
			array(
				'weight' => '0.3',
				'grid' => '5',
			),
			9 =>
			array(
				'weight' => '0.7',
				'grid' => '5',
			),
			10 =>
			array(
				'weight' => '1',
				'grid' => '6',
			),
		),
	);

	return $layouts;
}
add_filter('siteorigin_panels_prebuilt_layouts', 'atom_prebuilt_page_layouts');

/**
 * Configure the SiteOrigin page builder settings.
 * 
 * @param $settings
 * @return mixed
 */
function atom_panels_settings($settings){
	$settings['home-page'] = true;
	$settings['margin-bottom'] = 35;
	$settings['home-page-default'] = 'default-home';
	$settings['responsive'] = atomlabs_setting( 'layout_responsive' );
	return $settings;
}
add_filter('siteorigin_panels_settings', 'atom_panels_settings');

/**
 * Add row styles.
 *
 * @param $styles
 * @return mixed
 */
function atom_panels_row_styles($styles) {
	$styles['wide-grey'] = __('Wide Grey', 'atom');
	return $styles;
}
add_filter('siteorigin_panels_row_styles', 'atom_panels_row_styles');

function atom_panels_row_style_fields($fields) {

	$fields['top_border'] = array(
		'name' => __('Top Border Color', 'atom'),
		'type' => 'color',
	);

	$fields['bottom_border'] = array(
		'name' => __('Bottom Border Color', 'atom'),
		'type' => 'color',
	);

	$fields['background'] = array(
		'name' => __('Background Color', 'atom'),
		'type' => 'color',
	);

	$fields['background_image'] = array(
		'name' => __('Background Image', 'atom'),
		'type' => 'url',
	);

	$fields['background_image_repeat'] = array(
		'name' => __('Repeat Background Image', 'atom'),
		'type' => 'checkbox',
	);

	$fields['no_margin'] = array(
		'name' => __('No Bottom Margin', 'atom'),
		'type' => 'checkbox',
	);

	return $fields;
}
add_filter('siteorigin_panels_row_style_fields', 'atom_panels_row_style_fields');

function atom_panels_panels_row_style_attributes($attr, $style) {
	$attr['style'] = '';

	if(!empty($style['top_border'])) $attr['style'] .= 'border-top: 1px solid '.$style['top_border'].'; ';
	if(!empty($style['bottom_border'])) $attr['style'] .= 'border-bottom: 1px solid '.$style['bottom_border'].'; ';
	if(!empty($style['background'])) $attr['style'] .= 'background-color: '.$style['background'].'; ';
	if(!empty($style['background_image'])) $attr['style'] .= 'background-image: url('.esc_url($style['background_image']).'); ';
	if(!empty($style['background_image_repeat'])) $attr['style'] .= 'background-repeat: repeat; ';

	if(empty($attr['style'])) unset($attr['style']);
	return $attr;
}
add_filter('siteorigin_panels_row_style_attributes', 'atom_panels_panels_row_style_attributes', 10, 2);

function atom_panels_panels_row_attributes($attr, $row) {
	if(!empty($row['style']['no_margin'])) {
		if(empty($attr['style'])) $attr['style'] = '';
		$attr['style'] .= 'margin-bottom: 0px;';
	}

	return $attr;
}
add_filter('siteorigin_panels_row_attributes', 'atom_panels_panels_row_attributes', 10, 2);