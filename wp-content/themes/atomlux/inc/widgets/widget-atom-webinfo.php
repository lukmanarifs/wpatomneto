<?php
add_action('widgets_init', create_function('', 'return register_widget("atomlabs_webinfo_widget");'));

class atomlabs_webinfo_widget extends WP_Widget {
	function atomlabs_webinfo_widget() {
		 parent::WP_Widget(false, $name = ':ATOM: Welcome Profile & Contact');	
	}

	function form($instance) {
		
		 $isine =  esc_attr($instance['isine']);
		 $isine2 =  esc_attr($instance['isine2']);
		 $title = esc_attr($instance['title']);

if($isine==''){$isine='<p><a href="http://atomlabs.me"><img class="alignleft size-medium wp-image-100" alt="text" src="http://i.imgur.com/LcmWp4k.png" width="199" height="300"></a></p>
<h2>Welcome to ATOMLABS.me</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis purus a orci hendrerit vehicula id at risus. Nam mauris lorem, accumsan non leo ut, adipiscing porta urna. Vestibulum a ultrices elit, non semper augue.</p>
<h2>Why choose us?</h2>
<ul>
<li>Lorem ipsum dolor sit amet</li>
<li>Consectetur adipiscing elit</li>
<li>Sed quis purus a orci hendrerit.</li>
<li>Vehicula id at risus.</li>
<li>Nam mauris lorem.</li>
</ul>';}

if($isine2==''){$isine2='<form method="post" action="" id="contactform">
						<div class="aligncenter">
							<input type="text" name="name" placeholder="Name">
							<input type="text" name="email" placeholder="E-mail">
							<input type="submit" id="submit" class="btn btn-default" value="Send">
						</div>
					</form>';}
if($title==''){$title='GOT A PRE-SALE QUESTION?';}
        ?>	
			
			<h2>Left Side</h2>
			<p><label for="<?php echo $this->get_field_id('isine'); ?>"><?php printf ( __( 'Welcome text' , 'atom' ));?> <textarea class="widefat" id="<?php echo $this->get_field_id('isine'); ?>" name="<?php echo $this->get_field_name('isine'); ?>" rows="5"><?php echo $isine; ?></textarea></label></p>
			
			<h2>Right Side</h2>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Title Contact' , 'atom' ));?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('isine2'); ?>"><?php printf ( __( 'Contact/OptIn Code' , 'atom' ));?> <textarea class="widefat" id="<?php echo $this->get_field_id('isine2'); ?>" name="<?php echo $this->get_field_name('isine2'); ?>" rows="5"><?php echo $isine2; ?></textarea></label></p>
			
			
			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;					
		$instance['isine'] = $new_instance['isine'];		
		$instance['isine2'] = $new_instance['isine2'];					
		$instance['title'] = strip_tags($new_instance['title']);					
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );       
        $isine = apply_filters('widget_text', $instance['isine']);
        $isine2 = apply_filters('widget_text', $instance['isine2']);
        $title = apply_filters('widget_title', $instance['title']);
        ?>
		
		<?php echo $before_widget;?>	
		<div class="col-sm-8">
			<div class="format-text">
				<?php echo $isine;?> 
			</div>
		</div><div class="col-sm-4"><div class="box" id="contactform">
					<h4><?php echo $title;?></h4>
					<?php echo $isine2;?>
				</div></div>    
      
   
		<?php echo $after_widget;?>
    
        <?php
	}
			
}


?>