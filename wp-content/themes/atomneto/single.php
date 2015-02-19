<?php get_header();?>

	<?php

		$args = array(
			'public'   => true,
			'_builtin' => false
		);

		$output = 'names'; // names or objects, note names is the default
		$operator = 'and'; // 'and' or 'or'

		$post_types = get_post_types( $args, $output, $operator );
		foreach ( $post_types  as $post_type ) {

			$pt =  $post_type;
		}
		if ($pt == 'portofolio'){

			$obj = get_post_type_object( 'post' );
			$obj->labels->singular_name;

							if (have_posts() ) {
									// Start the Loop.
									while ( have_posts() ) { the_post();?>
		<!-- main start -->
							<!-- ================ -->
							<div class="main col-md-8">

								<!-- page-title start -->
								<!-- ================ -->
								<h1 class="page-title">Blogpost Title</h1>
								<!-- page-title end -->

								<!-- blogpost start -->
								<article class="clearfix blogpost full">
									<div class="blogpost-body">
										<div class="side">
											<div class="post-info">
												<span class="day">12</span>
												<span class="month">Sept 2014</span>
											</div>
											<div id="affix"><span class="share">Share This</span><div id="share"></div></div>
										</div>
										<div class="blogpost-content">
											<header>
												<div class="submitted"><i class="fa fa-user pr-5"></i> by <a href="#">John Doe</a></div>
											</header>
											<?php
											if(get_post_format() == "gallery"){ ?>
												<?php
																					$gallery_images = atom_get_post_meta_key('gallery-images');
																					$img_list = atom_get_post_gallery_ids($gallery_images);
																					if(count($img_list) > 0){
																			?>
											<div class="owl-carousel content-slider-with-controls">
												<?php  foreach($img_list as $item_id){
																									$attachment_image = wp_get_attachment_image_src($item_id, 'post-thumbnail');
																									$full_image = wp_get_attachment_image_src($item_id, 'full'); ?>

												<div class="overlay-container">
													<img src="<?php echo esc_url($attachment_image[0]); ?>" alt="">
													<a href="<?php echo esc_url($full_image[0]); ?>" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
												</div>

												</div>
												<?php }}}else if(get_post_format() == "audio"){ ?>
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
														}} ?> </div> <?php }else if ( has_post_thumbnail() ) {
														the_post_thumbnail();
													}
													?>
											<p>Amet culpa, accusamus. Temporibus animi, consequatur cumque natus, esse consequuntur voluptatibus deleniti necessitatibus autem architecto quaerat tenetur nobis, ea maxime saepe rem doloribus placeat aliquid quod, id fuga ratione error harum ex! Facere vero veniam ducimus nulla sed possimus nobis nisi maiores quibusdam, nam odit quos dolores laborum pariatur distinctio in ex culpa impedit. Corrupti sequi perferendis atque nam debitis ea sunt, vel mollitia voluptas tempora eaque
											Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
											<p>Inventore, distinctio esse impedit deleniti, magnam minus culpa quia repellendus eligendi nam, omnis qui odio dolorem autem molestias eveniet tempora rem odit possimus! At ea quidem, ipsa ducimus harum quod neque expedita perferendis, quis odio officiis dicta facere qui architecto! Neque, odio quidem a cum perferendis doloribus iure aut ducimus, eveniet commodi unde consequatur iusto error excepturi perspiciatis cupiditate voluptates ad, minus, magnam voluptatem tempora quae at temporibus incidunt. est reprehenderit, voluptates culpa, numquam minima.</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, eligendi cum officiis sint eveniet omnis eius quo. Et iusto eos dolor ratione nesciunt praesentium eveniet distinctio repellat. Quas, soluta, ipsam.</p>
											<blockquote>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
											</blockquote>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse illum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
											<ul class="list-icons">
												<li><i class="icon-check"></i> Eveniet distinctio repellat</li>
												<li><i class="icon-check"></i> Sdipisicing elit</li>
												<li><i class="icon-check"></i> Sint eveniet omnis eius quo</li>
												<li><i class="icon-check"></i> Dolor ratione nesciunt</li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
										</div>
									</div>
									<footer class="clearfix">
										<ul class="links pull-left">
											<li><i class="fa fa-comment-o pr-5"></i> <a href="#">22 comments</a> |</li>
											<li><i class="fa fa-tags pr-5"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a> </li>
										</ul>
									</footer>
								</article>
								<!-- blogpost end -->

								<!-- comments start -->
								<div class="comments">
									<h2 class="title">There are 3 comments</h2>

									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img src="images/avatar.jpg" alt="avatar">
										</div>
										<div class="comment-content">
											<h3>Comment title</h3>
											<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
											<div class="comment-body clearfix">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
												<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
											</div>
										</div>

										<!-- comment start -->
										<div class="comment clearfix">
											<div class="comment-avatar">
												<img src="images/avatar.jpg" alt="avatar">
											</div>
											<div class="comment-content clearfix">
												<h3>Comment title</h3>
												<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
												<div class="comment-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
													<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
												</div>
											</div>
										</div>
										<!-- comment end -->

									</div>
									<!-- comment end -->

									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img src="images/avatar.jpg" alt="avatar">
										</div>
										<div class="comment-content clearfix">
											<h3>Comment title</h3>
											<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
											<div class="comment-body">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
												<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
											</div>
										</div>
									</div>
									<!-- comment end -->

								</div>
								<!-- comments end -->

								<!-- comments form start -->
								<div class="comments-form">
									<h2 class="title">Add your comment</h2>
									<form role="form" id="comment-form">
										<div class="form-group has-feedback">
											<label for="name4">Name</label>
											<input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
										<div class="form-group has-feedback">
											<label for="subject4">Subject</label>
											<input type="text" class="form-control" id="subject4" placeholder="" name="subject4" required>
											<i class="fa fa-pencil form-control-feedback"></i>
										</div>
										<div class="form-group has-feedback">
											<label for="message4">Message</label>
											<textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
											<i class="fa fa-envelope-o form-control-feedback"></i>
										</div>
										<input type="submit" value="Submit" class="btn btn-default">
									</form>
								</div>
								<!-- comments form end -->

							</div>
							<!-- main end -->

							<?php }}?>

							<!-- sidebar start -->
							<aside class="col-md-3 col-md-offset-1">
								<div class="sidebar">
									<div class="block clearfix">
										<h3 class="title">Sidebar menu</h3>
										<div class="separator"></div>
										<nav>
											<ul class="nav nav-pills nav-stacked">
												<li><a href="index.html">Home</a></li>
												<li class="active"><a href="blog-right-sidebar.html">Blog</a></li>
												<li><a href="portfolio-3col.html">Portfolio</a></li>
												<li><a href="page-about.html">About</a></li>
												<li><a href="page-contact.html">Contact</a></li>
											</ul>
										</nav>
									</div>
									<div class="block clearfix">
										<h3 class="title">Latest tweets</h3>
										<div class="separator"></div>
										<ul class="tweets">
											<li>
												<i class="fa fa-twitter"></i>
												<p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
											</li>
											<li>
												<i class="fa fa-twitter"></i>
												<p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
											</li>
										</ul>
									</div>
									<div class="block clearfix">
										<h3 class="title">Featured Post</h3>
										<div class="separator"></div>
										<div class="image-box">
											<div class="overlay-container">
												<img src="images/blog-sidebar.jpg" alt="">
												<div class="overlay">
													<div class="overlay-links">
														<a href="blog-post.html"><i class="fa fa-link"></i></a>
														<a href="images/blog-sidebar.jpg" class="popup-img-single" title="image title"><i class="fa fa-search-plus"></i></a>
													</div>
												</div>
											</div>
											<div class="image-box-body">
												<h3 class="title"><a href="blog-post.html">Post Title</a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
												<a href="blog-post.html" class="link"><span>Read More</span></a>
											</div>
										</div>
									</div>
									<div class="block clearfix">
										<h3 class="title">Text Sample</h3>
										<div class="separator"></div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, nemo, necessitatibus, expedita voluptate esse ipsam aliquid blanditiis maxime sequi veniam suscipit atque sapiente cum voluptatum quos mollitia laborum? Esse, officia!</p>
									</div>
									<div class="block clearfix">
										<h3 class="title">Testimonial</h3>
										<div class="separator"></div>
										<blockquote class="margin-clear">
											<p>Design is not just what it looks like and feels like. Design is how it works.</p>
											<footer><cite title="Source Title">Steve Jobs </cite></footer>
										</blockquote>
										<blockquote class="margin-clear">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolorem.</p>
											<footer><cite title="Source Title">Steve Doe </cite></footer>
										</blockquote>
									</div>
									<div class="block clearfix">
										<h3 class="title">Portfolio</h3>
										<div class="separator"></div>
										<div class="gallery row">
											<div class="gallery-item col-xs-4">
												<div class="overlay-container">
													<img src="images/gallery-1.jpg" alt="">
													<a href="portfolio-item.html" class="overlay small">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
											<div class="gallery-item col-xs-4">
												<div class="overlay-container">
													<img src="images/gallery-2.jpg" alt="">
													<a href="portfolio-item.html" class="overlay small">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
											<div class="gallery-item col-xs-4">
												<div class="overlay-container">
													<img src="images/gallery-3.jpg" alt="">
													<a href="portfolio-item.html" class="overlay small">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
											<div class="gallery-item col-xs-4">
												<div class="overlay-container">
													<img src="images/gallery-4.jpg" alt="">
													<a href="portfolio-item.html" class="overlay small">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
											<div class="gallery-item col-xs-4">
												<div class="overlay-container">
													<img src="images/gallery-5.jpg" alt="">
													<a href="portfolio-item.html" class="overlay small">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
											<div class="gallery-item col-xs-4">
												<div class="overlay-container">
													<img src="images/gallery-6.jpg" alt="">
													<a href="portfolio-item.html" class="overlay small">
														<i class="fa fa-link"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="block clearfix">
										<h3 class="title">Tags</h3>
										<div class="separator"></div>
										<div class="tags-cloud">
											<div class="tag">
												<a href="#">energy</a>
											</div>
											<div class="tag">
												<a href="#">business</a>
											</div>
											<div class="tag">
												<a href="#">food</a>
											</div>
											<div class="tag">
												<a href="#">fashion</a>
											</div>
											<div class="tag">
												<a href="#">finance</a>
											</div>
											<div class="tag">
												<a href="#">culture</a>
											</div>
											<div class="tag">
												<a href="#">health</a>
											</div>
											<div class="tag">
												<a href="#">sports</a>
											</div>
											<div class="tag">
												<a href="#">life style</a>
											</div>
											<div class="tag">
												<a href="#">books</a>
											</div>
										</div>
									</div>
									<div class="block clearfix">
										<form role="search">
											<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Search">
												<i class="fa fa-search form-control-feedback"></i>
											</div>
										</form>
									</div>
								</div>
							</aside>
							<!-- sidebar end -->

						</div>
					</div>
				</section>
				<!-- main-container end -->











	<!-- main-container start -->
				<!-- ================ -->
				<section class="main-container">

					<div class="container">
						<div class="row">
	<?php

					$blog_style = atom_get_options_key('blog-post-show-style');
					if ($blog_style == 1){
						get_sidebar();
					}else{
						echo "";}

					?>


							<!-- main start -->
							<!-- ================ -->
									<div class="main col-md-8">
	<?php
							if (have_posts() ) {
									// Start the Loop.
									while ( have_posts() ) { the_post();?>
								<!-- page-title start -->
								<!-- ================ -->
								<h1 class="page-title"><?php the_title();?></h1>
								<!-- page-title end -->

								<!-- blogpost start -->
								<article class="clearfix blogpost full">
									<div class="blogpost-body">
										<div class="side">
											<div class="post-info">
												<span class="day">12</span>
												<span class="month">Sept 2014</span>
											</div>
											<div id="affix"><span class="share">Share This</span><div id="share"></div></div>
										</div>
										<div class="blogpost-content">
											<header>
												<div class="submitted"><i class="fa fa-user pr-5"></i> by <a href="#">John Doe</a></div>
											</header>
											<?php
											if(get_post_format() == "gallery"){ ?>
												<?php
																					$gallery_images = atom_get_post_meta_key('gallery-images');
																					$img_list = atom_get_post_gallery_ids($gallery_images);
																					if(count($img_list) > 0){
																			?>
											<div class="owl-carousel content-slider-with-controls">
												<?php  foreach($img_list as $item_id){
																									$attachment_image = wp_get_attachment_image_src($item_id, 'post-thumbnail');
																									$full_image = wp_get_attachment_image_src($item_id, 'full'); ?>

												<div class="overlay-container">
													<img src="<?php echo esc_url($attachment_image[0]); ?>" alt="">
													<a href="<?php echo esc_url($full_image[0]); ?>" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
												</div>

												</div>
												<?php }}}else if(get_post_format() == "audio"){ ?>
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
														}} ?> </div> <?php }else if ( has_post_thumbnail() ) {
														the_post_thumbnail();
													}
													?>


												<!--<div class="overlay-container">
													<img src="images/blog-2.jpg" alt="">
													<a href="images/blog-2.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
												</div>
												<div class="overlay-container">
													<img src="images/blog-3.jpg" alt="">
													<a href="images/blog-3.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
												</div>-->
											</div>
											<?php the_content();?>
										</div>
									</div>
									<footer class="clearfix">
										<ul class="links pull-left">
											<li><i class="fa fa-comment-o pr-5"></i> <a href="#">22 comments</a> |</li>
											<li><i class="fa fa-tags pr-5"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a> </li>
										</ul>
									</footer>
								</article>
								<!-- blogpost end -->
	<?php } ?>

								<!-- comments start -->
								<div class="comments">
									<h2 class="title">There are 3 comments</h2>

									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img src="images/avatar.jpg" alt="avatar">
										</div>
										<div class="comment-content">
											<h3>Comment title</h3>
											<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
											<div class="comment-body clearfix">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
												<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
											</div>
										</div>

										<!-- comment start -->
										<div class="comment clearfix">
											<div class="comment-avatar">
												<img src="images/avatar.jpg" alt="avatar">
											</div>
											<div class="comment-content clearfix">
												<h3>Comment title</h3>
												<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
												<div class="comment-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
													<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
												</div>
											</div>
										</div>
										<!-- comment end -->

									</div>
									<!-- comment end -->

									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img src="images/avatar.jpg" alt="avatar">
										</div>
										<div class="comment-content clearfix">
											<h3>Comment title</h3>
											<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
											<div class="comment-body">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
												<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
											</div>
										</div>
									</div>
									<!-- comment end -->

								</div>
								<!-- comments end -->

								<!-- comments form start -->
								<div class="comments-form">
									<h2 class="title">Add your comment</h2>
									<form role="form" id="comment-form">
										<div class="form-group has-feedback">
											<label for="name4">Name</label>
											<input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
											<i class="fa fa-user form-control-feedback"></i>
										</div>
										<div class="form-group has-feedback">
											<label for="subject4">Subject</label>
											<input type="text" class="form-control" id="subject4" placeholder="" name="subject4" required>
											<i class="fa fa-pencil form-control-feedback"></i>
										</div>
										<div class="form-group has-feedback">
											<label for="message4">Message</label>
											<textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
											<i class="fa fa-envelope-o form-control-feedback"></i>
										</div>
										<input type="submit" value="Submit" class="btn btn-default">
									</form>
								</div>
								<!-- comments form end -->
									<?php }?>
							</div>

							<!-- main end -->
						<?php

					$blog_style = atom_get_options_key('blog-post-show-style');
					if ($blog_style !=1 ){
						get_sidebar();
					}else{
						echo "";}

					?>
						</div>
					</div>
				</section>




		}
		else{




	?>

<?php

		$obj = get_post_type_object( 'post' );
		 $obj->labels->singular_name;

            if (have_posts() ) {
                // Start the Loop.
                while ( have_posts() ) { the_post();?>
	<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-8">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">Blogpost Title</h1>
							<!-- page-title end -->

							<!-- blogpost start -->
							<article class="clearfix blogpost full">
								<div class="blogpost-body">
									<div class="side">
										<div class="post-info">
											<span class="day">12</span>
											<span class="month">Sept 2014</span>
										</div>
										<div id="affix"><span class="share">Share This</span><div id="share"></div></div>
									</div>
									<div class="blogpost-content">
										<header>
											<div class="submitted"><i class="fa fa-user pr-5"></i> by <a href="#">John Doe</a></div>
										</header>
										<?php
										if(get_post_format() == "gallery"){ ?>
											<?php
				                                $gallery_images = atom_get_post_meta_key('gallery-images');
				                                $img_list = atom_get_post_gallery_ids($gallery_images);
				                                if(count($img_list) > 0){
				                            ?>
										<div class="owl-carousel content-slider-with-controls">
											<?php  foreach($img_list as $item_id){
                                                $attachment_image = wp_get_attachment_image_src($item_id, 'post-thumbnail');
                                                $full_image = wp_get_attachment_image_src($item_id, 'full'); ?>

											<div class="overlay-container">
												<img src="<?php echo esc_url($attachment_image[0]); ?>" alt="">
												<a href="<?php echo esc_url($full_image[0]); ?>" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
											</div>

											</div>
											<?php }}}else if(get_post_format() == "audio"){ ?>
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
													}} ?> </div> <?php }else if ( has_post_thumbnail() ) {
													the_post_thumbnail();
												}
												?>
										<p>Amet culpa, accusamus. Temporibus animi, consequatur cumque natus, esse consequuntur voluptatibus deleniti necessitatibus autem architecto quaerat tenetur nobis, ea maxime saepe rem doloribus placeat aliquid quod, id fuga ratione error harum ex! Facere vero veniam ducimus nulla sed possimus nobis nisi maiores quibusdam, nam odit quos dolores laborum pariatur distinctio in ex culpa impedit. Corrupti sequi perferendis atque nam debitis ea sunt, vel mollitia voluptas tempora eaque
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
										<p>Inventore, distinctio esse impedit deleniti, magnam minus culpa quia repellendus eligendi nam, omnis qui odio dolorem autem molestias eveniet tempora rem odit possimus! At ea quidem, ipsa ducimus harum quod neque expedita perferendis, quis odio officiis dicta facere qui architecto! Neque, odio quidem a cum perferendis doloribus iure aut ducimus, eveniet commodi unde consequatur iusto error excepturi perspiciatis cupiditate voluptates ad, minus, magnam voluptatem tempora quae at temporibus incidunt. est reprehenderit, voluptates culpa, numquam minima.</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, eligendi cum officiis sint eveniet omnis eius quo. Et iusto eos dolor ratione nesciunt praesentium eveniet distinctio repellat. Quas, soluta, ipsam.</p>
										<blockquote>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
										</blockquote>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse illum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
										<ul class="list-icons">
											<li><i class="icon-check"></i> Eveniet distinctio repellat</li>
											<li><i class="icon-check"></i> Sdipisicing elit</li>
											<li><i class="icon-check"></i> Sint eveniet omnis eius quo</li>
											<li><i class="icon-check"></i> Dolor ratione nesciunt</li>
										</ul>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
									</div>
								</div>
								<footer class="clearfix">
									<ul class="links pull-left">
										<li><i class="fa fa-comment-o pr-5"></i> <a href="#">22 comments</a> |</li>
										<li><i class="fa fa-tags pr-5"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a> </li>
									</ul>
								</footer>
							</article>
							<!-- blogpost end -->

							<!-- comments start -->
							<div class="comments">
								<h2 class="title">There are 3 comments</h2>

								<!-- comment start -->
								<div class="comment clearfix">
									<div class="comment-avatar">
										<img src="images/avatar.jpg" alt="avatar">
									</div>
									<div class="comment-content">
										<h3>Comment title</h3>
										<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
										<div class="comment-body clearfix">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
											<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
										</div>
									</div>

									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img src="images/avatar.jpg" alt="avatar">
										</div>
										<div class="comment-content clearfix">
											<h3>Comment title</h3>
											<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
											<div class="comment-body">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
												<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
											</div>
										</div>
									</div>
									<!-- comment end -->

								</div>
								<!-- comment end -->

								<!-- comment start -->
								<div class="comment clearfix">
									<div class="comment-avatar">
										<img src="images/avatar.jpg" alt="avatar">
									</div>
									<div class="comment-content clearfix">
										<h3>Comment title</h3>
										<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
										<div class="comment-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
											<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
										</div>
									</div>
								</div>
								<!-- comment end -->

							</div>
							<!-- comments end -->

							<!-- comments form start -->
							<div class="comments-form">
								<h2 class="title">Add your comment</h2>
								<form role="form" id="comment-form">
									<div class="form-group has-feedback">
										<label for="name4">Name</label>
										<input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="subject4">Subject</label>
										<input type="text" class="form-control" id="subject4" placeholder="" name="subject4" required>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="message4">Message</label>
										<textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
										<i class="fa fa-envelope-o form-control-feedback"></i>
									</div>
									<input type="submit" value="Submit" class="btn btn-default">
								</form>
							</div>
							<!-- comments form end -->

						</div>
						<!-- main end -->

						<?php }}?>

						<!-- sidebar start -->
						<aside class="col-md-3 col-md-offset-1">
							<div class="sidebar">
								<div class="block clearfix">
									<h3 class="title">Sidebar menu</h3>
									<div class="separator"></div>
									<nav>
										<ul class="nav nav-pills nav-stacked">
											<li><a href="index.html">Home</a></li>
											<li class="active"><a href="blog-right-sidebar.html">Blog</a></li>
											<li><a href="portfolio-3col.html">Portfolio</a></li>
											<li><a href="page-about.html">About</a></li>
											<li><a href="page-contact.html">Contact</a></li>
										</ul>
									</nav>
								</div>
								<div class="block clearfix">
									<h3 class="title">Latest tweets</h3>
									<div class="separator"></div>
									<ul class="tweets">
										<li>
											<i class="fa fa-twitter"></i>
											<p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
										</li>
										<li>
											<i class="fa fa-twitter"></i>
											<p><a href="#">@lorem</a> ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, aliquid, et molestias nesciunt <a href="#">http://t.co/dzLEYGeEH9</a>.</p><span>16 hours ago</span>
										</li>
									</ul>
								</div>
								<div class="block clearfix">
									<h3 class="title">Featured Post</h3>
									<div class="separator"></div>
									<div class="image-box">
										<div class="overlay-container">
											<img src="images/blog-sidebar.jpg" alt="">
											<div class="overlay">
												<div class="overlay-links">
													<a href="blog-post.html"><i class="fa fa-link"></i></a>
													<a href="images/blog-sidebar.jpg" class="popup-img-single" title="image title"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
										</div>
										<div class="image-box-body">
											<h3 class="title"><a href="blog-post.html">Post Title</a></h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
											<a href="blog-post.html" class="link"><span>Read More</span></a>
										</div>
									</div>
								</div>
								<div class="block clearfix">
									<h3 class="title">Text Sample</h3>
									<div class="separator"></div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, nemo, necessitatibus, expedita voluptate esse ipsam aliquid blanditiis maxime sequi veniam suscipit atque sapiente cum voluptatum quos mollitia laborum? Esse, officia!</p>
								</div>
								<div class="block clearfix">
									<h3 class="title">Testimonial</h3>
									<div class="separator"></div>
									<blockquote class="margin-clear">
										<p>Design is not just what it looks like and feels like. Design is how it works.</p>
										<footer><cite title="Source Title">Steve Jobs </cite></footer>
									</blockquote>
									<blockquote class="margin-clear">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolorem.</p>
										<footer><cite title="Source Title">Steve Doe </cite></footer>
									</blockquote>
								</div>
								<div class="block clearfix">
									<h3 class="title">Portfolio</h3>
									<div class="separator"></div>
									<div class="gallery row">
										<div class="gallery-item col-xs-4">
											<div class="overlay-container">
												<img src="images/gallery-1.jpg" alt="">
												<a href="portfolio-item.html" class="overlay small">
													<i class="fa fa-link"></i>
												</a>
											</div>
										</div>
										<div class="gallery-item col-xs-4">
											<div class="overlay-container">
												<img src="images/gallery-2.jpg" alt="">
												<a href="portfolio-item.html" class="overlay small">
													<i class="fa fa-link"></i>
												</a>
											</div>
										</div>
										<div class="gallery-item col-xs-4">
											<div class="overlay-container">
												<img src="images/gallery-3.jpg" alt="">
												<a href="portfolio-item.html" class="overlay small">
													<i class="fa fa-link"></i>
												</a>
											</div>
										</div>
										<div class="gallery-item col-xs-4">
											<div class="overlay-container">
												<img src="images/gallery-4.jpg" alt="">
												<a href="portfolio-item.html" class="overlay small">
													<i class="fa fa-link"></i>
												</a>
											</div>
										</div>
										<div class="gallery-item col-xs-4">
											<div class="overlay-container">
												<img src="images/gallery-5.jpg" alt="">
												<a href="portfolio-item.html" class="overlay small">
													<i class="fa fa-link"></i>
												</a>
											</div>
										</div>
										<div class="gallery-item col-xs-4">
											<div class="overlay-container">
												<img src="images/gallery-6.jpg" alt="">
												<a href="portfolio-item.html" class="overlay small">
													<i class="fa fa-link"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="block clearfix">
									<h3 class="title">Tags</h3>
									<div class="separator"></div>
									<div class="tags-cloud">
										<div class="tag">
											<a href="#">energy</a>
										</div>
										<div class="tag">
											<a href="#">business</a>
										</div>
										<div class="tag">
											<a href="#">food</a>
										</div>
										<div class="tag">
											<a href="#">fashion</a>
										</div>
										<div class="tag">
											<a href="#">finance</a>
										</div>
										<div class="tag">
											<a href="#">culture</a>
										</div>
										<div class="tag">
											<a href="#">health</a>
										</div>
										<div class="tag">
											<a href="#">sports</a>
										</div>
										<div class="tag">
											<a href="#">life style</a>
										</div>
										<div class="tag">
											<a href="#">books</a>
										</div>
									</div>
								</div>
								<div class="block clearfix">
									<form role="search">
										<div class="form-group has-feedback">
											<input type="text" class="form-control" placeholder="Search">
											<i class="fa fa-search form-control-feedback"></i>
										</div>
									</form>
								</div>
							</div>
						</aside>
						<!-- sidebar end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->











<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">
<?php

				$blog_style = atom_get_options_key('blog-post-show-style');
				if ($blog_style == 1){
					get_sidebar();
				}else{
					echo "";}

				?>


						<!-- main start -->
						<!-- ================ -->
					    	<div class="main col-md-8">
<?php
            if (have_posts() ) {
                // Start the Loop.
                while ( have_posts() ) { the_post();?>
							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title"><?php the_title();?></h1>
							<!-- page-title end -->

							<!-- blogpost start -->
							<article class="clearfix blogpost full">
								<div class="blogpost-body">
									<div class="side">
										<div class="post-info">
											<span class="day">12</span>
											<span class="month">Sept 2014</span>
										</div>
										<div id="affix"><span class="share">Share This</span><div id="share"></div></div>
									</div>
									<div class="blogpost-content">
										<header>
											<div class="submitted"><i class="fa fa-user pr-5"></i> by <a href="#">John Doe</a></div>
										</header>
										<?php
										if(get_post_format() == "gallery"){ ?>
											<?php
				                                $gallery_images = atom_get_post_meta_key('gallery-images');
				                                $img_list = atom_get_post_gallery_ids($gallery_images);
				                                if(count($img_list) > 0){
				                            ?>
										<div class="owl-carousel content-slider-with-controls">
											<?php  foreach($img_list as $item_id){
                                                $attachment_image = wp_get_attachment_image_src($item_id, 'post-thumbnail');
                                                $full_image = wp_get_attachment_image_src($item_id, 'full'); ?>

											<div class="overlay-container">
												<img src="<?php echo esc_url($attachment_image[0]); ?>" alt="">
												<a href="<?php echo esc_url($full_image[0]); ?>" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
											</div>

											</div>
											<?php }}}else if(get_post_format() == "audio"){ ?>
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
													}} ?> </div> <?php }else if ( has_post_thumbnail() ) {
													the_post_thumbnail();
												}
												?>


											<!--<div class="overlay-container">
												<img src="images/blog-2.jpg" alt="">
												<a href="images/blog-2.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
											</div>
											<div class="overlay-container">
												<img src="images/blog-3.jpg" alt="">
												<a href="images/blog-3.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
											</div>-->
										</div>
										<?php the_content();?>
									</div>
								</div>
								<footer class="clearfix">
									<ul class="links pull-left">
										<li><i class="fa fa-comment-o pr-5"></i> <a href="#">22 comments</a> |</li>
										<li><i class="fa fa-tags pr-5"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a> </li>
									</ul>
								</footer>
							</article>
							<!-- blogpost end -->
<?php } ?>

							<!-- comments start -->
							<div class="comments">
								<h2 class="title">There are 3 comments</h2>

								<!-- comment start -->
								<div class="comment clearfix">
									<div class="comment-avatar">
										<img src="images/avatar.jpg" alt="avatar">
									</div>
									<div class="comment-content">
										<h3>Comment title</h3>
										<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
										<div class="comment-body clearfix">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
											<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
										</div>
									</div>

									<!-- comment start -->
									<div class="comment clearfix">
										<div class="comment-avatar">
											<img src="images/avatar.jpg" alt="avatar">
										</div>
										<div class="comment-content clearfix">
											<h3>Comment title</h3>
											<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
											<div class="comment-body">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
												<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
											</div>
										</div>
									</div>
									<!-- comment end -->

								</div>
								<!-- comment end -->

								<!-- comment start -->
								<div class="comment clearfix">
									<div class="comment-avatar">
										<img src="images/avatar.jpg" alt="avatar">
									</div>
									<div class="comment-content clearfix">
										<h3>Comment title</h3>
										<div class="comment-meta">By <a href="#">admin</a> | Today, 12:31</div>
										<div class="comment-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
											<a href="blog-post.html" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
										</div>
									</div>
								</div>
								<!-- comment end -->

							</div>
							<!-- comments end -->

							<!-- comments form start -->
							<div class="comments-form">
								<h2 class="title">Add your comment</h2>
								<form role="form" id="comment-form">
									<div class="form-group has-feedback">
										<label for="name4">Name</label>
										<input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="subject4">Subject</label>
										<input type="text" class="form-control" id="subject4" placeholder="" name="subject4" required>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="message4">Message</label>
										<textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
										<i class="fa fa-envelope-o form-control-feedback"></i>
									</div>
									<input type="submit" value="Submit" class="btn btn-default">
								</form>
							</div>
							<!-- comments form end -->
						    <?php }?>
						</div>

						<!-- main end -->
					<?php

				$blog_style = atom_get_options_key('blog-post-show-style');
				if ($blog_style !=1 ){
					get_sidebar();
				}else{
					echo "";}

				?>
					</div>
				</div>
			</section>
			<?php } ?>
			<!-- main-container end -->
<?php get_footer();?>
