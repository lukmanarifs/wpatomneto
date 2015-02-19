<?php
/**
	AtomCore

	Copyright (c) 2009-2014 ATOMLABS

	@package Atom
	@version 1.0.2
**/

class AtomCore {
	
	static $FRAMEWORK_PATH = "";
	static $FRAMEWORK_VERSION = "1.0.2";
	static $THEME_NAME = "";
	
	static $FRAMEWORK_MSG = array();
	
	private static $INIT = false;


	/**
	 * @$FRAMEWORK_PATH		atomcore framework files path 
	 * @$options			add your option for admin panel
	 * @$posts				add your post page for admin panel
	 * @$update 			check theme version for update
	 */
	static function start($options = array(),$metas = array(), $posts = array(), $posts_columns = array(),$megamenu = true){
		
		//when framework had start then will don't run again.
		if(AtomCore::$INIT){	return;	}
		
		AtomCore::$INIT = true;
		
		AtomCore::$FRAMEWORK_MSG = array(0=>'Please input your username, purchase code as first!',
										1=>'Your username or purchase code error!',
										2=>'You used too more site with the same purchase code!',
										3=>'Penguin Framework',
										4=>'version',
										5=>__('You had back all setting to default value complete!','atom'),
										6=>__('Setting Complete!','atom'),
										7=>__('Reset to default','atom'),
										8=>__('Save Changes','atom'),
										9=>__('Notice: you had select back all setting to default value!','atom'),
										10=>__('have no any php file for show','atom'),
										11=>__('have no any content for this page','atom'),
										12=>__('Paste the export code into the import text area field in your new site option and press "Import" button.','atom'),
										13=>__('Import Options','atom'),
										14=>__('Export Options','atom'),
										15=>__('Upload','atom'),
										16=>__('You have no add any element for meta','atom'),
										17=>__('Add Field','atom'),
										18=>__('Delete All','atom'),
										19=>__('Custom Field Config Error','atom'),
										20=>__('Add Image','atom'),
									);
								
		//if(count($options) > 0) {new PenguinOption($options);}
		//if(count($metas) > 0) {new PenguinMeta($metas);}
		//if(count($posts) > 0) {new AtomCorePost($posts);}
		//if(count($posts_columns) > 0) {new PenguinPostColumns($posts_columns);}
		if($megamenu) { new PenguinMegaMenu();}
	}
	
	/* 
	 * Check key value in array
	 */
	static function check_key_value($key,$array,$default=''){
		if(isset($array[$key])){
			return $array[$key];
		}
		return $default;
	}
}

?>