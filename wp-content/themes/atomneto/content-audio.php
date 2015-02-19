<?php
/**
 * Audio Post Content
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
    	<div class="post-type"><i class="fa fa-music"></i></div>
    </aside>
	<section class="post-content">
		<?php
		   $audio_type 		= atom_get_post_meta_key('audio-type');
		   $audio_content 	= atom_get_post_meta_key('audio-content');
		   if($audio_content && $audio_content != ''){
		?>
        <div class="post-element-content">
        	<div class="post-audio">
			<?php
               if(intval($audio_type) == 0){
                 echo do_shortcode('[soundcloud url="'.$audio_content.'"]');
               }else{
                   echo $audio_content;
               }
            ?>
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
    	<?php
		   $audio_type 		= atom_get_post_meta_key('audio-type');
		   $audio_content 	= atom_get_post_meta_key('audio-content');
		   if($audio_content && $audio_content != ''){
		?>
        <div class="post-element-content">
        	<div class="post-audio">
			<?php
               if(intval($audio_type) == 0){
                 echo do_shortcode('[soundcloud url="'.$audio_content.'"]');
               }else{
                   echo $audio_content;
               }
            ?>
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