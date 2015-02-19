<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">Blog Masonry Layout</h1>
							<div class="separator-2"></div>
							<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas nulla suscipit <br class="hidden-sm hidden-xs"> unde rerum mollitia dolorum.</p>
							<!-- page-title end -->

							<!-- masonry grid start -->
							<div class="masonry-grid row">
							<?php	while ( have_posts() ) {
								the_post(); ?>
								<!-- masonry grid item start -->
								<div class="masonry-grid-item col-sm-6">
									<!-- blogpost start -->
									<article class="clearfix blogpost">
										<?php 
										if(get_post_format() == "gallery"){ ?>
											<?php
				                                $gallery_images = atom_get_post_meta_key('gallery-images');
				                                $img_list = atom_get_post_gallery_ids($gallery_images);
				                                if(count($img_list) > 0){
				                            ?>
										<div class="overlay-container">
											<?php 
                                                $attachment_image = wp_get_attachment_image_src($img_list[0], 'post-thumbnail'); 
                                                $full_image = wp_get_attachment_image_src($img_list[0], 'full'); ?>
                                                <img src="<?php echo esc_url($attachment_image[0]); ?>" alt="">
											<div class="overlay">
												<div class="overlay-links">
												<a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
												<a href="<?php echo esc_url($full_image[0]); ?>" class="popup-img-single" title="image title"><i class="fa fa-search-plus"></i></a>
											</div>
										</div></div>
											<?php }}else if(get_post_format() == "audio"){ ?>
												<?php
												   $audio_type 		= atom_get_post_meta_key( 'audio-type');
												   $audio_content 	= atom_get_post_meta_key('audio-content');
												   
												   if($audio_content && $audio_content != ''){
												?>
												<div class="audio-wrapper">
												<?php
												   if(intval($audio_type) == 0){
													 echo do_shortcode('[soundcloud url="'.$audio_content.'"]');
												   }else{
													   echo $audio_content;
												   }
												?>
												</div>
				        					<?php }}else if(get_post_format() == "video"){ ?>
					                        	<?php
													$video_type 	= atom_get_post_meta_key('video-type');
													$video_content 	= atom_get_post_meta_key('video-content');
													if($video_content && $video_content != ''){
												 ?>
												 
												 
												<div class="embed-responsive embed-responsive-16by9">
												<?php
												
													if(intval($video_type) == 0){
														echo do_shortcode('[youtube id="'.$video_content.'" width="150%" height="300"]');
													}else if(intval($video_type) == 1){
														echo do_shortcode('[vimeo id="'.$video_content.'" width="150%" height="300"]');
													}else{
													   echo $video_content;
													}}?></div> <?php }
													else if ( has_post_thumbnail() ) {
													the_post_thumbnail();
												}
												?>
										<div class="blogpost-body">
											<div class="post-info">
												<span class="day">12</span>
												<span class="month">Sept 2014</span>
											</div>
											<div class="blogpost-content">
												<header>
													<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
													<div class="submitted"><i class="fa fa-user pr-5"></i> by <a href="#">John Doe</a></div>
												</header>
												
												<?php the_excerpt();?>
											</div>
										</div>
										<footer class="clearfix">
											<ul class="links pull-left">
												<li><i class="fa fa-comment-o pr-5"></i> <a href="#">22 comments</a> |</li> 
												<li><i class="fa fa-tags pr-5"></i> <a href="#">tag 1</a></li>
											</ul>
											<a class="pull-right link" href="<?php the_permalink();?>"><span>Read more</span></a>
										</footer>
									</article>
									<!-- blogpost end -->
								</div>
								<!-- masonry grid item end -->
								<?php }?>
							</div>
							<!-- masonry grid end -->

						</div>
						<!-- main end -->
						<?php get_sidebar();?>
					</div>
				</div>
			</section>
			<!-- main-container end -->