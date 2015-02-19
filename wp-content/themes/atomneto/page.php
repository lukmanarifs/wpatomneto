<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since ATOM 1.0
 */
get_header();

// get page layout
$layout = atom_get_page_layout(); 
?>
<div id="main" class="entry-content container">
	<div class="row">
    	<?php if($layout == 2) { ?> 
            <aside class="col-md-3 col-sm-4"><?php generated_dynamic_sidebar(); ?></aside>
        <?php } ?>
        
        <section class="<?php echo $layout == 1 ? 'col-md-12 col-sm-12' : 'col-md-9 col-sm-8'; ?>">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, this page does not exist.' , 'atom' ); ?></p>
            <?php endif; ?>
        </section>
        <?php if($layout == 3) { ?> 
            <aside class="col-md-3 col-sm-4"><?php generated_dynamic_sidebar(); ?></aside>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>