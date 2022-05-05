<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wordify_WP
 */

?>

<div <?php post_class('col-md-6'); ?> id="post-<?php the_ID(); ?>">
	
<a href="<?php the_permalink();?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
	<?php if(has_post_thumbnail( )):?>
	<?php the_post_thumbnail('wordify-blog-thumbnail', ['class' => 'img-fluid w-100'] );?>
	<?php else:?>
		<img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/thumbnail-img.jpg" class="img-fluid w-100" alt="<?php the_title()?>">
	<?php endif;?>
	<div class="blog-content-body">
		<div class="post-meta">
		<span class="author mr-2"><?php echo get_avatar( $post->post_author, 30, '', false, [] ); ?> <?php the_author();?></span>&bullet;
		<span class="mr-2"><?php echo esc_html( get_the_date() ); ?> </span> &bullet;
		<span class="ml-2"><span class="fa fa-comments"> <?php comments_number('0');?></span> 
		</div>
		<h2><?php the_title();?></h2>
	</div>
	</a>
	
	</div><!-- #post-<?php the_ID(); ?> -->
