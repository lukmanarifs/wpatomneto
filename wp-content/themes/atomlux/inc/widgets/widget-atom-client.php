<?php
add_action('widgets_init', create_function('', 'return register_widget("atomlabs_client_widget");'));

class atomlabs_client_widget extends WP_Widget {
	function atomlabs_client_widget() {
		 parent::WP_Widget(false, $name = ':ATOM: Client');	
	}

	function form($instance) {
		 $orderbye = esc_attr($instance['orderbye']);
		 $count = esc_attr($instance['count']);
		 $title = esc_attr($instance['title']);
		 $id = esc_attr($instance['id']);
		 $desc = esc_attr($instance['desc']);
        ?>	
			<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="hidden" value="<?php if($id==''){echo rand(0,99999);}else{echo $id;} ?>" />
			 
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __( 'Client Title' , 'atom' ));?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('desc'); ?>"><?php printf ( __( 'Description' , 'atom' ));?> <textarea class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>" value="<?php echo $desc; ?>"></textarea></label></p>
			
			<p><label for="<?php echo $this->get_field_id('orderbye'); ?>"><?php _e( 'Client Order by:' , 'atom' );?>
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
		$instance['desc'] = strip_tags($new_instance['desc']);					
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $orderbye = apply_filters('widget_title', $instance['orderbye']);
        $count = apply_filters('widget_title', $instance['count']);
        $title = apply_filters('widget_title', $instance['title']);
        $id = apply_filters('widget_title', $instance['id']);
        $desc = apply_filters('widget_title', $instance['desc']);
        ?>
		
		<?php 
				
				$args=array( 
							'post_type' => 'client',
							'orderby' => $orderbye,
							'posts_per_page'=> $count
							);
				$the_query = new WP_Query($args);$iro=0;
		?>
		<?php echo $before_widget;?>
		<h1 class="small text-center"><?php if ( $title ) { echo $title; }else{ _e('OUR BELOVED CLIENT');} ?></h1>
		<?php if ( $desc ) :?><div class="text-center" style="margin-left:auto;margin-right:auto;max-width:700px"><?php echo $desc;?></div><?php endif;?>
		<div class="br-hr type_short">
				<span class="br-hr-h">
				<i class="fa fa-group"></i>
				</span>
			</div>
			
			<div id="owl-gallery-<?php echo $id;?>" class="owl-carousel ">
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();?>				
					<div class="item">
					<?php
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
					?>
						
							<?php the_post_thumbnail( 'atom-carousel' ); ?>
						
					</div>                
				<?php endwhile;endif;wp_reset_query();?>
            </div>			
            <div class="br-hr type_long">
				<span class="br-hr-h">
				</span>
			</div>
              

           
	<style>
	#owl-gallery-<?php echo $id;?> .item{
	  margin: 6px;
	}
	#owl-gallery-<?php echo $id;?> .item img {
	height: auto;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	max-width: 100%;
	}
	</style>
	
    <script type="text/javascript">
jQuery.noConflict()(function($){
    $(document).ready(function() {

      var owl = $("#owl-gallery-<?php echo $id;?>");

      owl.owlCarousel({
		autoPlay: true,
      items : 6, //10 items above 1000px browser width
      itemsDesktop : [1000,4], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      
      });
		$(".owl-pagination").hide();
      // Custom Navigation Events
      $("#next-gallery-<?php echo $id;?>").click(function(){
        owl.trigger('owl.next');
      })
      $("#prev-gallery-<?php echo $id;?>").click(function(){
        owl.trigger('owl.prev');
      })
	
    });
});
     
    </script>
		<?php echo $after_widget;?>
    
        <?php
	}
			
}


?>