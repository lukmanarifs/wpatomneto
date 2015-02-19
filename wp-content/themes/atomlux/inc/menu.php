<?php

/* Handle the nav menu icon */

function atom_filter_nav_menu_items($item_output, $item, $depth, $args){
	$object_type = get_post_meta($item->ID, '_menu_item_object', true);

	if($object_type == 'page') {
		$object_id = get_post_meta($item->ID, '_menu_item_object_id', true);		
		$icon = vp_metabox('atom_menu_icon.iconeshow','', $object_id);

		if(!empty($icon)) {
			$item_output = str_replace('<span class="icon"></span>', '<span class="fa '.esc_attr($icon).'"></span> ', $item_output);
		}
		else {
			$item_output = str_replace('<span class="icon"></span>', '', $item_output);
		}
	}
	elseif($object_type == 'custom') {
		if( atomlabs_setting('navigation_home_icon') && strpos($item_output, 'href="'.home_url('/').'"', 0) !== false ) {
			$item_output = str_replace('<span class="icon"></span>', '<span class="fa fa-home"></span> ', $item_output);
		}

	}
	else {
		$icoin = str_replace('icon-', 'fa fa-', $item->attr_title);
		$item_output = str_replace('<span class="icon"></span>', '<span class="'.$icoin.'"></span> ', $item_output);
	}


	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'atom_filter_nav_menu_items', 10, 4);
