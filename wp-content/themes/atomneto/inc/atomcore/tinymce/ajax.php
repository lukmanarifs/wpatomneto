<?php
/**
 *
 * @return string folder content
 */
add_action('wp_ajax_atomcoreshortcodes_tinymce', 'atomcoreshortcodes_ajax_tinymce');
/**
 * Call TinyMCE window content via admin-ajax
 *
 * @since 1.7.0
 * @return html content
 */
function atomcoreshortcodes_ajax_tinymce() {
    if (!current_user_can('edit_pages') && !current_user_can('edit_posts')){
        die(__("You are not allowed to be here",'atom'));
	}

    include_once( dirname(dirname(__FILE__)) . '/tinymce/window.php');
	
	exit;
}
?>