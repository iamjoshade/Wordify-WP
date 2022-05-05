<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wordify_WP
 */

get_header();
?>

<main id="primary" class="site-main">
<?php if ( is_home() ) :?>
    <section class="site-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                
                    <div class="owl-carousel owl-theme home-slider">
                    <?php
                         /* Get all sticky posts */
      $sticky = get_option( 'sticky_posts' );
       
      /* Sort the stickies with the newest ones at the top */
      rsort( $sticky );
       
      /* Get the 5 newest stickies (change 5 for a different number) */
      $sticky = array_slice( $sticky, 0, 5 );
      if (!empty($sticky)) : 
      /* Query sticky posts */
      $the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
      // The Loop
      if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    
             
                        <div>
                            <?php if(has_post_thumbnail()): ?>
                            <a href="<?php the_permalink();?>" class="a-block d-flex align-items-center height-lg"
                                style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'wordify-blog-slider-images');?>'); ">
                            <?php else:?>
                                <a href="<?php the_permalink();?>" class="a-block d-flex align-items-center height-lg"
                                style="background-image: url('<?php echo esc_url(get_template_directory_uri())?>/assets/img/slider-image.jpg'); ">
                            <?php endif;?>
                                <div class="text half-to-full">
                                    <span class="category mb-5"><?php wordify_post_category_name()?></span>
                                    <div class="post-meta">
                                        <span class="author mr-2"><?php echo get_avatar( $post->post_author, 30, '', false, [] ); ?> <?php the_author();?></span>&bullet;
                                        <span class="mr-2"><?php echo esc_html( get_the_date() ); ?> </span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span> <?php comments_number('0');?></span>

                                    </div>
                                    <h3><?php the_title();?></h3>
                                    <?php the_excerpt();?>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; endif; wp_reset_postdata(); endif;?>
                    </div>
                    
                </div>
            </div>

        </div>


    </section>
    <?php endif;?>
    <!-- END section -->


    <section class="site-section py-sm">
        <div class="container">
            <div class="row">
                <?php  if ( have_posts() ) :?>
                    <div class="col-md-6" >
                        <?php if ( is_home() ) :?>
                        <h2 class="mb-4"><?php esc_html_e( 'Latest Posts', 'wordify-wp' )?></h2>
                    </div>
                    <?php endif;?>
            </div>
          
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">
 
                        <?php query_posts( array( 
                            // exclude all sticky posts
                        'post__not_in' => get_option( 'sticky_posts' ) ) );

                        while(have_posts()) : the_post();?>
                       
                        <?php get_template_part('template-parts/content');?>
                   
                        <?php endwhile; endif; wp_reset_postdata();?>
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
        </div>
    </section>
</main><!-- #main -->

<?php get_footer();?>