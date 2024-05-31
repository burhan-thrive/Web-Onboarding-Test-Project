<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'custom_script_css', 1000 );
function custom_script_css() {
  wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/css/style.css', array() );
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array() );

  //aos
  //wp_enqueue_style( 'aos-style', get_stylesheet_directory_uri() . '/aos/aos.css', array() );
  //wp_enqueue_script( 'aos-script', get_stylesheet_directory_uri() . '/aos/aos.js', array() );
}

/*function theme_gsap_script(){
  // The core GSAP library
  wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), false, true );
  // ScrollTrigger - with gsap.js passed as a dependency
  wp_enqueue_script( 'gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js', array('gsap-js'), false, true );
  // Your animation code file - with gsap.js passed as a dependency
  wp_enqueue_script( 'gsap-js2', get_stylesheet_directory_uri() . '/js/app.js', array('gsap-js'), false, true );
}*/

//add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );
 
//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

add_action( 'wp_enqueue_scripts', function() {

    wp_dequeue_script( 'bootstrap' );
    wp_dequeue_script( 'jquery-fitvids' );
    wp_dequeue_script( 'jquery-waypoints' );

}, 9999 );