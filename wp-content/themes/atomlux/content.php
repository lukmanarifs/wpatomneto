<?php
/**
 * Displays 
 * 
 * @package atom
 * @since atom 1.0
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_thumbnail() && atomlabs_setting('blog_featured_image_type') == 'icon' ): ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumbnail' ) ?></a>
		</div>
	<?php endif; ?>

	<div class="entry-main">

		<?php do_action('atom_entry_main_top') ?>

		<header class="entry-header">
			<?php if( atomlabs_setting('blog_featured_image_type') == 'large' ): ?>
				<?php atomlabs_show_featured();?>
			<?php endif; ?>

			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'atom' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php atom_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>

		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php if(atomlabs_setting('blog_archive_content') == 'excerpt') the_excerpt(); else the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'atom' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'atom' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

		<?php do_action('atom_entry_main_bottom') ?>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
