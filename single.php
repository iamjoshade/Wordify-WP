<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wordify_WP
 */

get_header();
?>

	<main id="primary" class="site-main">
	
	<section class="site-section py-lg">
          <div class="container">
            <div class="row blog-entries element-animate">
            <?php while ( have_posts() ) : the_post();?>
              <div <?php post_class('col-md-12 col-lg-8 main-content'); ?> id="post-<?php the_ID(); ?>">
                <?php the_post_thumbnail('wordify-blog-full-post', ['class' => 'img-fluid mb-5']);?>
                <div class="post-meta">
                    <span class="author mr-2"><?php echo get_avatar( $post->post_author, 30, '', false, ['class' => 'mr-2'] ); ?> <?php wordify_wp_posted_by();?></span>&bullet;
                    <span class="mr-2"> <?php wordify_wp_posted_on()?></span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> <?php comments_number('0')?></span>
                </div>
                <h1 class="mb-4"><?php the_title();?></h1>
               
              
                <div class="post-content-body">
                  <?php the_content();?>
                </div>

                
                <div class="pt-5">
                  <p>Categories: <?php the_category(', ');?>   <?php if(has_tag()):?> <?php the_tags();?><?php endif;?></p>
                </div>

                <hr/>

                <div class="pt-5">
                  
                <div class="comments-area">
                <?php if(comments_open() || get_comments_number()){
                                        comments_template();
                            }?>
                </div>
                 
                </div>

              </div>
              <?php endwhile;?>
              <!-- END main-content -->

             <?php get_sidebar();?>
              <!-- END sidebar -->

            </div>
          </div>
        </section>
     
        <?php do_action('wordify_wp_related_post_action');?>   
        <!-- END section -->

	</main><!-- #main -->

<?php

get_footer();
