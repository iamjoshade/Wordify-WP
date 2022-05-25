<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wordify_WP
 */

get_header();
?>


<main id="primary" class="site-main">
    <section class="site-section py-sm pt-5 pb-5">
        <div class="container">
            <div class="row">
                <?php  if ( have_posts() ) :?>
                <div class="col-md-6">
                    <?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
                </div>
            </div>

            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
                        <?php while(have_posts()) : the_post();?>
                        <?php get_template_part('template-parts/content');?>
                        <?php endwhile;?>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <?php wordify_wp_pagination_number()?>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <?php get_sidebar();?>
                <?php endif;?>
                <!-- END sidebar -->
            </div>
        </div>
    </section>
</main><!-- #main -->


<?php

get_footer();