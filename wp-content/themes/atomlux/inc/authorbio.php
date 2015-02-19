<?php if(!defined('ABSPATH')){exit;}
if(is_page() AND get_post_type() == 'page'):
$authorbio = atomlabs_setting( 'authorbiopage' );
elseif(is_single() AND get_post_type() == 'post'):
$authorbio = atomlabs_setting( 'authorbiosingle' );
endif;
if($authorbio==1):
?>
<aside class="row">
<div class="col-md-12">
<div id="cbp-qtrotator-" class="cbp-qtrotator">			
	<div class="cbp-qtcontent cbp-qtcurrent vcard">
		<a href="<?php the_permalink();?>#content" class="url">
			<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '150' ); }?>
		</a>					
			<blockquote>
				<p class="bigquote">
					<i class="fa fa-quote-left colortext quoteicon"></i> 
				<strong><?php printf ( __( 'About' , 'atom' ));?> "<span itemprop="itemreviewed"><?php the_title(); ?></span>"</strong>
			<?php _e('Reviewed By', 'atom');?> <span itemprop="reviewer" class="author"><span class="fn"><?php the_author(); ?></span></span>
             <span itemprop="summary"><?php _e('This Is Article About', 'atom');?> <a href="http://en.wikipedia.org/w/index.php?search=<?php the_title();?>" title="<?php the_title(); ?>"><span style="text-decoration:underline"><?php the_title(); ?></span></a></span> <?php _e('was posted on', 'atom');?> <time itemprop="dtreviewed" datetime="<?php the_date('F j, Y'); ?>"><span class="updated"><?php the_time('l, F jS, Y') ?></span></time> <?php _e('have', 'atom');?> <span itemprop="rating"><?php echo rand(4,5);?> <?php _e('stars rating', 'atom');?></span>.	<?php the_author_description();?>
				</p>
			</blockquote>
	</div>
</div>

</div>
</aside>
<?php endif;?>