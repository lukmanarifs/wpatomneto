<?php

/**
* Plugin Name: WR Hello World Addon
* Plugin URI: http://woorockets.com
* Description: This Hello World is a simple WR PageBuilder Addons.
* Version: 1.0
* Author: WooRockets Team <support@woorockets.com>
* Author URI: http://woorockets.com
* License: GNU/GPL2 v2 or later http://www.gnu.org/licenses/gpl-2.0.html
**/

add_action( 'wr_pb_addon', 'wr_pb_helloworld_init');

/**
* The function to init the story
**/
function wr_pb_helloworld_init() {

    /**
    * Entry Class
    * 
    */
    class WR_PB_Helloworld_Addon extends WR_Pb_Addon {

	    public function __construct() {

	        /*
	        * Define Your Information
	        */
	        $this->set_provider(
	            array(
	                // The name will be displayed as a group when user
	                // chooses the elements.
	                'name' => 'The Hello World bundle',

	                // The main file of this plugin, which is used to
	                // identify itself when removing IG PageBuilder
	                'file' => __FILE__,

	                // Shortcodes directory, where the Elements
	                // of this bundle are stored.
	                'shortcode_dir' => 'elements',
	            )
	        );

	        // call parent construct
	        parent::__construct();
	    }

    }

    // Init the Plugin Settings
    $this_ = new WR_PB_Helloworld_Addon();
}