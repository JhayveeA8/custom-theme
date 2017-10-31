<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cad-wp-theme
 * @author marcelbadua
 */


get_header(); ?>

<section class="welcome">
	<div class="container">
		<h4 class="text-center">Hello, Welcome to my Blog!</h4>
	</div>
</section>

<div class="clearfix"></div>

<?php
$the_count = wp_count_posts( 'post' )->publish;;
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
				<?php
				if( $the_count >= 4 ){
					?>
					<div class="load-more text-center">
						<!-- <a id="loadMore" class="btn btn-lg btn-custom" href="<?php the_permalink(43); ?>"><strong>Load More</strong></a> -->
						<a id="loadMore" class="btn btn-lg btn-custom" ><strong>Load More</strong></a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
	wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>