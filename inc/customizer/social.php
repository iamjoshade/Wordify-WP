<?php 

function wordify_wp_social_customizer($wp_customize){

    // facebook

$wp_customize->add_section(
    'natalie_social', array(
      'title' 		=> __( 'Social Media Section', 'wordify-wp'),
      'description' 	=> __( 'Social Section', 'wordify-wp' ),
      'panel'   => 'natalie_wp'
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
          'section' 		=> 'natalie_social',
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
          'section' 		=> 'natalie_social',
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
          'section' 		=> 'natalie_social',
          'type' 			=> 'url'
        )
      );
  
      // Field 4 - Linkedin Text Box
      $wp_customize->add_setting(
        'set_pinterest', array(
          'type' 				=> 'theme_mod',
          'default' 			=> '',
          'sanitize_callback' => 'esc_url_raw'
        )
      );
  
      $wp_customize->add_control(
        'set_pinterest', array(
          'label' 		=> __( 'Pinterest', 'wordify-wp' ),
          'description' 	=> __( 'Please add your Pinterest page here', 'wordify-wp' ),
          'section' 		=> 'natalie_social',
          'type' 			=> 'url'
        )
      );
  
  
      // Field 5 - Youtube Text Box
      $wp_customize->add_setting(
        'set_youtube', array(
          'type' 				=> 'theme_mod',
          'default' 			=> '',
          'sanitize_callback' => 'esc_url_raw'
        )
      );
  

}?>