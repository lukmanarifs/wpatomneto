<?php get_header();

$blog_style = atom_get_options_key('blog-post-show-style');
				if ($blog_style == 3){
					 get_template_part("template/blog","masonry");
				}else if($blog_style == 4){
					get_template_part("template/blog","masonry-sidebar");
				}else if($blog_style == 5){
					get_template_part("template/blog","timeline");
				}else{?>

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
						<div class="main col-md-8 col-md-offset-1">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">Blog</h1>
							<div class="separator-2"></div>
							<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas nulla suscipit <br class="hidden-sm hidden-xs"> unde rerum mollitia dolorum.</p>
							<!-- page-title end -->

							 <?php 
								while ( have_posts() ) {
									the_post();
							?>
								<?php get_template_part( 'loop'); ?>
							<?php } ?>

							<!-- pagination start -->
							<ul class="pagination">
								<li><a href="#">�</a></li>
								<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">�</a></li>
							</ul>
							<!-- pagination end -->

						</div>
						<!-- main end -->
						<?php if ($blog_style == 0){
							get_sidebar();
						}else{
							echo "";}?>
					</div>
				</div>
			</section>
			
			
			<?php }?>
			<!-- main-container end -->
<?php get_footer();?>