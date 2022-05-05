<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordify_WP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrap">
	<header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
              <?php if(!empty(get_theme_mod('set_twitter' ))) :?>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('set_twitter' ));?>"><span class="fa fa-twitter"></span></a>
                <?php endif;?>
                <?php if(!empty(get_theme_mod('set_facebook' ))) :?>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('set_facebook' ));?>"><span class="fa fa-facebook"></span></a>
                <?php endif;?>
                <?php if(!empty(get_theme_mod('set_instagram' ))) :?>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('set_instagram' ));?>"><span class="fa fa-instagram"></span></a>
                <?php endif;?>
                <?php if(!empty(get_theme_mod('set_youtube' ))) :?>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('set_youtube' ));?>"><span class="fa fa-youtube-play"></span></a>
                <?php endif;?>
              </div>

              <div class="col-3 search-top">
              <?php $wordify_wp_unique_id = wp_unique_id( 'search-top-form-' );?>
                <form action="<?php echo esc_url(home_url('/'));?>" class="search-top-form">
                  <span class="icon fa fa-search"></span>
                  <input type="text" name="s" id="<?php echo esc_attr( $wordify_wp_unique_id ); ?>" placeholder="<?php esc_attr_e('Type a keyword and hit enter', 'wordify-wp');?>">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				 <h1 class="site-logo site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name');?></a></h1>
				<?php
			else :
				?>
				<p class="site-title site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$wordify_wp_description = get_bloginfo( 'description', 'display' );
			if ( $wordify_wp_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $wordify_wp_description;  ?></p>
			<?php endif; ?>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
			  <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_class'        => 'navbar-nav mx-auto',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'navbarMenu',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				    'walker'            => new WP_Bootstrap_Navwalker(),
				)
			);
			?>
              
            
          </div>
        </nav>
      </header>

