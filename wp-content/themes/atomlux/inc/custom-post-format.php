<?php

/**
**	SITEORIGIN MASTER FUNCTION
**/

function atomlabs_show_featured(){
if(get_post_format()=='gallery'):
	atomlabs_display_galery();							
	elseif(get_post_format()=='audio'):
	atomlabs_get_audio_src();								
	elseif(get_post_format()=='video'):
	atomlabs_get_video_src();
	elseif( has_post_thumbnail() && atomlabs_setting('blog_featured_image') ): ?>
	<div class="entry-thumbnail"><?php the_post_thumbnail( is_active_sidebar('sidebar-1') ? 'post-thumbnail' : 'atom-thumbnail-no-sidebar' ) ?></div>
<?php 
endif;
}
/* helper:  does regex */
function atomlabs_get_match($regex,$content)
{
	preg_match($regex,$content,$matches);
	return $matches[1];
}
/*******************************************
# Get shortcode function for conditional tag
*******************************************/
function atomlabs_has_shortcode( $shortcode = NULL ) {
    $post_to_check = get_post( get_the_ID() );
    // false because we have to search through the post content first
    $found = false;
    // if no short code was provided, return false
    if ( ! $shortcode ) {
        return $found;
    }
    // check the post content for the short code
    if ( stripos( $post_to_check->post_content, '[' . $shortcode) !== FALSE ) {
        // we have found the short code
        $found = TRUE;
    }
    // return our final results
    return $found;
}

/* Get Link */
function get_first_link_href() {
    $content = get_the_content();
    $image_regex = "/<a [^>]*href=[\"']([^\"^']*)[\"']/";
    preg_match($image_regex, $content, $match);
    if (empty($match))
        return "";
    return $match[1];
}
/* Get Blockquote */
function get_first_blockquote() {
    $content = get_the_content();
    $image_regex = "/\<blockquote\>([^]]+)\<\/blockquote\>/";
    preg_match($image_regex, $content, $match);
    if (empty($match))
        return "";
    return $match[1];
}
/* Get Youtube */
function get_first_youtube_src() {
    $content = atomlabs_metabox('atom_post_format.valuene');
	$image_regex =  atomlabs_get_match('/url="(.*)"/isU', $content);
    $image_regex =  explode('?v=',$image_regex);
    if (empty($image_regex[1]))
        return "";
    return $image_regex[1];
}
/* Get Vimeo */
function get_first_vimeo_src() {
    $content = atomlabs_metabox('atom_post_format.valuene');
	$image_regex =  atomlabs_get_match('/url="(.*)"/isU', $content);
    $image_regex =  explode('/',$image_regex);
    if (empty($image_regex[3]))
        return "";
    return $image_regex[3];
}
/* Get Soundcloud */
function get_first_soundcloud_src() {
    $content = atomlabs_metabox('atom_post_format.valuene');
    $image_regex = "/[soundcloud [^]]*url=[\"']([^\"^']*)[\"']/";
    preg_match($image_regex, $content, $match);
    if (empty($match))
        return "";
    return $match[1];
}
/* Get iframe */
function get_first_iframe_src() {
    $content = atomlabs_metabox('atom_post_format.valuene');
    $image_regex = '<iframe.+src=[\'"]([^\'"]+)[\'"].*>';
    preg_match($image_regex, $content, $match);
    if (empty($match))
        return "";
    return $match[1];
}
/* Get Image */
function get_first_image_src() {
    $content = get_the_content();
    $image_regex = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/';
    preg_match($image_regex, $content, $match);
    if (empty($match))
        return "";
    return $match[1];
}

/* Display Gallery */
function atomlabs_display_galery() {
global $post, $posts;
if ( $post->post_status == 'publish' ) {
		$attachments = get_posts( array(
			'post_type' => 'attachment',
			'posts_per_page' => 3,
			'post_parent' => $post->ID
		) );
		if ( $attachments ) {
		echo '<div id="main-slider" data-stretch="true"><div class="flexslider" id="metaslider-demo">
	<ul class="slides">';
			$firstcount = 0; 
			$title = get_the_title();
			$exo = get_the_excerpt();
			$permalink = get_permalink();
			foreach ( $attachments as $attachment ) {
			$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
			$image = wp_get_attachment_image_src( $attachment->ID , 'atom-slide');
			
			echo '
			<li>			
				<img src="' . $image[0] . '" class="msDefaultImage" width="' . $image[1] . '" height="' . $image[2] . '" alt="' . $title . '" />
			</li>
			';
			
		}
		echo '</ul></div></div>';
	}
}
}
/* Display video */
function atomlabs_get_video_src() {
$height = '400';
	if (get_first_iframe_src() && atomlabs_metabox('atom_post_format.valuene') != '' ) {
		echo '<iframe width="100%" height="'.$height.'" src="' . get_first_iframe_src() . '" frameborder="0" allowfullscreen></iframe>';
	}
}

/* Display audio */

function atomlabs_get_audio_src() {
	if(atomlabs_metabox('atom_post_format.source') == 'soundcloud' && atomlabs_metabox('atom_post_format.valuene') != '') {
		echo '<iframe width="100%" height="166" src="http://w.soundcloud.com/player/?url=' . get_first_soundcloud_src() . '&auto_play=false&show_artwork=true&color=ff7700" frameborder="no" scrolling="no"></iframe>';
	}
	elseif (get_first_iframe_src() && atomlabs_metabox('atom_post_format.valuene') != '') {
		echo '<iframe width="100%" height="166" src="' . get_first_iframe_src() . '" frameborder="0" allowfullscreen></iframe>';
	}
}