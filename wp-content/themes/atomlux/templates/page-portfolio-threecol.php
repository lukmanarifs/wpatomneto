<?php
/*
Template Name: Page Portfolio Three Column
*/
?>
<?php get_header();?>
        <section class="panel-grid-cell" id="pgc-home-4-0">		
		
		<div class="panel">
		<div class="row">
				<?php
				$args=array( 
					'post_type' => 'portfolio',
					'orderby' => 'date',
					'posts_per_page'=> -1
					);
				$the_query = new WP_Query($args);?>
									
                    
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
		  
          </div>
          </div>
                       
                               
                               
                               <div class="clear"></div>
                       
       </section><!-- end of portfolio columns -->
       

<?php get_footer();?>