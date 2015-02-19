			<?php do_action( 'atom_main_bottom' ); ?>
		</div><!-- .full-container -->
	</div><!-- #main .site-main -->

	<?php do_action( 'atom_after_main_container' ); ?>

	<?php do_action( 'atom_before_footer' ); ?>

	<?php get_template_part( 'parts/footer', apply_filters( 'atom_footer_type', '' ) ); ?>

	<?php do_action( 'atom_after_footer' ); ?>

</div><!-- #page-wrapper -->

<?php do_action('atom_after_page_wrapper') ?>

<?php wp_footer(); ?>

</body>
</html>