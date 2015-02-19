<?php
/**
 * Part Name: Default Footer
 */
?>
<footer id="colophon" class="site-footer" role="contentinfo">

	<div id="footer-widgets" class="full-container">
		<?php if(!dynamic_sidebar( 'sidebar-footer' )) :?>
		<style>#footer-widgets .widget {width: 33.3%;}</style>
		<aside id="shortcodes-ultimate-2" class="widget shortcodes-ultimate"><h3 class="widget-title">About Us</h3><div class="textwidget"><div class="su-quote su-quote-style-default"><div class="su-quote-inner su-clearfix">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue velit eu purus volutpat, id tempor mauris fermentum. Praesent venenatis lectus at ligula suscipit viverra.n luctus tempus tellus, at porttitor nunc ornare non. Quisque vitae augue imperdiet, fermentum nisl eget, mollis lacus.</div></div></div></aside><aside id="text-2" class="widget widget_text"><h3 class="widget-title">Be The First To Know About Us</h3>			<div class="textwidget"><form method="post" class="bftpro-front-form" onsubmit="return validateBFTProUser(this,true);">
	<div><label>*Your Name:</label> <input type="text" name="bftpro_name"></div>
	<div><label>*Your Email:</label> <input type="text" name="email"></div>		
	
			
		
		
	<div><br>
		<input type="submit" value="Subscribe">		
	</div>
	<input type="hidden" name="bftpro_subscribe" value="1">
			<input type="hidden" name="list_id" value="14">
		
	<input type="hidden" name="required_fields[]" value="">
</form></div>
		</aside><aside id="shortcodes-ultimate-3" class="widget shortcodes-ultimate"><h3 class="widget-title">Office</h3><div class="textwidget"><div class="su-gmap su-responsive-media-yes"><iframe width="350" height="250" src="http://maps.google.com/maps?q=KARAH+TERA%2C+Surabaya&amp;output=embed"></iframe></div></div></aside>
	
	<?php endif;?>
	</div><!-- #footer-widgets -->
	<?php $site_info_text = apply_filters('atom_site_info', atomlabs_setting('general_site_info_text') ); if( !empty($site_info_text) ) : ?>
		<div id="site-info">
			<?php echo wp_kses_post($site_info_text) ?>
		</div><!-- .site-info -->
	<?php endif; ?>

</footer><!-- #colophon .site-footer -->