<?php if(!defined('ABSPATH')){exit;}
if(is_page() AND get_post_type() == 'page'):
$typecomment = atomlabs_setting( 'typecommentpage' );
 $disqusname = atomlabs_setting( 'disqusnamepage' );
elseif(is_single() AND get_post_type() == 'post'):
$typecomment = atomlabs_setting( 'typecommentsingle' );
$disqusname = atomlabs_setting( 'disqusname' );
endif;
?>
<?php if($typecomment != 'off' AND $typecomment !=NULL ):?>
<aside class="row">
<div class="col-md-12">
	<div class="panel panel-default">

 <?php if($typecomment == 'googlep'):?>

<div id="googlepluscommentsarea">
<script type="text/javascript">	
  window.___gcfg = {lang: 'en'};(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();
</script>
	
    <script type="text/javascript">
        var w=document.getElementById('googlepluscommentsarea').offsetWidth;
            document.write('<g:comments href="<?php the_permalink();?>" width="'+w+'" height="50" first_party_property="BLOGGER" view_type="FILTERED_POSTMOD"></g:comments>');
    </script>
</div>	


 <?php elseif($typecomment == 'facebook'):?>
 <div id="comments" class="comments-area">
<div class="fb-comments" data-href="<?php the_permalink();?>" data-width="720"></div>
</div>

 <?php elseif($typecomment == 'disqus'):
 ?>
<div id="disqus_thread"></div>
        						<script type="text/javascript">
            						/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            						var disqus_shortname = "<?php echo $disqusname;?>"; // required: replace example with your forum shortname

						            /* * * DON'T EDIT BELOW THIS LINE * * */
            						(function() {
                						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                						dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            						})();
        						</script>
        						<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        						<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
							


<?php elseif($typecomment == 'wp'):?>
		<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
			<?php comments_template( '', true ); ?>
		<?php endif; ?>
<?php endif;?>


	
</div></div></aside>	
<?php endif;?>