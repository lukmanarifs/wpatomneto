<?php
/**
 * The template for displaying image attachments.
 *
 * @package atom
 * @since atom 1.0
 * @license GPL 2.0
 */

get_header();
?>

<div id="primary" class="content-area image-attachment">
	<div id="content" class="site-content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-meta">
					<?php echo atom_posted_on() ?>
				</div><!-- .entry-meta -->

				<nav id="image-navigation" class="site-navigation">
					<span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'atom' ) ); ?></span>
					<span class="next-image"><?php next_image_link( false, __( 'Next &rarr;', 'atom' ) ); ?></span>
				</nav><!-- #image-navigation -->
			</header><!-- .entry-header -->

			<div class="entry-content">

				<div class="entry-attachment">
					<div class="attachment">
						<?php $next_attachment_url = atom_next_attachment_url(); ?>

						<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment">
							<?php
							$attachment_size = apply_filters( 'atom_attachment_size', array( 1200, 1200 ) ); // Filterable image size.
							echo wp_get_attachment_image( $post->ID, $attachment_size );
							?>
						</a>
					</div><!-- .attachment -->

					<?php if ( ! empty( $post->post_excerpt ) ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div><!-- .entry-caption -->
					<?php endif; ?>
				</div><!-- .entry-attachment -->

			</div><!-- .entry-content -->

		</article><!-- #post-<?php the_ID(); ?> -->

		<?php comments_template(); ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area .image-attachment -->

<?php get_footer(); ?>