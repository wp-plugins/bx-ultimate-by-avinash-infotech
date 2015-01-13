<?php
//[foobar]
function bx_ultimate(){
    
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
add_shortcode( 'BX-ULTIMATE', 'bx_ultimate' );
?>