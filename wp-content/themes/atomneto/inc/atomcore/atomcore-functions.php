<?php
/**
* ATOMLABS MENU
*/

function atomlabs_panel(){
  add_menu_page( 'ATOMLABS', 'ATOMLABS',  'manage_options',  'atom-license', 'edd_sample_license_page', 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=20', '4.23' );
  add_submenu_page( 'atom-license', 'Theme Activation', 'Theme Activation', 'manage_options', 'atom-license', 'edd_sample_license_page');
  add_submenu_page( 'atom-license', 'Helpdesk', 'Helpdesk', 'manage_options', 'atom-support', 'atomcore_page_support');
  //add_submenu_page( 'atom-license', 'F.A.Q', 'F.A.Q', 'manage_options', 'atom-knowledgebase', 'atomcore_page_supportbase');
  add_submenu_page( 'atom-license', 'Other Product', 'Other Product', 'manage_options', 'atom-other', 'atomcore_page_supportother');
  //add_submenu_page( 'atom-license', 'About', 'About', 'manage_options', 'atom-about', 'atomcore_page_supportabout');

}
add_action('admin_menu', 'atomlabs_panel');

if ( !function_exists( 'atomcore_page_support' ) ) :
function atomcore_page_support() {?>

	<div id="atomcore-wrap" class="wrap">

   <iframe height="800" width="100%" src="http://atomlabs.freshdesk.com/support/solutions" frameborder="0"></iframe>
	<?php do_action( 'atomcore_after' ); ?>
	</div> <!-- / .wrap -->
	
<?php
}
endif;
if ( !function_exists( 'atomcore_page_supportbase' ) ) :
function atomcore_page_supportbase() {?>

	<div id="atomcore-wrap" class="wrap">

   <iframe height="800" width="100%" src="http://atomlabs.freshdesk.com/support/solutions/folders/1000036999" frameborder="0"></iframe>
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



add_action( 'admin_notices', 'atomlabs_admin_extend' );

function atomlabs_admin_extend(){
	global $current_user;
        $user_id = $current_user->ID;
		
     if ( ( ! is_plugin_active( 'atomstore-extend/atomstore-extend.php' ) ) && ( current_user_can( 'manage_options' ) )  && ( ! get_user_meta($user_id, 'atomlabs_admin_extend_ignore') ) ){
          echo '<div id="message" class="updated">
	<h3 style="margin-bottom:5px">Hi <strong>'.$user_name.'</strong>, <strong>Thanks for using ATOMSTORE</strong>.</h3>Just want to remind you, your site doesn\'t use <strong style="color:red">ATOMSTORE Extension</strong>, We recommend you to see other AWESOME benefit inside <strong style="color:red">ATOMSTORE</strong>. :)</p>
	<div style="float:right"><a href="?atomlabs_admin_extend_ignore=0">Hide</a></div>
	<p class="submit"><a href="http://atomlabs.me/atomstore-extension" class="button-primary" target="_blank">YES! I want more benefit now!</a></p>
</div>';
	}
}
add_action('admin_init', 'atomlabs_admin_extend_ignore');

function atomlabs_admin_extend_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['atomlabs_admin_extend_ignore']) && '0' == $_GET['atomlabs_admin_extend_ignore'] ) {
             add_user_meta($user_id, 'atomlabs_admin_extend_ignore', 'true', true);
	}
}

add_action( 'admin_notices', 'atomlabs_admin_extendpop' );
function atomlabs_admin_extendpop(){
	global $current_user;
        $user_id = $current_user->ID;
		
		
     if ( ( is_plugin_active( 'atomstore-extend/atomstore-extend.php' ) ) && ( ! is_plugin_active( 'atomstore-ultipop/atomstore-ultipop.php' ) ) && ( current_user_can( 'manage_options' ) )  && ( ! get_user_meta($user_id, 'atomlabs_admin_extendpop_ignore') ) ){
	 
	 global $current_user;
        $user_name = $current_user->display_name ;
		
          echo '<div id="message" class="updated">
	<h3 style="margin-bottom:5px">Hi <strong>'.$user_name.'</strong>, We know how to increase your visitor <strong style="color:red">ATTENTION</strong> by 700%.</h3>
	<p>Use <strong style="color:red">ATOMSTORE Ultimate Popups</strong>, professionally designed popups to offering a discount/coupon for leaving customers or say welcome and engage new visitors. :)</p>
	<div style="float:right"><a href="?atomlabs_admin_extendpop_ignore=0">Hide</a></div>
	<p class="submit"><a href="http://atomlabs.me/atomstore-extensionpop" class="button-primary" target="_blank">View other POPUPS benefit here</a></p>
</div>';
	}
}
add_action('admin_init', 'atomlabs_admin_extendpop_ignore');


function atomlabs_admin_extendpop_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['atomlabs_admin_extendpop_ignore']) && '0' == $_GET['atomlabs_admin_extendpop_ignore'] ) {
             add_user_meta($user_id, 'atomlabs_admin_extendpop_ignore', 'true', true);
	}
}

/**
 * IMPORT EXPORT THEME OPTIONS
 */
add_action( 'init', 'register_options_pages' );

/**
 * Registers all the required admin pages.
 */
function register_options_pages() {

  // Only execute in admin & if OT is installed
  if ( is_admin() && function_exists( 'ot_register_settings' ) ) {
    // Register the pages
    ot_register_settings( 
      array(
        array( 
          'id'              => 'import_export',
          'pages'           => array(
            array(
              'id'              => 'import_export',
              'page_title'      => 'ATOMLABS Options Import/Export',
              'menu_title'      => 'Import export',
              'capability'      => 'edit_theme_options',
              'parent_slug'     => 'atom-license',
              'menu_slug'       => 'atomcore-import-export',
              'icon_url'        => 'http://i1.wp.com/images.fachrul.com/di/OHW7/favicon.png?h=21',
			  'position'        => 1,
              'updated_message' => 'Options updated.',
              'reset_message'   => 'Options reset.',
              'button_text'     => 'Save Changes',
              'show_buttons'    => false,
              'screen_icon'     => null,
              'contextual_help' => null,
              'sections'        => array(
                array(
                  'id'          => 'atomcore_import_export',
                  'title'       => __( 'Import/Export', 'theme-text-domain' )
                )
              ),
              'settings'        => array(
                array(
                    'id'          => 'import_data_text',
                    'label'       => 'Import Theme Options',
                    'desc'        => __( 'Theme Options', 'theme-text-domain' ),
                    'std'         => '',
                    'type'        => 'import-data',
                    'section'     => 'atomcore_import_export',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'class'       => ''
                  ),
                  array(
                    'id'          => 'export_data_text',
                    'label'       => 'Export Theme Options',
                    'desc'        => __( 'Theme Options', 'theme-text-domain' ),
                    'std'         => '',
                    'type'        => 'export-data',
                    'section'     => 'atomcore_import_export',
                    'rows'        => '',
                    'post_type'   => '',
                    'taxonomy'    => '',
                    'class'       => ''
                  )
              )
            )
          )
        )
      )
    );
  }
}


/**
 * Export Data option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_export_data' ) ) {
  
  function ot_type_export_data() {
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-textarea simple has-desc">';
      
      /* description */
      echo '<div class="description">';
        
        echo '<p>' . __( 'Export your Theme Options data by highlighting this text and doing a copy/paste into a blank .txt file. Then save the file for importing into another install of WordPress later. Alternatively, you could just paste it into the <code>Import/export->Import</code> <strong>Theme Options</strong> textarea on another web site.', 'option-tree' ) . '</p>';
        
      echo '</div>';
      
      /* get theme options data */
      $data = get_option( ot_options_id() );
      $data = ! empty( $data ) ? ot_encode( serialize( $data ) ) : '';
        
      echo '<div class="format-setting-inner">';
        echo '<textarea rows="10" cols="40" name="export_data" id="export_data" class="textarea">' . $data . '</textarea>';
      echo '</div>';
      
    echo '</div>';
    
  }
  
}

/**
 * Import Data option type.
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_import_data' ) ) {
  
  function ot_type_import_data() {
    
    echo '<form method="post" id="import-data-form">';
      
      /* form nonce */
      wp_nonce_field( 'import_data_form', 'import_data_nonce' );
        
      /* format setting outer wrapper */
      echo '<div class="format-setting type-textarea has-desc">';
        
        /* description */
        echo '<div class="description">';
          
          if ( OT_SHOW_SETTINGS_IMPORT ) echo '<p>' . __( 'Only after you\'ve imported the Settings should you try and update your Theme Options.', 'option-tree' ) . '</p>';
          
          echo '<p>' . __( 'To import your Theme Options copy and paste what appears to be a random string of alpha numeric characters into this textarea and press the "Import Theme Options" button.', 'option-tree' ) . '</p>';
          
          /* button */
          echo '<button class="option-tree-ui-button button button-primary right hug-right">' . __( 'Import Theme Options', 'option-tree' ) . '</button>';
          
        echo '</div>';
        
        /* textarea */
        echo '<div class="format-setting-inner">';
          
          echo '<textarea rows="10" cols="40" name="import_data" id="import_data" class="textarea"></textarea>';

        echo '</div>';
        
      echo '</div>';
    
    echo '</form>';
    
  }
  
}

if( !function_exists('get_attachment_id_from_src') ){

function get_attachment_id_from_src ($image_src) {
  global $wpdb;
  $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
  $id = $wpdb->get_var($query);
  return $id;
}
}