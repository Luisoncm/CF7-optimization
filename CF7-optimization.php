<?php
/*
 * Plugin Name: CF7 Optimization
 * Version: 0.1
 * Author: Luis Colomé
 * Author URI: https://luiscolome.com
 */

// By default don't load the script o style sheet.
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

// We load the JS and CSS of CF7 just in the pages where there are forms. 
function custom_contact_script_conditional_loading(){
    //  Edit page IDs here ( if you hace more than on page with forms  =>  if( is_page( array (83, 'contact-business', 'test' ) ) ) )
    if( is_page(83) ) {
    
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wpcf7_enqueue_scripts();
        }

        if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
            wpcf7_enqueue_styles();
        }
        
    }
}
add_action( 'wp_enqueue_scripts', 'custom_contact_script_conditional_loading' );
