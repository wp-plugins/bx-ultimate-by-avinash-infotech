<?php
add_action('wp_head','bx_ultimate_plugin_hook');

function bx_ultimate_plugin_hook()
{
wp_enqueue_script('jquery');
wp_register_script('slider_js',plugins_url('/js/jquery.bxultimate.js', __FILE__), array('jquery'));
wp_register_style('slider_style',plugins_url('/css/jquery.bxultimate.css', __FILE__));
wp_enqueue_style('slider_style');
wp_enqueue_script('slider_js');

?>
<script>
$=jQuery.noConflict();
</script>


<?php $options = get_option( 'theme_settings' ); ?>
<script>
$(document).ready(function(){
  $('.bxslider').bxSlider({
	  <?php if($options['custom_mode']!=''){ echo "mode: '".$options['custom_mode']."',"; }?>
	   <?php if($options['custom_speed']!=''){ echo "speed: '".$options['custom_speed']."',"; }?>
	    <?php if($options['custom_auto']!=''){ echo "auto: ".$options['custom_auto'].","; }?>
		 <?php if($options['custom_randomstart']!=''){ echo "randomStart: ".$options['custom_randomstart'].","; }?>
		  <?php if($options['custom_infiniteloop']!=''){ echo "infiniteLoop: ".$options['custom_infiniteloop']."'"; }?>
		   <?php if($options['custom_easing']!=''){ echo "easing: '".$options['custom_easing']."',"; }?>
		   <?php if($options['custom_responsive']!=''){ echo "responsive: ".$options['custom_responsive'].","; }?>
		   <?php if($options['custom_pagerShortSeparator']!=''){ echo "pagerShortSeparator: '".$options['custom_pagerShortSeparator']."',"; }?>
		   <?php if($options['custom_controls']!=''){ echo "controls: '".$options['custom_controls']."',"; }?>
		    <?php if($options['custom_pager']!=''){ echo "pager: ".$options['custom_pager'].","; }?>
			<?php if($options['custom_hideControlOnEnd']!=''){ echo "hideControlOnEnd: ".$options['custom_hideControlOnEnd'].","; }?>
			<?php if($options['custom_pause']!=''){ echo "speed: '".$options['custom_pause']."',"; }?>
			<?php if($options['custom_pagerType']!=''){ echo "hideControlOnEnd: '".$options['custom_pagerType']."',"; }?>
  
});
});



</script>
<?php

}
?>