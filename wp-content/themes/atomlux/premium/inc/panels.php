<?php

function atom_premium_add_widget_folders($folders){
	$folders[get_template_directory().'/premium/panels-widgets/'] = get_template_directory_uri().'/premium/panels-widgets/';
	return $folders;
}
add_action('siteorigin_widget_folders', 'atom_premium_add_widget_folders');