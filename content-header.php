<?php 
/** 
 * Content for displaying Header 
 * 
 * @package cad-wp-theme 
 * @author marcelbadua 
 */ 
?>

<section id="main-banner" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo bloginfo( 'template_url' ); ?>/images/banner.jpg"></section>

<header>
    <div class="container">
        <div class="text-center flex-container">

            <?php 

            $defaults = array( 
               'theme_location'=> 'main-left-navigation', 
               'menu' => 'header-navigation', 
               'container' => false, 
               'container_class' => '', 
               'container_id' => '', 
               'menu_class' => 'menu-inline nav-menus', 
               'menu_id' => '', 
               'echo' => true, 
               'before' => '', 
               'after' => '', 
               'link_before' => '', 
               'link_after' => '', 
               'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 
               'depth' => 2, 
               'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 
               'walker' => new wp_bootstrap_navwalker()
           ); 
            wp_nav_menu( $defaults ); 
            ?>
            <a class="menu-inline logo-container" href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php bloginfo('name'); ?>">
                <?php if ( get_header_image() != '' ) { ?>
                <img class="img-responsive" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" />
                <?php } else { ?>
                <?php bloginfo( 'name' ); ?>
                <?php } ?>
            </a>                
            <?php 

            $defaults = array( 
                'theme_location'=> 'main-right-navigation', 
                'menu' => 'header-navigation', 
                'container' => false, 
                'container_class' => '', 
                'container_id' => '', 
                'menu_class' => 'menu-inline nav-menus', 
                'menu_id' => '', 
                'echo' => true, 
                'before' => '', 
                'after' => '', 
                'link_before' => '', 
                'link_after' => '', 
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 
                'depth' => 2, 
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 
                'walker' => new wp_bootstrap_navwalker()
            ); 
            wp_nav_menu( $defaults ); 
            ?>
        </div>
    </div>
</header>
