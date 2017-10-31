<?php
/**
 * Functions
 *
 * @package cad-wp-theme
 * @author marcelbadua
*/


if ( ! function_exists( '_cad_theme_setup' ) ) : 

    function _cad_theme_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /**
         * Enables post thumbnail
         */
        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'custom-header' );

        add_theme_support( 'woocommerce' );

        /*
         * Common Navigation Location
         */
        register_nav_menus( array(
            'main-left-navigation' => __( 'Main Left Navigation' ),
            'main-right-navigation' => __( 'Main Right Navigation' )
        ));

        /*
         * Sidebar Widgets
         */
        register_sidebar(array(
            'name' => 'Sidebar Widgets',
            'id'   => 'sidebar-widgets',
            'description'   => 'These are widgets for the sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));
    

    }
endif; 
add_action( 'after_setup_theme', '_cad_theme_setup' );

add_filter( 'woocommerce_enqueue_styles', '__return_false' );


$defaults = array(
    'default-image'          => '',
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => false,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );


/** 
 * Enqueue Scripts and Styles
 */
function enqueue_scripts_and_styles() {

    wp_register_style( 'cad-wp-theme', get_template_directory_uri() . '/css/styles.min.css', null, 1.0, 'screen' );
    wp_enqueue_style( 'cad-wp-theme' );

    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    wp_register_script( 'vendor', get_template_directory_uri() . '/js/plugins.min.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'vendor' );

    wp_register_script( 'cad-wp-theme', get_template_directory_uri() . '/js/scripts.min.js', array( 'jquery' ), 1.0, true );
    wp_enqueue_script( 'cad-wp-theme' );

    wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/c8298c4b77.js' );

    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array( 'jquery' ), 1.0, true );

}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_and_styles' );

/**
 * Adds Admin menu Page for custom post banner and function to display on template, bootstrap compatible
 */
//require get_template_directory() . '/functions/banner.php';

/**
 * Adds Admin menu Page for Client Contact Details and Social Network Links
 */
//require get_template_directory() . '/functions/client-data.php';

/**
 * Bootstrap Extra Navigation Functions
 */
require get_template_directory() . '/functions/bootstrap-functions.php';


require get_template_directory() . '/functions/social-list.php';

/**
 * Bootstrap Nav Walker
 */
require get_template_directory() . '/functions/wp_bootstrap_navwalker.php';

/**
 * Required Plugins
 */
require get_template_directory() . '/functions/plugin.php';

/**
 * Meta for Sidebar
 */
require get_template_directory() . '/functions/sidebar.php';

/* CUSTOM COMMENT LIST TEMPLATE */
if( !function_exists(mytheme_comment) ){
    function mytheme_comment($comment, $args, $depth) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag." "; comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
        <?php 
        if ( 'div' != $args['style'] ) {
            ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
                <?php
            }
            ?>
                <div class="col-sm-1">
                    <div class="comment-author vcard row">
                        <?php 
                        if ( $args['avatar_size'] != 0 ) {
                            echo get_avatar( $comment, $args['thumbnail'] ); 
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-11">
                    <div class="author-name">
                        <?php
                        printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() );
                        ?>
                    </div>
                    <?php 
                    if ( $comment->comment_approved == '0' ) {
                        ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/>
                        <?php 
                    }
                    ?>
                    <div class="comment-meta commentmetadata">
                        <?php 
                        edit_comment_link( __( '(Edit)' ), '  ', '' );
                        ?>
                    </div>

                    <div class="comment-message"><?php comment_text(); ?></div>

                    <div class="reply">
                        <?php 
                        comment_reply_link( 
                            array_merge( 
                                $args, 
                                array( 
                                    'add_below' => $add_below, 
                                    'depth'     => $depth, 
                                    'max_depth' => $args['max_depth'] 
                                ) 
                            ) 
                        );
                        ?>
                    </div>
                    <?php 
                    if ( 'div' != $args['style'] ) :
                        ?>
                    </div>
                    <?php
                endif;
                ?>
        <?php
    }
}