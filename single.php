<?php
/**
 * The template for displaying all single posts.
 *
 * @package cad-wp-theme
 * @author marcelbadua
 */

get_header(); ?>

<div class="clearfix">&nbsp;</div>

	<?php while (have_posts()) : the_post(); ?>
        
        <div class="container">
            
            <div class="row">
                
                <?php 
                    switch ( get_post_meta( $post->ID, 'sidebar_meta', true )  ) {
                        case 'left_sidebar': 
                            $col = 'col-sm-9';
                            ?>
                            <div class="col-sm-3">
                                <?php get_sidebar(); ?>
                            </div>
                            <?php
                            break;

                        case 'right_sidebar': 
                            $col = 'col-sm-9 col-sm-pull-3';
                            ?>
                            <div class="col-sm-3 col-sm-push-9">
                                <?php get_sidebar(); ?>
                            </div>
                            <?php
                            break;
                        
                        default:
                            $col = 'col-sm-12';
                            break;
                    }

                ?>

                <main id="main" class="site-main <?php echo $col; ?> " role="main">

                    <?php get_template_part( 'content', 'single' ); ?>

                    <div class="clearfix">&nbsp;</div>

                    <div class="comment_count">
                        <div class="row">
                            <div class="col-sm-6 com-count">
                                <p><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></p>
                            </div>
                            <div class="col-sm-6 next_pager">
                                <?php previous_post_link('<span class="next-post">%link</span>', 'Next Stories >'); ?>
                            </div>
                        </div>
                    </div>

                    <div id="comment-wrap">
                        
                        <?php comments_template(); ?> 

                    </div>

                </main> <!-- #main -->

            </div>

        </div>

    <?php endwhile; ?>


<div class="clearfix">&nbsp;</div>

<?php get_footer(); ?>