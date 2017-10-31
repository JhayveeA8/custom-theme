<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cad-wp-theme
 * @author marcelbadua
 */
?>
    
    </div> <!-- #content-wrap -->
    
    <?php //get_template_part( 'content', 'footer' ); ?>

    <div id="colophon">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <span>Copyrights (c)
                        <?php 
                        echo bloginfo( 'name' )." ";
                        echo date( "Y" );
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>  <!-- /#page-wrap -->

<?php wp_footer(); ?>

<?php if( is_home() || is_front_page() ){ ?>
<script>
    jQuery( document ).ready(function($) {
        $(".post-loop-item").slice(0, 4).show();
            if ($(".post-loop-item:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        $("#loadMore").on('click', function (e) {
            e.preventDefault();
            $(".post-loop-item:hidden").slice(0, 4).slideDown();
            if ($(".post-loop-item:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        });
    });
</script>
<?php }elseif( is_single() ) { ?>
<script>
    jQuery( document ).ready(function($) {
        $("ol.commentlist > li").slice(0, 2).show();
            if ($("ol.commentlist > li:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        $("#loadMore").on('click', function (e) {
            e.preventDefault();
            $("ol.commentlist > li:hidden").slice(0, 2).slideDown();
            if ($("ol.commentlist > li:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        });
    });
</script>
<?php } ?>

</body>

</html>
