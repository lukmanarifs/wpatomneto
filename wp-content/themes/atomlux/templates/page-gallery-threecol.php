<?php
/*
Template Name: Page Gallery Three Column
*/
?>
<?php get_header();?>
        <section class="panel-grid-cell" id="pgc-home-4-0">		
		
		<div class="panel">
		<div class="row">
				<?php
				
				$cata = atomlabs_metabox('atom_pagegallery.pagegallery');
				
				if($cata!='all'){
				$args=array( 
					'post_type' => 'gallery',					
					'tax_query' => array(
						array(
							'taxonomy' => 'gallery-folder',
							'field'    => 'slug',
							'terms'    => $cata
						)
					),
					'orderby' => 'date',
					'posts_per_page'=> -1
					);
				}else{
				$args=array( 
					'post_type' => 'gallery',
					'orderby' => 'date',
					'posts_per_page'=> -1
					);
				}
				$the_query = new WP_Query($args);?>
									
                    
        <div class="animate-hover-slide">
            <div class="row"  id="galeri">
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();?>	
					 <div class="col-md-4">
                                    <div class="w-box inverse">
                                        <div class="figure text-center">
                                          										
											<?php
												$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
											?>
											<a href="<?php echo $large_image_url[0];?>" title="<?php the_title();?>" class="btn btn-one"> <?php the_post_thumbnail( 'atom-grid-loop' ); ?></a>
                                           
                                        </div>
										<div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="text-center"><?php the_title();?></h4>                                               
                                            </div>                                            
                                        </div>	                                       
                                    </div>
                                </div>
				<?php endwhile;endif;wp_reset_query();?>
				
				
          </div>
          </div>	
		  
          </div>
          </div>
                        
                               
                               
                               <div class="clear"></div>
                       
       </section><!-- end of portfolio columns -->
     
<script type="text/javascript">
jQuery.noConflict()(function($){
    $(document).ready(function() {

    $('#galeri').photobox('a',{ time:0 });
    });
    });

    </script>
<?php get_footer();?>