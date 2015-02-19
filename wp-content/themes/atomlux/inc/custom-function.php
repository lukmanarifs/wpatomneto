<?php
function atom_wp_head(){
$fav = atomlabs_setting( 'favupload' );
if(!$fav)$fav='https://i1.wp.com/images.fachrul.com/di/NNTR/ATOMLabs.png?h=40';
	?>
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/photobox.ie.css">
		<link rel="stylesheet" type="text/css" href="http://box.atomlabs.me/compack/wp-content/themes/compack/css/ie-hack.css" >
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo $fav;?>" type="image/x-icon">
	<?php
}
add_action('wp_head', 'atom_wp_head');

function add_fb_script(){
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=344601622298282";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
}
add_action('atom_before_page_wrapper', 'add_fb_script');

/**
 * Display some text in the text area.
 */
function atom_top_text_area(){
	$contactmobilee = atomlabs_setting('contactmobile');
	$contactemaile = atomlabs_setting('contactemail');
?>
<div align="right" id="contacte">

<?php if($contactmobilee !=''):?>
  <span><i class="fa fa-phone"></i>  &nbsp;&nbsp;
  <?php if ( wp_is_mobile() ) :?>
  <a href="tel:<?php echo str_replace(array(' ','(',')','+'),'',$contactmobilee);?>">
  <?php endif;?>
  <?php echo $contactmobilee;?>
  <?php if ( wp_is_mobile() ) :?>
  </a>
  <?php endif;?>
  </span><div class="clear"></div>
<?php endif;?>

<?php if($contactemaile !=''):?>
  <span><i class="fa fa-envelope"></i>  <a href="mailto:<?php echo str_replace(array(' ','(',')','+'),'',$contactemaile);?>"><?php echo $contactemaile;?></a></span>
<?php endif;?>
			</div>
<div class="clear margin-10b"></div>
		<ul class="social-icons" id="top-social">			
					<?php
					$social[0] = atomlabs_setting( 'facebook' );
					$social[1] = atomlabs_setting( 'twitter' );
					$social[2] = atomlabs_setting( 'pinterest' );
					$social[3] = atomlabs_setting( 'youtube' );
					$social[4] = atomlabs_setting( 'google' );
					$social[5] = atomlabs_setting( 'rss' );
					
					$socialname = array('facebook','twitter','pinterest','youtube','google','rss');
					for($isoc=0;$isoc<count($social);$isoc++){
						if($social[$isoc]!=NULL){
						echo '<li class="item '.$socialname[$isoc].'"><a href="'.$social[$isoc].'"><img style="width:;height:45px" class="icon" src="'.THEME_URL.'/images/social/'.$socialname[$isoc].'.png" alt="'.$socialname[$isoc].'"></a></li>';
						}
					}
					?>
					
		</ul>
<?php
}
add_action('atom_support_text', 'atom_top_text_area');

/**
 * COLOR WIDGET
 */
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
/**
 * Show Custom CSS header
 */
function atomlabs_custom_css_display() {
	$theme = basename( get_template_directory() );
	$custom_css = atomlabs_setting( 'csscode' );
	if ( empty( $custom_css ) ) return;

	// We just need to enqueue a dummy style
	echo "<style type='text/css'>\n";
	echo "$custom_css\n
	#owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }";
	echo "</style>\n";
}
add_action( 'wp_head', 'atomlabs_custom_css_display', 15 );

/**
 * Register all the bundled scripts
 */
 function wpb_adding_scripts() {
wp_register_script('modernizer', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js', array('jquery'),'2.7.1', false);
wp_enqueue_script('modernizer');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' ); 

function atom_register_scripts(){	
	//wp_deregister_script('jquery');
	wp_register_script('jquery', ("//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"), false, NULL,true);
	wp_enqueue_script('jquery');	
		
	wp_enqueue_script("bootstrap" , '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js', Array('jquery'), NULL,true);		
	wp_enqueue_script("atom-photobox" , get_template_directory_uri().'/js/jquery.photobox.js', Array('jquery'), NULL,true);
	wp_enqueue_script('atom-main' , get_template_directory_uri() . '/js/jquery.theme-main.min.js', array('jquery', 'flexslider', 'fitvids'), NULL ,true);
	wp_enqueue_script("flexslider" , get_template_directory_uri() . '/js/jquery.flexslider.min.js', Array('jquery'), NULL,true);	
	wp_enqueue_script("fitvids" , get_template_directory_uri() . '/js/jquery.fitvids.min.js', Array('jquery'), NULL,true);	
	wp_enqueue_script("owl-js" , get_template_directory_uri() . '/slider/owl-carousel/owl.carousel.min.js', Array('jquery'), NULL,true);
	wp_enqueue_script("ekko-lightbox" , '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/3.0.3a/ekko-lightbox.min.js', Array('jquery'), NULL,true);		
	
}
add_action( 'wp_enqueue_scripts', 'atom_register_scripts' , 5);

/**
 * Enqueue scripts and styles
 */
function atom_scripts() {
	wp_enqueue_style( 'atom-fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css', array(), NULL );
	wp_enqueue_style( 'atom-bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css', Array(), NULL);
	wp_enqueue_style( 'atom-style', get_stylesheet_uri(), Array(), NULL );
	wp_enqueue_style( 'atom-owl-carousel', get_template_directory_uri().'/slider/owl-carousel/owl.carousel.css', array(), NULL );
	wp_enqueue_style( 'atom-owl-theme', get_template_directory_uri().'/slider/owl-carousel/owl.theme.css', array(), NULL );
	wp_enqueue_style( 'atom-owl-transitions', get_template_directory_uri().'/slider/owl-carousel/owl.transitions.css', array(), NULL );

	wp_enqueue_style( 'ekko-lightbox', '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/3.0.3a/ekko-lightbox.min.css', array(), NULL );
	wp_enqueue_style( 'atom-photobox', get_template_directory_uri().'/js/photobox.css', array(), NULL );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.min.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'atom_scripts' );


/**
 * Enqueue any webfonts we need
 */
function atom_web_fonts(){
	if( !atomlabs_setting('logo_image') ) {
		wp_enqueue_style('atom-google-webfont-roboto', 'http://fonts.googleapis.com/css?family=Roboto:300');		
	}
	wp_enqueue_style('atom-google-webfont-exo2', 'http://fonts.googleapis.com/css?family=Exo+2:400,400italic,700italic,700');
}
add_action( 'wp_enqueue_scripts', 'atom_web_fonts' );

/**
 * Enqueue footer custom js
 */
function atom_custom_js(){
?>
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center" id="myModalLabel"><strong><?php echo atomlabs_setting('lightboxt');?></strong></h4>
      </div>
      <div class="modal-body">
		<?php echo atomlabs_setting('lightboxc');?>
      </div>
     
    </div>
  </div>
</div>
<script>
jQuery.noConflict()(function($){
    $(document).ready(function() {
		$('#myModal').modal({
		  keyboard: true
		});
	});
});  
</script>
<?php
}

function atom_lightbox(){
if ( atomlabs_setting('lightboxmon') == 1 ){ //lightbox on off
	if ( atomlabs_setting('lightboxcookieon') == 1 ){ //lightbox cookie on off
		if ( $_COOKIE["modalsatomlu"] != '1234' ){
		$value = '1234';
		setcookie("modalsatomlu",$value, time() + atomlabs_setting('lightboxcookie') );
		add_action( 'wp_footer', 'atom_custom_js', 999);
		}
	}else{
		add_action( 'wp_footer', 'atom_custom_js', 999);
	}
}
}
add_action('init','atom_lightbox'); 

function atom_custom_js2(){
?>
<?php echo atomlabs_setting('footcode');?>
<script type="text/javascript">
	jQuery.noConflict()(function($){
		 $(document).ready(function() {
			// delegate calls to data-toggle="lightbox"
					$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
						event.preventDefault();
						return $(this).ekkoLightbox({
							always_show_close: true
						});
					});
		});
	});
     
    </script>     
<?php
}
add_action('wp_footer','atom_custom_js2',99); 
	
/**
 * Random Post
 */
function random_template() {
       if (get_query_var('random') == 1) {
               $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
               foreach($posts as $post) {
                       $link = get_permalink($post);
               }
               wp_redirect($link,307);
               exit;
       }
}
add_action('template_redirect','random_template'); 


/**
 * GET Post type
 */
function atom_typepost(){
      if(get_post_format()=='video'):
		echo 'fa-youtube-play';
      elseif(get_post_format()=='audio'):
		echo 'fa-volume-up';
      elseif(get_post_format()=='gallery'):
		echo 'fa-picture-o';
      else:
		echo 'fa-file-text-o';
	endif;
}


/**
 * Custom CSS Panels
 */
function atomlabs_panels_row_styles($styles) {
    $styles['wide-orange'] = __('Wide Orange', 'atom');
    $styles['wide-blue'] = __('Wide Blue', 'atom');
    return $styles;
}
add_filter('siteorigin_panels_row_styles', 'atomlabs_panels_row_styles');

/*
* REMOVE WIDGET
*/
function atom_remove_origin_widget() {
	if(SITEORIGIN_PANELS_BASE_FILE){
	
		unregister_widget('SiteOrigin_Panels_Widgets_Gallery');
		unregister_widget('SiteOrigin_Panels_Widgets_PostContent');
		unregister_widget('SiteOrigin_Panels_Widgets_Image');
		//unregister_widget('SiteOrigin_Panels_Widgets_PostLoop');
		unregister_widget('SiteOrigin_Panels_Widgets_EmbeddedVideo');
		unregister_widget('SiteOrigin_Panels_Widgets_Video');
		
		foreach(glob(plugin_dir_path(SITEORIGIN_PANELS_BASE_FILE).'/widgets/widgets/*/*.php') as $file) {
			
			$p = pathinfo($file);
			$class = $p['filename'];
			$class = str_replace('-', ' ', $class);
			$class = ucwords($class);
			$class = str_replace(' ', '_', $class);

			$class = 'SiteOrigin_Panels_Widget_'.$class;
			if(class_exists($class)) { unregister_widget($class); }
		}
	}
}

add_action( 'widgets_init', 'atom_remove_origin_widget' );
