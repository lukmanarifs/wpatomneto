<?php

/**
 * Call AtomCore
 */
if ( class_exists( 'OT_Loader' ) ) {
require_once("atomcore/atomcore.php");
require_once("atomcore/update.php");

//include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below

// start AtomCore framework for them
	define("FRAMEWORK_PATH","/inc/atomcore");
	define("THEME_NAME","ATOMSTORE");
	define("FRAMEWORK_VERSION","1.02");
	
	// Enable MegaMenu
	if( (atom_get_options_key('mega-menu-enable') == 'on' ) && ( is_plugin_active( 'atomstore-extend/atomstore-extend.php' ) ) ){
		new AtomCoreMegaMenu();		
	}
	
	// Enable Portfolio Type Post
	$postsConfig = array(
						'portfolio' => array(
											'id'					=>	'portfolio',
											'name'					=>	__('Portfolios','atom'),
											'menu_name'				=>	__('Portfolios','atom'),
											'singular_name'			=>	__('Portfolio','atom'),
											'add_new'				=>	__('Add New','atom'),
											'add_new_item'			=>	__('Add New','atom'),
											'edit_item'				=>	__('Edit Portfolio','atom'),
											'new_item'				=>	__('New Portfolio','atom'),
											'all_items'				=>	__('All Portfolios','atom'),
											'view_item'				=>	__('View Portfolio','atom'),
											'search_items'			=>	__('Search Portfolio','atom'),
											'not_found'				=>	__('No portfolio found','atom'),
											'not_found_in_trash'	=>	__('No portfolio found in Trash','atom'),
											'parent_item_colon'		=>	'',
											'menu_position'			=>	5,
											'rewrite'				=>	'portfolio',
											'rewrite_rule'			=>	'',
											'menu_icon'				=>	'\f180',
											'supports'				=>	array('title', 'editor' , 'thumbnail', 'comments'),
											'categories'			=>	array(
																			'portfolio_cats'	=>	array(
																										'id'			=>	'portfolio-cats',
																										'name'			=>	__( 'Portfolio Categories' ,'atom'),
																										'menu_name'		=>	__( 'Portfolio Categories' ,'atom'),
																										'singular_name'	=>	__( 'Portfolio Categories' ,'atom'),
																										'search_items'	=>	__( 'Search Portfolio Categories' ,'atom'),
																										'all_items'		=>	__( 'All Portfolio Categories' ,'atom'),
																										'parent_item'	=>	__( 'Parent Category' ,'atom'),
																										'parent_item_colon'	=>	__( 'Parent Category:' ,'atom'),
																										'edit_item'			=>	__( 'Edit Portfolio Category' ,'atom'),
																										'update_item'		=>	__( 'Update Portfolio Category' ,'atom'),
																										'add_new_item'		=>	__( 'Add Portfolio Category' ,'atom'),
																										'new_item_name'		=>	__( 'New Portfolio Category' ,'atom'),
																										'rewrite'			=>	'',
																										'hierarchical'		=>	true
																									),
																			'portfolio_tags'	=>	array(
																										'id'			=>	'portfolio-tags',
																										'name'			=>	__( 'Portfolio Tags' ,'atom'),
																										'menu_name'		=>	__( 'Portfolio Tags' ,'atom'),
																										'singular_name'	=>	__( 'Portfolio Tags' ,'atom'),
																										'search_items'	=>	__( 'Search Portfolio Tags' ,'atom'),
																										'all_items'		=>	__( 'All Portfolio Tags' ,'atom'),
																										'parent_item'	=>	__( 'Parent Tag' ,'atom'),
																										'parent_item_colon'	=>	__( 'Parent Tag:' ,'atom'),
																										'edit_item'			=>	__( 'Edit Portfolio Tag' ,'atom'),
																										'update_item'		=>	__( 'Update Portfolio Tag' ,'atom'),
																										'add_new_item'		=>	__( 'Add Portfolio Tag' ,'atom'),
																										'new_item_name'		=>	__( 'New Portfolio Tag' ,'atom'),
																										'rewrite'			=>	'',
																										'hierarchical'		=>	false
																									)
																		)
											
									)
					);
	//if(count($postsConfig) > 0) {new AtomCorePost($postsConfig);}
	
	// here solve portfolio category, tags page nav problem.
	add_action( 'init', 'atom_portfolio_cates_modify_posts_per_page', 0);
	
	function atom_portfolio_cates_modify_posts_per_page(){
		add_filter( 'option_posts_per_page', 'atom_portfolio_cates_option_posts_per_page' );
	}
	
	function atom_portfolio_cates_option_posts_per_page($value){
		global $portfolio_per_page_numbers;
		if( is_tax("portfolio-cats") || is_tax("portfolio-tags") ){
			return $portfolio_per_page_numbers;
		}else{
			return $value;
		}
	}
	
/**
* Optional: set 'ot_show_pages' filter to false.
* This will hide the settings & documentation pages.
*/
add_filter( 'ot_show_options_ui', '__return_false' );
add_filter( 'ot_show_docs', '__return_false' );
add_filter( 'ot_show_pages', '__return_false' );	
add_filter( 'ot_show_settings_import', '__return_false' );
add_filter( 'ot_show_settings_export', '__return_false' );
/**
* Optional: set 'ot_show_new_layout' filter to false.
* This will hide the "New Layout" section on the Theme Options page.
*/
add_filter( 'ot_show_new_layout', '__return_false' );	

}