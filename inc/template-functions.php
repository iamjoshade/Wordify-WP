<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Wordify_WP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function wordify_wp_custom_excerpt_length( $length ) {
    if ( is_admin() ) {
            return $length;
          }
    return 25;
  }
  add_filter( 'excerpt_length', 'wordify_wp_custom_excerpt_length', 999 );


function wordify_wp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wordify_wp_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wordify_wp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wordify_wp_pingback_header' );


// related post

if( !function_exists('wordify_wp_related_post') ): 
    function wordify_wp_related_post($post){
        global $post;
       $categories             =   get_the_category();
       if(!empty($categories)) :
       $rp_query               =   new WP_Query([
           'posts_per_page'    =>  3,
           'post__not_in'      =>  [ $post->ID ],
           'cat'               =>  !empty($categories) ?  $categories[0]->term_id : null
       ]);
    ?>

<section class="py-5">
    <div class="container"> 
		<?php if( $rp_query->have_posts() ) :?> 
			<div class="row">
				<div class="col-md-12">
					<h2 class="mb-3 "><?php esc_html_e('Related Post', 'wordify-wp')?></h2>
				</div>
			</div>
		<div class="row">
			<?php while( $rp_query->have_posts() ): 
				$rp_query->the_post(); $the_post_id = get_the_ID(); ?>
			<div class="col-md-6 col-lg-4">
				<?php if(has_post_thumbnail( )):?>
					<a href="<?php the_permalink();?>" class="a-block sm d-flex align-items-center height-md" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'wordify-blog-related-post');?>'); ">
					<?php else:?>
						<a href="<?php the_permalink();?>" class="a-block sm d-flex align-items-center height-md" style="background-image: url('<?php echo esc_url(get_template_directory_uri());?>/assets/img/related-post-thumbnail.jpg'); ">
					<?php endif;?>
					<div class="text">
						<div class="post-meta">
						<span class="category">
				<?php echo wp_get_post_terms(get_the_ID(), 'category')[0]->name;?></span> 
						<span class="mr-2"><?php echo esc_html( get_the_date() ); ?>  
					   </span> &bullet;
						<span class="ml-2"><span class="fa fa-comments"></span> <?php comments_number('0');?></span>
						</div>
						<h3><?php the_title();?></h3>
					</div>
					</a>
			</div>
		<?php endwhile; endif;  wp_reset_postdata();?>
	</div>
  </div>
</section>

<?php endif;} 

   
   add_action( 'wordify_wp_related_post_action','wordify_wp_related_post');
   
   endif;

   function wordify_wp_cat_count_span( $links ) {
	$links = str_replace( '</a> (', '</a><span>(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return $links;
  }
  add_filter( 'wp_list_categories', 'wordify_wp_cat_count_span' );



  /* Recent Post Extention */
/**
 * Extend Recent Posts Widget
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class Wordify_WP_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
  
			if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
  
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'wordify-wp' );
  
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
  
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
  
		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );
  
		if ($r->have_posts()) :
		?>
  <?php echo $args['before_widget']; ?>
  <?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
  <div class="post-entry-sidebar">
  <ul>
	<?php global $post; while ( $r->have_posts() ) : $r->the_post();
			  $recent_post_image = get_the_post_thumbnail_url(get_the_ID(), 'widget-recent-post');
	  ?>
  
  
  <li>
        <a href="<?php the_permalink()?>">
		<?php if(has_post_thumbnail()):?>
		<?php the_post_thumbnail('wordify-blog-widget-recent-post-thumbmail', ['class' => 'mr-4']);?>
		<?php else:?>
		<img src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/widget-thumbnail.jpg" alt="Image placeholder" class="mr-4">
		<?php endif;?>
                          <div class="text">
                            <h4><?php the_title();?></h4>
							<?php if ( $show_date ) : ?>
                            <div class="post-meta">
                              <span class="mr-2"> <?php echo esc_html(get_the_date()); ?></span>
                            </div>
							<?php endif?>
                          </div>
                        </a>
                      </li>
    
  
  
	<?php endwhile;  ?>
	</ul>
  </div>
  
  
  
  <?php echo $args['after_widget']; ?>
  <?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
	}
  }
  function wordify_wp_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('Wordify_WP_Recent_Posts_Widget');
  }
  add_action('widgets_init', 'wordify_wp_recent_widget_registration');
  

  function wordify_post_category_name(){
		foreach((get_the_category()) as $category) { 
			echo $category->cat_name . ' '; 
		} 
  }