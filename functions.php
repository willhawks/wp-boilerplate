<?php

/* Styles and scripts */

add_action( 'wp_enqueue_scripts', 'cd_theme_styles' );
add_action( 'wp_enqueue_scripts', 'cd_theme_scripts' );

function cd_theme_styles() {
  $ver = wp_get_theme()->get('Version');
  wp_enqueue_style( 'fonts', '', array(), null );
  wp_enqueue_style( 'build_styles', get_template_directory_uri() . '/dist/main.min.css', array(), $ver );
}

function cd_theme_scripts() {
  $ver = wp_get_theme()->get('Version');
  wp_enqueue_script( 'build_js', get_template_directory_uri() . '/dist/main.min.js', array(), $ver, true );
}

/* Add Theme Supports */
add_theme_support( 'menus' );
add_theme_support( 'title-tag' );

/* Create Menu Locations */
function register_theme_menus() {
  register_nav_menus(
    array(
      'main_menu' => 'Main Menu',
    )
  );
}
add_action( 'init', 'register_theme_menus' );
