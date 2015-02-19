<?php
add_action('widgets_init', create_function('', 'return register_widget("atomlabs_pricing_widget");'));

class atomlabs_pricing_widget extends WP_Widget {
	function atomlabs_pricing_widget() {
		 parent::WP_Widget(false, $name = ':ATOM: Pricing Table');	
	}

	function form($instance) {
		 $price1 = esc_attr($instance['price1']);
		 $price2 = esc_attr($instance['price2']);
		 $price3 = esc_attr($instance['price3']);
		 $price4 = esc_attr($instance['price4']);
		 $featured = esc_attr($instance['featured']);
		 $color = esc_attr($instance['color']);
        ?>			
			<script type='text/javascript'>
				jQuery(document).ready(function($) {
					$('.my-color-field').wpColorPicker();
				});
			</script>
			
			<p><label for="<?php echo $this->get_field_id('color'); ?>"><?php printf ( __( 'Color:' , 'atom' ));?> <input class="my-color-field" data-default-color="#4BAAD3" id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" type="text" value="<?php if($color!=''){echo $color;}else{echo '#4BAAD3';}?>" /></label></p>
			
			
			<p><label for="<?php echo $this->get_field_id('price1'); ?>"><?php _e( 'Pricing Table 1:' , 'atom' );?>
			 	
			<select name="<?php echo $this->get_field_name('price1'); ?>" style="width: 100%; clear: both; margin: 0;">
			<option value="<?php _e( 'none' , 'atom' );?>" <?php if($post->ID==$price1)  {echo 'selected="selected"';} ?>>None</option>	
			<?php 
				wp_reset_query(); 
				global $post;
				$args = array( 'post_type' => 'pricing', 'posts_per_page'=> -1);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<option value="<?php echo $post->ID; ?>" <?php if($post->ID==$price1)  {echo 'selected="selected"';} ?>><?php the_title(); ?></option>		
					
			<?php endforeach;wp_reset_postdata();?>
			</select>
			
			</label></p>
			
			<p><label for="<?php echo $this->get_field_id('price2'); ?>"><?php _e( 'Pricing Table 2:' , 'atom' );?>
			 	
			<select name="<?php echo $this->get_field_name('price2'); ?>" style="width: 100%; clear: both; margin: 0;">
			<option value="<?php _e( 'none' , 'atom' );?>" <?php if($post->ID==$price2)  {echo 'selected="selected"';} ?>>None</option>	
			<?php 				
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<option value="<?php echo $post->ID; ?>" <?php if($post->ID==$price2)  {echo 'selected="selected"';} ?>><?php the_title(); ?></option>		
					
			<?php endforeach;?>
			</select>
			
			</label></p>
			
			<p><label for="<?php echo $this->get_field_id('price3'); ?>"><?php _e( 'Pricing Table 3:' , 'atom' );?>
			 	
			<select name="<?php echo $this->get_field_name('price3'); ?>" style="width: 100%; clear: both; margin: 0;">
			<option value="<?php _e( 'none' , 'atom' );?>" <?php if($post->ID==$price3)  {echo 'selected="selected"';} ?>>None</option>	
			<?php 				
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<option value="<?php echo $post->ID; ?>" <?php if($post->ID==$price3)  {echo 'selected="selected"';} ?>><?php the_title(); ?></option>		
					
			<?php endforeach;?>
			</select>
			
			</label></p>
			
			<p><label for="<?php echo $this->get_field_id('price4'); ?>"><?php _e( 'Pricing Table 4:' , 'atom' );?>
			 	
			<select name="<?php echo $this->get_field_name('price4'); ?>" style="width: 100%; clear: both; margin: 0;">
				<option value="<?php _e( 'none' , 'atom' );?>" <?php if($post->ID==$price4)  {echo 'selected="selected"';} ?>>None</option>	
			<?php 				
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<option value="<?php echo $post->ID; ?>" <?php if($post->ID==$price4)  {echo 'selected="selected"';} ?>><?php the_title(); ?></option>		
					
			<?php endforeach;?>
			</select>
			
			</label></p>
			
			<p><label for="<?php echo $this->get_field_id('featured'); ?>"><?php _e( 'Featured Pricing Table:' , 'atom' );?>
			 	
			<select name="<?php echo $this->get_field_name('featured'); ?>" style="width: 100%; clear: both; margin: 0;">	
			<?php 				
				for ( $ar=1; $ar < 5; $ar++ ) :  ?>
					<option value="<?php echo $ar; ?>" <?php if($ar==$featured)  {echo 'selected="selected"';} ?>><?php _e( 'Pricing Table '.$ar , 'atom' );?></option>		
					
			<?php endfor;?>
			</select>
			
			</label></p>
			
			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['price1'] = strip_tags($new_instance['price1']);			
		$instance['price2'] = strip_tags($new_instance['price2']);			
		$instance['price3'] = strip_tags($new_instance['price3']);			
		$instance['price4'] = strip_tags($new_instance['price4']);			
		$instance['featured'] = strip_tags($new_instance['featured']);			
		$instance['color'] = strip_tags($new_instance['color']);			
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $featured = apply_filters('widget_title', $instance['featured']);
        $color = apply_filters('widget_title', $instance['color']);
		
		$icol = 0;
		for($ip=1;$ip<=4;$ip++):
		$harga = 'price'.$ip;				
				$pris = apply_filters('widget_title', $instance[$harga]);
				
				if( $pris != 'none' ):
					$icol++;
				endif;
		endfor;
		
		if($icol==1){$col = '12';}
		elseif($icol==2){$col = '6';}
		elseif($icol==3){$col = '4';}
		else{$col = '3';}
        ?>
		
		
		<?php echo $before_widget;?>
		<div class="row attached pricingtable">
		<?php for($ip=1;$ip<5;$ip++):
		$harga = 'price'.$ip;				
				$pris = apply_filters('widget_title', $instance[$harga]);
				
				if( $pris != 'none' ):
		?>
		<?php 
				
				$args=array( 
							'post_type' => 'pricing',
							'p' => $pris
							);
				$the_query = new WP_Query($args);
		?>	
		<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();?>
			<div class="col-sm-6 col-md-<?php echo $col;?>">
                <div class="plan<?php if($featured==$ip){echo ' most-popular';}?>">
                    <div class="plan-title">
                        <h3><?php the_title();?></h3>
                        <span><?php echo atomlabs_metabox('atom_pricing.subtitle');?></span>
                    </div>
                        
                    <div class="plan-price" style="color:<?php echo $color;?>">
                        <span class="price"><?php echo atomlabs_metabox('atom_pricing.price');?></span>
                        <span class="period"><?php echo atomlabs_metabox('atom_pricing.perprice');?></span>    
                    </div>

                    <div class="plan-list">
                        <ul class="item-list">
						<?php	$datae = count(atomlabs_metabox('atom_pricing.features'));								
								for($i=0;$i<$datae;$i++):?>
                            <li><?php echo atomlabs_metabox('atom_pricing.features.'.$i.'.isi');?></li>
						<?php endfor;?>
                        </ul>
                        <a href="<?php echo atomlabs_metabox('atom_pricing.buttonlink');?>" class="btn btn-success" style="background:<?php echo $color;?>">
						<?php echo atomlabs_metabox('atom_pricing.button');?>
						</a>
                    </div> 
                </div>
            </div>		
										
		<?php endwhile;endif;wp_reset_query();?>
		
		<?php endif;endfor;?>
		
		 </div><!-- /.row -->
		 <?php echo $after_widget;?>
        <?php
	}
}
?>