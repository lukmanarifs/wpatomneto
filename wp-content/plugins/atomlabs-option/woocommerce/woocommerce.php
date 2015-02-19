<?php
if(!defined('WPINC')) {
    die;
}
define("ANPS_PLUGIN_LANG", "vc_woo_shortcodes");
/* shortcodes */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 

if( is_plugin_active( 'js_composer/js_composer.php' ) ){
add_action("init", "init_shortcodes");
}
function init_shortcodes() {
    include_once 'shortcodes.php';
}