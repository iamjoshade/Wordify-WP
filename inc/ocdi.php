<?php
/*
* This theme is using the One Click Demo Import Plugin (optional) for
* importing demo data
*/
function wordify_wp_import_files() {
    return array(
        array(
            'import_file_name'           => 'Wordify WP',
            'import_file_url'            => 'https://filebin.net/8qwy6kb3jwdyh744/wordifywp.WordPress.2022-05-20.xml',
            'import_widget_file_url'     => 'https://filebin.net/ulw5phkz156bcp0a/wordify.95media.co.uk-widgets.wie',
            'import_customizer_file_url' => 'https://filebin.net/n27l6kvwwhovftdz/wordify-wp-export.dat',
            'import_notice'                => __( 'This theme does not support Gutenberg', 'wordify-wp' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'wordify_wp_import_files' );


function wordify_wp_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'menu-1' => $main_menu->term_id,
        )
    );

      // Assign front page and posts page (blog page).
      $front_page_id = get_page_by_title( 'Front Page' );
      $blog_page_id  = get_page_by_title( 'Blog' );

      update_option( 'show_on_front', 'page' );
      update_option( 'page_on_front', $front_page_id->ID );
      update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'wordify_wp_after_import_setup' );
