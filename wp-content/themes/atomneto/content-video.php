<?php
/**
 * Video Post Content
 *
 * @since ATOM 1.0
 */
 global $blog_style;
 
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-entry animate blog-style-'.(intval($blog_style)+1)); ?> data-effect="fadeInUp" itemscope itemtype="http://schema.org/Article">
	<?php if(intval($blog_style) == 0){ ?>
    <aside class="post-date-type"> 
    	<div class="date entry-date updated" itemprop="datePublished">
        	<div class="day"><?php echo esc_html( get_the_date('d') ); ?></div>
            <div class="month-year"><?php echo esc_html( get_the_date('M').', '.get_the_date('Y') ); ?></div>
        </div>
    	<div class="post-type"><i class="fa fa-film"></i></div>
    </aside>
	<section class="post-content">
       <?php
			$video_type		= atom_get_post_meta_key('video-type');
			$video_content	= atom_get_post_meta_key('video-content');
			if($video_content && $video_content != ''){
		?>
        	<div class="post-element-content">
                <div class="post-video">
                <?php
                    if(intval($video_type) == 0){
                        echo do_shortcode('[youtube id="'.$video_content.'" width="100%" height="300"]');
                    }else if(intval($video_type) == 1){
                        echo do_shortcode('[vimeo id="'.$video_content.'" width="100%" height="300"]');
                    }else{
                       echo $video_content;
                    }
                ?>
                </div>
            </div>
		<?php
			}
		?>
        <header class="entry-header">
        	<?php the_title( '<h3 class="entry-title" itemprop="name"><a href="' . esc_url( get_permalink() ) . '" itemprop="url">', '</a></h3>' ); ?>
            <div class="entry-meta">
                <?php atom_posted_on(); ?>
            </div>
        </header><!-- .entry-header -->
        <div class="entry-summary" itemprop="articleSection">
		<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
        <?php echo '<a class="more-link btn btn-border" href="'.esc_url( get_permalink() ).'">'.__('Read More','atom').'</a>'; ?>
    </section>
    <?php }else{ ?>
    <div class="row">
    <aside class="col-md-4 col-sm-6"> 
    	<?php
			$video_type		= atom_get_post_meta_key('video-type', true);
			$video_content	= atom_get_post_meta_key('video-content', true);
			if($video_content && $video_content != ''){
		?>
        	<div class="post-element-content">
                <div class="post-video">
                <?php
                    if(intval($video_type) == 0){
                        echo do_shortcode('[youtube id="'.$video_content.'" width="100%" height="300"]');
                    }else if(intval($video_type) == 1){
                        echo do_shortcode('[vimeo id="'.$video_content.'" width="100%" height="300"]');
                    }else{
                       echo $video_content;
                    }
                ?>
                </div>
            </div>
		<?php
			}
		?>	
    </aside>
	<section class="post-content col-md-8 col-sm-6">
        <header class="entry-header">
        	<span class="entry-date"><i class="fa fa-clock-o"></i><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><time class="entry-date updated" itemprop="datePublished" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></a></span>
        	<?php the_title( '<h3 class="entry-title" itemprop="name"><a href="' . esc_url( get_permalink() ) . '" itemprop="url">', '</a></h3>' ); ?>
            <div class="entry-meta">
                <?php atom_posted_on(); ?>
            </div>
        </header><!-- .entry-header -->
        <div class="entry-summary" itemprop="articleSection">
		<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
        <?php echo '<a class="more-link btn btn-border" href="'.esc_url( get_permalink() ).'">'.__('Read More','atom').'</a>'; ?>
    </section>
    </div>
    <?php } ?>
</article>