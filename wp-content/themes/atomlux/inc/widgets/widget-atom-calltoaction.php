<?php
add_action('widgets_init', create_function('', 'return register_widget("atomlabs_cta_widget");'));

class atomlabs_cta_widget extends WP_Widget {
	function atomlabs_cta_widget() {
		 parent::WP_Widget(false, $name = ':ATOM: Call To Action');	
	}

	function form($instance) {
		
		 $isine =  esc_attr($instance['isine']);
		 $button = esc_attr($instance['button']);
		 $buttonlink = esc_attr($instance['buttonlink']);
        ?>	
			
			
			<p><label for="<?php echo $this->get_field_id('isine'); ?>"><?php printf ( __( 'Description' , 'atom' ));?> <textarea class="widefat" id="<?php echo $this->get_field_id('isine'); ?>" name="<?php echo $this->get_field_name('isine'); ?>"><?php echo $isine; ?></textarea></label></p>
			
			<p><label for="<?php echo $this->get_field_id('button'); ?>"><?php printf ( __( 'Button Text' , 'atom' ));?> <input class="widefat" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" type="text" value="<?php echo $button; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('buttonlink'); ?>"><?php printf ( __( 'Button Link' , 'atom' ));?> <input class="widefat" id="<?php echo $this->get_field_id('buttonlink'); ?>" name="<?php echo $this->get_field_name('buttonlink'); ?>" type="text" value="<?php echo $buttonlink; ?>" /></label></p>
			
			
			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;					
		$instance['isine'] = $new_instance['isine'];					
		$instance['button'] = strip_tags($new_instance['button']);					
		$instance['buttonlink'] = strip_tags($new_instance['buttonlink']);					
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );       
        $isine = apply_filters('widget_text', $instance['isine']);
        $button = apply_filters('widget_title', $instance['button']);
        $buttonlink = apply_filters('widget_title', $instance['buttonlink']);
        ?>
		
		<?php echo $before_widget;?>
		<div class="purchase">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
				<?php if ( $isine ) { echo $isine; }else{ _e('<span>AtomLux is a clean and fully responsive incredible Template.</span>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi  vehicula sem ut volutpat. Ut non libero magna fusce condimentum eleifend enim a feugiat.</p>');} ?>                
            </div>            
            <div class="col-md-4">
                <a href="<?php if ( $buttonlink ) { echo $buttonlink; }else{ _e('#');} ?>" class="btn-buy hover-effect"><?php if ( $button ) { echo $button; }else{ _e('PURCHASE');} ?></a>            
            </div>
        </div>
    </div>
</div>

   
		<?php echo $after_widget;?>
    
        <?php
	}
			
}


?>