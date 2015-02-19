<?php
/**
 * Image Post Content
 *
 * @since ATOM 1.0
 */
 
 global $blog_style;
 
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-entry animate blog-style-'.(intval($blog_style)+1)); ?> data-effect="fadeInUp" itemscope itemtype="http://schema.org/Article">
	<?php if(intval($blog_style) == 0) { ?>
	<aside class="post-date-type">
    	<div class="date entry-date updated" itemprop="datePublished">
        	<div class="day"><?php echo esc_html( get_the_date('d') ); ?></div>
            <div class="month-year"><?php echo esc_html( get_the_date('M').', '.get_the_date('Y') ); ?></div>
        </div>
    	<div class="post-type"><i class="fa fa-picture-o"></i></div>
    </aside>
	<section class="post-content">
		<?php if(has_post_thumbnail(get_the_ID())) { ?>
        	<div class="post-element-content">
                <div class="post-img">
                	<a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php 
					echo get_the_post_thumbnail(get_the_ID(), "post-thumbnail" , array('alt' => get_the_title(),'title' => ''));
                    $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
					?>
                    </a>
                    <div class="post-tip">
                        <div class="bg"></div>
                        <a href="<?php echo esc_url(get_permalink()); ?>"><span class="pop-link-icon"><i class="fa fa-chain"></i></span></a>
                    	<a class="fancyBox" href="<?php echo esc_url($full_image[0]); ?>"><span class="pop-preview-icon"><i class="fa fa-search-plus"></i></span></a>
                    </div>
                </div>
            </div>
        <?php } ?>
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
    	<?php if(has_post_thumbnail(get_the_ID())) { ?>
        	<div class="post-element-content">
                <div class="post-img">
                	<a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php 
					echo get_the_post_thumbnail(get_the_ID(), "post-thumbnail" , array('alt' => get_the_title(),'title' => ''));
					 $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
					?>
                    </a>
                    <div class="post-tip">
                        <div class="bg"></div>
                        <a href="<?php echo esc_url(get_permalink()); ?>"><span class="pop-link-icon"><i class="fa fa-chain"></i></span></a>
                    	<a class="fancyBox" href="<?php echo esc_url($full_image[0]); ?>"><span class="pop-preview-icon"><i class="fa fa-search-plus"></i></span></a>
                    </div>
                </div>
            </div>
        <?php } ?>
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