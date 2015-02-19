<?php
add_action('widgets_init', create_function('', 'return register_widget("atomlabs_testi_widget");'));

class atomlabs_testi_widget extends WP_Widget {
	function atomlabs_testi_widget() {
		 parent::WP_Widget(false, $name = ':ATOM: Testimonials');	
	}

	function form($instance) {
		 $service = esc_attr($instance['orderbye']);
		 $count = esc_attr($instance['count']);
		 $title = esc_attr($instance['title']);
		 $id = esc_attr($instance['id']);
        ?>	
			<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="hidden" value="<?php if($id==''){echo rand(0,99999);}else{echo $id;} ?>" />
			 
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Title' , 'atom' ));?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('orderbye'); ?>"><?php _e( 'Testimonial Order by:' , 'atom' );?>
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
			
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __( 'How many to show?' , 'atom' ));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
			
			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['orderbye'] = strip_tags($new_instance['orderbye']);			
		$instance['count'] = strip_tags($new_instance['count']);					
		$instance['title'] = strip_tags($new_instance['title']);					
		$instance['id'] = strip_tags($new_instance['id']);					
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $orderbye = apply_filters('widget_title', $instance['orderbye']);
        $count = apply_filters('widget_title', $instance['count']);
        $title = apply_filters('widget_title', $instance['title']);
        $idw = apply_filters('widget_title', $instance['id']);
        ?>
		
		<?php 
				
				$args=array( 
							'post_type' => 'testimonial',
							'orderby' => $orderbye,
							'posts_per_page'=> $count
							);
				$the_query = new WP_Query($args);$iro=0;
		?>
		<?php echo $before_widget;?>
		
		<h1 class="small text-center"><?php if ( $title ) { echo $title; }else{ _e('WHAT THEY SAY');} ?></h1>
		<div class="br-hr type_short">
				<span class="br-hr-h">
				<i class="fa fa-pencil"></i>
				</span>
			</div>

<div id="owl-testi-<?php echo $idw;?>" class="owl-carousel owl-theme cbp-qtrotator">
 <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();?><div class="item">
				<div class="cbp-qtcontent">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<blockquote>
						<p class="bigquote">
							<i class="fa fa-quote-left colortext quoteicon"></i> <?php echo atomlabs_metabox('atom_post_format_testi2.isitesti');?>
						</p>
						<footer style="width:35%"><?php echo atomlabs_metabox('atom_post_format_testi.name');?> / <a href="#"><?php echo atomlabs_metabox('atom_post_format_testi.website');?></a></footer>
					</blockquote>
				</div>
				</div>
				<?php endwhile;endif;wp_reset_query();?> 
</div>			
			
<script type="text/javascript">
jQuery.noConflict()(function($){
    $(document).ready(function() {
	$("#owl-testi-<?php echo $idw;?>").owlCarousel({
	  autoPlay : 3000,
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 1000,
      singleItem:true,
	  transitionStyle:"fadeUp"
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
		$("owl-testia-<?php echo $idw;?>").owlCarousel({
			autoPlay : 3000,
			navigation : true, // Show next and prev buttons
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true
		  });
	});
});    
</script>
	
		<?php echo $after_widget;?>
    
        <?php
	}
			
}


?>