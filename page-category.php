<?php
/**
 * Template Name: Contact Form Page
 *
 * The template for displaying Contact Form includes Google Map.
 *
 * @package cad-wp-theme
 * @author marcelbadua
 */

get_header(); ?>

<?php
$args = array('post_type' => 'post');
$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	?>
	<section id="post-loop">
		<div class="container">
			<div class="row">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>

					<div class="post-loop-item clearfix">

						<div class="col-sm-1">
							<div class="row">
								<div class="circle">
									<p class="the-post-date"><?php echo get_the_date('j M') ?></p>
								</div>
							</div>
						</div>

						<div class="col-sm-11">
							<div class="post-metas"><span>cat: <?php the_category( ', ' ); ?></span><span> | </span><span><i class="fa fa-heart" aria-hidden="true"></i> 136 Likes</span><span> | </span><span><i class="fa fa-comment" aria-hidden="true"></i> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></span></div>
							<div class="row"><hr></div>
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
						</div>

					</div>

					<div class="clearfix">&nbsp;</div>

					<?php
				endwhile;
				?>
			</div>
		</div>
	</section>
	<?php
	wp_reset_postdata();
endif;
?>

<div class="clearfix">&nbsp;</div>

<?php get_footer(); ?>