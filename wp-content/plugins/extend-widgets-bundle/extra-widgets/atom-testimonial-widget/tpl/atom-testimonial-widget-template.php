<div class="owl-carousel content-slider">
					<div class="testimonial">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<h2 class="title"><?php echo $instance['testi_title'];?></h2>
									<div class="testimonial-image">
										<img src="<?php wp_get_attachment_image_src($instance['testi_image']);?>" alt="<?php echo $instance['testi_title'];?>" title="<?php echo $instance['testi_title'];?>" class="img-circle">
									</div>
									<div class="testimonial-body">
										<p><?php echo $instance['testi_desc'];?></p>
										<div class="testimonial-info-1">- <?php echo $instance['testi_name'];?></div>
										<div class="testimonial-info-2"><?php echo $instance['testi_company'];?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="testimonial">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<h2 class="title"><?php echo $instance['testi_title'];?></h2>
									<div class="testimonial-image">
										<img src="<?php echo $instance['testi_image'];?>" alt="<?php echo $instance['testi_title'];?>" title="<?php echo $instance['testi_title'];?>" class="img-circle">
									</div>
									<div class="testimonial-body">
										<p><?php echo $instance['testi_desc'];?></p>
										<div class="testimonial-info-1">- <?php echo $instance['testi_name'];?></div>
										<div class="testimonial-info-2"><?php echo $instance['testi_company'];?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
