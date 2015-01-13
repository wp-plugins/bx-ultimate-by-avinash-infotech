<?php
class todaysdeal extends WP_Widget {
          function todaysdeal() {
                    $widget_ops = array(
                    'classname' => 'bx-ultimate',
                    'description' => 'Bx Ultimate'
          );

          $this->WP_Widget(
                    'bx-ultimate',
                    'Bx Ultimate',
                    $widget_ops
          );
}

          function widget($args, $instance) { // widget sidebar output
                    extract($args, EXTR_SKIP);
					echo "<ul class='bxslider'>";
$args = array('post_type' => 'bxultimate' );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	$img= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'sing-post-thumbnail');
?>
<li><img src="<?php echo $img[0]; ?>" /></li>
<?PHP 
	endwhile; wp_reset_query();
     echo "</ul>";
          }
}

add_action(
          'widgets_init',create_function('','return register_widget("todaysdeal");')
);
?>