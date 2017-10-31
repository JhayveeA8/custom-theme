<?php
/**
 * The template for displaying archive pages.
 *
 * 
 *
 * @package cad-wp-theme
 * @author marcelbadua
 */

get_header(); ?>
       
        <div class="container">

            <?php if ( have_posts() ) : ?>

            <div class="page-header">


                <?php 
                $post = $posts[0]; 
                // Hack. Set $post so that the_date() works. ?>

                <?php 
                /* If this is a category archive */ 
                if ( is_category() ) { ?>
                <h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>

                <?php 
                /* If this is a tag archive */ 
                } elseif( is_tag() ) { ?>
                <h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

                <?php 
                /* If this is a daily archive */ 
                } elseif (is_day()) { ?>
                <h1>Archive for <?php the_time('F jS, Y'); ?></h1>

                <?php 
                /* If this is a monthly archive */ 
                } elseif (is_month()) { ?>
                <h1>Archive for <?php the_time('F, Y'); ?></h1>

                <?php 
                /* If this is a yearly archive */ 
                } elseif (is_year()) { ?>
                <h1>Archive for <?php the_time('Y'); ?></h1>

                <?php 
                /* If this is an author archive */ 
                } elseif (is_author()) { ?>
                <h1>Author Archive</h1>

                <?php 
                /* If this is a paged archive */ 
                } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <h1>Blog Archives</h1>

                <?php } ?> 

            </div><!-- .page-header -->            

            <section id="post-loop">
                <div class="container">
                    <div class="row">
                        <?php
                        while ( have_posts() ) :
                            the_post();
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
                                    <div class="post-metas"><span>cat: <?php the_category( ', ' ); ?></span><span> | </span><span><i class="fa fa-heart" aria-hidden="true"></i> 136 Likes</span><span> | </span><span><i class="fa fa-comment" aria-hidden="true"></i> <?php comments_number('0', '1', '%'); ?> Comments </span></div>
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

            <?php if ( function_exists('wp_bootstrap_pagination') ) wp_bootstrap_pagination(); ?>

        <?php else : ?>

            <h2>Nothing Found</h2>

        <?php endif; ?>

        </div>

    <div class="clearfix">&nbsp;</div>

<?php get_footer(); ?>