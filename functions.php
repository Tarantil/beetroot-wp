<?php
define('THEME_URL', get_template_directory_uri());
add_post_type_support( 'page', 'excerpt' );
function theme_register_nav_menu(){
	register_nav_menu('header_menu','Header');
	register_nav_menu('footer_beetroot','Footer Beetroot');
	register_nav_menu('footer_company','Footer Company');
	register_nav_menu('social_links','Social Links');
	add_filter( 'excerpt_length', function(){
		return 20;
	} );
	add_filter('excerpt_more', function($more) {
		return '...';
	});
	 add_theme_support( 'custom-logo');
	 add_theme_support( 'title-tag' );
	 add_theme_support( 'html5', array('comment-list', 'comment-form', 'search-form', 'script', 'style'));
}
add_action('after_setup_theme', 'theme_register_nav_menu');


function add_assets() {
	wp_enqueue_style( 'main-style', THEME_URL.'/src/css/main.css');
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;700&family=Roboto:wght@300;400&display=swap' );
    wp_enqueue_script( 'main-script',THEME_URL.'/src/js/main.js', array() , '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_assets');

add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field', 20);
  function add_default_value_to_image_field($field) {
    acf_render_field_setting( $field, array(
      'label'      => __('Default Image ID','acf'),
      'instructions'  => __('Appears when creating a new post','acf'),
      'type'      => 'image',
      'name'      => 'default_value',
    ));
  }
  add_filter('acf/load_value/type=image', 'reset_default_image', 10, 3);
function reset_default_image($value, $post_id, $field) {
  if (!$value) {
    $value = $field['default_value'];
  }
  return $value;
}