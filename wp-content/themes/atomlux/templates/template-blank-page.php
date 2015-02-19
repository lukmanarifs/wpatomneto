<?php
/**
 * This template displays full width pages with a page title.
 *
 * @package atom
 * @since atom 1.0
 * @license GPL 2.0
 * 
 * Template Name: Blank Page for Page Builder
 */

get_header(); ?>

<div class="content-area">
	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-main">

					<?php do_action('atom_entry_main_top') ?>

					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'atom' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'atom' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<?php do_action('atom_entry_main_bottom') ?>

				</div>

			</article><!-- #post-<?php the_ID(); ?> -->

			

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>