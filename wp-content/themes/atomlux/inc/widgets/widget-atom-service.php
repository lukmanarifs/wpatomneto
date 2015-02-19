<?php
add_action('widgets_init', create_function('', 'return register_widget("atomlabs_service_widget");'));

class atomlabs_service_widget extends WP_Widget {
	function atomlabs_service_widget() {
		 parent::WP_Widget(false, $name = ':ATOM: Service Icon');	
	}

	function form($instance) {
		 $service = esc_attr($instance['service']);
        ?>			
			<p><label for="<?php echo $this->get_field_id('service'); ?>"><?php _e( 'Choose Service:' , 'atom' );?>
			 	
			<select name="<?php echo $this->get_field_name('service'); ?>" style="width: 100%; clear: both; margin: 0;">
			<?php 
				wp_reset_query(); 
				global $post;
				$args = array( 'post_type' => 'service', 'posts_per_page'=> -1);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<option value="<?php echo $post->ID; ?>" <?php if($post->ID==$service)  {echo 'selected="selected"';} ?>><?php the_title(); ?></option>		
					
			<?php endforeach;wp_reset_postdata();?>
			</select>
			
			</label></p>
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['service'] = strip_tags($new_instance['service']);			
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $service = apply_filters('widget_title', $instance['service']);
        ?>
		
		<?php 
				
				$args=array( 
							'post_type' => 'service',
							'orderby' => 'date',
							'p' => $service,
							'posts_per_page'=> -1
							);
				$the_query = new WP_Query($args);$iro=0;
		?>	
		<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();?>
					<div class="icon-box-top text-center">
						<i class="colortext fontawesome-icon medium circle-white center fa <?php echo atomlabs_metabox('atom_post_format_service.icone');?>"></i>
						<h1><?php the_title();?></h1>
						<p>
							 <?php echo atomlabs_metabox('atom_post_format_service.servicex');?>
						</p>
						<?php if ( atomlabs_metabox('atom_post_format_service.readmoree') != '' ):?>
						<p class="fontupper">
							<a href="<?php the_permalink();?>" class="readmore"><?php echo atomlabs_metabox('atom_post_format_service.readmoree');?> <i class="fa fa-angle-double-right"></i></a>
						</p>
						<?php endif;?>
					</div>
					
		<?php endwhile;endif;wp_reset_query();?>
        <?php
	}
}
?>