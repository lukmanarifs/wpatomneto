<?php

//========================================================
//  	PLUGIN FUNCTION METHODS
//========================================================

/**
 * Get option  for layerslider
 */
function atomcore_get_layerslider(){	
	 // Get WPDB Object
    global $wpdb;
 
    // Table name
    $table_name = $wpdb->prefix . "layerslider";

	
	$sql = "show tables like '$table_name'";
	
	$table = $wpdb->get_var($sql);

	// have no rev slider 
	if($table != $table_name) return $layerslider_slides;
 
    // Get sliders
    $sliders = $wpdb->get_results( "SELECT * FROM $table_name
                                        WHERE flag_hidden = '0' AND flag_deleted = '0'
                                        ORDER BY date_c ASC LIMIT 100" );
 
	
	$layerslider_slides = array();
    // Iterate over the sliders
    foreach($sliders as $item) {
 		$layerslider_slides[] = array(
			'title' => $item->name,
			'slug' => $item->id
		);
    }
	
	return $layerslider_slides;
}

/**
 * Get option  for revslider
 */
function atomcore_get_revslider(){
	$revslider_slides = array();
	 // Get WPDB Object
    global $wpdb;

    // Table name
    $table_name = $wpdb->prefix . "revslider_sliders";
	
	$sql = "show tables like '$table_name'";
	
	$table = $wpdb->get_var($sql);

	// have no rev slider 
	if($table != $table_name) return $revslider_slides;
	
    // Get sliders
    $sliders = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY id LIMIT 100" );
 
   
	// Iterate over the sliders
    foreach($sliders as $item) {
 		$revslider_slides[] = array(
			'title' => $item->title,
			'slug' => $item->id
		);
    }
	
	return $revslider_slides;
}

/**
 * Get option  for wpml
 */
function atomcore_get_wpml_switcher(){
	if (function_exists( 'icl_get_languages' ) && function_exists('icl_disp_language')) {
		$languages = icl_get_languages('skip_missing=1');
		
		if(!empty($languages)){
			
			$lang_active = '';
			$lang_list = '<ul class="sub-menu">';
			
			foreach($languages as $l){

				if($l['active']){ $lang_active = '<a href="#"><i class="fa fa-globe"></i>'.$l['native_name'].'</a>';				}
				$lang_list .= '<li>';

				if(!$l['active']){
					$lang_list .= '<a href="'.$l['url'].'">';
				}else{
					$lang_list .=  '<span>';
				}
				
				if($l['country_flag_url']){
					$lang_list .= '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';				
				}
				$lang_list .=  $l['native_name'];
			
				if(!$l['active']){
					$lang_list .= '</a>';
				}else{
					$lang_list .=  '</span>';
				}
				$lang_list .= '</li>';
			}
			$lang_list .= '</ul>';
			
			return '<li class="wpml">'.$lang_active.$lang_list.'</li>';
		}
	}
	return '';
}

// function to display number of posts.
function atomcore_get_post_meta_count($postID, $count_type = 0, $count_name_bool = true){
	
	if($count_type == 1) {
		$count_key = 'votes_count';
	}else{
		$count_key = 'post_views_count';
	}
	
    $count = get_post_meta($postID, $count_key, true);
	
    if($count == ''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return '0';
    }
	
    return $count;
}
 
// function to count views.
function atomcore_set_post_view($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// set add post like count
function atomcore_post_like(){
	$nonce = $_POST['nonce'];

    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
		
	if(isset($_POST['post_like'])){
		$ip = $_SERVER['REMOTE_ADDR'];
		$post_id = $_POST['post_id'];
		
		$meta_IP = get_post_meta($post_id, "voted_IP");
		if(isset($meta_IP[0]) && is_array($meta_IP[0])){
			$voted_IP = $meta_IP[0];
		}else{
			$voted_IP = array();
		}
		
		$meta_count = get_post_meta($post_id, "votes_count", true);

		if(!atomcore_post_already_vote($post_id)){
			$voted_IP[$ip] = time();
			update_post_meta($post_id, "voted_IP", $voted_IP);
			update_post_meta($post_id, "votes_count", ++$meta_count);
			
			echo $meta_count;
		}else{
			echo "already";
		}
	}
	exit;
}

// check post had vote
function atomcore_post_already_vote($post_id){
	
	$meta_IP = get_post_meta($post_id, "voted_IP");
	
	if(!isset($meta_IP[0])){
		return false;
	}
	
	$voted_IP = $meta_IP[0];
	
	if(!is_array($voted_IP)){
		$voted_IP = array();
	}

	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(in_array($ip, array_keys($voted_IP))){
		return true;
	}
	return false;
}

// get post like link
function atomcore_get_post_like_link($post_id){
	if( !atomcore_post_already_vote($post_id) ){
		return 'rate';
	}
	return '';
}