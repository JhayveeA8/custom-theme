<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( comments_open() ) : ?>

<div id="respond" class="col-md-10 col-md-offset-1">

	<h3 class="text-center"><?php comment_form_title( 'Post A Comment', 'Leave a Reply to %s' ); ?></h3>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<?php else : ?>

			<div class="form-group">
				<div class="col-sm-3 text-right">
					<label for="author">Use Your Real Name</label>
				</div>
				<div class="col-sm-3">
					<div class="row">
						<input class="form-control" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> placeholder="Name" />	
					</div>				
				</div>
				<div class="col-sm-3 pull-right">
					<label for="email">Email Will not published</label>					
				</div>
				<div class="col-sm-3">
					<div class="row">
						<input class="form-control" type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="Email" />					
					</div>
				</div>
			</div>

			<!--<div class="form-group">
				<label for="url">Website</label>
				<input class="form-control" type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
			</div>-->

		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->
		<div class="clearfix"></div>

		<div class="form-group">
			<div class="col-sm-3 text-right">
				<label for="comment">Write a good comment</label>
			</div>
			<div class="col-sm-6">
				<div class="row">
					<textarea class="form-control" name="comment" id="comment" cols="58" rows="10" tabindex="4" placeholder="Comments"></textarea>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="row">
					<input class="btn btn-custom" name="submit" type="submit" id="submit" tabindex="5" value="POST" />
					<?php comment_id_fields(); ?>
				</div>
			</div>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	
</div>

<?php endif; ?>

<div class="clearfix"></div>

<?php if ( have_comments() ) : ?>

	<hr>
	
	<!-- <h2 id="comments"><?php //comments_number('No Responses', 'One Response', '% Responses' );?></h2> -->
	<h2 id="comments"><?php comments_number('No Responses', '', '' ); ?></h2>

	<ol class="commentlist">
		<?php //wp_list_comments(); ?>
		<?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
	</ol>

	<div class="navigation">
		<!-- <div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div> -->
		<a id="loadMore" class="btn btn-lg btn-custom" ><strong>Show More Comments</strong></a>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>