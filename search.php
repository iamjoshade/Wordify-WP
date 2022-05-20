<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Wordify_WP
 */

get_header();
?>


<main id="primary" class="site-main">
    <section class="site-section py-sm pt-5 pb-5">
        <div class="container">
        <?php  if ( have_posts() ) :?>
            <div class="row">
                    <div class="col-md-6" >
                        <h2 class="mb-4"><?php printf( esc_html__( 'Search Results for: %s', 'wordify-wp' ), '<span>' . get_search_query() . '</span>' );?></h2>
                    </div>
            </div>
            
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
                        <?php while(have_posts()) : the_post();?>
                          <?php get_template_part('template-parts/content');?>
                        <?php endwhile; ?>

                    </div>
                    

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <?php wordify_wp_pagination_number()?>
                        </div>
                    </div>
                </div>
               
                <!-- END main-content -->

                <?php get_sidebar();?>
                <!-- END sidebar -->
               
            </div>

            <?php else:?>

                <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 no-results not-found">
                    <div class="row">
                          <?php get_template_part('template-parts/content', 'none');?>
                    </div>
                    
                </div>
               
                <!-- END main-content -->

                <?php get_sidebar();?>
                <!-- END sidebar -->
               
            </div>

           <?php endif;?>
        </div>
    </section>
</main><!-- #main -->


<?php
get_footer();
