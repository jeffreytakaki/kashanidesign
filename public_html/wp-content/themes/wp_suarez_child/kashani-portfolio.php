<?php

/*
 *Template Name: Kashani Portfolio page

 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cshero
 */


global $post, $breadcrumb;
get_header(); 
$layout = cshero_generetor_layout();

?>
    <script type="text/javascript" src="http://www.kashanidesign.com/wp-content/themes/wp_suarez_child/js/kashani-portfolio.js"></script>
    

    <div id="primary" class="content-area<?php if($breadcrumb == '0'){ echo ' no_breadcrumb_page'; }; ?><?php echo esc_attr($layout->class); ?> page-php">
        <div class="<?php echo get_post_meta($post->ID, 'cs_layout', true) ? 'no-container' : 'container'; ?>">
            <div class="row">
                <?php if(!empty($layout->left1_col)):?>
                    <div class="left-wrap <?php echo esc_attr($layout->left1_col); ?>">
                         <div id="secondary" class="widget-area" role="complementary">
                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar($layout->left1_sidebar); ?>
                            </div>
                         </div>
                    </div>
                <?php endif; ?>
                <div class="content-wrap <?php echo esc_attr($layout->blog); ?>">
                    <main id="main" class="site-main" role="main">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'framework/templates/page/page'); ?>
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if (cshero_show_comments() == '1') :
                                    comments_template();
                                endif;
                            ?>
                        <?php endwhile; // end of the loop. ?>
                    </main><!-- #main -->
                </div>
                <?php if(!empty($layout->right1_col)):?>
                    <div class="right-wrap <?php echo esc_attr($layout->right1_col); ?>">
                         <div id="secondary" class="widget-area" role="complementary">
                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar($layout->right1_sidebar); ?>
                            </div>
                         </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- #primary -->
<?php get_footer(); ?>

<script type="text/javascript">
    var getpagename = '<?php echo $post->post_name; ?>';

    var showimages = function(a) {
        var getClosest = jQuery("img[alt="+a+"]").closest(".zengo-pin");
        jQuery(getClosest).addClass("show-image");
    }

    function runonload() {
        showimages(getpagename);
    }

    window.document.onload = runonload();

    
    
    // var hideimages = function() {
    //     switch(getpagename) {
    //         case "testing-new":
    //             var getClosest = jQuery("img[alt=getpagename]").closest(".zengo-pin");
    //             jQuery(getClosest).css("display","block");
    //             break;
    //         default:
    //             console.log("this isdefault");
    //     }
    // };

    // window.onload = showimages(getpagename);
</script>
