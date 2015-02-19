<?php
get_template_part(THEME_INCLUDES."fungsi");
get_template_part(THEME_INCLUDES."plugins/init-plugin");
get_template_part(THEME_INCLUDES."init");
	
get_template_part(THEME_INCLUDES."fungsi/installation");
	
define('HOME_MEMBER', get_bloginfo('url') );
define('MEMBER_AUTH_KEY',         'y<jDfrwAE-Kjje3Nu?k{z9(cD9PO$(:brQ?p4aQECB/2OBly1D_fP{c[A2<jpf_P');
define('MEMBER_SECURE_AUTH_KEY',  '%8kuzMeMI%q:CfWaBp%W1~X7D&|g|:tb47*I.g[=hZNnd|0,4+w]wy6dq(LB_v-d');
define('MEMBER_AUTH_SALT',        '4C=0#GqJMp0(:MpLdM^NlhdeQ5^YX{++TN-?D-3dnr`,owNz0M+-J:WTqxr*H[Yu');
define('MEMBER_SECURE_AUTH_SALT', 'yYPj[G`*Q~.|C>RKJfb^DDpow~%2x.eJc{3O&fRfKHYX+.eL}T80w7-IrwZ.Xrmv');



function edd_sample_license_menu() {
add_submenu_page( 'atom-support', 'Theme Activation', 'Theme Activation', 'manage_options', 'atom-license', 'edd_sample_license_page');
}
add_action('admin_menu', 'edd_sample_license_menu');
 
function edd_sample_license_page() {

	$license 	= get_option( 'atom_license_email' );
	$licensekey 	= get_option( 'atom_license_key' );
	$licenseseckretkey 	= get_option( 'atom_license_secretkey' );
	
	

    $secretKey = MEMBER_AUTH_KEY;
    $pop = $license.'|'.MEMBER_SECURE_AUTH_KEY.'|'.urldecode(HOME_MEMBER).'|'.MEMBER_AUTH_SALT.'|'.MEMBER_SECURE_AUTH_SALT;
    $pop = $pop . $secretKey;
    $calcedVerify = sha1(mb_convert_encoding($pop, "UTF-8"));
    $calcedVerify = strtoupper(substr($calcedVerify,0,30));
	

	
	?>
	<div class="wrap">
		<h2><?php _e('Activate Theme'); ?></h2>
		<?php if($_GET['notice']):?><h1>Please Activated Theme First!</h1><?php endif;?>
		<form method="post" action="options.php">
		
			<?php settings_fields('edd_sample_license'); ?>
			
			<table class="form-table">
				<tbody>
					<tr valign="top">	
						<th scope="row" valign="top">
							<?php _e('Your Registered Email'); ?>
						</th>
						<td>
							<input <?php if( $license != '') {echo 'readonly="readonly" ';} ?>id="atom_license_email" name="atom_license_email" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
							<label class="description" for="atom_license_email"><?php _e('Enter your Registered Email'); ?></label>
						</td>
					</tr>
					
					<?php if( $license != '') { ?>
					<tr valign="top">	
						<th scope="row" valign="top">
							<?php _e('Secret Key'); ?>
						</th>
						<td>
							<input readonly="readonly" id="atom_license_key" name="atom_license_key" type="text" class="regular-text" value="<?php esc_attr_e( $calcedVerify ); ?>" />
							<label class="description" for="atom_license_key"><?php _e('Dont Change this'); ?></label>
						</td>
					</tr>
					<tr valign="top">	
						<th scope="row" valign="top">
							<?php _e('Activation Code'); ?>
						</th>
						<td>
							<input autocomplete="off" id="atom_license_secretkey" name="atom_license_secretkey" type="password" class="regular-text" value="<?php esc_attr_e( $licenseseckretkey ); ?>" />
							<label class="description" for="atom_license_secretkey"><?php _e('Now Get This Activation Code in <strong><a href="http://key.atomlabs.me" target="_blank">key.atomlabs.me</a></strong>'); ?>
							
							
							
							</label>
							
						</td>
					</tr>
					<?php } ?>
					<tr valign="top">	
						<th scope="row" valign="top">
							
						</th>
						<td>
					<?php submit_button(); ?>
		
		</form><br><br>
							<?php if( $license != '') { ?>
							<form action="http://key.atomlabs.me/" method="post" target='_blank'>
							<input name="themes" type="hidden" value="<?php $theme_name = get_current_theme(); echo $theme_name; ?>" />
							<input name="email" type="hidden" value="<?php esc_attr_e( $license ); ?>" />
							<input name="secretkey" type="hidden" value="<?php esc_attr_e( $calcedVerify ); ?>" />
							<input type="submit" name="submit" id="submit" class="button button-primary" value="->> Get ACTIVATION Code Here <<-">
							</form>
							<?php }?>
						</td>
					</tr>
				</tbody>
			</table>	
			
		
						<?php if($_POST['clear_data']=='true'){
							global $wpdb;
							$wpdb->query( "DELETE FROM ".$wpdb->prefix."options WHERE option_name like '%atom_license_%'; ");
							?>
							<META HTTP-EQUIV=Refresh CONTENT="0">
						<?php }?>
						<form method="post" action="">
						<input type="hidden" name="clear_data" value="true"/>						
						<input type="submit" value="Reset Data"/>
						</form>	
	<?php
}
 
function edd_sample_register_option() {
	// creates our settings in the options table
	register_setting('edd_sample_license', 'atom_license_email', 'edd_sanitize_license' );
	register_setting('edd_sample_license', 'atom_license_secretkey', 'edd_sanitize_license' );
}
add_action('admin_init', 'edd_sample_register_option');
 
function edd_sanitize_license( $new ) {
	$old = get_option( 'atom_license_email' );
	if( $old && $old != $new ) {
		delete_option( 'atom_license_secretkey' ); // new license has been entered, so must reactivate
	}
	return $new;
}


if(is_admin()){
	$license 	= get_option( 'atom_license_email' );	
	$licenseseckretkey 	= get_option( 'atom_license_secretkey' );
	
    $secretKey = MEMBER_AUTH_KEY;
    $pop = $license.'|'.MEMBER_SECURE_AUTH_KEY.'|'.urldecode(HOME_MEMBER).'|'.MEMBER_AUTH_SALT.'|'.MEMBER_SECURE_AUTH_SALT;
    $pop = $pop . $secretKey;
    $calcedVerify = sha1(mb_convert_encoding($pop, "UTF-8"));
    $calcedVerify = strtoupper(substr($calcedVerify,0,30));
	
	
		$secretkeyne = $calcedVerify;
		$sendkey = $secretkeyne[4].$secretkeyne[7].$secretkeyne[14].$secretkeyne[19].$secretkeyne[20].$secretkeyne[28].$secretkeyne[30];
		
		define("THEME_OPTION",get_template_directory() . '/admin/option/option.php');
		
		if($licenseseckretkey == $sendkey){
		// options	
		
		global $pagenow;
		 if ( is_admin() && isset( $_GET['settings-updated'] ) && $pagenow == 'admin.php' )
		 {
			  wp_redirect( admin_url( 'admin.php?page=vpt_option' ) );
			  exit;
		 }
		 
		}else{
			global $pagenow;
			 if ( is_admin() && $_GET['page'] == 'vpt_option' && $pagenow == 'admin.php' )
			 {
				  wp_redirect( admin_url( 'admin.php?page=atom-license&notice=Please Active License' ) );
				  exit;
			 }
		}
};

/*
// TEMP: Enable update check on every request. Normally you don't need this! This is for testing only!
set_site_transient('update_themes', null);
*/

add_filter('pre_set_site_transient_update_themes', 'check_for_update');

function check_for_update($checked_data) {
	global $wp_version;
	
	if (empty($checked_data->checked))
		return $checked_data;
	
	$api_url = 'http://box.atomlabs.me/api/';
	
	$theme_base = basename(dirname(dirname(dirname(__FILE__))));
	$my_theme = wp_get_theme();
	
	$request = array(
		'slug' => $theme_base,
		'version' => $my_theme->get( 'Version' )
	);

	// Start checking for an update
	$send_for_check = array(
		'body' => array(
			'action' => 'theme_update', 
			'request' => serialize($request),
			'api-key' => md5(get_bloginfo('url'))
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
	);

	$raw_response = wp_remote_post($api_url, $send_for_check);
	
	if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
		$response = unserialize($raw_response['body']);
		
	// Feed the update data into WP updater
	if (!empty($response)) 
		$checked_data->response[$theme_base] = $response;
	
	return $checked_data;
}


if (is_admin())
	$current = get_transient('update_themes');

?>