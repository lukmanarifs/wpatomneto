<?php
add_action('widgets_init', create_function('', 'return register_widget("atomlabs_port_widget");'));

class atomlabs_port_widget extends WP_Widget {
	function atomlabs_port_widget() {
		 parent::WP_Widget(false, $name = ':ATOM: Portfolio');	
	}

	function form($instance) {
		 $orderbye = esc_attr($instance['orderbye']);
		 $count = esc_attr($instance['count']);
		 $title = esc_attr($instance['title']);
		 $id = esc_attr($instance['id']);
		 $desc = esc_attr($instance['desc']);
		 $portfolio = esc_attr($instance['portfolio']);
		 $button = esc_attr($instance['button']);
        ?>	
			<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="hidden" value="<?php if($id==''){echo rand(0,99999);}else{echo $id;} ?>" />
			 
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Portfolio Title' , 'atom' ));?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('desc'); ?>"><?php printf ( __( 'Description' , 'atom' ));?> <textarea class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>" value="<?php echo $desc; ?>"></textarea></label></p>
			
			<p><label for="<?php echo $this->get_field_id('portfolio'); ?>"><?php _e( 'Choose Portfolio Page:' , 'atom' );?>
			 	
			<select name="<?php echo $this->get_field_name('portfolio'); ?>" style="width: 100%; clear: both; margin: 0;">
			<?php 
				wp_reset_query(); 
				global $post;
				$args = array( 'post_type' => 'page', 'posts_per_page'=> -1);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<option value="<?php echo $post->ID; ?>" <?php if($post->ID==$service)  {echo 'selected="selected"';} ?>><?php the_title(); ?></option>		
					
			<?php endforeach;wp_reset_postdata();?>
			</select>
			
			</label></p>
			
			<p><label for="<?php echo $this->get_field_id('button'); ?>"><?php printf ( __( 'Portfolio Button Text' , 'atom' ));?> <input class="widefat" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" type="text" value="<?php echo $button; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('orderbye'); ?>"><?php _e( 'Portfolio Order by:' , 'atom' );?>
			<?php
			$argsr[0] = 'date'; 
			$argsr[1] = 'rand';
			?> 	
			<select name="<?php echo $this->get_field_name('orderbye'); ?>" style="width: 100%; clear: both; margin: 0;">
				<?php for($ir=0;$ir<count($argsr);$ir++) { ?>
					<option value="<?php echo $argsr[$ir]; ?>" <?php if($argsr[$ir]==$orderbye)  {echo 'selected="selected"';} ?>><?php echo $argsr[$ir]; ?></option>
				<?php } ?>
				
			</select>
			
			</label></p>
			
			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['orderbye'] = strip_tags($new_instance['orderbye']);			
		$instance['count'] = strip_tags($new_instance['count']);					
		$instance['title'] = strip_tags($new_instance['title']);					
		$instance['id'] = strip_tags($new_instance['id']);						
		$instance['desc'] = strip_tags($new_instance['desc']);					
		$instance['portfolio'] = strip_tags($new_instance['portfolio']);					
		$instance['button'] = strip_tags($new_instance['button']);					
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $orderbye = apply_filters('widget_title', $instance['orderbye']);
        $count = apply_filters('widget_title', $instance['count']);
        $title = apply_filters('widget_title', $instance['title']);
        $id = apply_filters('widget_title', $instance['id']);
        $desc = apply_filters('widget_title', $instance['desc']);
        $portfolio = apply_filters('widget_title', $instance['portfolio']);
        $button = apply_filters('widget_title', $instance['button']);
        ?>
		
		<?php 
				
				$args=array( 
							'post_type' => 'portfolio',
							'orderby' => $orderbye,
							'posts_per_page'=> 6
							);
				$the_query = new WP_Query($args);$iro=0;
		?>
		<?php echo $before_widget;?>
		<h1 class="small text-center"><?php if ( $title ) { echo $title; }else{ _e('OUR WORKS');} ?></h1>
		<?php if ( $desc ) :?><div class="text-center" style="margin-left:auto;margin-right:auto;max-width:700px"><?php echo $desc;?></div><?php endif;?>
		<div class="br-hr type_short">
				<span class="br-hr-h">
				<i class="fa fa-briefcase"></i>
				</span>
			</div>
			
			
	
	
	<div class="animate-hover-slide">
            <div class="row portfolio-column" id="portfolio-<?php echo $id;?>">
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();?><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<div class="col-md-4 content">
                       <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                            <?php the_post_thumbnail( 'atom-grid-loop' ); ?>
						</a>
                        <div class="caption">
                                <div class="view">
                                        <a href="<?php the_permalink();?>" title="<?php the_title();?>">&nbsp;</a>
                                         <a class="popup" href="<?php echo $image[0];?>" data-toggle="lightbox" data-gallery="multiimages" data-title="<?php the_title();?>" data-parent=".portfolio-column"><img src="<?php echo $image[0];?>" alt="portfolio" style="display: none;"></a>
                                </div><!-- end of view -->
                                <h4><?php the_title();?></h4>
                        </div><!-- end of caption -->
								<div class="margin-10b"></div>	
					</div>			 
				<?php endwhile;endif;wp_reset_query();?>
				
          </div>
          </div>
		   <div class="text-center">
		  <a href="<?php echo get_bloginfo('url').'/?page_id='.$portfolio;?>" class="btn"><i class="fa fa-chevron-circle-right"></i> <?php if ( $button ) { echo $button; }else{ _e('SEE ALL OUR WORKS');} ?></a>
           </div>
  
 
		<?php echo $after_widget;?>
    
        <?php
	}
			
}


?>