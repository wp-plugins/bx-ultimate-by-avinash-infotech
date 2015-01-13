<?php
add_theme_support( 'post-thumbnails' );

add_action( 'init', 'create_post_type_slider' );
function create_post_type_slider() {
  register_post_type( 'Bx Ultimate',
    array(
      'labels' => array(
        'name' => __( 'Bx Ultimate' ),
        'singular_name' => __( 'bxultimate' )
      ),
      'public' => true,
      'has_archive' => true,
	  'supports'  => array( 'title','thumbnail')
    )
  );
  
  
}
?>