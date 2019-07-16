<?php

/* Styles and scripts */

add_action( 'wp_enqueue_scripts', 'cd_theme_enqueue' );

function cd_theme_enqueue() {
  $ver = wp_get_theme()->get('Version');
  require('env.php');

  wp_enqueue_style( 'fonts', '', array(), null );
  // wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/dist/modernizr.js' , array(), $ver, false );
  wp_enqueue_style( 'build_styles', get_template_directory_uri() . '/dist/main.min.css', array(), $ver );

  if ($env == 'development') {
    wp_enqueue_style( 'build_styles', get_template_directory_uri() . '/dist/styles.css', array(), $ver );
    wp_enqueue_script( 'build_js', get_template_directory_uri() . '/dist/bundle.js', array(), $ver, true );
  } else {
    wp_enqueue_script( 'promise_polyfill', 'https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js', array(), false, true );
    wp_enqueue_script( 'classlist_polyfill', 'https://cdnjs.cloudflare.com/ajax/libs/classlist/1.2.20171210/classList.min.js', array(), false, true);
    wp_enqueue_style( 'build_styles', get_template_directory_uri() . '/dist/styles.min.css', array(), $ver );
    wp_enqueue_script( 'build_js', get_template_directory_uri() . '/dist/bundle.min.js', array('promise_polyfill', 'classlist_polyfill'), $ver, true );
  }
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

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'Options',
    'position' => 53.3
  ));
}


function add_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'custom-blocks',
				'title' => 'Custom Blocks',
			),
		)
	);
}
add_filter( 'block_categories', 'add_block_category', 10, 2);

function cdhq_register_blocks() {
  // acf_register_block(array(
  //   'name' => 'content-slider-block',
  //   'title' => 'Content Slider Block',
  //   'description' => 'Content block with image slider.',
  //   'render_template' => 'blocks/content-slider-block.php',
  //   'category' => 'repeat-street', 
  // ));
}

if (function_exists('acf_register_block')) {
  add_action('acf/init', 'cdhq_register_blocks');
}
