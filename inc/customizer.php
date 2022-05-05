<?php
/**
 * Wordify WP Theme Customizer
 *
 * @package Wordify_WP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wordify_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wordify_wp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wordify_wp_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_panel('wordify_wp', [
        'title'             => __('Wordify WP Theme Settings', 'wordify-wp'),
        'description'       =>  __('Wordify WP Theme Settings', 'wordify-wp'),
        'priority'          => 160
    ]);
	
	wordify_wp_social_customizer( $wp_customize );

}
add_action( 'customize_register', 'wordify_wp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wordify_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wordify_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wordify_wp_customize_preview_js() {
	wp_enqueue_script( 'wordify-wp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'wordify_wp_customize_preview_js' );


 
function wordify_wp_social_customizer($wp_customize){

	$wp_customize->add_section(
		'wordify_wp_social', array(
		  'title' 		=> __( 'Social Media Section', 'wordify-wp'),
		  'description' 	=> __( 'Social Section', 'wordify-wp' ),
		  'panel'   => 'wordify_wp'
		)
	  );
	  
		  // Field 1 - Facebook Text Box
		  $wp_customize->add_setting(
			'set_facebook', array(
			  'type' 				=> 'theme_mod',
			  'default' 			=> '',
			  'sanitize_callback' => 'esc_url_raw'
			)
		  );
	  
		  $wp_customize->add_control(
			'set_facebook', array(
			  'label' 		=> __( 'Facebook', 'wordify-wp' ),
			  'description' 	=> __( 'Please add your facebook page link here', 'wordify-wp' ),
			  'section' 		=> 'wordify_wp_social',
			  'type' 			=> 'url'
			)
		  );
	  
		  // Field 2 - Twitter Text Box
		  $wp_customize->add_setting(
			'set_twitter', array(
			  'type' 				=> 'theme_mod',
			  'default' 			=> '',
			  'sanitize_callback' => 'esc_url_raw'
			)
		  );
	  
		  $wp_customize->add_control(
			'set_twitter', array(
			  'label' 		=> __( 'Twitter', 'wordify-wp' ),
			  'description' 	=> __( 'Please add your twitter handle here', 'wordify-wp' ),
			  'section' 		=> 'wordify_wp_social',
			  'type' 			=> 'url'
			)
		  );
	  
	  
		  // Field 3 - Instagram Text Box
		  $wp_customize->add_setting(
			'set_instagram', array(
			  'type' 				=> 'theme_mod',
			  'default' 			=> '',
			  'sanitize_callback' => 'esc_url_raw'
			)
		  );
	  
		  $wp_customize->add_control(
			'set_instagram', array(
			  'label' 		=> __( 'Instagram', 'wordify-wp' ),
			  'description' 	=> __( 'Please add your Instagram handle here', 'wordify-wp' ),
			  'section' 		=> 'wordify_wp_social',
			  'type' 			=> 'url'
			)
		  );  
	  
		  // Field 4 - Youtube Text Box
		  $wp_customize->add_setting(
			'set_youtube', array(
			  'type' 				=> 'theme_mod',
			  'default' 			=> '',
			  'sanitize_callback' => 'esc_url_raw'
			)
		  );

		  $wp_customize->add_control(
			'set_youtube', array(
			  'label' 		=> __( 'Youtube', 'wordify-wp' ),
			  'description' 	=> __( 'Please add your Youtube page here', 'wordify-wp' ),
			  'section' 		=> 'wordify_wp_social',
			  'type' 			=> 'url'
			)
		  );
}

