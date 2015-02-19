<?php
function atom_panel(){
  add_menu_page( 'ATOMLABS', 'ATOMLABS',  'manage_options',  'atom-support', 'atomcore_page_support', 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=16', 51 );
  add_submenu_page( 'atom-support', 'Helpdesk', 'Helpdesk', 'manage_options', 'atom-support', 'atomcore_page_support');
  add_submenu_page( 'atom-support', 'F.A.Q', 'F.A.Q', 'manage_options', 'atom-knowledgebase', 'atomcore_page_supportbase');
  add_submenu_page( 'atom-support', 'Other Product', 'Other Product', 'manage_options', 'atom-other', 'atomcore_page_supportother');
  add_submenu_page( 'atom-support', 'About', 'About', 'manage_options', 'atom-about', 'atomcore_page_supportabout');
  
  if(function_exists('siteorigin_panels_render')){
  add_submenu_page( 'atom-support', 'Home Builder', 'Home Builder', 'manage_options', 'so_panels_home_page', 'siteorigin_panels_lite_render_admin_home_page');
  }
  if(class_exists('MetaSliderPlugin')){
  add_submenu_page( 'atom-support', 'Slider Builder', 'Slider Builder', 'manage_options', 'metaslider');
  }
}
add_action('admin_menu', 'atom_panel');

if ( !function_exists( 'atomcore_page_support' ) ) :
function atomcore_page_support() {?>

	<div id="atomcore-wrap" class="wrap">

   <iframe height="800" width="100%" src="http://help.atomlabs.me/support/solutions" frameborder="0"></iframe>
	<?php do_action( 'atomcore_after' ); ?>
	</div> <!-- / .wrap -->
	
<?php
}
endif;
if ( !function_exists( 'atomcore_page_supportbase' ) ) :
function atomcore_page_supportbase() {?>

	<div id="atomcore-wrap" class="wrap">

   <iframe height="800" width="100%" src="http://help.atomlabs.me/support/solutions/folders/1000036999" frameborder="0"></iframe>
	<?php do_action( 'atomcore_after' ); ?>
	</div> <!-- / .wrap -->
	
<?php
}
endif;
if ( !function_exists( 'atomcore_page_supportother' ) ) :
function atomcore_page_supportother() { ?>

	<div id="atomcore-wrap" class="wrap">

   <iframe height="800" width="100%" src="http://atomlabs.me/products" frameborder="0"></iframe>
	<?php do_action( 'atomcore_after' ); ?>
	</div> <!-- / .wrap -->
	
<?php
}
endif;
if ( !function_exists( 'atomcore_page_supportabout' ) ) :
function atomcore_page_supportabout() { ?>

	<div id="atomcore-wrap" class="wrap">

   <iframe height="860" width="100%" src="http://atomlabs.me/about-us#Content" scrolling="no" frameborder="0"></iframe>
	<?php do_action( 'atomcore_after' ); ?>
	</div> <!-- / .wrap -->
	
<?php
}
endif;


VP_Security::instance()->whitelist_function('vp_dep_is_keyword');

function vp_dep_is_keyword($value)
{
	if($value === 'keyword')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('vp_dep_is_tags');

function vp_dep_is_tags($value)
{
	if($value === 'tags')
		return true;
	return false;
}


VP_Security::instance()->whitelist_function('vp_font_preview');

function vp_font_preview($face, $style, $weight, $size, $line_height)
{
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="padding: 0 10px 0 10px; font-family: $face; font-style: $style; font-weight: $weight; font-size: {$size}px; line-height: {$line_height}em;">
	Grumpy wizards make toxic brew for the evil Queen and Jack
</p>
EOD;
	return $dom;
}

function atomlabs_get_metaslider()
{
$result[] = array('value' => 'none', 'label' => 'None');
$result[] = array('value' => 'demo', 'label' => 'Demo Slider');

if(class_exists('MetaSliderPlugin')){
		$sliders = get_posts(array(
			'post_type' => 'ml-slider',
			'numberposts' => 200,

		));
    foreach ($sliders as $slider)
    {
		$result[] = array('value' => 'meta:'.$slider->ID, 'label' => __('MetaSlider: ', 'atom').$slider->post_title);
    }	
}
	
if(class_exists('RevSlider')){
global $wpdb;
		$sliders =  $wpdb->get_results(
				"
				SELECT title, alias 
				FROM ".$wpdb->prefix."revslider_sliders
				"
			);
    foreach ($sliders as $slider)
    {
		$result[] = array('value' => 'rev:'.$slider->alias, 'label' => __('RevSlider: ', 'atom').$slider->title);
    }
}
    return $result;
}
VP_Security::instance()->whitelist_function('atomlabs_get_metaslider');


function atomlabs_get_galleryfolder()
{
$result[] = array('value' => 'none', 'label' => 'None');
$result[] = array('value' => 'all', 'label' => 'All');

$terms = get_terms("gallery-folder");

    foreach ($terms as $term)
    {
		$result[] = array('value' => $term->slug , 'label' => $term->name);
    }

    return $result;
}
VP_Security::instance()->whitelist_function('atomlabs_get_galleryfolder');
