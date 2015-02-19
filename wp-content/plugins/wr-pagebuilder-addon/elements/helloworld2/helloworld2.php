<?php
/**
 * @version    $Id$
 * @package    WR PageBuilder
 * @author     WooRockets Team <support@woorockets.com>
 * @copyright  Copyright (C) 2012 woorockets.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 * Technical Support:  Feedback - http://www.woorockets.com
 */

if ( ! class_exists( 'WR_Helloworld2' ) ) :

/**
 * Create Sample Helloworld 2 element
 *
 * @package  WR PageBuilder Shortcodes
 * @since    1.0.0
 */
class WR_Helloworld2 extends WR_Pb_Shortcode_Parent {
	/**
	 * Constructor
	 *
	 * @return  void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Configure shortcode.
	 *
	 * @return  void
	 */
	function element_config() {
		$this->config['shortcode']   = strtolower( __CLASS__ );
		$this->config['name']        = __( 'Hello World 2', WR_PBL );
		$this->config['icon']        = 'wr-icon-text';
		$this->config['has_subshortcode'] = 'WR_Item_' . str_replace( 'WR_', '', __CLASS__ );
		$this->config['description'] = __( 'Sample Helloworld 2 Addon', WR_PBL );

		// Use Ajax to speed up element settings modal loading speed
		$this->config['edit_using_ajax'] = true;
	}

	/**
	 * Define shortcode settings.
	 *
	 * @return  void
	 */
	function element_items() {
		$this->items = array(
			'content' => array(

				array(
					'name' => __( 'Parent Element Text', WR_PBL ),
					'desc' => __( 'Enter some content for this textblock', WR_PBL ),
					'id'   => 'helloworld2_content',
					'type' => 'group',
					'shortcode'     => ucfirst( __CLASS__ ),
					'sub_item_type' => $this->config['has_subshortcode'],
					'sub_items'     => array(
						array( 'std' => '' ),
						array( 'std' => '' ),
					),
				),
			),
			'styling' => array(
				array(
					'type' => 'preview',
				),
				array(
					'name'               => __( 'Margin', WR_PBL ),
					'container_class'    => 'combo-group',
					'id'                 => 'helloworld2_margin',
					'type'               => 'margin',
					'extended_ids'       => array( 'helloworld2_margin_top', 'helloworld2_margin_right', 'helloworld2_margin_bottom', 'helloworld2_margin_left' ),
					'text_margin_top'    => array( 'std' => '0' ),
					'text_margin_bottom' => array( 'std' => '0' ),
					'tooltip'            => __( 'External spacing with other elements', WR_PBL )
				),
			)
		);
	}

	/**
	 * Generate HTML code from shortcode content.
	 *
	 * @param   array   $atts     Shortcode attributes.
	 * @param   string  $content  Current content.
	 *
	 * @return  string
	 */
	function element_shortcode_full( $atts = null, $content = null ) {
		$arr_params = shortcode_atts( $this->config['params'], $atts );
		extract( $arr_params );

		$random_id = WR_Pb_Utils_Common::random_string();
		$script = $html_element = '';
		if ( ! empty( $content ) ) {
			$content = WR_Pb_Helper_Shortcode::remove_autop( $content );
		}

		$html_element .= $content;
		$html  = sprintf( '<ul class="wr_helloworld2" id="%s">', $random_id );
		$html .= $script;
		$html .= $html_element;
		$html .= '</ul>';

		// Process margins
		if ( isset( $arr_params['helloworld2_margin_top'] ) )
			$arr_params['div_margin_top']    = $arr_params['helloworld2_margin_top'];
		if ( isset( $arr_params['helloworld2_margin_bottom'] ) )
			$arr_params['div_margin_bottom'] = $arr_params['helloworld2_margin_bottom'];
		if ( isset( $arr_params['helloworld2_margin_right'] ) )
			$arr_params['div_margin_right']  = $arr_params['helloworld2_margin_right'];
		if ( isset( $arr_params['helloworld2_margin_left'] ) )
			$arr_params['div_margin_left']   = $arr_params['helloworld2_margin_left'];

		return $this->element_wrapper( $html, $arr_params );
	}
}

endif;