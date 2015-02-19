<?php

/**
 * Add in the Vantage theme.
 *
 * @param $themes
 * @param $current
 * @return string
 */
function atom_metaslider_themes($themes, $current){
	$themes .= "<option value='atom' class='option flex' ".selected('atom', $current, false).">".__('Vantage (Flex)', 'atom')."</option>";
	return $themes;
}
add_filter('metaslider_get_available_themes', 'atom_metaslider_themes', 5, 2);

/**
 * Change the HTML for the home page slider.
 *
 * @param $html
 * @param $slide
 * @param $settings
 *
 * @return string The new HTML
 */
function atom_metaslider_filter_flex_slide($html, $slide, $settings){
	if( is_admin() && !empty($GLOBALS['atom_is_main_slider']) ) return $html;

	if(!empty($slide['caption']) && function_exists('filter_var') && filter_var($slide['caption'], FILTER_VALIDATE_URL) !== false) {

		$settings['height'] = round( $settings['height'] / 1080 * $settings['width'] );
		$settings['width'] = 1080;

		$html = sprintf("<img src='%s' class='msDefaultImage' width='%d' height='%d' />", $slide['thumb'], intval($settings['width']), intval($settings['height']));

		if (strlen($slide['url'])) {
			$html = '<a href="' . esc_url( $slide['url'] ) . '" target="' . esc_attr( $slide['target'] ) . '">' . $html . '</a>';
		}

		$caption = '<div class="content">';
		if (strlen($slide['url'])) $caption .= '<a href="' . $slide['url'] . '" target="' . $slide['target'] . '">';
		$caption .= sprintf('<img src="%s" width="%d" height="%d" />', esc_url($slide['caption']), intval($settings['width']), intval($settings['height']));
		if (strlen($slide['url'])) $caption .= '</a>';
		$caption .= '</div>';

		$html = $caption . $html;

		$thumb = isset($slide['data-thumb']) && strlen($slide['data-thumb']) ? " data-thumb=\"{$slide['data-thumb']}\"" : "";

		$html = '<li style="display: none;"' . $thumb . ' class="atom-slide-with-image">' . $html . '</li>';
	}

	return $html;
}
add_filter('metaslider_image_flex_slider_markup', 'atom_metaslider_filter_flex_slide', 10, 3);

/**
 * Filter metaslider settings when Vantage setting is selected.
 *
 * @param $settings
 */
function atom_metaslider_ensure_height($settings){
	if(!empty($settings['theme']) && $settings['theme'] == 'atom') {
		$settings['width'] = atom_get_site_width();
	}

	return $settings;
}
add_filter('sanitize_post_meta_ml-slider_settings', 'atom_metaslider_ensure_height');

function atom_metaslider_page_setting_metabox(){
	add_meta_box('atom-metaslider-page-slider', __('Page Meta Slider', 'atom'), 'atom_metaslider_page_setting_metabox_render', 'page', 'side');
}
//add_action('add_meta_boxes', 'atom_metaslider_page_setting_metabox');

function atom_metaslider_page_setting_metabox_render($post){
	$metaslider = get_post_meta($post->ID, 'atom_metaslider_slider', true);
	$options = siteorigin_metaslider_get_options(false);

	?>
	<label><?php _e('Display Page Metaslider', 'atom') ?></label>
	<select name="atom_page_metaslider">
		<?php foreach($options as $id => $name) : ?>
			<option value="<?php echo esc_attr($id) ?>" <?php selected($metaslider, $id) ?>><?php echo esc_html($name) ?></option>
		<?php endforeach; ?>
	</select>
	<?php
	wp_nonce_field('save', '_atom_metaslider_nonce');
}

function atom_metaslider_page_setting_save($post_id){
	if( empty($_POST['_atom_metaslider_nonce']) || !wp_verify_nonce($_POST['_atom_metaslider_nonce'], 'save') ) return;
	if( !current_user_can('edit_post', $post_id) ) return;
	if( defined('DOING_AJAX') ) return;

	update_post_meta($post_id, 'atom_metaslider_slider', $_POST['atom_page_metaslider']);
}
add_action('save_post', 'atom_metaslider_page_setting_save');