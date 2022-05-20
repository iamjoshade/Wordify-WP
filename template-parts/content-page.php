<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wordify_WP
 */
?>


<div class="row blog-entries">
    <div <?php post_class("col-md-12 col-lg-8 main-content"); ?> id="post-<?php the_ID(); ?>">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4"><?php the_title();?></h1>
                <?php if(has_post_thumbnail()):?>
                <?php the_post_thumbnail('wordify-blog-full-post', ['class' =>'img-fluid w-100']);?>
                <?php else:?>
                <img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/thumbnail-img.jpg"
                    class="img-fluid w-100 mb-4" alt="<?php the_title()?>">
                <?php endif;?>

                <?php the_content();

                wp_link_pages(
                  array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wordify-wp' ),
                    'after'  => '</div>',
                  )
                );
                
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;
              ?>

            </div>
        </div>

        <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
              sprintf(
                wp_kses(
                  /* translators: %s: Name of current post. Only visible to screen readers */
                  __( 'Edit <span class="screen-reader-text">%s</span>', 'wordify-wp' ),
                  array(
                    'span' => array(
                      'class' => array(),
                    ),
                  )
                ),
                wp_kses_post( get_the_title() )
              ),
              '<span class="edit-link">',
              '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
        <?php endif; ?>