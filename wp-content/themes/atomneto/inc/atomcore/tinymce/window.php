<?php
//header('Content-Type: text/html; charset=utf-8');
wp_enqueue_script('jquery');
global $wp_scripts;

$effect_list = array("none","bounce","flash","pulse","shake","swing","tada","wobble","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp","bounceOut","bounceOutDown","bounceOutLeft","bounceOutRight","bounceOutUp","fadeIn","fadeInDown","fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig","fadeOut","fadeOutDown","fadeOutDownBig","fadeOutLeft","fadeOutLeftBig","fadeOutRight","fadeOutRightBig","fadeOutUp","fadeOutUpBig","flip","flipInX","flipInY","flipOutX","flipOutY","lightSpeedIn","lightSpeedOut","rotateIn","rotateInDownLeft","rotateInDownRight","rotateInUpLeft","rotateInUpRight","rotateOut","rotateOutDownLeft","rotateOutDownRight","rotateOutUpLeft","rotateOutUpRight","slideInDown","slideInLeft","slideInRight","slideOutLeft","slideOutRight","slideOutUp","hinge","rollIn","rollOut");

//input
function atomcore_shortcode_input($name = '', $key = '', $desc = '', $default = ''){
	return '<div class="atomcore-table-tr" data-type="input" data-key="'.$key.'">
				<div class="atomcore-table-title">'.$name.'<div class="atomcore-page-content-desc">'.$desc.'</div></div>
				<div class="atomcore-table-content"><input class="atomcore-input-text" value="'.$default.'" type="text"></div>
			</div>';
}

//number
function atomcore_shortcode_number($name = '', $key = '', $desc = '', $default = ''){
	return '<div class="atomcore-table-tr" data-type="input" data-key="'.$key.'">
				<div class="atomcore-table-title">'.$name.'<div class="atomcore-page-content-desc">'.$desc.'</div></div>
				<div class="atomcore-table-content"><input class="atomcore-input-text" value="'.$default.'" type="number"></div>
			</div>';
}

//select
function atomcore_shortcode_select($name = '', $key = '', $desc = '', $options = array(), $default = ''){
	$output =  '<div class="atomcore-table-tr" data-type="select" data-key="'.$key.'">
				<div class="atomcore-table-title">'.$name.'<div class="atomcore-page-content-desc">'.$desc.'</div></div>
				<div class="atomcore-table-content"><select class="atomcore-select">';
				foreach($options as $option){
					$output .=  '<option '.($default == $option ? 'selected' : '' ).' value='.$option.'>'.$option.'</option>';
				}
	$output .= '</select></div></div>';
	return $output;
}

//color
function atomcore_shortcode_color($name = '', $key = '', $desc = '', $default = ''){
	if($default == ""){
		$default = '#f5f5f5';
	}
	$output =  '<div class="atomcore-table-tr" data-type="color" data-key="'.$key.'">
				<div class="atomcore-table-title">'.$name.'<div class="atomcore-page-content-desc">'.$desc.'</div></div>
				<div class="atomcore-table-content"><input class="color atomcore-color-picker" value="'.$default.'"></div></div>';
	return $output;
}

//textarea
function atomcore_shortcode_textarea($name = '', $key = '', $desc = '', $default = ''){
	$output =  '<div class="atomcore-table-tr" data-type="textarea" data-key="'.$key.'">
				<div class="atomcore-table-title">'.$name.'<div class="atomcore-page-content-desc">'.$desc.'</div></div>
				<div class="atomcore-table-content"><textarea class="atomcore-textarea">'.$default.'</textarea></div></div>';
	return $output;
}


?>
<!DOCTYPE html>
	<head>
        <title>ATOM Theme Shortcodes</title>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
        <link rel='stylesheet' id='bootstrap-css'  href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css' type='text/css' media='all' />
		<link rel='stylesheet' id='fontawesome-css'  href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css' type='text/css' media='all' />
        <link rel='stylesheet' id='atomcoreshortcodes-css'  href='<?php echo get_template_directory_uri() . '/inc/atomcore/tinymce/atomcoreshortcodes_tinymce.css'; ?>' type='text/css' media='all' />
       	<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
        <script language="javascript" type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() . '/inc/atomcore/tinymce/jscolor.js'; ?>"></script>
        <script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() . '/inc/atomcore/tinymce/atomcoreshortcodes_tinymce.js'; ?>"></script>
        <base target="_self" />
    </head>
    <body id="link">
        <section>
            <div class="atomcore-shortcode-header">
				<div class="atomcore-shortcode-title"><?php _e("Current Element:", 'atom'); ?></div>
                <div class="atomcore-shortcode-select">
                	<select id="shortcode-select">
                    	<option value="0"><?php _e("Choose Insert Shortcode", 'atom'); ?></option>
                        <optgroup label="Complex" >
                        <option value="101">Space</option>
                        <option value="102">Icon</option>
                        <option value="103">Title</option>
                        <option value="104">Content</option>
                        <option value="105">Button</option>
                        <option value="106">Alert</option>
                        <option value="107">Map</option>
                        <option value="108">Share</option>
                        <option value="109">Social</option>
                        <option value="110">Skills</option>
                        <option value="111">Bullets</option>
                        <option value="112">Dropcap</option>
                        <option value="113">Blockquote</option>
                        <option value="114">Accordion</option>
                        <option value="115">Toggle</option>
                        <option value="116">Testimonials</option>
                        <option value="117">FlexSlider</option>
                        <option value="118">Carousel</option>
                        <option value="119">Call to action</option>
                        <option value="120">Call to action bar</option>
                        <option value="121">PriceTable</option>
                        <option value="122">Tabs</option>
                        <option value="123">SideTabs</option>
                        <option value="124">TimeLine</option>
                        <option value="125">Features</option>
                        <option value="126">Services</option>
                        <option value="127">Total Count</option>
                        <option value="128">Page Navigation</option>
                        <option value="129">Team</option>
                        <option value="130">Clients</option>
                        </optgroup>
                        
                        <optgroup label="Media" >
                        <option value="201">Youtube</option>
                        <option value="202">Vimeo</option>
                        <option value="203">Soundcloud</option>
                        </optgroup>
                        
                        <optgroup label="Module" >
                        <option value="301">Blog List</option>
                        <option value="302">Blog Ajax List</option>
                        <option value="303">Blog TimeLine List</option>
                        <!--<option value="304">Portflio List</option>
                        <option value="305">Portflio Ajax List</option>-->
                        </optgroup>
                        
                        <optgroup label="Columns & Wide" >
                        <option value="401">Wide Background</option>
                        <option value="402">One</option>
                        <option value="403">Row</option>
                        <option value="404">Inner Row</option>
                        <option value="405">One Half</option>
                        <option value="406">One Third</option>
                        <option value="407">Two Third</option>
                        <option value="408">One Fourth</option>
                        <option value="409">Two Fourth</option>
                        <option value="410">Three Fourth</option>
                        </optgroup>
                    </select>
            	</div>
            </div>
            
            <div class="shortcodes-container">
                <div id="shortcodes-element-101" data-shortcode="space" class="shortcodes-element">
                	<?php 
					echo atomcore_shortcode_select(__('Show line','atom'),'line','', array('yes','no'));
                	echo atomcore_shortcode_select(__('Space size','atom'),'size','', array('normal','small','big'));
                    echo atomcore_shortcode_select(__('Line style','atom'),'style','', array('solid','dashed')); 
					?>
                </div>
                
                <div id="shortcodes-element-102" data-shortcode="icon" class="shortcodes-element">
                	<?php 
					echo atomcore_shortcode_input(__('Icon name','atom'),'icon_name',__('FontAwesome icon name e.g. fa-flag','atom'),'fa-flag');
                	echo atomcore_shortcode_select(__('Icon size','atom'),'icon_size','', array('default', 'fa-large' , 'fa-2x', 'fa-3x', 'fa-4x' , 'fa-5x'));
                    echo atomcore_shortcode_color(__('Icon color','atom'),'icon_color',__('Custom icon color.','atom'),'#cc3333');
                    echo atomcore_shortcode_input(__('Icon style','atom'),'icon_style',__('Custom icon style.(Options)','atom'));
					?>
                </div>
              
            	<div id="shortcodes-element-103" data-shortcode="title" class="shortcodes-element">
                	<?php 
					echo atomcore_shortcode_input(__('Class name','atom'),'class',__('Custom title class name.(Options)','atom'));
                    echo atomcore_shortcode_select(__('Type','atom'),'type','', array('default','text','icon'));
                    echo atomcore_shortcode_select(__('Align','atom'),'align','', array('left','center','right'));
                	echo atomcore_shortcode_input(__('Text','atom'),'value',__('Title text value.','atom'),'Title');
                    echo atomcore_shortcode_select(__('Text size','atom'),'size','', array('h1','h2','h3','h4','h5','h6'),'h3');
                    echo atomcore_shortcode_select(__('Text uppercase','atom'),'uppercase','', array('yes','no'));
                    echo atomcore_shortcode_select(__('Text bold','atom'),'bold','', array('yes','no'));
                    echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-flag (Options)','atom'),'fa-flag');
                    echo atomcore_shortcode_select(__('Icon size','atom'),'icon_size','', array('default','min','big'));
                	echo atomcore_shortcode_select(__('Show text background','atom'),'show_bg','', array('yes','no'));
                    echo atomcore_shortcode_select(__('Text background radius','atom'),'radius','', array('yes','no'),'no');
                	echo atomcore_shortcode_select(__('Show line','atom'),'line','', array('yes','no'));
                    echo atomcore_shortcode_select(__('Line align','atom'),'line_align','', array('center','top','bottom'));
                    echo atomcore_shortcode_color(__('Text or Icon color','atom'),'color','','#666666');
                    echo atomcore_shortcode_color(__('Background color','atom'),'bg_color','','#ffffff');
                    echo atomcore_shortcode_color(__('Line color','atom'),'line_color','','#e8e8e8');
                    echo atomcore_shortcode_color(__('Icon type text color ','atom'),'extra_color','','#666666');
                    echo atomcore_shortcode_input(__('Style','atom'),'style',__("Icon or Text Style CSS",'atom'));
					?>
                </div>
                
                <div id="shortcodes-element-104" data-shortcode="content" class="shortcodes-element">
                	<?php 
					echo atomcore_shortcode_input(__('ID','atom'),'id',__('Content area ID. (options)','atom'));
                    echo atomcore_shortcode_input(__('Class name','atom'),'class',__('Custom content area class name.(Options)','atom'));
                	echo atomcore_shortcode_select(__('Content align','atom'),'align','', array('left','center','right'));
                    echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-105" data-shortcode="button" class="shortcodes-element">
                	<?php 
					echo atomcore_shortcode_input(__('Text','atom'),'text');
                    echo atomcore_shortcode_select(__('Type','atom'),'type','', array('btn-theme','btn-custom'));
					echo atomcore_shortcode_select(__('Size','atom'),'size','', array('default', 'btn-lg' , 'btn-sm' , 'btn-xs'));
                    echo atomcore_shortcode_input(__('Link','atom'),'url','','#');
                    echo atomcore_shortcode_select(__('Link target','atom'),'target','', array('_self', '_blank'),'_blank');
					echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-flag (Options)','atom'));
                    echo atomcore_shortcode_color(__('Background color','atom'),'bg_color','','#cc3333');
                    echo atomcore_shortcode_color(__('Background hover color','atom'),'bg_hover_color','','#242424');
					echo atomcore_shortcode_color(__('Font color','atom'),'txt_color','','#ffffff');
                    echo atomcore_shortcode_color(__('Font hover color','atom'),'txt_hover_color','','#ffffff');
					?>
                </div>
                
                <div id="shortcodes-element-106" data-shortcode="alert" class="shortcodes-element">
                	<?php 
                    echo atomcore_shortcode_select(__('Alert Type','atom'),'type','', array('success' , 'danger' , 'error' , 'info'));
					echo atomcore_shortcode_select(__('Alert Message Close','atom'),'close','', array('yes', 'no'));
					echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-107" data-shortcode="map" class="shortcodes-element">
                	<?php 
					echo atomcore_shortcode_input(__('LatLng','atom'),'latlng',__("The map LatLng value from google map.e.g. 36.597889,-86.234436",'atom'));
					echo atomcore_shortcode_input(__('Map width','atom'),'width','','100%');
					echo atomcore_shortcode_input(__('Map height','atom'),'height','','300');
					echo atomcore_shortcode_number(__('Map Zoom','atom'),'zoom','','13');
                    echo atomcore_shortcode_select(__('Draggable','atom'),'draggable','', array('yes' , 'no'));
					echo atomcore_shortcode_select(__('Scroll Wheel','atom'),'scrollwheel','', array('yes', 'no'));
					echo atomcore_shortcode_select(__('Show Marker','atom'),'show_marker','', array('yes', 'no'));
					echo atomcore_shortcode_select(__('Show Address Information','atom'),'show_info',__("The map show info box of address.",'atom'), array('yes', 'no'));
					echo atomcore_shortcode_select(__('Information Theme','atom'),'theme','', array('default' , 'black', 'white'));
					echo atomcore_shortcode_number(__('Information Width','atom'),'info_width',__("The map info address box width.",'atom'),'260');
					
					echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input address content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-108" data-shortcode="share" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('Socials','atom'),'type',__("The need show socials account use ',' e.g. twitter,facebook(Options)",'atom'));
					echo atomcore_shortcode_input(__('Page Title','atom'),'title');
					echo atomcore_shortcode_input(__('Page URL','atom'),'link');
					?>
                </div>
                
                <div id="shortcodes-element-109" data-shortcode="social" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_color(__('Background color','atom'),'bg_color','','#e8e8e8');
					echo atomcore_shortcode_select(__('Show Circle Style','atom'),'circle','', array('yes', 'no'),'no');
					echo atomcore_shortcode_select(__('Show Tooltip','atom'),'tooltip','', array('yes', 'no'),'no');
					echo atomcore_shortcode_select(__('Tooltip Placement','atom'),'tooltip_placement','', array('left','right','top','bottom'),'top');
					?>
					<div data-shortcode="social_item" class="shortcodes-child">
                    	<h3><?php _e('Social Item','atom'); ?></h3>
                    	<button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
						<div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_select(__('Social type','atom'),'type','',array('twitter','facebook','google-plus','dribbble','pinterest','flickr','skype','youtube','vimeo','linkedin', 'digg','deviantart','behance','forrst','lastfm','xing','instagram','stumbleupon','picasa','email'));
							echo atomcore_shortcode_input(__('Title','atom'),'title');
							echo atomcore_shortcode_input(__('Link','atom'),'link');
							echo atomcore_shortcode_select(__('Link target','atom'),'target','', array('_self', '_blank'),'_blank');
							?>
						</div>
					</div>
                </div>
                
                <div id="shortcodes-element-110" data-shortcode="skills" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Style','atom'),'style','', array('1', '2'));
					echo atomcore_shortcode_select(__('Border Circle Style','atom'),'circle','', array('yes', 'no'),'no');
					?>
                    <div data-shortcode="skill" class="shortcodes-child">
                    	<h3><?php _e('Skill Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_input(__('Title','atom'),'name',__('Skill Name','atom'));
							echo atomcore_shortcode_input(__('Percent','atom'),'percent','','50%');
							echo atomcore_shortcode_input(__('Custom Text','atom'),'text', __('Custom text replace percent number (Options)','atom'));
							echo atomcore_shortcode_color(__('Progress color','atom'),'cover_color','','#cc3333');
							echo atomcore_shortcode_color(__('Background color','atom'),'bg_color','','#f8f8f8');
							echo atomcore_shortcode_color(__('Title color','atom'),'color','','#333333');
							echo atomcore_shortcode_color(__('Percent color','atom'),'percent_color','','#333333');
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-111" data-shortcode="bullets" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Type','atom'),'type','', array('none', 'number', 'error', 'theme', 'custom') );
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					echo atomcore_shortcode_color(__('Bullets color','atom'),'color','','#000000');
					echo atomcore_shortcode_color(__('Text color','atom'),'txt_color','','#333333');
					?>
                    <div data-shortcode="bullet" class="shortcodes-child">
                    	<h3><?php _e('Bullet Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-flag (Options)','atom'));
							echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-112" data-shortcode="dropcap" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('Text','atom'),'text');
					echo atomcore_shortcode_select(__('Type','atom'),'type','', array('default', 'text') );
					echo atomcore_shortcode_color(__('Text color','atom'),'txt_color','','#ffffff');
					echo atomcore_shortcode_color(__('Background color','atom'),'bg_color','','#242424');
					?>
                </div>
                
                <div id="shortcodes-element-113" data-shortcode="blockquote" class="shortcodes-element">
                	<?php
		  			echo atomcore_shortcode_color(__('Text color','atom'),'color','','#666666');
					echo atomcore_shortcode_color(__('Border color','atom'),'border_color','','#eeeeee');
					echo atomcore_shortcode_color(__('Background color','atom'),'bg_color','','#ffffff');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-114" data-shortcode="accordion" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="accordion_item" class="shortcodes-child">
                    	<h3><?php _e('Accordion Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_input(__('Title','atom'),'title');
							echo atomcore_shortcode_select(__('Open','atom'),'open','', array('yes', 'no'),'no');
							echo atomcore_shortcode_color(__('Icon Background color','atom'),'bg_color','','#cc3333');
							echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-115" data-shortcode="toggle" class="shortcodes-element">
                	<?php
		  			echo atomcore_shortcode_input(__('Title','atom'),'title');
					echo atomcore_shortcode_select(__('Open','atom'),'open','', array('yes', 'no'),'no');
					echo atomcore_shortcode_color(__('Icon Background color','atom'),'bg_color','','#cc3333');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-116" data-shortcode="testimonials" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Type','atom'),'type','', array('default', 'wide','avatar'));
					echo atomcore_shortcode_select(__('Auto Play','atom'),'autoplay','', array('yes', 'no'),'no');
					echo atomcore_shortcode_number(__('Delay Time','atom'),'delay','','6000');
					echo atomcore_shortcode_select(__('Show Nav Button','atom'),'show_nav','', array('yes', 'no'),'no');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="testimonials_item" class="shortcodes-child">
                    	<h3><?php _e('Testimonials Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_input(__('Name','atom'),'name');
							echo atomcore_shortcode_input(__('Job','atom'),'job');
							echo atomcore_shortcode_input(__('Image url','atom'),'img');
							echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-117" data-shortcode="flexslider" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Style','atom'),'style','', array('default', 'clean'));
					echo atomcore_shortcode_select(__('Auto Play','atom'),'auto','', array('yes', 'no'),'no');
					echo atomcore_shortcode_number(__('Delay Time','atom'),'delay','','6000');
					?>
                    <div data-shortcode="flexslider_item" class="shortcodes-child">
                    	<h3><?php _e('Flexslider Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
		  					echo atomcore_shortcode_select(__('Type','atom'),'type','', array('image', 'video'));
		  					echo atomcore_shortcode_input(__('Image url','atom'),'src');
							echo atomcore_shortcode_input(__('Link','atom'),'link');
							echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input video content when video type.','atom')); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-118" data-shortcode="carousel" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Auto Play','atom'),'auto','', array('yes', 'no'),'no');
					echo atomcore_shortcode_number(__('Delay Time','atom'),'delay','','6000');
					?>
                    <div data-shortcode="carousel_item" class="shortcodes-child">
                    	<h3><?php _e('Carousel Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
		  					echo atomcore_shortcode_input(__('Image url','atom'),'src');
							echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-119" data-shortcode="call_to_action" class="shortcodes-element">
                	<?php
		  			echo atomcore_shortcode_input(__('Title','atom'),'title');
					echo atomcore_shortcode_select(__('Size','atom'),'size','', array('normal', 'big'));
					echo atomcore_shortcode_input(__('Button Title','atom'),'btn_title');
					echo atomcore_shortcode_select(__('Button Type','atom'),'btn_type','', array('btn-theme','btn-custom'));
					echo atomcore_shortcode_select(__('Button Size','atom'),'btn_size','', array('default', 'btn-lg' , 'btn-sm' , 'btn-xs'));
					echo atomcore_shortcode_input(__('Link','atom'),'url','','#');
					echo atomcore_shortcode_select(__('Link target','atom'),'target','', array('_self', '_blank'),'_blank');
					echo atomcore_shortcode_color(__('Background color','atom'),'bg_color','','#cc3333');
                    echo atomcore_shortcode_color(__('Background hover color','atom'),'bg_hover_color','','#242424');
					echo atomcore_shortcode_color(__('Font color','atom'),'txt_color','','#ffffff');
                    echo atomcore_shortcode_color(__('Font hover color','atom'),'txt_hover_color','','#ffffff');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-200" data-shortcode="call_to_action_bar" class="shortcodes-element">
                	<?php
		  			echo atomcore_shortcode_input(__('Title','atom'),'title');
					echo atomcore_shortcode_select(__('Size','atom'),'size','', array('normal', 'big'));
					echo atomcore_shortcode_input(__('Button Title','atom'),'btn_title');
					echo atomcore_shortcode_select(__('Button Type','atom'),'btn_type','', array('btn-theme','btn-custom'));
					echo atomcore_shortcode_select(__('Button Size','atom'),'btn_size','', array('default', 'btn-lg' , 'btn-sm' , 'btn-xs'));
					echo atomcore_shortcode_input(__('Link','atom'),'url','','#');
					echo atomcore_shortcode_select(__('Link target','atom'),'target','', array('_self', '_blank'),'_blank');
					echo atomcore_shortcode_color(__('Background color','atom'),'bg_color','','#cc3333');
                    echo atomcore_shortcode_color(__('Background hover color','atom'),'bg_hover_color','','#242424');
					echo atomcore_shortcode_color(__('Font color','atom'),'txt_color','','#ffffff');
                    echo atomcore_shortcode_color(__('Font hover color','atom'),'txt_hover_color','','#ffffff');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-121" data-shortcode="price" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Type','atom'),'type','', array('standard','free','recommend','custom'));
					echo atomcore_shortcode_input(__('Title','atom'),'title');
					echo atomcore_shortcode_input(__('Price','atom'),'price');
					echo atomcore_shortcode_input(__('Plan','atom'),'plan');
					echo atomcore_shortcode_color(__('Background color','atom'),'background_color','','#787878');
                    echo atomcore_shortcode_color(__('Title background color','atom'),'title_bg_color','','#646464');
					echo atomcore_shortcode_color(__('Content background color','atom'),'content_bg_color','','#F4F4F4');
					echo atomcore_shortcode_select(__('Content align','atom'),'content_align','', array('left', 'center','right'),'center');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="price_item" class="shortcodes-child">
                    	<h3><?php _e('Price Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
		  					echo atomcore_shortcode_select(__('Type','atom'),'type','', array('text','btn'));
		  					echo atomcore_shortcode_input(__('Button text','atom'),'btn_text');
							echo atomcore_shortcode_select(__('Button Size','atom'),'btn_size','', array('default', 'btn-lg' , 'btn-sm' , 'btn-xs'));
							echo atomcore_shortcode_input(__('Link','atom'),'btn_url','','#');
							echo atomcore_shortcode_select(__('Link target','atom'),'btn_target','', array('_self', '_blank'),'_blank');
							echo atomcore_shortcode_color(__('Background color','atom'),'btn_bg_color','','#cc3333');
							echo atomcore_shortcode_color(__('Background hover color','atom'),'btn_bg_hover_color','','#242424');
							echo atomcore_shortcode_color(__('Font color','atom'),'btn_txt_color','','#ffffff');
							echo atomcore_shortcode_color(__('Font hover color','atom'),'btn_txt_hover_color','','#ffffff');
							echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-122" data-shortcode="tabs" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="tabs_item" class="shortcodes-child">
                    	<h3><?php _e('Tab Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
		  					echo atomcore_shortcode_input(__('Title','atom'),'title');
							echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-flag (Options)','atom'));
							echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-123" data-shortcode="sidetabs" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Align','atom'),'align','', array('left','right'));
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="sidetabs_item" class="shortcodes-child">
                    	<h3><?php _e('Sidetabs Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
		  					echo atomcore_shortcode_input(__('Title','atom'),'title');
							echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-flag (Options)','atom'));
							echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-124" data-shortcode="timeline" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Style','atom'),'style','', array('1','2','3'));
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="timeline_item" class="shortcodes-child">
                    	<h3><?php _e('Timeline Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
		  					echo atomcore_shortcode_input(__('Title','atom'),'title');
							echo atomcore_shortcode_input(__('Date','atom'),'date');
							echo atomcore_shortcode_input(__('Link','atom'),'link');
							echo atomcore_shortcode_select(__('Status','atom'),'status','', array('none','start','end','features'));
							echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-flag (Options)','atom'));
							echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-125" data-shortcode="features" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('Title','atom'),'title');
					echo atomcore_shortcode_select(__('Layout','atom'),'layout','', array('left', 'center'));
					echo atomcore_shortcode_input(__('Style','atom'),'style',__('Can use circle/rect bg cover','atom'));
					echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-flag','atom'));
					echo atomcore_shortcode_input(__('Link','atom'),'link','','#');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-126" data-shortcode="services" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Border','atom'),'border','', array('yes', 'no'));
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="services_item" class="shortcodes-child">
                    	<h3><?php _e('Services Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_input(__('Link','atom'),'link');
							echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-flag (Options)','atom'));
							echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-127" data-shortcode="totalcount" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Style','atom'),'style','', array('1', '2'));
					echo atomcore_shortcode_input(__('Prefix','atom'),'prefix');
					echo atomcore_shortcode_input(__('Suffix','atom'),'suffix');
					echo atomcore_shortcode_input(__('Start','atom'),'start','','0');
					echo atomcore_shortcode_input(__('Step','atom'),'step','','1');
					echo atomcore_shortcode_input(__('End','atom'),'end','','10');
					echo atomcore_shortcode_select(__('Align','atom'),'align','', array('left', 'center', 'row'));
					echo atomcore_shortcode_color(__('Circle color','atom'),'color','','#cc3333');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content','',__('Input content.','atom')); 
					?>
                </div>
                
                <div id="shortcodes-element-128" data-shortcode="pagenav" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Position','atom'),'position','', array('left', 'right','bottom'),'right');
					echo atomcore_shortcode_select(__('Style','atom'),'style','', array('black', 'white'),'white');
					?>
                    <div data-shortcode="pagenav_item" class="shortcodes-child">
                    	<h3><?php _e('Page Nav Item','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_input(__('Title','atom'),'title');
							echo atomcore_shortcode_input(__('Link','atom'),'link');
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-129" data-shortcode="team" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Style','atom'),'style','', array('default', '1', '2'));
					echo atomcore_shortcode_input(__('Name','atom'),'name');
					echo atomcore_shortcode_input(__('Job','atom'),'job');
					echo atomcore_shortcode_input(__('Link','atom'),'src');
					echo atomcore_shortcode_select(__('Style 1 show job','atom'),'showjob','', array('yes', 'no'));
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="team_social" class="shortcodes-child">
                    	<h3><?php _e('Socials','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_input(__('Icon name','atom'),'icon',__('FontAwesome icon name e.g. fa-twitter','atom'));
							echo atomcore_shortcode_input(__('Link','atom'),'link');
							echo atomcore_shortcode_select(__('Link target','atom'),'target','', array('_self', '_blank'),'_blank');
							echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
							?>
						</div>
                    </div>
                    <div data-shortcode="team_content" class="shortcodes-child">
                    	<h3><?php _e('Person Details','atom'); ?></h3>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
							?>
						</div>
                    </div>
                </div>
                
                <div id="shortcodes-element-130" data-shortcode="clients" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                    <div data-shortcode="client" class="shortcodes-child">
                    	<h3><?php _e('Client','atom'); ?></h3>
                        <button class="btn btn-warning shortcodes-child-add"><i class="fa fa-plus"></i></button>
                        <div class="shortcodes-child-element">
                        	<?php
							echo atomcore_shortcode_input(__('Image url','atom'),'img');
							echo atomcore_shortcode_input(__('Link','atom'),'link');
							echo atomcore_shortcode_input(__('Alt','atom'),'alt');
							?>
						</div>
                    </div>
                </div>
                
                
                <div id="shortcodes-element-201" data-shortcode="youtube" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('Youtube ID','atom'),'id',__("Enter video ID (eg.6htyfxPkYDU).",'atom'));
					echo atomcore_shortcode_input(__('Width','atom'),'width','','100%');
					echo atomcore_shortcode_input(__('Height','atom'),'height','','360');
					?>
                </div>
                
                <div id="shortcodes-element-202" data-shortcode="vimeo" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('Vimeo ID','atom'),'id',__("Enter video ID (eg.54578415).",'atom'));
					echo atomcore_shortcode_input(__('Width','atom'),'width','','100%');
					echo atomcore_shortcode_input(__('Height','atom'),'height','','360');
					?>
                </div>
                
                <div id="shortcodes-element-203" data-shortcode="soundcloud" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('Soundcloud URL','atom'),'url',__("Enter soundcloud url like http://api.soundcloud.com/tracks/38987054.",'atom'));
					echo atomcore_shortcode_input(__('Width','atom'),'width','','100%');
					echo atomcore_shortcode_input(__('Height','atom'),'height','','166');
					?>
                </div>
                
                <div id="shortcodes-element-301" data-shortcode="blog_list" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_number(__('Number','atom'),'number','','4');
					echo atomcore_shortcode_select(__('Columns','atom'),'columns','',array('1','2','3','4'),'4');
					echo atomcore_shortcode_select(__('Style','atom'),'style','',array('1','2','3','4','5'),'1');
					echo atomcore_shortcode_select(__('Type','atom'),'type','',array('recent','featured','popular','related'),'recent');
					echo atomcore_shortcode_input(__('Orderby','atom'),'orderby',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Cats','atom'),'cat__in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Tags','atom'),'tag__in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Post in','atom'),'post__in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Post not in','atom'),'post__not_in',__('(Options)','atom'));
					echo atomcore_shortcode_select(__('Don\' crop','atom'),'nocrop','', array('yes', 'no'),'no');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                </div>
                
                 <div id="shortcodes-element-302" data-shortcode="blog_ajax_list" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_number(__('Number','atom'),'number','','4');
					echo atomcore_shortcode_select(__('Columns','atom'),'columns','',array('1','2','3','4'),'4');
					echo atomcore_shortcode_select(__('Style','atom'),'style','',array('1','2'),'1');
					echo atomcore_shortcode_input(__('Cats','atom'),'cat__in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Load page link','atom'),'nextpage_link',__('!Important, need page options like here.','atom'));
					echo atomcore_shortcode_select(__('Auto load','atom'),'autoload','', array('yes', 'no'),'no');
					echo atomcore_shortcode_select(__('Don\' crop','atom'),'nocrop','', array('yes', 'no'),'no');
					?>
                </div>
                
                <div id="shortcodes-element-303" data-shortcode="blog_timeline_list" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_number(__('Number','atom'),'number','','4');
					echo atomcore_shortcode_select(__('Style','atom'),'columns','',array('1','2'),'1');
					echo atomcore_shortcode_input(__('Cats','atom'),'cat__in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Load page link','atom'),'nextpage_link',__('!Important, need page options like here.','atom'));
					echo atomcore_shortcode_select(__('Auto load','atom'),'autoload','', array('yes', 'no'),'no');
					echo atomcore_shortcode_select(__('Don\' crop','atom'),'nocrop','', array('yes', 'no'),'no');
					?>
                </div>
                
                <div id="shortcodes-element-304" data-shortcode="portfolio_list" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_number(__('Number','atom'),'number','','4');
					echo atomcore_shortcode_select(__('Columns','atom'),'columns','',array('1','2','3','4'),'4');
					echo atomcore_shortcode_select(__('Style','atom'),'style','',array('1','2','3','4','5','6','7','8'),'1');
					echo atomcore_shortcode_select(__('Type','atom'),'type','',array('recent','featured','related'),'recent');
					echo atomcore_shortcode_input(__('Orderby','atom'),'orderby',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Cat slugs','atom'),'cat_slug_in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Tag slugs','atom'),'tag_slug_in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Post in','atom'),'post__in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Post not in','atom'),'post__not_in',__('(Options)','atom'));
					echo atomcore_shortcode_select(__('Don\' crop','atom'),'nocrop','', array('yes', 'no'),'no');
					echo atomcore_shortcode_select(__('Effect','atom'),'effect','', $effect_list, 'none');
					?>
                </div>
				
                <div id="shortcodes-element-305" data-shortcode="portfolio_ajax_list" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_number(__('Number','atom'),'number','','4');
					echo atomcore_shortcode_select(__('Columns','atom'),'columns','',array('2','3','4'),'4');
					echo atomcore_shortcode_select(__('Style','atom'),'style','',array('1','2','3','4','5','6','7','8'),'1');
					echo atomcore_shortcode_input(__('Cat slugs','atom'),'cat_slug_in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Tag slugs','atom'),'tag_slug_in',__('(Options)','atom'));
					echo atomcore_shortcode_input(__('Load page link','atom'),'nextpage_link',__('!Important, need page options like here.','atom'));
					echo atomcore_shortcode_select(__('Auto load','atom'),'autoload','', array('yes', 'no'),'no');
					echo atomcore_shortcode_select(__('Don\' crop','atom'),'nocrop','', array('yes', 'no'),'no');
					?>
                </div>
                
                <div id="shortcodes-element-401" data-shortcode="wide" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('ID','atom'),'id');
					echo atomcore_shortcode_select(__('Class name','atom'),'class');
					echo atomcore_shortcode_select(__('Style','atom'),'style');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-402" data-shortcode="one" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('ID','atom'),'id');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-403" data-shortcode="row" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_input(__('ID','atom'),'id');
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-404" data-shortcode="inner_row" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-405" data-shortcode="one_half" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-406" data-shortcode="one_third" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-407" data-shortcode="two_third" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-408" data-shortcode="one_fourth" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-409" data-shortcode="two_fourth" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>
                
                <div id="shortcodes-element-410" data-shortcode="three_fourth" class="shortcodes-element">
                	<?php
					echo atomcore_shortcode_textarea(__('Content','atom'),'content'); 
					?>
                </div>

            </div>
			
            <div>
                <div style="float: left">
                    <button class="btn btn-info" onClick="tinyMCEPopup.close();"><?php _e("Cancel", 'atom'); ?></button>
                </div>

                <div style="float: right">
                    <button type="submit" class="btn btn-success" onClick="insertatomcoreshortcode();"><?php _e("Insert", 'atom'); ?></button>
                </div>
            </div>
        </section>
    </body>
</html>