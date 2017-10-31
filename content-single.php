<?php
/**
 * Content for displaying Single
 *
 * @package cad-wp-theme
 * @author marcelbadua
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div class="col-sm-1">
		<div class="row">
			<div class="circle">
				<p class="the-post-date"><?php echo get_the_date('j M') ?></p>
			</div>
		</div>
	</div>

	<div class="col-sm-11">

		<div class="post-metas"><span>cat: <?php the_category( ', ' ); ?></span><span> | </span><span><i class="fa fa-heart" aria-hidden="true"></i> 136 Likes</span><span> | </span><span><i class="fa fa-comment" aria-hidden="true"></i> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span></div>

		<div class="row"><hr class="single-hr"></div>

		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

		<div class="entry">
			<?php the_content(); ?>
		</div>

        <div class="registered-tags"><?php the_tags( '<h4><strong>TAGS</strong></h4> ', ', ', '<br />' ); ?></div>

	</div>


</article>
