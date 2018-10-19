<?php

/* Styles and scripts */

add_action( 'wp_enqueue_scripts', 'cd_enqueue_things' );

function cd_enqueue_things() {
  $ver = wp_get_theme()->get('Version');

  // Styles
  wp_enqueue_style( 'fonts', 'https://use.typekit.net/gau3xvd.css' );
  wp_enqueue_style( 'build_styles', get_template_directory_uri() . '/dist/main.min.css', array(), $ver );

  // Scripts
  wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.4.1/js/all.js' );
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

acf_add_options_page();

function acf_load_color_field_choices($field) {

    // reset choices
    $field['choices'] = array();

    // get the textarea value from options page without any formatting
    $repeater_field = get_field('color_palette', 'option', false);

    $choices = array();

    while ( have_rows('color_palette', 'option') ) : the_row();

      $label = get_sub_field('label');
      $color = get_sub_field('color');
      $string = $label . ' : ' . $color;
      $field['choices'][ $color ] = $label;

    endwhile;

    // return the field
    return $field;

  }

  add_filter('acf/load_field/name=swoop_color', 'acf_load_color_field_choices');
  add_filter('acf/load_field/name=heading_color', 'acf_load_color_field_choices');

  function adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}