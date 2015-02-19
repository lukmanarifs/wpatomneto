<?php
include_once ('atomcore/tinymce/tinymce.php');
require_once ('atomcore/tinymce/ajax.php');


//=============================
// Columns
//=============================
function atom_wide_func($atts, $content = null){
	extract( shortcode_atts( array(
			'id'	=>	'',
		  	'style'	=> '',
		  	'class'	=> ''
		  ), $atts ) );
	$eid = '';
	if($id != ''){ $eid = ' id="'.esc_attr($id).'" ';}
	return '<div '.$eid.' class="wide-background '.esc_attr($class).'" style="'.esc_attr($style).'"><div class="row"><div class="col-md-12 col-sm-12">'.do_shortcode($content).'</div></div></div>';
}
add_shortcode('wide', 'atom_wide_func');

function atom_row_func($atts, $content = null){
	extract( shortcode_atts( array(
		'id'	=>	''
		), $atts ) );
	$eid = '';
	if($id != ''){ $eid = ' id="'.esc_attr($id).'" ';}
	return '<div '.$eid.' class="row">'.do_shortcode($content).'</div>';
}
add_shortcode('row', 'atom_row_func');

function atom_inner_row_func($atts, $content = null){
	return '<div class="row">'.do_shortcode($content).'</div>';
}
add_shortcode('inner_row', 'atom_inner_row_func');

function atom_one_func($atts, $content = null){
	extract( shortcode_atts( array(
		'id'	=>	''
		), $atts ) );
	$eid = '';
	if($id != ''){ $eid = ' id="'.esc_attr($id).'" ';}
	return '<div '.$eid.' class="row"><div class="col-md-12 col-sm-12">'.do_shortcode($content).'</div></div>';
}
add_shortcode('one', 'atom_one_func');

function atom_one_half_func($atts, $content = null){
	return '<div class="col-md-6 col-sm-6">'.do_shortcode($content).'</div>';
}
add_shortcode('one_half', 'atom_one_half_func');

function atom_one_third_func($atts, $content = null){
	return '<div class="col-md-4 col-sm-4">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third', 'atom_one_third_func');

function atom_two_third_func($atts, $content = null){
	return '<div class="col-md-8 col-sm-8">'.do_shortcode($content).'</div>';
}
add_shortcode('two_third', 'atom_two_third_func');

function atom_one_fourth_func($atts, $content = null){
	return '<div class="col-md-3 col-sm-4">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fourth', 'atom_one_fourth_func');

function atom_two_fourth_func($atts, $content = null){
	return '<div class="col-md-6 col-sm-6">'.do_shortcode($content).'</div>';
}
add_shortcode('two_fourth', 'atom_two_fourth_func');

function atom_three_fourth_func($atts, $content = null){
	return '<div class="col-md-9 col-sm-9">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fourth', 'atom_three_fourth_func');

//space
function atom_space_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'line'	=> 'no',
		  'style'	=>	'solid',
		  'size'	=>	'normal'
		  ), $atts ) );
	return '<div class="row atom-space '.esc_attr($size).' '.($line =="yes" ? 'atom-space-line '.esc_attr($style) : '').'">'.do_shortcode($content).'</div>';
}
add_shortcode('space', 'atom_space_func');

//=============================
// Icons
//=============================
function atom_icon_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'icon_name' => '',
		  'icon_size' => '',
		  'icon_style' => '',
		  'icon_color' => ''
		  ), $atts ) );
	if($icon_name == '') return "";
	return '<i class="fa '.esc_attr($icon_name.' '.$icon_size.' '.$icon_style).'" '.($icon_color != '' ? ' style="color:'.esc_attr($icon_color).'"' :'').'></i>';
}
add_shortcode('icon', 'atom_icon_func');

//=============================
// Title
//=============================
function atom_title_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'class'		=>	'',
		  'type'		=>	'',
		  'icon'		=>	'',
		  'value'		=>	'',
		  'size' 		=>	'h3',
		  'radius'		=>	'',
		  'icon_size' 	=>	'',
		  'uppercase'	=>	'yes',
		  'bold'		=>	'yes', 
		  'style'		=>	'',
		  'show_bg'		=>	'yes',
		  'line' 		=>	'yes',
		  'align'		=>	'left',
		  'line_align'	=>	'center',
		  'color'		=>	'',
		  'bg_color'	=>	'',
		  'line_color'	=>	'',
		  'extra_color'		=>	'',
		  ), $atts ) );
		
		if($type == ""){
			return '<div class="atom-title"><'.esc_attr($size).' class="post-title">'.$value.'</'.esc_attr($size).'><div class="line"></div><div class="clear"></div></div>';
		}
		$content =  '';
		$extra_content =  '';
		if($color != ""){
			$color = 'color:'.esc_attr($color).';';
		}
		if($bg_color != ""){
			$bg_color = 'style="background:'.esc_attr($bg_color).'"';
		}
		if($line_color != ""){
			$line_color = 'style="background:'.esc_attr($line_color).'"';
		}
		if($extra_color != ""){
			$extra_color = 'style="color:'.esc_attr($extra_color).'"';
		}
		
		if($type == "icon"){
			if($size == "h3") {
				$size = "";
			}
			if($icon != ""){
				$content =  '<i class="fa '.esc_attr($icon).'" style="'.$color.$style.'"></i>';
			}
			if($value != "") {
				$extra_content = '<span class="atom-page-title-extra '.esc_attr($icon_size).($uppercase == "yes" ? ' uppercase' : '').($bold == "yes" ? ' bold' : '').'" '.$extra_color.'>'.$value.'</span>';
			}
		}else{
			$content =  '<'.esc_attr($size).' class="'.($uppercase == "yes" ? 'uppercase ' : '').($bold == "yes" ? 'bold ' : '').'" style="'.$color.$style.'">'.$value.'</'.esc_attr($size).'>';
		}
		return '<div class="atom-page-title row '.esc_attr($class).' '.esc_attr($align).' line-'.esc_attr($line_align).'">'.($line == "yes" ? '<div class="atom-pagetitle-line" '.$line_color.'></div>' : '').'<div class="atom-page-title-container '.($show_bg == "yes" ? 'show-bg'.($radius == "yes" ? " radius" : "") : '').' '.($type == "icon" ? 'icon '.$icon_size : '').'" '.($show_bg == "yes" ? $bg_color : '').'>'.$content.'</div>'.$extra_content.'</div>';
}
add_shortcode('title', 'atom_title_func');


//=============================
// Content
//=============================
function atom_content_func($atts, $content = null){
	extract( shortcode_atts( array(
		'id'	=>	'',
		'class'	=>	'',
		'align'	=>	''
		), $atts ) );
	$eid = '';
	if($id != ''){ $eid = ' id="'.esc_attr($id).'" ';}
	return '<div '.$eid.' class="row atom-content '.esc_attr($class).' '.esc_attr($align).'">'.do_shortcode($content).'</div>';
}
add_shortcode('content', 'atom_content_func');

//=============================
// Buttons
//=============================
function atom_button_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'text' => 'Button Name',
		  'icon' => '',
		  'type' => '',
		  'size' => '',
		  'url'	 => '#',
		  'target' => '_blank',
		  'bg_color' => '',
		  'bg_hover_color' => '',
		  'txt_color' => '',
		  'txt_hover_color' => ''
		  ), $atts ) );
	if($type == 'btn-custom'){
		$type = 'btn-custom ';
	}
	$output = '<a class="btn '.esc_attr($type).' '.esc_attr($size).'" href="'.esc_url($url).'" target="'.esc_attr($target).'"';
	
	if($bg_color != ''){
		$output .=' data-bgcolor="'.esc_attr($bg_color).'"';
	}
	if($bg_hover_color != ''){
		$output .=' data-bghovercolor="'.esc_attr($bg_hover_color).'"';
	}
	if($txt_color != ''){
		$output .=' data-txtcolor="'.esc_attr($txt_color).'"';
	}
	if($txt_hover_color != ''){
		$output .=' data-txthovercolor="'.esc_attr($txt_hover_color).'"';
	}
	if($icon != '') {
		$icon = '<i class="fa '.$icon.'"></i>';
	}
	$output .= ' >'.$icon.$text.'</a>';
	
	return $output;
}
add_shortcode('button', 'atom_button_func');

//=============================
// Alert Message
//=============================
function atom_alert_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'type' => 'info',
		  'close' => 'yes'
		  ), $atts ) );
	$output = '<div class="alert alert-'.esc_attr($type).'">';
	if($close == "yes"){
		$output .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	}
	$output .= do_shortcode($content);
    $output .= '</div>';
	return $output;
}
add_shortcode('alert', 'atom_alert_func');

//=============================
// Map
//=============================
function atom_map_func($atts, $content = null){
	global $atom_map_id;
	if(isset($atom_map_id)){
		$atom_map_id++;
	}else{
		$atom_map_id = 1;
	}
	extract( shortcode_atts( array(
		  'zoom'	=> '13',
		  'scrollwheel' => 'yes',
		  'draggable'	=> 'yes',
		  'latlng' => '',
		  'width' => '300',
		  'height' => '200',
		  'show_marker' => 'no',
		  'show_info' =>'no',
		  'info_width' => '260',
		  'theme'	=>	'',
		  ), $atts ) );
		
	if($width != "100%"){$width = $width.'px';}
	if($height != "100%"){$height = $height.'px';}
	
	$output = '<div id="atom-gmap-'.$atom_map_id.'" class="map_canvas" style="float:left;width:'.esc_attr($width).';height:'.esc_attr($height).';"  data-zoom="'.esc_attr($zoom).'" data-latlng="'.esc_attr($latlng).'" data-scrollwheel="'.esc_attr($scrollwheel).'" data-draggable="'.esc_attr($draggable).'" data-theme="'.esc_attr($theme).'" ';
	
	if($show_marker == 'yes'){
		$output .= 'data-showmarker="'.esc_attr($show_marker).'" ';
		if($show_info == "yes"){
			$output .= 'data-showinfo="'.esc_attr($show_info).'" ';
			$output .= 'data-infowidth="'.esc_attr($info_width).'" ';
			$output .= 'data-infobg="'.get_template_directory_uri().'/img/tipbox.png" >';
			$output .= '</div>';
			$output .= '<div id="atom-gmap-'.$atom_map_id.'-map-info" style="display:none;">'.do_shortcode($content).'</div>';
			return $output;
		}
		$output .= '></div>';
		return $output;
	}
	$output .= '></div>';
	return $output;
}
add_shortcode('map', 'atom_map_func');

//=============================
// Youtube Video Player
//=============================
function atom_youtube_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'id' => '',
		  'width' => '600',
		  'height' => '360',
		  ), $atts ) );
	if($width == "100%") {
		$out_width = 'class="full-width-show" width="600"';
	}else{
		$out_width = 'width="'.esc_attr($width).'"';
	}
	$output = '<div class="video-youtube"><iframe title="YouTube Video Player" src="http://www.youtube.com/embed/' . esc_attr($id) . '?html5=1" '.esc_attr($out_width).' height="' . esc_attr($height) . '" allowfullscreen></iframe></div>';
	return $output;
}
add_shortcode('youtube', 'atom_youtube_func');

//=============================
// Vimeo Video Player
//=============================
function atom_vimeo_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'id' => '',
		  'width' => '600',
		  'height' => '360',
		  ), $atts ) );
	if($width == "100%") {
		$out_width = 'class="full-width-show" width="600"';
	}else{
		$out_width = 'width="'.esc_attr($width).'"';
	}
	$output = '<div class="video-vimeo"><iframe title="Vimeo Video Player" src="http://player.vimeo.com/video/' . esc_attr($id) . '" '.esc_attr($out_width).' height="' . esc_attr($height) . '" ></iframe></div>';
	return $output;
}
add_shortcode('vimeo', 'atom_vimeo_func');

//=============================
// Soundcloud Audio Player
//=============================
function atom_soundcloud_func($atts, $content = null){
	extract( shortcode_atts( array(
		  	'url' => '',
			'iframe' => 'true',
			'width' => '100%',
			'height' => 166,
			'auto_play' => 'true',
			'show_comments' => 'true',
			'color' => 'ff7700',
			'theme_color' => 'ff6699',
		  ), $atts ) );
	
	// use iframe
	if($iframe == 'true'){
		$url = 'http://w.soundcloud.com/player?' . http_build_query($atts);
		if($width == "100%") {
			$out_width = 'class="full-width-show" width="600"';
		}else{
			$out_width = 'width="'.$width.'"';
		}
		return '<div class="sound-sl"><iframe '.$out_width.' height="'.$height.'" scrolling="no" src="'.$url.'"></iframe></div>';
	}else{
	// use flash
		$url = 'http://player.soundcloud.com/player.swf?' . http_build_query($atts);
		return '<div class="sound-sl"><object width="'.$width.'" height="'.$height.'">
                                <param name="movie" value="'.$url.'"></param>
                                <param name="allowscriptaccess" value="always"></param>
                                <embed width="'.$width.'" height="'.$height.'" src="'.$url.'" allowscriptaccess="always" type="application/x-shockwave-flash"></embed>
                              </object></div>';
	}
	return "";
}
add_shortcode('soundcloud', 'atom_soundcloud_func');

//=============================
// Share
//=============================
function atom_share_func($atts, $content = null){
	extract( shortcode_atts( array(
			'type' 		=> '',
			'title' 	=> '',
			'link' 		=>  ''
		  ), $atts ) );

	$output = '<div class="atom-share">';

	if($type == ""){
		$list = array('twitter','facebook','google','linkedin');
	}else{
		$list = explode(",",$type);
	}
	

	$title = str_replace(' ', '%20', $title);
	
	$output = '<div class="atom-share"><span class="atom-title"><i class="fa fa-users"></i></span><ul class="inline share-social">';
	foreach($list as $item){
		$output .= '<li class="social">';
		switch($item){
			case 'twitter' : 
				$output .= '<a title="Twitter" class="show-tooltip" href="http://twitter.com/share?url='.esc_url($link).'&amp;text='.$title.'&amp;via=TWITTER-HANDLE" target="_blank"><i class="fa fa-twitter"></i></a>';
				break;
			case 'facebook' : 
				$output .= '<a title="Facebook" class="show-tooltip" href="http://www.facebook.com/sharer.php?u='.esc_url($link).'&amp;t='.$title.'" target="_blank"><i class="fa fa-facebook"></i></a>';
				break;
			case 'google' : 
				$output .= '<a title="Google+" class="show-tooltip" href="https://plus.google.com/share?url='.esc_url($link).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
				break;
			case 'linkedin' : 
				$output .= '<a title="Linkedin" class="show-tooltip" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.esc_url($link).'&amp;title='.$title.'" target="_blank"><i class="fa fa-linkedin"></i></a>';
				break;
		}
		$output .= '</li>';
		
	}
	$output .= '</ul></div>';
	
	return $output;
}
add_shortcode('share', 'atom_share_func');

//=============================
// Social
//=============================
function atom_social_func($atts, $content = null){
	global $atom_icon_items, $atom_icon_default_color, $atom_icon_default_params;
	$atom_icon_items = array();
	extract( shortcode_atts( array(
			'bg_color' 			=> '',
			'tooltip' 			=> 'no',
			'tooltip_placement' => 'top',
			'circle' 			=> 'no'
		  ), $atts ) );
	
	$atom_icon_default_color = $bg_color;
	$atom_icon_default_params = array('tooltip' => $tooltip, 'placement' => $tooltip_placement);
	
	$output = '<ul class="inline atom-social '.($circle == "yes" ? 'social-circle' : '').'">';
	do_shortcode($content);
	
	if(count($atom_icon_items) > 0) {
		foreach($atom_icon_items as $atom_icon_item) {
			$output .= '<li>'.$atom_icon_item.'</li>';
		}
	}
	$output .= '</ul>';
	return $output;
}
add_shortcode('social', 'atom_social_func');

function atom_social_item_func($atts, $content = null){
	global $atom_icon_items, $atom_icon_default_color, $atom_icon_default_params;
	extract( shortcode_atts( array(
			'type' 		=> 'twitter',
			'link' 		=> '#',
			'target' 	=> '_blank',
			'title' 	=> ''
		  ), $atts ) );
	if($atom_icon_default_params['tooltip'] == "yes" && $title == ""){
		$title = $type;
	}
	$atom_icon_items[] = '<a '.($atom_icon_default_color != "" ? 'style="background-color:'.esc_attr($atom_icon_default_color).'"' : '').' href="'.esc_url($link).'" target="'.esc_attr($target).'" '.($atom_icon_default_params['tooltip'] == "yes" ? 'title="'.esc_html($title).'" data-placement="'.esc_attr($atom_icon_default_params['placement']).'"' : '').' class="atom-icon-'.esc_attr($type).' '.($atom_icon_default_params['tooltip'] == "yes" ? "show-tooltip" : "").'"></a>';
	return "";
}
add_shortcode('social_item', 'atom_social_item_func');

//=============================
// Skrills
//=============================
function atom_skills_func($atts, $content = null){
	global $skill_items,$skill_style,$skill_circle;
	$skill_items = array();
	extract( shortcode_atts( array(
			'style' 			=> '1',
			'circle'			=>	'no'
		  ), $atts ) );
	$skill_style = $style;
	$skill_circle = $circle;
	$output = '<ul class="skills mline skill-style-'.intval($skill_style).'">';
	do_shortcode($content);
	if(count($skill_items) > 0){
		foreach($skill_items as $skill_item){
			$output .= '<li>'.$skill_item.'</li>';
		}
	}
	$output .= '</ul>';
	return $output;
}
add_shortcode('skills', 'atom_skills_func');

function atom_skill_func($atts, $content = null){
	global $skill_items, $skill_style,$skill_circle;
	extract( shortcode_atts( array(
			'name'	=> 'No Name',
			'percent' => '50%',
			'text' => '',
			'cover_color' => '',
			'bg_color' => '',
			'color'		=>	'',
			'percent_color'	=> ''
		  ), $atts ) );
	$output = '<div class="skill-bg '.($skill_circle == "yes" ? "circle" : "").'"'.($bg_color != '' ? 'style="background:'.esc_attr($bg_color).';"' : '').'><span class="skill-cover" data-percent="'.esc_attr($percent).'" '.($cover_color != '' ? 'style="background:'.esc_attr($cover_color).';"' : '').'></span>';
	if(intval($skill_style) < 2){
		$output .= '<span class="skill-name" '.($color != '' ? 'style="color:'.esc_attr($color).';"' : '').'>'.esc_html($name).'</span>';
	}else{
		$output = '<span class="skill-name" '.($color != '' ? 'style="color:'.esc_attr($color).';"' : '').'>'.esc_html($name).'</span>'.$output;
	}
	$output .= '<span class="skill-progress" '.($percent_color != '' ? 'style="color:'.esc_attr($percent_color).';"' : '').'>'.($text == "" ? esc_attr($percent) : esc_attr($text)).'</span></div>';
	
	$skill_items[] = $output;
	
	return "";
}
add_shortcode('skill', 'atom_skill_func');

//=============================
// Bullets
//=============================
function atom_bullets_func($atts, $content = null){
	global $atom_bullets_items,$atom_bullets_type,$atom_bullets_color,$atom_bullets_effect;
	$atom_bullets_items = array();
	extract( shortcode_atts( array(
			'effect' => '',
			'type'	=> '',
			'color' => '#000000',
			'txt_color' => '',
		  ), $atts ) );
	if($effect != "" && $effect != "none"){
		$output = '<ul class="bullets mline the-icons animate-list '.esc_attr($type).'" data-effect="'.esc_attr($effect).'" '.($txt_color != '' ? ' style="color:'.esc_attr($txt_color).'"' : '').'>';
	}else{
		$output = '<ul class="bullets mline the-icons '.esc_attr($type).'" '.($txt_color != '' ? ' style="color:'.esc_attr($txt_color).'"' : '').'>';
	}
	$atom_bullets_effect = $effect;
	$atom_bullets_type = $type;
	$atom_bullets_color = $color;
	do_shortcode($content);
	foreach($atom_bullets_items as $atom_bullets_item){
		$output .= $atom_bullets_item;
	}
	$output .= '</ul>';
	return $output;
}
add_shortcode('bullets', 'atom_bullets_func');

function atom_bullet_func($atts, $content = null){
	global $atom_bullets_items,$atom_bullets_type,$atom_bullets_color,$atom_bullets_effect;
	extract( shortcode_atts( array(
			'icon'	=> '',
			'icon_color' => '',
			'txt_color' => ''
		  ), $atts ) );
	if($icon_color == ""){
		$icon_color = $atom_bullets_color;
	}
	if($atom_bullets_effect != ""){
		$output = '<li '.($txt_color != '' ? ' style="color:'.esc_attr($txt_color).'"' : '').' class="animate-item" data-effect="'.esc_attr($atom_bullets_effect).'" >';
	}else{
		$output = '<li '.($txt_color != '' ? ' style="color:'.esc_attr($txt_color).'"' : '').'>';
	}
	if($icon != '' ){
		$output .= '<span class="bullets-icon"><i class="fa '.esc_attr($icon).'" style="color:'.esc_attr($icon_color).';"></i></span>' ;
	}else{
		if($atom_bullets_type == ""){
			$output .= '<i class="fa fa-check" style="color:'.esc_attr($icon_color).';"></i>' ;
		}else if($atom_bullets_type == "number"){
			$output .= '<span style="background-color:'.esc_attr($icon_color).';">'.(count($atom_bullets_items) + 1).'</span>';
		}else if($atom_bullets_type == "error"){
			$output .= '<i class="fa fa-remove" style="color:'.esc_attr($icon_color).';"></i>' ;
		}
	}
	$output .= do_shortcode($content);
	$output .= '</li>';
	$atom_bullets_items[] = $output;
	return "";
}
add_shortcode('bullet', 'atom_bullet_func');

//=============================
// Dropcap
//=============================
function atom_dropcap_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'text' 		=> '',
		  'type' 		=> '',
		  'txt_color'	=> '#ffffff',
		  'bg_color'	=> '#242424'
		  ), $atts ) );
	
	$output = '<span class="dropcap';
	switch($type){
		case "text":$output .= ' dropcap-text" style="color:'.esc_attr($txt_color).'"';break;
		default :
			$output .= ' dropcap-default" style="background:'.esc_attr($bg_color).';color:'.esc_attr($txt_color).'"';
	}
	$output .= '>';
	$output .= $text.'</span>';
	$output .= do_shortcode($content);
	return $output;
}
add_shortcode('dropcap', 'atom_dropcap_func');

//=============================
// Blockquote
//=============================
function atom_blockquote_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'color'			=> '',
		  'border_color'	=> '',
		  'bg_color'		=> ''
		  ), $atts ) );
	
	$output = '<blockquote style="'.($color != '' ? 'color:'.esc_attr($color).';' : '').($border_color != '' ? 'border-color:'.esc_attr($border_color).';' : '').($bg_color != '' ? 'background:'.esc_attr($bg_color).';' : '').'">'.do_shortcode($content).'</blockquote>';
	return $output;
}
add_shortcode('blockquote', 'atom_blockquote_func');

//=============================
// Accordion
//=============================
function atom_accordion_func($atts, $content = null){
	global $atom_accordion_id, $atom_accordion_items,$atom_accordion_item_id,$atom_accordion_item_effect;
	// setting accordion id
	if(isset($atom_accordion_id)){
		$atom_accordion_id++;
	}else{
		$atom_accordion_id = 1;
	}
	$atom_accordion_item_id = 1;
	extract( shortcode_atts( array(
		  'effect' => '',
		  ), $atts ) );
		  
	$atom_accordion_items = array();
	$atom_accordion_item_effect = $effect;
	if($effect != "" && $effect != "none"){
		$output = '<div class="atom-accordion atom-accordion-main animate-list" data-effect="'.esc_attr($effect).'" id="accordion-'.esc_attr($atom_accordion_id).'">';
	}else{
		$output = '<div class="atom-accordion atom-accordion-main" id="accordion-'.esc_attr($atom_accordion_id).'">';
	}
	do_shortcode($content);
	foreach($atom_accordion_items as $atom_accordion_item){
		$output .= $atom_accordion_item;
	}
	$output .= '</div>';
	return $output;
}
add_shortcode('accordion', 'atom_accordion_func');

function atom_accordion_item_func($atts, $content = null){
	global $atom_accordion_items,$atom_accordion_id,$atom_accordion_item_id,$atom_accordion_item_effect;
	extract( shortcode_atts( array(
		  'title' => '',
		  'open' => '',
		  'bg_color' => ''
		  ), $atts ) );
	
	if($atom_accordion_item_effect != ""){
		$output = '<div class="panel accordion-panel animate-item" data-effect="'.esc_attr($atom_accordion_item_effect).'">';
	}else{
		$output = '<div class="panel accordion-panel">';
	}
	$atom_accordion_items[] = $output.'<div class="accordion-heading"><h4 class="accordion-title"><a class="accordion-toggle '.($open == "true" || $open == "yes" ? '' : 'collapsed').'" data-toggle="collapse" data-parent="#accordion-'.esc_attr($atom_accordion_id).'" href="#accordion-'.esc_attr($atom_accordion_id).'-item-'.esc_attr($atom_accordion_item_id).'"><span class="accordion-icon" style="'.($bg_color != '' ? 'background-color:'.esc_attr($bg_color).';' : '').'"><i class="fa fa-minus"></i><i class="fa fa-plus"></i></span>'.esc_html($title).'</a></h4></div><div id="accordion-'.esc_attr($atom_accordion_id).'-item-'.esc_attr($atom_accordion_item_id).'" class="accordion-collapse collapse '.($open == "true" || $open == "yes" ? "in" : "").'"><div class="accordion-body">'.do_shortcode($content).'</div></div></div>';
	$atom_accordion_item_id++;
	return "";
}
add_shortcode('accordion_item', 'atom_accordion_item_func');

//=============================
// Toggle
//=============================
function atom_toggle_func($atts, $content = null){
	global $atom_toggle_id;
	if(isset($atom_toggle_id)){
		$atom_toggle_id++;
	}else{
		$atom_toggle_id = 1;
	}
	extract( shortcode_atts( array(
		  'effect' => '',
		  'title' => '',
		  'open'  => '',
		  'bg_color' => ''
		  ), $atts ) );
	if($effect != "" && $effect != "none"){
		$output = '<div class="atom-accordion animate" data-effect="'.esc_attr($effect).'">';
	}else{
		$output = '<div class="atom-accordion">';
	}
	$output .= '<div class="accordion-heading"><h4 class="accordion-title"><a class="accordion-toggle '.($open == "true" || $open == "yes" ? '' : 'collapsed').'" data-toggle="collapse" href="#toggle-'.esc_attr($atom_toggle_id).'"><span class="accordion-icon" style="'.($bg_color != '' ? 'background-color:'.esc_attr($bg_color).';' : '').'"><i class="fa fa-minus"></i><i class="fa fa-plus"></i></span>'.esc_html($title).'</a></h4></div><div id="toggle-'.esc_attr($atom_toggle_id).'" class="accordion-collapse collapse '.($open == "true" || $open == "yes" ? "in" : "").'"><div class="accordion-body">'.do_shortcode($content).'</div></div></div>';
	return $output;
}
add_shortcode('toggle', 'atom_toggle_func');

//=============================
// Testimonials
//=============================
function atom_testimonials_func($atts, $content = null) {
	global $atom_testimonials_items,$atom_testimonials_nav,$atom_testimonials_type,$atom_testimonials_show_nav;
	$atom_testimonials_items = array();
	$atom_testimonials_nav = array();
	extract( shortcode_atts( array(
		  	'type'		=> '',
			'autoplay'	=> 'no',
			'delay'		=>	'6000',
			'show_nav'	=>	'yes',
			'effect'	=>	''
		  ), $atts ) );
	
	$atom_testimonials_type = $type;
	$atom_testimonials_show_nav = $show_nav;
	$testimonials_type = '';
	
	if($type == 'avatar'){
		 $testimonials_type = "testimonials-avatar";
	}else if($type == 'wide'){
		$testimonials_type = "testimonials-wide";
	}
	
	if($autoplay == "yes"){
		$testimonials_type .= ' testimonials-auto';
	}
	
	if($show_nav == 'yes'){
		$testimonials_type .= " testimonials-show-nav";
	}
	
	if($effect != "" && $effect != "none"){
		$output = '<div class="testimonials '.esc_attr($testimonials_type).' animate" data-effect="'.esc_attr($effect).'" data-delay="'.esc_attr($delay).'">';
	}else{
		$output = '<div class="testimonials '.esc_attr($testimonials_type).'" data-delay="'.esc_attr($delay).'">';
	}
	
	if($type == 'wide'){
		$output .= '<span class="testimonials-quote"><i class="fa fa-quote-left"></i></span>';
	}else if($type != 'avatar'){
		$output .= '<span class="testimonials-quote-left"><i class="fa fa-quote-left"></i></span><span class="testimonials-quote-right"><i class="fa fa-quote-right"></i></span>';
	}
	
	do_shortcode($content);
	
	$output .= implode("", $atom_testimonials_items);
	
	if($show_nav == 'yes'){
		$output .='<div class="testimonials-nav">'.implode("",$atom_testimonials_nav).'</div>';
	}
	
	$output .= '</div>';
	return $output;
}
add_shortcode('testimonials', 'atom_testimonials_func');

function atom_testimonials_item_func($atts, $content = null){
	global $atom_testimonials_items , $atom_testimonials_type, $atom_testimonials_nav, $atom_testimonials_show_nav;
	
	extract( shortcode_atts( array(
		  	'name'	=>  '',
			'job'	=>	'',
			'img'	=>	''
		  ), $atts ) );
	
	$output = '<div class="testimonials-item">';
	
	if($atom_testimonials_type == "avatar"){
		$output .= '<div class="testimonials-avatar-img show-tooltip" title="'.esc_attr($name).'"><img src="'.esc_url($img).'" alt="'.esc_attr($name).'"></div><div class="testimonials-content"><span class="testimonials-quote-left"><i class="fa fa-quote-left"></i></span><span class="testimonials-quote-right"><i class="fa fa-quote-right"></i></span>'.do_shortcode($content).'<div class="testimonials-name"><span><i class="fa fa-user"></i></span><span>'.esc_attr($name).'</span><span class="testimonials-job">- '.esc_attr($job).'</span></div></div></div>';
	}else{
		$output .= '<div class="testimonials-content">'.do_shortcode($content).'</div><div class="testimonials-name"><span><i class="fa fa-user"></i></span><span>'.esc_attr($name).'</span><span class="testimonials-job">- '.esc_attr($job).'</span></div></div>';
	}

	$atom_testimonials_items[] = $output;
	
	if($atom_testimonials_show_nav == "yes"){
		$atom_testimonials_nav[] = '<a class="show-tooltip testimonials-btn" title="'.esc_attr($name).'"></a>';
	}
	
	return "";
}
add_shortcode('testimonials_item', 'atom_testimonials_item_func');

//=============================
// FlexSlider
//=============================
function atom_flexslider_func($atts, $content = null){
	global $atom_flexslider_items;
	$atom_flexslider_items = array();
	extract( shortcode_atts( array(
		  'style' => '',
		  'auto' => 'no',
		  'delay' => '5000'
		  ), $atts ) );
	
	$output = '<div class="flexslider atom-fl '.($style == "clean" ? "atom-fl-clean" : "" ).'" '.($auto == "yes" ? 'data-delay="'.esc_attr($delay).'"' : '').' ><ul class="slides">';

	do_shortcode($content);
	if(count($atom_flexslider_items) > 0){
		foreach($atom_flexslider_items as $atom_flexslider_item){
			$output .= '<li>'.$atom_flexslider_item.'</li>';
		}
	}
	$output .= '</ul></div>';
	return $output;
}
add_shortcode('flexslider', 'atom_flexslider_func');

function atom_flexslider_item_func($atts, $content = null){
	global $atom_flexslider_items;
	extract( shortcode_atts( array(
		  'type' 	=>	'image',
		  'src'	 	=>	'',
		  'link'	=>	''
		  ), $atts ) );
	switch($type){
		case 'image' :
			if($link != ""){
				$atom_flexslider_items[] = '<a href="'.esc_url($link).'"><img src="'.esc_attr($src).'" alt="img" ></a>';
			}else{
				$atom_flexslider_items[] = '<img src="'.esc_url($src).'" alt="img" >';
			}
			break;
		case 'video' :
			$atom_flexslider_items[] = do_shortcode($content);
			break;
	}
	return "";
}
add_shortcode('flexslider_item', 'atom_flexslider_item_func');

//=============================
// Carousel
//=============================
function atom_carousel_func($atts, $content = null){
	global $atom_carousel_items,$atom_carousel_id;
	$atom_carousel_items = array();
	if(isset($atom_carousel_id)){
		$atom_carousel_id++;
	}else{
		$atom_carousel_id = 1;
	}
	extract( shortcode_atts( array(
		  'auto'  => '',
		  'delay' => ''
		  ), $atts ) );
	$output =  '<div id="carousel-'.esc_attr($atom_carousel_id).'" class="carousel slide '.($auto == "yes" ? 'carousel-auto' : 'carousel-stop').'" data-ride="carousel" '.($delay != "" ? 'data-delay="'.esc_attr($delay).'"' : '').'>';
	
	do_shortcode($content);
	
	$output .= '<ol class="carousel-indicators">';
	$count = 0;
	foreach($atom_carousel_items as $atom_carousel_item){
		$output .= '<li data-target="#carousel-'.esc_attr($atom_carousel_id).'" data-slide-to="'.$count.'" '.($count == 0 ? 'class="active"' : '').'></li>';
		$count++;
	}
  	$output .= '</ol>';
	$output .= '<div class="carousel-inner">';
	
	$count = 0;
	foreach($atom_carousel_items as $atom_carousel_item){
		$output .= '<div class="item '.($count == 0 ? 'active' : '').'">'.$atom_carousel_item.'</div>';
		$count++;
	}
	$output .= '</div>';
	
	$output .= '<a class="left carousel-control" href="#carousel-'.esc_attr($atom_carousel_id).'" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control" href="#carousel-'.esc_attr($atom_carousel_id).'" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span> </a>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode('carousel', 'atom_carousel_func');

function atom_carousel_item_func($atts, $content = null){
	global $atom_carousel_items;
	extract( shortcode_atts( array(
		  'src'	 => ''
		  ), $atts ) );
	$atom_carousel_items[] = '<img src="'.esc_url($src).'" alt="img" ><div class="carousel-caption">'.do_shortcode($content).'</div>';
	return "";
}
add_shortcode('carousel_item', 'atom_carousel_item_func');

//=============================
// Call To Action
//=============================
function atom_call_to_action_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'title' => '',
		  'size' => 'big',
		  'btn_title' => '',
		  'btn_type' => '',
		  'btn_size' => 'btn-lg',
		  'url'	 => '#',
		  'target' => '_self',
		  'bg_color' => '',
		  'bg_hover_color' => '',
		  'txt_color' => '',
		  'txt_hover_color' => '',
		  'effect' => ''
		  ), $atts ) );
	
	if($effect != "" && $effect != "none"){
		$output = '<div class="call-to-action animate" data-effect="'.esc_attr($effect).'">';
	}else{
		$output = '<div class="call-to-action">';
	}
	
	if($size == 'big'){
		$output .= '<h1>'.$title.'</h1>';
	}
	else if($size == '' || $size == 'small'){
		$output .= '<h3>'.$title.'</h3>';
	}
	else {
		$output .= '<'.esc_attr($size).'>'.$title.'</'.esc_attr($size).'>';
	}
	
	if($content != ''){ 
		$output .= '<p class="desc '.esc_attr($size).'">'.do_shortcode($content).'</p>';
	}
	
	if($btn_title != '') {
		if($btn_type == ""){
			$btn_type = 'btn-theme';
		}
		$output .= '<p><a class="btn '.esc_attr($btn_type).' '.esc_attr($btn_size).'" href="'.esc_url($url).'" target="'.esc_attr($target).'"';
		
		if($bg_color != ''){
			$output .=' data-bgcolor="'.esc_attr($bg_color).'"';
		}
		if($bg_hover_color != ''){
			$output .=' data-bghovercolor="'.esc_attr($bg_hover_color).'"';
		}
		if($txt_color != ''){
			$output .=' data-txtcolor="'.esc_attr($txt_color).'"';
		}
		if($txt_hover_color != ''){
			$output .=' data-txthovercolor="'.esc_attr($txt_hover_color).'"';
		}
		
		$output .= ' >'.esc_attr($btn_title).'</a></p>';
	}
	$output .= '</div>';
	return $output;
}
add_shortcode('call_to_action', 'atom_call_to_action_func');

function atom_call_to_action_bar_func($atts, $content = null){
	extract( shortcode_atts( array(
		  'title' => '',
		  'size' => 'big',
		  'btn_title' => '',
		  'btn_type' => '',
		  'btn_size' => 'btn-lg',
		  'url'	 => '#',
		  'target' => '_self',
		  'bg_color' => '',
		  'bg_hover_color' => '',
		  'txt_color' => '',
		  'txt_hover_color' => '',
		  'effect' => ''
		  ), $atts ) );

	if($effect != "" && $effect != "none"){
		$output = '<div class="call-to-action-bar animate" data-effect="'.esc_attr($effect).'"><div class="call-to-action-bar-content">';
	}else{
		$output = '<div class="call-to-action-bar"><div class="call-to-action-bar-content">';
	}
	
	if($size == 'big'){
		$output .= '<h1>'.$title.'</h1>';
	}else if($size == '' || $size == 'small'){
		$output .= '<h3>'.$title.'</h3>';
	}else{
		$output .= '<'.esc_attr($size).'>'.$title.'</'.esc_attr($size).'>';
	}
	
	if($content != ''){
		$output .= '<p class="desc '.esc_attr($size).'">'.do_shortcode($content).'</p>';
	}
	$output .= '</div>';
	if($btn_title != '') {
		if($btn_type == ""){
			$btn_type = 'btn-theme';
		}
		$output .= '<p><a class="btn '.esc_attr($btn_type).' '.esc_attr($btn_size).'" href="'.esc_url($url).'" target="'.esc_attr($target).'"';
		if($bg_color != ''){
			$output .=' data-bgcolor="'.esc_attr($bg_color).'"';
		}
		if($bg_hover_color != ''){
			$output .=' data-bghovercolor="'.esc_attr($bg_hover_color).'"';
		}
		if($txt_color != ''){
			$output .=' data-txtcolor="'.esc_attr($txt_color).'"';
		}
		if($txt_hover_color != ''){
			$output .=' data-txthovercolor="'.esc_attr($txt_hover_color).'"';
		}
		$output .= ' >'.$btn_title.'</a></p>';
	}
	$output .= '</div>';
	return $output;
}
add_shortcode('call_to_action_bar', 'atom_call_to_action_bar_func');

//=============================
// Team
//=============================
function atom_team_func($atts, $content = null){
	global $atom_team_content , $atom_team_socials;
	$atom_team_content = '';
	$atom_team_socials = array();
	extract( shortcode_atts( array(
			'style'	=> '',
			'name' 	=> '',
			'job'	=> '',
			'src'	=> '',
			'link'	=> '',
			'effect'=> '',
			'showjob' => ''
		  ), $atts ) );
	do_shortcode($content);
	
	if($effect != "" && $effect != "none"){
		$output = '<div class="team team-style-'.esc_attr($style).' animate" data-effect="'.esc_attr($effect).'">';
	}else{
		$output = '<div class="team team-style-'.esc_attr($style).'">';
	}
	
	if($style == "1"){
		$output .='<div class="team-avatar"><img src="'.esc_url($src).'" alt="'.$name.'" /><div class="post-mask-content"><div class="centered">';
			$output .='<h4 class="team-title"><a href="'.esc_url($link).'">'.$name.'</a></h4>';
			$output	.='<div class="team-job">'.$job.'</div>';
			$output	.='<div class="team-social">';
			foreach($atom_team_socials as $atom_team_social){
				$output	.=$atom_team_social;
			}
			$output	.='</div>';
		$output .= '</div></div></div>';
		if($showjob == "yes"){
			$output .= '<h5>'.$name.'</h5>';
			$output .= '<p>'.$job.'</p>';
		}
		$output .='</div>';
		
	}else if($style == "2"){
		$output	.='<div class="team-avatar"><img src="'.esc_url($src).'" alt="'.$name.'" /></div>';
		$output .='<div class="team-user">';
		if($link != ""){
			$output .='<h4 class="team-title"><a href="'.esc_url($link).'">'.$name.'</a></h4>';
		}else{
			$output .='<h4 class="team-title">'.$name.'</h4>';
		}
		$output	.='<div class="team-job">'.$job.'</div>';
		$output	.='</div>';
		$output	.='<div class="team-information">'.$atom_team_content.'</div>';
		$output	.='<div class="team-social">';
		foreach($atom_team_socials as $atom_team_social){
			$output	.=$atom_team_social;
		}
		$output	.='</div></div>';
	}else{
		$output	.='<div class="team-avatar atom-popover" data-placement="top" data-trigger="hover" title="'.esc_attr($name).'"><img src="'.esc_url($src).'" alt="'.$name.'" /><div class="atom-popover-content">'.$atom_team_content.'</div></div>';
		$output .='<div class="team-user">';
		if($link != ""){
			$output .='<h4 class="team-title"><a href="'.esc_url($link).'">'.$name.'</a></h4>';
		}else{
			$output .='<h4 class="team-title">'.$name.'</h4>';
		}
		$output	.='<div class="team-job">'.$job.'</div>';
		$output	.='</div>';
	
		$output	.='<div class="team-social">';
		foreach($atom_team_socials as $atom_team_social){
			$output	.=$atom_team_social;
		}
		$output	.='</div></div>';
	}
	
	return $output;
}
add_shortcode('team', 'atom_team_func');

function atom_team_content_func($atts, $content = null){
	global $atom_team_content ;
	$atom_team_content = do_shortcode($content);
	return $atom_team_content;
}
add_shortcode('team_content', 'atom_team_content_func');

function atom_team_social_func($atts, $content = null){
	global $atom_team_socials;
	extract( shortcode_atts( array(
			'link'  => '#',
			'target'=> '_blank',
			'icon'	=>	''
		  ), $atts ) );
	$atom_team_socials[] = '<a href="'.esc_url($link).'" target="'.esc_attr($target).'"><i class="fa '.esc_attr($icon).'"></i></a>';
	return "";
}
add_shortcode('team_social', 'atom_team_social_func');

//=============================
// PriceTable
//=============================
function atom_price_func($atts, $content = null){
	global $atom_price_items,$atom_price_type;
	$atom_price_items = array();
	extract( shortcode_atts( array(
		  'type'	=> 'standard',
		  'title'	=> '',
		  'price'	=> '',
		  'plan'	=> '',
		  'background_color' 	=> '',
		  'title_bg_color'		=> '',
		  'content_bg_color'	=> '',
		  'content_align'		=> 'center',
		  'effect'	=> ''
		  ), $atts ) );
	//recommend , free , standard
	if($type == 'custom' && $title_bg_color != ""){
		$title_bg_color = $title_bg_color;
	}else{
		switch($type){
			case 'recommend':$title_bg_color = '#f0592a';break;
			case 'free':$title_bg_color = '#5E9401';break;
			default :$title_bg_color = '#646464';
			
		}
	}
	
	
	if($type == 'custom' && $background_color != ""){
		$background_color = $background_color;
	}else{
		switch($type){
			case 'recommend':$background_color = '#fb6f58';break;
			case 'free':$background_color = '#82C906';break;
			default :$background_color = '#787878';
		}
	}
	
	if($type == 'custom' && $content_bg_color != ""){
		$content_bg_color = $content_bg_color;
	}else{
		switch($type){
			case 'recommend':$content_bg_color = '#fff9d9';break;
			case 'free':$content_bg_color = '#EFFED6';break;
			default :$content_bg_color = '#F4F4F4';
		}
	}
	
	$atom_price_type = $type;
	
	if($effect != "" && $effect != "none"){
		$output = '<div class="price '.esc_attr($type).' animate" data-effect="'.esc_attr($effect).'"><div class="price-header">';
	}else{
		$output = '<div class="price '.esc_attr($type).'"><div class="price-header">';
	}

	$output .= '<div class="price-title" style="background: '.esc_attr($title_bg_color).';"><h4>'.$title.'</h4></div>';
	$output .= '<div class="price-price-plan" style="background: '.esc_attr($background_color).';">';
	$output .= '<div class="price-num">'.$price.'</div>';
	$output .= '<div class="price-plan">'.$plan.'</div>';
	$output .= '</div>';
	$output .= '</div><ul class="price-content the-icons" style="text-align:'.esc_attr($content_align).';background: '.esc_attr($content_bg_color).';">';
	
	do_shortcode($content);
	
	foreach($atom_price_items as $atom_price_item){
		$output .= $atom_price_item;
	}
	
	$output .= '</ul></div>';
	
	return $output;
}
add_shortcode('price', 'atom_price_func');

function atom_price_item_func($atts, $content = null){
	global $atom_price_items, $atom_price_type;
	extract( shortcode_atts( array(
		  'type'	 	=> 'text',
		  'btn_text'	=> 'Sign Up',
		  'btn_url'		=>	'#',
		  'btn_target'	=> 	'_self',
		  'btn_size'	=>	'default',
		  'btn_bg_color' => '',
		  'btn_bg_hover_color' => '',
		  'btn_txt_color'	=> '',
		  'btn_txt_hover_color'	=> ''
		  ), $atts ) );
	
	if($atom_price_type == 'custom'){
		if($btn_bg_color == ''){ $btn_bg_color = '#666666';}
		if($btn_bg_hover_color == ''){ $btn_bg_hover_color = '#333333';}
		if($btn_txt_color == '') $btn_txt_color = '#ffffff';
		if($btn_txt_hover_color == ''){ $btn_txt_hover_color = '#ffffff';}
	}else{
		switch($atom_price_type){
			case 'recommend' :
				$btn_bg_color = '#F1D027';
				$btn_bg_hover_color = '#C7A807';
				$btn_txt_color = '#ffffff';
				$btn_txt_hover_color = '#ffffff';
				break;
			case 'free' :
				$btn_bg_color = '#82C906';
				$btn_bg_hover_color = '#5E9401';
				$btn_txt_color = '#ffffff';
				$btn_txt_hover_color = '#ffffff';
				break;
			default :
				$btn_bg_color = '#666666';
				$btn_bg_hover_color = '#333333';
				$btn_txt_color = '#ffffff';
				$btn_txt_hover_color = '#ffffff';
		}
	}
	
	switch($type){
		case 'btn':
			$btn = '[button text="'.esc_attr($btn_text).'" type="btn-custom" size="'.esc_attr($btn_size).'" url="'.esc_url($btn_url).'"  target="'.esc_attr($btn_target).'" bg_color="'.esc_attr($btn_bg_color).'" bg_hover_color="'.esc_attr($btn_bg_hover_color).'" txt_color="'.esc_attr($btn_txt_color).'" txt_hover_color="'.esc_attr($btn_txt_hover_color).'"]';
			$atom_price_items[] = '<li class="price-item price-btn">'.do_shortcode($btn).'</li>';
			break;
		default :
			$atom_price_items[] = '<li class="price-item">'.do_shortcode($content).'</li>';
	}
	return "";
}
add_shortcode('price_item', 'atom_price_item_func');

//=============================
// Tabs
//=============================
function atom_tabs_func($atts, $content = null){
	global $tabs_title_array,$tabs_content_array;
	extract( shortcode_atts( array(
			'effect'	=>	''
		  ), $atts ) );
	$tabs_title_array 	= array();
	$tabs_content_array = array();
	do_shortcode($content);
	if($effect != "" && $effect != "none"){
		$output = '<div class="tabs animate" data-effect="'.esc_attr($effect).'">';
	}else{
		$output = '<div class="tabs">';
	}
	$output .= '<ul class="tabs-nav inline">';
	$output .= implode("",$tabs_title_array);
	$output .= '</ul>';
	$output .= '<div class="tabs-container">';
	$output .= implode("",$tabs_content_array);
	$output .='</div></div>';
	return $output;
}
add_shortcode('tabs', 'atom_tabs_func');

function atom_tabs_item_func($atts, $content = null){
	global $tabs_title_array,$tabs_content_array;
	extract( shortcode_atts( array(
			'icon'	=>	'',
		  	'title' => 'No title!'
		  ), $atts ) );
		  
	$tabs_title_array[] = '<li>'.($icon != "" ? '<span><i class="fa '.esc_attr($icon).'"></i></span>' : '').$title.'</li>';
	$tabs_content_array[]	= '<div class="tabs-content">'.do_shortcode($content).'</div>';
	return "";
}
add_shortcode('tabs_item', 'atom_tabs_item_func');

//=============================
// SideTabs
//=============================
function atom_sidetabs_func($atts, $content = null){
	global $sidetabs_title_array,$sidetabs_content_array;
	extract( shortcode_atts( array(
			'effect'	=>	'',
			'align'		=>	'left'
		  ), $atts ) );
	$sidetabs_title_array 	= array();
	$sidetabs_content_array = array();
	if($effect != "" && $effect != "none"){
		$output = '<div class="sidetabs animate '.esc_attr($align).'" data-effect="'.esc_attr($effect).'">';
	}else{
		$output = '<div class="sidetabs '.esc_attr($align).'">';
	}
	do_shortcode($content);
	$output .= '<ul class="sidetabs-nav mline the-icons">';
	$output .= implode("", $sidetabs_title_array);
	$output .= '</ul>';
	$output .= '<div class="sidetabs-container">';
	$output .= implode("", $sidetabs_content_array);
	$output .='</div></div>';
	return $output;
}
add_shortcode('sidetabs', 'atom_sidetabs_func');

function atom_sidetabs_item_func($atts, $content = null){
	global $sidetabs_title_array,$sidetabs_content_array;
	extract( shortcode_atts( array(
		  'title' => 'No title!',
		  'icon' => ''
		  ), $atts ) );
	$sidetabs_title_array[] = '<li>'.($icon != '' ? '<i class="fa '.esc_attr($icon).'"></i>' : '' ).$title.'</li>';
	$sidetabs_content_array[]	= '<div class="sidetabs-content">'.do_shortcode($content).'</div>';
	return "";
}
add_shortcode('sidetabs_item', 'atom_sidetabs_item_func');

//=============================
// Timeline
//=============================
function atom_timeline_func($atts, $content = null){
	global $atom_timeline_items, $atom_timeline_style, $atom_timeline_effect;
	extract( shortcode_atts( array(
			'style'	=>	'1',
			'effect' => ''
		  ), $atts ) );
	$atom_timeline_items = array();
	$atom_timeline_style = $style;
	$atom_timeline_effect = $effect;
	do_shortcode($content);
	if($effect != "" && $effect != "none"){
		$output = '<ul class="timeline mline timeline-style-'.esc_attr($style).' animate-list">';
	}else{
		$output = '<ul class="timeline mline timeline-style-'.esc_attr($style).'">';
	}
	
	$output .= implode("",$atom_timeline_items);
	$output .= '</ul>';
	return $output;
}
add_shortcode('timeline', 'atom_timeline_func');

function atom_timeline_item_func($atts, $content = null){
	global $atom_timeline_items,$atom_timeline_style, $atom_timeline_effect;
	extract( shortcode_atts( array(
			'date'	=> '',
			'title'	=>	'',
			'link'	=>	'',
			'status'=> '',
			'icon'	=> ''
		  ), $atts ) );
	$output = "";
	if($atom_timeline_effect != ""){
		$output = '<li class="timeline-element '.esc_attr($status).' animate-item" data-effect="'.esc_attr($atom_timeline_effect).'">';
	}else{
		$output = '<li class="timeline-element '.esc_attr($status).'">';
	}
	if($atom_timeline_style == "1"){
		$output .= '<span class="timeline-v-line"></span><span class="timeline-c-line"></span><div class="timeline-date"><span>'.esc_attr($date).'</span></div><div class="timeline-content">';

	}else if($atom_timeline_style == "2"){
		$output .= '<span class="timeline-v-line"></span><span class="timeline-c-line show-tooltip" title="'.esc_attr($date).'"></span><div class="timeline-content">';
	}else if($atom_timeline_style == "3"){
		$output .= '<span class="timeline-v-line"></span><span class="timeline-c-line"></span>';
		$output .= '<div class="timeline-icon"><span><i class="fa '.esc_attr($icon).'"></i></span></div><div class="timeline-content">';
	}
	if($title != ""){
		if($link != ""){
			$output .= '<h4 class="timeline-title"><a title="'.esc_attr($title).'" href="'.esc_url($link).'">'.esc_attr($title).'</a></h4>';
		}else{
			$output .= '<h4 class="timeline-title">'.esc_attr($title).'</h4>';
		}
	}
	$output .= do_shortcode($content).'</div></li>';
	$atom_timeline_items[] = $output;
	return "";
}
add_shortcode('timeline_item', 'atom_timeline_item_func');

//=============================
// Features
//=============================
function atom_features_func($atts, $content = null){
	extract( shortcode_atts( array(
			'layout'	=>	'left',
			'style'		=>	'',
			'icon' 		=>	'fa-flag',
			'title'		=>	'',
			'link'		=>	'',
			'effect'	=>	''
		  ), $atts ) );
	if($effect != "" && $effect != "none"){
		$output = '<div class="features '.esc_attr($layout).' '.esc_attr($style).' animate" data-effect="'.esc_attr($effect).'">';
	}else{
		$output = '<div class="features '.esc_attr($layout).' '.esc_attr($style).'">';
	}
	
	if($link != ""){
		$output .= '<a href="'.esc_url($link).'">';
	}
	
	if($layout == "left" && $icon != ""){
		$output .= '<div class="feature-icon"><span><i class="fa '.esc_attr($icon).'"></i></span></div>';
	}
	
	$output .= '<div class="feature-content">';
	if($layout != "left" && $icon != ""){
		$output .= '<div class="feature-icon"><span><i class="fa '.esc_attr($icon).'"></i></span></div>';
	}
	if($title != ""){
		$output .= '<h3 class="feature-title">'.esc_attr($title).'</h3>';
	}
	$output .= do_shortcode($content);
	$output .= '</div>';
	if($link != ""){
		$output .= '</a>';
	}
	$output .= '</div>';
	return $output;
}
add_shortcode('features', 'atom_features_func');

//=============================
// Services
//=============================
function atom_services_func($atts, $content = null){
	global $atom_services_items, $atom_services_effect;
	extract( shortcode_atts( array(
			'effect'	=>	'',
			'border'	=>	'yes'
		  ), $atts ) );
	$atom_services_items = array();
	$atom_services_effect = $effect;
	if($effect != "" && $effect != "none"){
		$output = '<ul class="services inline animate-list ';
	}else{
		$output = '<ul class="services inline ';
	}
	if($border == "yes"){
		$output .= 'border';
	}
	$output .= '">';
	do_shortcode($content);
	$output .= implode("", $atom_services_items);
	$output .= '</ul>';
	return $output;
}
add_shortcode('services', 'atom_services_func');

function atom_services_item_func($atts, $content = null){
	global $atom_services_items, $atom_services_effect;
	extract( shortcode_atts( array(
			'icon' => 'fa-flag',
			'link'	=> ''
		  ), $atts ) );
	if($atom_services_effect != ""){
		$output = '<li class="animate-item" data-effect="'.esc_attr($atom_services_effect).'">';
	}else{
		$output = '<li>';
	}
	$link_params = '';
	if($link != ''){
		$link_params = 'href="'.esc_url($link).'"';
	}
	$output .= '<a '.$link_params.'><span class="service-icon"><i class="fa '.esc_attr($icon).'"></i></span><div class="service-content">'.do_shortcode($content).'</div></a></li>';
	$atom_services_items[] = $output;
	return "";
}
add_shortcode('services_item', 'atom_services_item_func');

//=============================
// Clients
//=============================
function atom_clients_func($atts, $content = null){
	global $atom_clients_items, $atom_clients_effect;
	extract( shortcode_atts( array(
			'effect'	=>	''
		  ), $atts ) );
	$atom_clients_items = array();
	$atom_clients_effect = $effect;
	if($effect != "" && $effect != "none"){
		$output = '<div class="clients"><span class="client-arrow-left"><i class="fa fa-chevron-left"></i></span><ul class="inline animate-list">';
	}else{
		$output = '<div class="clients"><span class="client-arrow-left"><i class="fa fa-chevron-left"></i></span><ul class="inline">';
	}

	do_shortcode($content);
	$output .= implode("", $atom_clients_items);
	$output .= '</ul><span class="client-arrow-right"><i class="fa fa-chevron-right"></i></span></div>';
	return $output;
}
add_shortcode('clients', 'atom_clients_func');

function atom_client_func($atts, $content = null){
	global $atom_clients_items, $atom_clients_effect;
	extract( shortcode_atts( array(
			'img' => '',
			'link'	=> '#',
			'alt'	=>	''
		  ), $atts ) );
	if($atom_clients_effect != ""){
		$output = '<li class="animate-item" data-effect="'.esc_attr($atom_services_effect).'">';
	}else{
		$output = '<li>';
	}
	$output .= '<a href="'.esc_url($link).'" target="_blank"><div class="client-content"><img src="'.esc_url($img).'" alt="'.$alt.'" /></div></a></li>';
	$atom_clients_items[] = $output;
	return "";
}
add_shortcode('client', 'atom_client_func');

//=============================
// Total Count
//=============================
function atom_totalcount_func($atts, $content = null){
	extract( shortcode_atts( array(
			'style' => '1',
			'effect'=> '',
			'prefix'=> '',
			'suffix'=> '',
			'start' => '0',
			'step'	=> '1',
			'end'	=> '10',
			'color' => '',
			'align' => 'center'
		  ), $atts ) );
	$border_color = "";
	$num_color = "";
	if($color != "" && $style == "2"){
		$border_color = 'style="border: 4px solid '.esc_attr($color).';"';
		$num_color = 'style="color:'.esc_attr($color).';"';
	}
	if($effect != "" && $effect != "none"){
		$output = '<div class="totalcount totalcount-style-'.esc_attr($style).' '.esc_attr($align).' animate" data-step="'.intval($step).'" data-effect="'.esc_attr($effect).'" data-from="'.intval($start).'" data-end="'.intval($end).'">';
	}else{
		$output = '<div class="totalcount totalcount-style-'.esc_attr($style).' '.esc_attr($align).'" data-step="'.intval($step).'" data-from="'.intval($start).'" data-end="'.intval($end).'">';
	}
	$output .= '<div class="totalcount-number" '.$border_color.'><span>'.esc_attr($prefix).'</span>'.'<span class="totalnumber" '.$num_color.'></span><span>'.esc_attr($suffix).'</span></div>';
	$output .= '<div class="totalcount-content">'.do_shortcode($content).'</div>';
	$output .= '</div>';
	return $output;
}
add_shortcode('totalcount', 'atom_totalcount_func');

//=============================
// One Page Navigation
//=============================
function atom_pagenav_func($atts, $content = null){
	global $atom_pagenav_items;
	extract( shortcode_atts( array(
			'position' => 'right',
			'style'=> ''
		), $atts ) );
	$atom_pagenav_items = array();
	$output = "";
	do_shortcode($content);
	if(count($atom_pagenav_items) > 0){
		if($position == "left" || $position == "right"){
			$output ='<ul class="atom-pagenav mline ';
		}else{
			$output ='<ul class="atom-pagenav inline ';
		}
		$output .= esc_attr($position).' '.esc_attr($style).'">';
		$output .= implode("",$atom_pagenav_items);
		$output .= '</ul>';
	}
	return $output;
}
add_shortcode('pagenav', 'atom_pagenav_func');

function atom_pagenav_item_func($atts, $content = null){
	global $atom_pagenav_items;
	extract( shortcode_atts( array(
			'link' => '',
			'title'=> ''
		), $atts ) );
	$atom_pagenav_items[] = '<li><a href="#'.esc_attr($link).'" title="'.esc_attr($title).'"></a>';
	return "";
}
add_shortcode('pagenav_item', 'atom_pagenav_item_func');




/*-------------------------------------------------------------
 			THEME CONTENT WITH SHORTCODE
-------------------------------------------------------------*/

//=============================
// Blog List
//=============================
function atom_blog_list_func($atts, $content = null){
	global $blog_shortcode_content, $blog_shortcode_thumbnail_size;
	
	extract( shortcode_atts( array(
		  	'number' 		=>	'4',
			'columns'		=>	'4',
			'type' 			=>	'',
			'style'			=>	'1',
			'orderby'		=>	'',
			'cat__in'		=>	'',
			'tag__in'		=>	'',
			'post__in'		=>	'',
			'post__not_in'	=> 	'',
			'nocrop'		=>	'',
			'effect'		=>	''
		  ), $atts ) );
	
	$output = "";
	//get related posts
	$blog_posts = atom_get_blog_widget_post($type, $number, $orderby, $cat__in, $tag__in, $post__in, $post__not_in);
	
	if($blog_posts != "" && $blog_posts->have_posts()){
		$columns = intval($columns) - 2;
		$blog_shortcode_columns = atom_get_element_columns(intval($columns));
		$blog_shortcode_thumbnail_size = atom_get_thumbnail_size(intval($columns), $nocrop);
		
		if($effect != "" && $effect != "none"){
			$output .= '<div class="row"><div class="atom-shortcode-blog-post animate-list">';
		}else{
			$output .= '<div class="row"><div class="atom-shortcode-blog-post ">';
		}
		while($blog_posts->have_posts()) {
			$blog_posts->the_post();
			$blog_shortcode_content = "";
			
			if($effect != "" && $effect != "none"){
				$output .= '<article id="post-'.get_the_ID().'" class="'.implode(' ', get_post_class('shortcode-post-entry blog-shortcode-style-'.esc_attr($style).' '.esc_attr($blog_shortcode_columns)) ).' animate-item" data-effect="'.esc_attr($effect).'" itemscope itemtype="http://schema.org/Article">';
			}else{
				$output .= '<article id="post-'.get_the_ID().'" class="'.implode(' ', get_post_class('shortcode-post-entry blog-shortcode-style-'.esc_attr($style).' '.esc_attr($blog_shortcode_columns)) ).'" itemscope itemtype="http://schema.org/Article">';
			}
			get_template_part( 'template/blog/blog', 'shortcode-content-style-'.esc_attr($style));
			$output .= $blog_shortcode_content;
			$output .= '</article>';
		}
		$output .= '</div></div>';
	}
	wp_reset_postdata();
	return $output;  
}
add_shortcode('blog_list', 'atom_blog_list_func');

//=============================
// Blog AJAX 
//=============================
function atom_blog_ajax_list_func($atts, $content = null){
	global $blog_ajax_show_columns, $blog_ajax_per_page_num, $blog_ajax_page_cats, $blog_ajax_auto_load, $blog_ajax_style, $blog_ajax_page;
	
	extract( shortcode_atts( array(
		  	'number' 		=>	'4',
			'columns'		=>	'4',
			'style'			=>	'1',
			'cat__in'		=>	'',
			'autoload'		=>	'',
			'nocrop'		=>	'',
		  	'nextpage_link'	=>	''
		  ), $atts ) );
	if($nextpage_link == ""){
		return "";
	}
	
	// get page items show columns
	$columns = intval($columns)-2;
	$blog_ajax_show_columns = $columns;
	// get page items show number
	$blog_ajax_per_page_num = $number;
	// get page items show categories
	$blog_ajax_page_cats = $cat__in;
	// get page items auto load 
	$blog_ajax_auto_load = $autoload;
	// get image need crop
	$page_image_no_crop = $nocrop;
	// get show style
	$blog_ajax_style = $style;
	// get load page
	$blog_ajax_page = $nextpage_link;
	
	$output = '<div class="row"><div class="atom-shortcode-blog-ajax col-md-12 col-sm-12">';
	
	ob_start();
	get_template_part( 'template/blog/blog', 'ajax-content');
	$output .= ob_get_clean();

	$output .= '</div></div>';
	return $output;
}
add_shortcode('blog_ajax_list', 'atom_blog_ajax_list_func');

//=============================
// Blog Timeline 
//=============================
function atom_blog_timeline_list_func($atts, $content = null){
	global $blog_ajax_show_columns, $blog_ajax_per_page_num, $blog_ajax_page_cats, $blog_ajax_auto_load, $blog_ajax_style, $blog_ajax_page;
	
	extract( shortcode_atts( array(
		  	'number' 		=>	'4',
			'style'			=>	'1',
			'cat__in'		=>	'',
			'autoload'		=>	'',
			'nocrop'		=>	'',
			'nextpage_link'	=>	''
		  ), $atts ) );
	if($nextpage_link == ""){
		return "";
	}
	// get page items show number
	$blog_ajax_per_page_num = $number;
	// get page items show categories
	$blog_ajax_page_cats = $cat__in;
	// get page items auto load 
	$blog_ajax_auto_load = $autoload;
	// get image need crop
	$page_image_no_crop = $nocrop;
	// get show style
	$blog_ajax_style = $style;
	// get load page
	$blog_ajax_page = $nextpage_link;
	
	$output = '<div class="row"><div class="atom-shortcode-blog-timeline col-md-12 col-sm-12">';
	
	ob_start();
	get_template_part( 'template/blog/blog', 'timeline-content');
	$output .= ob_get_clean();

	$output .= '</div></div>';
	return $output;
}
add_shortcode('blog_timeline_list', 'atom_blog_timeline_list_func');

//=============================
// Portfolio List
//=============================
function atom_portfolio_list_func($atts, $content = null){
	global $portfolio_shortcode_content, $portfolio_shortcode_thumbnail_size;
	extract( shortcode_atts( array(
		  	'number' 		=>	'4',
			'columns'		=>	'4',
			'type' 			=>	'',
			'style'			=>	'1',
			'orderby'		=>	'',
			'cat_slug_in'		=>	'',
			'tag_slug_in'		=>	'',
			'post__in'		=>	'',
			'post__not_in'	=> 	'',
			'nocrop'		=>	'',
			'effect'		=>	''
		  ), $atts ) );
	$output = "";
	$portfolios = atom_get_portfolio_widget_post($type, $number, $orderby , $cat_slug_in, $tag_slug_in, $post__in, $post__not_in);
	
	if($portfolios != "" && $portfolios->have_posts()){
		$columns = intval($columns) - 2;
		$portfolio_shortcode_columns = atom_get_element_columns(intval($columns));
		$portfolio_shortcode_thumbnail_size = atom_get_thumbnail_size(intval($columns), $nocrop);
		
		if($effect != "" && $effect != "none"){
			$output .= '<div class="row"><div class="atom-shortcode-portfolio-post animate-list">';
		}else{
			$output .= '<div class="row"><div class="atom-shortcode-portfolio-post">';
		}
		while($portfolios->have_posts()) {
			$portfolios->the_post();
			$portfolio_shortcode_content = "";
			if($effect != "" && $effect != "none"){
				$output .= '<article id="post-'.get_the_ID().'" class="'.implode(' ', get_post_class('shortcode-portfolio-entry portfolio-element portfolio-style-'.esc_attr($style).' '.esc_attr($portfolio_shortcode_columns)) ).' animate-item" data-effect="'.esc_attr($effect).'" itemscope itemtype="http://schema.org/CreativeWork">';
			}else{
				$output .= '<article id="post-'.get_the_ID().'" class="'.implode(' ', get_post_class('shortcode-portfolio-entry portfolio-element portfolio-style-'.esc_attr($style).' '.esc_attr($portfolio_shortcode_columns)) ).'" itemscope itemtype="http://schema.org/CreativeWork">';
			}
			
			get_template_part( 'template/portfolio/portfolio', 'shortcode-content-style-'.esc_attr($style));
			$output .= $portfolio_shortcode_content;
			$output .= '</article>';
		}
		$output .= '</div></div>';
	}
	
	wp_reset_postdata();
	return $output;
}

//add_shortcode('portfolio_list', 'atom_portfolio_list_func');

//=============================
// Portfolio AJAX 
//=============================
function atom_portfolio_ajax_list_func($atts, $content = null){
	global $page_image_no_crop,$portfolio_ajax_show_columns,$portfolio_ajax_show_style,$portfolio_ajax_per_page_num,$portfolio_ajax_page_cats,$portfolio_ajax_page_tags;
	
	extract( shortcode_atts( array(
		  	'number' 		=>	'4',
			'columns'		=>	'4',
			'style'			=>	'1',
			'cat_slug_in'		=>	'',
			'tag_slug_in'		=>	'',
			'autoload'		=>	'',
			'nocrop'		=>	'',
		  	'nextpage_link'	=>	''
		  ), $atts ) );
	if($nextpage_link == ""){
		return "";
	}
	
	// get ajax page item show columns
	$columns = intval($columns)-2;
	$portfolio_ajax_show_columns = $columns;
	// get ajax page item show style
	$portfolio_ajax_show_style	= $style;
	// get per page show number
	$portfolio_ajax_per_page_num = $number;
	// get per page items categories
	$portfolio_ajax_page_cats = $cat_slug_in;
	// get per page items tags
	$portfolio_ajax_page_tags = $tag_slug_in;
	
	$page_image_no_crop = $nocrop;
	
	$output = '<div class="row"><div class="atom-shortcode-portfolio-ajax col-md-12 col-sm-12">';
	
	ob_start();
	get_template_part( 'template/portfolio/portfolio', 'ajax-content');
	$output .= ob_get_clean();
	
	$output .= '</div></div>';
	return $output;
}
//add_shortcode('portfolio_ajax_list', 'atom_portfolio_ajax_list_func');

function atom_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'atom_clean_shortcodes');
add_filter('widget_text', 'atom_clean_shortcodes');

/* Visual Composer */
add_action( 'init', 'atom_integrateWithVC');

function atom_integrateWithVC() {
if (function_exists('vc_map')){
	
	$effect_list = array("none","bounce","flash","pulse","shake","swing","tada","wobble","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp","bounceOut","bounceOutDown","bounceOutLeft","bounceOutRight","bounceOutUp","fadeIn","fadeInDown","fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig","fadeOut","fadeOutDown","fadeOutDownBig","fadeOutLeft","fadeOutLeftBig","fadeOutRight","fadeOutRightBig","fadeOutUp","fadeOutUpBig","flip","flipInX","flipInY","flipOutX","flipOutY","lightSpeedIn","lightSpeedOut","rotateIn","rotateInDownLeft","rotateInDownRight","rotateInUpLeft","rotateInUpRight","rotateOut","rotateOutDownLeft","rotateOutDownRight","rotateOutUpLeft","rotateOutUpRight","slideInDown","slideInLeft","slideInRight","slideOutLeft","slideOutRight","slideOutUp","hinge","rollIn","rollOut");
	
	/* wide background */
	vc_map( array(
		"base" => "wide",
		"class" => "",
		"as_parent" => array('except' => ''), 
		"content_element" => true,
		"show_settings_on_create" => false,
		"icon" => "icon-wpb-atom",
		"name" => __("Wide Background",'atom'),
		"category" => __('ATOM Content','atom'),
		"admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/atom.css'),
		"params" => array(
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("id",'atom'),
			 "param_name" => "id",
			 "value" => '',
			 "description" => __("The wide background element id.",'atom')
		  ),
		   array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("class",'atom'),
			 "param_name" => "class",
			 "value" => '',
			 "description" => __("The wide background custom css class name.",'atom')
		  ),
		  array(
			 "type" => "textarea",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("style",'atom'),
			 "param_name" => "style",
			 "value" => '',
			 "description" => __("Input wide background basic style.",'atom')
		  ),
		  array(
			 "type" => "textarea_html",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content",'atom'),
			 "param_name" => "content",
			 "value" => __("<p>Input content.</p>",'atom')
		  )
		 )
	));

	/* space */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Space",'atom'),
		"base" => "space",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/atom.css'),
		"params" => array(
			   array(
				 "type" => "dropdown",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Show Line",'atom'),
				 "param_name" => "line",
				 "value" => array('no','yes')
			  ),
			  array(
				 "type" => "dropdown",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Space Size",'atom'),
				 "param_name" => "size",
				 "value" => array('normal','small','big')
			  ),
			  array(
				 "type" => "dropdown",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Show Line Style",'atom'),
				 "param_name" => "style",
				 "value" => array('solid','dashed')
			  )
		  )
	));
	
	/* title */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Title",'atom'),
		"base" => "title",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Class",'atom'),
				"param_name" => "class",
				"description" => __("Custom title class name.",'atom')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Show Title Type",'atom'),
				"param_name" => "type",
				"value" => array('text','icon')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Align",'atom'),
				"param_name" => "align",
				"value" => array('center','left','right')
			),
		  	array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Value",'atom'),
				"param_name" => "value",
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Size",'atom'),
				"param_name" => "size",
				"value" => array('h1','h2','h3','h4','h5','h6')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Uppercase",'atom'),
				"param_name" => "uppercase",
				"value" => array('yes','no')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Bold",'atom'),
				"param_name" => "bold",
				"value" => array('yes','no')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Class Name",'atom'),
				"param_name" => "icon",
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Background Radius",'atom'),
				"param_name" => "radius",
				"value" => array('yes','no')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Size",'atom'),
				"param_name" => "icon_size",
				"value" => array('normal','min','big')
			),
		  	array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon or Text Style CSS",'atom'),
				"param_name" => "style",
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Show Background",'atom'),
				"param_name" => "show_bg",
				"value" => array('yes','no')
			),
		  	array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Show Line",'atom'),
				"param_name" => "line",
				"value" => array('yes','no')
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Line Align",'atom'),
				"param_name" => "line_align",
				"value" => array('center','top','bottom')
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text or Icon Color",'atom'),
				"param_name" => "color",
				"value" => '#666666',
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color",'atom'),
				"param_name" => "bg_color",
				"value" => '#ffffff',
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Line Color",'atom'),
				"param_name" => "line_color",
				"value" => '#e8e8e8',
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color when Icon Type",'atom'),
				"param_name" => "extra_color",
				"value" => '#666666',
			)
		)
	) );

	/* icon */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Icon",'atom'),
		"base" => "icon",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Icon Name",'atom'),
			 "param_name" => "icon_name",
			 "value" => "fa-falg",
			 "description" => __("Enter icon name like fa-falg.",'atom')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Icon Size",'atom'),
			 "param_name" => "icon_size",
			 "value" => array('', 'fa-large' , 'fa-2x', 'fa-3x', 'fa-4x' , 'fa-5x'),
			 "description" => __("The icon size, default don't need input.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("The icon style",'atom'),
			 "param_name" => "icon_style",
			 "value" => "",
			 "description" => __("The icon style, default don't need input.",'atom')
		  ),
		  array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Icon color",'atom'),
			 "param_name" => "icon_color",
			 "value" => '#ff0000',
			 "description" => __("The icon default color.",'atom')
		  )
		)
	) );
	
	/* content */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Content",'atom'),
		"base" => "content",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"admin_enqueue_css" => array(get_template_directory_uri().'/vc_extend/atom.css'),
		"params" => array(
			   array(
				 "type" => "textfield",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("ID",'atom'),
				 "param_name" => "id",
				 "value" => "",
			  ),
			  array(
				 "type" => "textfield",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Class",'atom'),
				 "param_name" => "class",
				 "value" => "",
			  ),
			  array(
				 "type" => "dropdown",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Content Align",'atom'),
				 "param_name" => "align",
				 "value" => array('left','center','right')
			  ),
			  array(
				 "type" => "textarea_html",
				 "holder" => "div",
				 "class" => "",
				 "heading" => __("Content",'atom'),
				 "param_name" => "content",
				 "value" => __("<p>Input content.</p>",'atom')
			  )
		  )
	));

	/* buttons */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Button",'atom'),
		"base" => "button",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Title",'atom'),
			 "param_name" => "text",
			 "value" => __("Button",'atom'),
			 "description" => __("Enter button title.",'atom')
		  ),
		   array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Icon Name",'atom'),
			 "param_name" => "icon",
			 "value" => 'fa-flag',
			 "description" => __("Enter icon use fontawesome",'atom')
		  ),
		   array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Buton Type",'atom'),
			 "param_name" => "type",
			 "value" => array('btn-theme','btn-custom')
		  ),
		   array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Size",'atom'),
			 "param_name" => "size",
			 "value" => array('', 'btn-lg' , 'btn-sm' , 'btn-xs'),
			 "description" => __("Button size, default don't need input.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Link",'atom'),
			 "param_name" => "url",
			 "value" => '',
			 "description" => __("Click button open link.",'atom')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Link Target",'atom'),
			 "param_name" => "target",
			 "value" => array('_self', '_blank'),
		  ),
		  array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Background Color",'atom'),
			 "param_name" => "bg_color",
			 "value" => '#7AB80E',
			 "description" => __("The button background color.",'atom')
		  ),
		  array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Background Hover Color",'atom'),
			 "param_name" => "bg_hover_color",
			 "value" => '#559500',
			 "description" => __("The button background hover color .",'atom')
		  ),
		  array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Font Color",'atom'),
			 "param_name" => "txt_color",
			 "value" => '#ffffff',
			 "description" => __("The button font color.",'atom')
		  ),
		  array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Button Font Hover Color",'atom'),
			 "param_name" => "txt_hover_color",
			 "value" => '#000000',
			 "description" => __("The button font hover color .",'atom')
		  )
		 )
	) );
	
	/* alert message */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Alert Message",'atom'),
		"base" => "alert",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Alert Message Type",'atom'),
			 "param_name" => "type",
			 "value" => array('success' , 'danger' , 'error' , 'info'),
			 "description" => __("The alert message type.",'atom')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Alert Message Close",'atom'),
			 "param_name" => "close",
			 "value" => array('yes' , 'no'),
			 "description" => __("The alert can been close.",'atom')
		  ),
		  array(
			 "type" => "textarea_html",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content",'atom'),
			 "param_name" => "content",
			 "value" => __("<p>Input alert message content.</p>",'atom')
		  )
		 )
	));

	/* google map */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Map",'atom'),
		"base" => "map",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("LatLng",'atom'),
			 "param_name" => "latlng",
			 "value" => '',
			 "description" => __("The map LatLng value from google map.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Map Height",'atom'),
			 "param_name" => "height",
			 "value" => '200',
			 "description" => __("The map show height.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Map Width",'atom'),
			 "param_name" => "width",
			 "value" => '300',
			 "description" => __("The map show width.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Map Zoom",'atom'),
			 "param_name" => "zoom",
			 "value" => '13',
			 "description" => __("The map default show zoom.",'atom')
		  ),
		   array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Draggable",'atom'),
			 "param_name" => "draggable",
			 "value" => array('yes' ,'no' ),
			 "description" => __("The map can drag.",'atom')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Scroll Wheel",'atom'),
			 "param_name" => "scrollwheel",
			 "value" => array('yes' ,'no' ),
			 "description" => __("The map can scroll wheel zoom.",'atom')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Marker",'atom'),
			 "param_name" => "show_marker",
			 "value" => array('yes' ,'no' ),
			 "description" => __("The map show marker.",'atom')
		  ), 
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Address Information",'atom'),
			 "param_name" => "show_info",
			 "value" => array('yes' ,'no' ),
			 "description" => __("The map show info box of address.",'atom')
		  ), 
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Information Style Theme",'atom'),
			 "param_name" => "theme",
			 "value" => array('default' , 'black', 'white'),
			 "description" => __("The alert can been close.",'atom')
		  ),
		   array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Information Width",'atom'),
			 "param_name" => "info_width",
			 "value" => '260',
			 "description" => __("The map info address box width.",'atom')
		  ),
		  array(
			 "type" => "textarea_html",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content",'atom'),
			 "param_name" => "content",
			 "value" => __("<p>MAP ADDRESS TEXT.</p>",'atom'),
			 "description" => __("Enter your address.",'atom')
		  )
		)
	) );
	
	/* youtube */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Youtube",'atom'),
		"base" => "youtube",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		 	array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Youtube ID",'atom'),
			 "param_name" => "id",
			 "value" => '',
			 "description" => __("Enter video ID (eg.6htyfxPkYDU).",'atom')
		  	),
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Width",'atom'),
			 "param_name" => "width",
			 "value" => '600',
			 "description" => __("Youtube default show width.",'atom')
		  	),
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Height",'atom'),
			 "param_name" => "height",
			 "value" => '360',
			 "description" => __("Youtube default show width.",'atom')
		  	)
		)
	));
	
	/* vimeo */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Vimeo",'atom'),
		"base" => "vimeo",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		 	array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Vimeo ID",'atom'),
			 "param_name" => "id",
			 "value" => '',
			 "description" => __("Enter video ID (eg.54578415).",'atom')
		  	),
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Width",'atom'),
			 "param_name" => "width",
			 "value" => '600',
			 "description" => __("Vimeo default show width.",'atom')
		  	),
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Height",'atom'),
			 "param_name" => "height",
			 "value" => '360',
			 "description" => __("Vimeo default show width.",'atom')
		  	)
		)
	));
	
	/* Soundcloud */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Soundcloud",'atom'),
		"base" => "soundcloud",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		 	array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Soundcloud URL",'atom'),
			 "param_name" => "url",
			 "value" => '',
			 "description" => __("Enter soundcloud url like http://api.soundcloud.com/tracks/38987054.",'atom')
		  	),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show With iframe",'atom'),
			 "param_name" => "iframe",
			 "value" => array('true','false')
		  	),
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Width",'atom'),
			 "param_name" => "width",
			 "value" => '100%',
			 "description" => __("Soundcloud default show width.",'atom')
		  	),
			array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Height",'atom'),
			 "param_name" => "height",
			 "value" => '166',
			 "description" => __("Soundcloud default show width.",'atom')
		  	),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Auto Play",'atom'),
			 "param_name" => "auto_play",
			 "value" => array('true','false')
		  	),
			array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Comments",'atom'),
			 "param_name" => "show_comments",
			 "value" => array('true','false')
		  	),
			array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Color",'atom'),
			 "param_name" => "color",
			 "value" => '#ff7700'
			),
			array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Theme Color",'atom'),
			 "param_name" => "theme_color",
			 "value" => '#ff6699'
			)
		)
	));
	
	/* share */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Share",'atom'),
		"base" => "share",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Socials",'atom'),
			 "param_name" => "type",
			 "value" => '',
			 "description" => __("Need show social icon like twitter, default don't input.",'atom')
		  	),
		   array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Page URL",'atom'),
			 "param_name" => "link",
			 "value" => '',
		  	),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Page Title",'atom'),
			 "param_name" => "title",
			 "value" => '',
		  	)
		 )
	));
	
	/* toggle */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Toggle",'atom'),
		"base" => "toggle",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Toggle Title",'atom'),
			 "param_name" => "title",
			 "value" => __("Input toggle title.",'atom'),
			 "description" => __("The toggle title.",'atom')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Toggle Open",'atom'),
			 "param_name" => "open",
			 "value" => array('yes','no'),
			 "description" => __("The toggle content default show or hide.",'atom')
		  ),
		  array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Background Color",'atom'),
			 "param_name" => "bg_color",
			 "value" => '#cc3333',
			 "description" => __("The background color.",'atom')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Element show with effect",'atom'),
			 "param_name" => "effect",
			 "value" => $effect_list
		  ),
		  array(
			 "type" => "textarea_html",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content",'atom'),
			 "param_name" => "content",
			 "value" => __("<p>Input content.</p>",'atom')
		  )
		 )
	));
	
	/* features */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Features",'atom'),
		"base" => "features",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Features Layout",'atom'),
			 "param_name" => "layout",
			 "value" => array('left','center')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Features Name",'atom'),
			 "param_name" => "style",
			 "value" => ""
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Icon Name",'atom'),
			 "param_name" => "icon",
			 "value" => "fa-flag"
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Title",'atom'),
			 "param_name" => "title",
			 "value" => __("Title",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Link",'atom'),
			 "param_name" => "link",
			 "value" => ""
		  ),
		   array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Element show with effect",'atom'),
			 "param_name" => "effect",
			 "value" => $effect_list
		  ),
		  array(
			 "type" => "textarea_html",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content",'atom'),
			 "param_name" => "content",
			 "value" => __("<p>Input content.</p>",'atom')
		  )
		 )
	));
	
	/* Total Count */
	vc_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Total Count",'atom'),
		"base" => "totalcount",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Total Count Style",'atom'),
			 "param_name" => "style",
			 "value" => array('1','2')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Total Count Style",'atom'),
			 "param_name" => "align",
			 "value" => array('left','right','center','row')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Prefix text",'atom'),
			 "param_name" => "prefix",
			 "value" => ""
		  ),
		   array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Suffix text",'atom'),
			 "param_name" => "suffix",
			 "value" => ""
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Start Number",'atom'),
			 "param_name" => "start",
			 "value" => "0"
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Step Number",'atom'),
			 "param_name" => "step",
			 "value" => "10"
		  ),
		   array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("End Number",'atom'),
			 "param_name" => "end",
			 "value" => "1000"
		  ),
		  array(
			 "type" => "colorpicker",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Circle Color",'atom'),
			 "param_name" => "color",
			 "value" => '#cc3333'
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Element show with effect",'atom'),
			 "param_name" => "effect",
			 "value" => $effect_list
		  ),
		  array(
			 "type" => "textarea_html",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Content",'atom'),
			 "param_name" => "content",
			 "value" => __("<p>Input content.</p>",'atom')
		  )
		 )
	));
	
	/* blog list */
	wpb_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Blog List",'atom'),
		"base" => "blog_list",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Posts Number",'atom'),
			 "param_name" => "number",
			 "value" => '4',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Columns",'atom'),
			 "param_name" => "columns",
			 "value" => '4',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Type",'atom'),
			 "param_name" => "type",
			 "value" => array('recent','related','popular','featured')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Style",'atom'),
			 "param_name" => "style",
			 "value" => array('1','2','3','4'),
			 "description" => __("Show item style.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Order By",'atom'),
			 "param_name" => "orderby",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Categories ids use , ",'atom'),
			 "param_name" => "cat__in",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Tags ids use , ",'atom'),
			 "param_name" => "tag__in",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Included post ids use , ",'atom'),
			 "param_name" => "post__in",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Not included post ids use , ",'atom'),
			 "param_name" => "post__not_in",
			 "value" => '',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Image don't crop",'atom'),
			 "param_name" => "nocrop",
			 "value" => array('off','on')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Element show with effect",'atom'),
			 "param_name" => "effect",
			 "value" => $effect_list
		  )
		 )
	));
	
	/* blog ajax list */
	wpb_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Blog Ajax List",'atom'),
		"base" => "blog_ajax_list",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("!IMPORTANT. Need show which page items, like xxx??post=1&paged=2",'atom'),
			 "param_name" => "nextpage_link",
			 "value" => ''
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Posts Number",'atom'),
			 "param_name" => "number",
			 "value" => '4',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Columns",'atom'),
			 "param_name" => "columns",
			 "value" => '4',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Style",'atom'),
			 "param_name" => "style",
			 "value" => array('1','2'),
			 "description" => __("Show item style.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Categories ids use , ",'atom'),
			 "param_name" => "cat__in",
			 "value" => '',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Auto load",'atom'),
			 "param_name" => "autoload",
			 "value" => array('off','on')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Image don't crop",'atom'),
			 "param_name" => "nocrop",
			 "value" => array('off','on')
		  )
		 )
	));
		
	/* blog timeline list */
	wpb_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Blog Timeline List",'atom'),
		"base" => "blog_timeline_list",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("!IMPORTANT. Need show which page items, like xxx??post=1&paged=2",'atom'),
			 "param_name" => "nextpage_link",
			 "value" => ''
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Posts Number",'atom'),
			 "param_name" => "number",
			 "value" => '4',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Style",'atom'),
			 "param_name" => "style",
			 "value" => array('1','2'),
			 "description" => __("Show item style.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Categories ids use , ",'atom'),
			 "param_name" => "cat__in",
			 "value" => '',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Auto load",'atom'),
			 "param_name" => "autoload",
			 "value" => array('off','on')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Image don't crop",'atom'),
			 "param_name" => "nocrop",
			 "value" => array('off','on')
		  )
		 )
	));
	
	/* portfolio list
	wpb_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Portfolio List",'atom'),
		"base" => "portfolio_list",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Posts Number",'atom'),
			 "param_name" => "number",
			 "value" => '4',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Columns",'atom'),
			 "param_name" => "columns",
			 "value" => '4',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Type",'atom'),
			 "param_name" => "type",
			 "value" => array('recent','related','featured')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Style",'atom'),
			 "param_name" => "style",
			 "value" => array('1','2','3','4','5','6','7'),
			 "description" => __("Show item style.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Order By",'atom'),
			 "param_name" => "orderby",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Categories slugs use , ",'atom'),
			 "param_name" => "cat_slug_in",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Tags slugs use , ",'atom'),
			 "param_name" => "tag_slug_in",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Included post ids use , ",'atom'),
			 "param_name" => "post__in",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Not included post ids use , ",'atom'),
			 "param_name" => "post__not_in",
			 "value" => '',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Image don't crop",'atom'),
			 "param_name" => "nocrop",
			 "value" => array('off','on')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Element show with effect",'atom'),
			 "param_name" => "effect",
			 "value" => $effect_list
		  )
		)
	)); */
	
	/* portfolio ajax list
	wpb_map( array(
		"icon" => "icon-wpb-atom",
		"name" => __("Portfolio Ajax List",'atom'),
		"base" => "portfolio_ajax_list",
		"class" => "",
		"controls" => "full",
		"category" => __('ATOM Content','atom'),
		"params" => array(
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("!IMPORTANT. Need show which page items, like xxx??post=1&paged=2",'atom'),
			 "param_name" => "nextpage_link",
			 "value" => ''
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Posts Number",'atom'),
			 "param_name" => "number",
			 "value" => '4',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Columns",'atom'),
			 "param_name" => "columns",
			 "value" => '4',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Show Style",'atom'),
			 "param_name" => "style",
			 "value" => array('1','2','3','4','5','6','7'),
			 "description" => __("Show item style.",'atom')
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Categories slugs use , ",'atom'),
			 "param_name" => "cat_slug_in",
			 "value" => '',
		  ),
		  array(
			 "type" => "textfield",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Tags slugs use , ",'atom'),
			 "param_name" => "tag_slug_in",
			 "value" => '',
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Auto load",'atom'),
			 "param_name" => "autoload",
			 "value" => array('off','on')
		  ),
		  array(
			 "type" => "dropdown",
			 "holder" => "div",
			 "class" => "",
			 "heading" => __("Image don't crop",'atom'),
			 "param_name" => "nocrop",
			 "value" => array('off','on')
		  ) 
		 )
	)); */
	
}
}