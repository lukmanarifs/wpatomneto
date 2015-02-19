<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
	<?php die('You can not access this page directly!'); ?>
<?php endif; ?>

<div class="row">
	<div class="col-md-12">
		<div class="w-box blog-post">		
		<div class="comments-wr">				
			
<?php if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.','atom'); ?></p>
    
	<?php return; } ?>

<?php if (have_comments()) : ?>
	<h3 class="section-title"><?php comments_number('No comments', 'One comment', '% comments'); ?></h3>
	<?php wp_list_comments( 'type=comment&callback=atomlabs_comment' ); ?>
	

    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments','atom' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;','atom', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

<?php else : ?>
	<p>No comments yet</p>
<?php endif; ?>

<?php if (comments_open()) : ?>
<div class="w-box w-box-inverse inner">
			<div class="comment-form">
				<h3 class="section-title">Add you comment</h3>
				
	<?php if(get_option('comment_registration') && !$user_ID) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	
	<?php else : ?>
	<form class="form-light" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<div class="row">
			<?php if($user_ID) : ?>			
				<div class="col-md-12">
				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
					<div class="form-group">
						<label>Comment</label>
						<textarea name="comment" id="comment" class="form-control" placeholder="Write your comment here" style="min-height:185px;"></textarea>
					</div>
				</div>
			<?php else : ?>
				<div class="col-md-5">
					<div class="form-group">
						<label>Name <?php if($req) echo "*"; ?></label>
						<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="form-control" placeholder="">
					</div>
					<div class="form-group">
						<label>Email <?php if($req) echo "*"; ?></label>
						<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="form-control" placeholder="">
					</div>
					<div class="form-group">
						<label>Website</label>
						<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="form-control" placeholder="">
					</div>
				</div>			
				<div class="col-md-7">
					<div class="form-group">
						<label>Comment</label>
						<textarea name="comment" id="comment" class="form-control" placeholder="Write your comment here" style="min-height:185px;"></textarea>
					</div>
				</div>
			<?php endif; ?>
		</div>   
		<div class="row">
			<div class="col-md-8">
			Your email address will not be published. Required fields are marked *
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<?php do_action('comment_form', $post->ID); ?>
			</div>
			<div class="col-md-4">
				<button name="submit" type="submit" id="submit" class="btn btn-two pull-right" ><i class="fa fa-comment-o"></i> Send Comment</button>
			</div>
		</div>     
	</form>
	<?php endif; ?>
	
	
			</div>
		</div>	
    <?php endif; ?>
				
			</div>
		</div>		
		
	</div>
</div>