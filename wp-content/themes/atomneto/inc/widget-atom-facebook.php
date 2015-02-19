<?php
add_action('widgets_init', create_function('', 'return register_widget("agcmaster_fb");'));

class agcmaster_fb extends WP_Widget {
	function agcmaster_fb() {
		 parent::WP_Widget(false, $name = ':ATOM: Widget Fans Page');	
	}

    function widget($args, $instance)
    {
        extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
        $url = $instance['url'];
        $width = $instance['width'];
        $height = $instance['height'];
        $colorscheme = $instance['colorscheme'];
        $show_faces = $instance['show_faces'] == 'true' ? 'true' : 'false';
        $stream = $instance['stream'] == 'true' ? 'true' : 'false';
        $header = $instance['header'] == 'true' ? 'true' : 'false';       
        ?>
		<?php echo $before_widget;?>
		<aside class="rows">
		<div class="col-md-12 margin-10b">
				<h3 class="widget-title"><?php if ( $title ) { echo $title; }else{echo 'FANSBASE';} ?>
				<span class="bottom-triangle" style="border-top-color:<?php echo $tbc;?>;"></span></h3>
				
				<div class="fb-like-box" data-href="<?php echo $url; ?>" data-height="<?php echo $height; ?>" data-width="<?php echo $width; ?>" data-colorscheme="<?php echo $colorscheme; ?>" data-show-faces="<?php echo $show_faces; ?>" data-header="<?php echo $header; ?>" data-stream="<?php echo $stream; ?>" data-show-border="false"></div>
		</div>            
		</aside>            
		<?php echo $after_widget;?>
     <?php
    }

	/* Update the widget settings. */
    function update($new_instance, $old_instance) 
    {		
    	$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags( $new_instance['url'] );
        $instance['width'] = strip_tags( $new_instance['width'] );
        $instance['height'] = strip_tags( $new_instance['height'] );
        $instance['colorscheme'] = strip_tags( $new_instance['colorscheme'] );
		$instance['show_faces'] = isset($new_instance['show_faces']) ? true : false;
		$instance['stream'] = isset($new_instance['stream']) ? true : false;
		$instance['header'] = isset($new_instance['header']) ? true : false;        
        return $instance;
    }

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '','url' => '', 'width' => '', 'height' => '', 'colorscheme' => 'light', 'show_faces' => false, 'stream' => false, 'header' => false, 'border' => '') );
		$title = esc_attr( $instance['title'] );
		$url = esc_attr( $instance['url'] );
		$width = esc_attr( $instance['width'] );
		$height = esc_attr( $instance['height'] );
		?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:',THEME_NAME); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e( 'URL:',THEME_NAME); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
            <br />
            <small><?php _e( 'Fill with your facebook URL fanpage',THEME_NAME ); ?></small><br />
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e( 'Width:',THEME_NAME); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
            <br />
            <small><?php _e( 'Fill width like box',THEME_NAME ); ?></small>
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e( 'Height:',THEME_NAME); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
            <br />
            <small><?php _e( 'Fill height like box',THEME_NAME ); ?></small>
        </p>
        <p><label for="<?php echo $this->get_field_id('colorscheme'); ?>"><?php _e( 'Colorscheme:',THEME_NAME ); ?></label>
            <select name="<?php echo $this->get_field_name('colorscheme'); ?>" id="<?php echo $this->get_field_id('colorscheme',THEME_NAME); ?>" class="widefat">
            <option value="light"<?php selected( $instance['colorscheme'], 'light' ); ?>><?php _e( 'light',THEME_NAME ); ?></option>
            <option value="dark"<?php selected( $instance['colorscheme'], 'dark' ); ?>><?php _e( 'dark',THEME_NAME ); ?></option>
            </select>
            <br/>
            <small><?php _e( 'Select likebox colorscheme.',THEME_NAME ); ?></small>
		</p>		
        <p><label for="<?php echo $this->get_field_id('show_faces'); ?>"><?php _e( 'Show face:',THEME_NAME ); ?></label><br />
            <input class="checkbox" type="checkbox" <?php checked($instance['show_faces'], true) ?> id="<?php echo $this->get_field_id('show_faces'); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>" /><br />
            <small><?php _e( 'Check for show face',THEME_NAME ); ?></small><br />
			<label for="<?php echo $this->get_field_id('stream'); ?>"><?php _e( 'Show stream:',THEME_NAME ); ?></label><br />
            <input class="checkbox" type="checkbox" <?php checked($instance['stream'], true) ?> id="<?php echo $this->get_field_id('stream'); ?>" name="<?php echo $this->get_field_name('stream'); ?>" /><br />
            <small><?php _e( 'Check for show stream',THEME_NAME ); ?></small><br />
			<label for="<?php echo $this->get_field_id('header'); ?>"><?php _e( 'Show header:',THEME_NAME ); ?></label><br />
            <input class="checkbox" type="checkbox" <?php checked($instance['header'], true) ?> id="<?php echo $this->get_field_id('header'); ?>" name="<?php echo $this->get_field_name('header'); ?>" /><br />
            <small><?php _e( 'Check for show header',THEME_NAME ); ?></small>
        </p>
			
			
	<?php
	}
} ?>