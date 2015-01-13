<?php
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('jquery');
wp_enqueue_script('thickbox');

function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
}
//add settings page to menu
function add_settings_page() {
add_submenu_page('edit.php?post_type=bxultimate', 'Setting', 'Setting', 'manage_options', 'bx-ultimate-setting', 'theme_settings_page');
}
//add actions
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

function theme_settings_page() {

if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;
//get variables outside scope

wp_register_style('slider_style',plugins_url('/css/style.css', __FILE__));
wp_enqueue_style('slider_style');



?>

<h2>
  <?php _e( 'Theme Settings' ) //your admin panel title ?>
</h2>

<?php
//show saved options message
if ( false !== $_REQUEST['updated'] ) : ?>
<div>
  <p><strong>
    <?php _e( 'Options saved' ); ?>
    </strong></p>
</div>
<?php endif; ?>
<form method="post" action="options.php">
  <?php settings_fields( 'theme_settings' ); ?>
  <?php $options = get_option( 'theme_settings' ); ?>
  <div id="box">
	
    <div id="row">
    <h3>General Options</h3>
      <div class="heading">
        <label for="theme_settings[custom_mode]">
          <?php _e( 'Mode:' ); ?>
        </label>
      </div>
      <div class="input-area">
         <select id="theme_settings[custom_mode]" name="theme_settings[custom_mode]">
          <option <?php if($options['custom_mode'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_mode'] == 'horizontal') echo 'selected="selected"'; ?> value="horizontal">horizontal</option>
          <option <?php if($options['custom_mode'] == 'vertical') echo 'selected="selected"'; ?> value="vertical">vertical</option>
          <option <?php if($options['custom_mode'] == 'fade') echo 'selected="selected"'; ?> value="fade">fade</option>
          </select>
        </div>
      <?PHP //echo $options['custom_mode']; ?>
      <br/>
 		<span>Type of transition between slides.</span>
      <div style="clear:both;"></div>
    </div>
    
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_speed]">
          <?php _e( 'Speed:' ); ?>
        </label>
      </div>
      <div class="input-area">
       <input type="number" id="theme_settings[custom_speed]" name="theme_settings[custom_speed]" value="<?php esc_attr_e( $options['custom_speed'] ); ?>"/>
      </div>
      <br/>
 <span>Slide transition duration (in ms).</span>
      <div style="clear:both;"></div>
    </div>
    
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_randomstart]">
          <?php _e( 'Slide RandomStart:' ); ?>
        </label>
      </div>
      <div class="input-area">
       <select id="theme_settings[custom_randomstart]" name="theme_settings[custom_randomstart]">
          <option <?php if($options['custom_randomstart'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_randomstart'] == 'true') echo 'selected="selected"'; ?> value="true">True</option>
          <option <?php if($options['custom_randomstart'] == 'false') echo 'selected="selected"'; ?> value="false">False</option>
          
          </select>
      </div>
      <br/>
 <span>Start slider on a random slide.</span>
      <div style="clear:both;"></div>
    </div>
    
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_infiniteloop]">
          <?php _e( 'Slide Infinite Loop:' ); ?>
        </label>
      </div>
      <div class="input-area">
       <select id="theme_settings[custom_infiniteloop]" name="theme_settings[custom_infiniteloop]">
          <option <?php if($options['custom_infiniteloop'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_infiniteloop'] == 'true') echo 'selected="selected"'; ?> value="true">True</option>
          <option <?php if($options['custom_infiniteloop'] == 'false') echo 'selected="selected"'; ?> value="false">False</option>
          
          </select>
      </div>
      <br/>
 <span>If true, clicking "Next" while on the last slide will transition to the first slide and vice-versa.</span>
      <div style="clear:both;"></div>
    </div>
    
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_hideControlOnEnd]">
          <?php _e( 'Hide Control On End:' ); ?>
        </label>
      </div>
      <div class="input-area">
       <select id="theme_settings[custom_hideControlOnEnd]" name="theme_settings[custom_hideControlOnEnd]">
          <option <?php if($options['custom_hideControlOnEnd'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_hideControlOnEnd'] == 'true') echo 'selected="selected"'; ?> value="true">True</option>
          <option <?php if($options['custom_hideControlOnEnd'] == 'false') echo 'selected="selected"'; ?> value="false">False</option>
          
          </select>
      </div>
      <br/>
 <span>If true, "Next" control will be hidden on last slide and vice-versa.
Note: Only used when infiniteLoop: false.</span>
      <div style="clear:both;"></div>
    </div>
    
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_easing]">
          <?php _e( 'Easing:' ); ?>
        </label>
      </div>
      <div class="input-area">
      <?php 
		  $custom_easing =$options['custom_easing']; 
		   
		  $custom_easing='linear';
		 ?>
       <select name="theme_settings[custom_easing]">
<option <?php if($options['custom_easing'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
<option <?php if($options['custom_easing'] == 'linear') echo 'selected="selected"'; ?> value="linear">linear</option>
<option <?php if($options['custom_easing'] == 'ease') echo 'selected="selected"'; ?>  id="ease" value="ease">ease</option>
<option <?php if($options['custom_easing'] == 'ease') echo 'selected="selected"'; ?>  id="ease-in" value="ease-in">ease-in</option>
<option <?php if($options['custom_easing'] == 'ease-out') echo 'selected="selected"'; ?>  id="ease-out" value="ease-out">ease-out</option>
<option <?php if($options['custom_easing'] == 'ease-in-out') echo 'selected="selected"'; ?>  id="ease-in-out" value="ease-in-out">ease-in-out</option>

 
 </select>
      </div>
      <?PHP //echo $options['custom_easing']; ?>
      <br/>
 <span>The type of "easing" to use during transitions.</span>
      <div style="clear:both;"></div>
    </div>
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_responsive]">
          <?php _e( 'Responsive:' ); ?>
        </label>
      </div>
      <div class="input-area">
       <select id="theme_settings[custom_responsive]" name="theme_settings[custom_responsive]">
          <option <?php if($options['custom_responsive'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_responsive'] == 'true') echo 'selected="selected"'; ?> value="true">True</option>
          <option <?php if($options['custom_responsive'] == 'false') echo 'selected="selected"'; ?> value="false">False</option>
          
          </select>
      </div>
      <br/>
 <span>Enable or disable auto resize of the slider.</span>
      <div style="clear:both;"></div>
    </div>
    
     
     
     <div id="row">
     <h3>Pager Options</h3> 
      <div class="heading">
        <label for="theme_settings[custom_pager]">
          <?php _e( 'Pager:' ); ?>
        </label>
      </div>
      <div class="input-area">
       <select id="theme_settings[custom_pager]" name="theme_settings[custom_pager]">
          <option <?php if($options['custom_pager'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_pager'] == 'true') echo 'selected="selected"'; ?> value="true">True</option>
          <option <?php if($options['custom_pager'] == 'false') echo 'selected="selected"'; ?> value="false">False</option>
          
          </select>
      </div>
      <br/>
 <span>If true, a pager will be added.</span>
      <div style="clear:both;"></div>
    </div>
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_pagerType]">
          <?php _e( 'Pager Type:' ); ?>
        </label>
      </div>
      <div class="input-area">
      <select id="theme_settings[custom_pagerType]" name="theme_settings[custom_pagerType]">
          <option <?php if($options['custom_pagerType'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_pagerType'] == 'full') echo 'selected="selected"'; ?> value="full">Full</option>
          <option <?php if($options['custom_pagerType'] == 'short') echo 'selected="selected"'; ?> value="short">Short</option>
          
          </select>
      </div>
      <?PHP //echo $options['custom_pagerType']; ?>
      <br/>
 <span>If 'full', a pager link will be generated for each slide. If 'short', a x / y pager will be used .</span>
      <div style="clear:both;"></div>
    </div>
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_pagerShortSeparator]">
          <?php _e( 'Pager Short Separator:' ); ?>
        </label>
      </div>
      <div class="input-area">
       <input type="text" id="theme_settings[custom_pagerShortSeparator]" name="theme_settings[custom_pagerShortSeparator]" value="<?php esc_attr_e( $options['custom_pagerSortSeparator'] ); ?>"/>
      </div>
      <br/>
 <span>If pagerType: 'short', pager will use this value as the separating character.</span>
      <div style="clear:both;"></div>
    </div>
     
      
     <div id="row">
     <h3>Control Options</h3>
      <div class="heading">
        <label for="theme_settings[custom_controls]">
          <?php _e( 'Controls:' ); ?>
        </label>
      </div>
      <div class="input-area">
        <select id="theme_settings[custom_controls]" name="theme_settings[custom_controls]">
          <option <?php if($options['custom_controls'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_controls'] == 'true') echo 'selected="selected"'; ?> value="true">True</option>
          <option <?php if($options['custom_controls'] == 'false') echo 'selected="selected"'; ?> value="false">False</option>
          
          </select>
      </div>
      <br/>
 <span>If true, "Next" / "Prev" controls will be added.</span>
      <div style="clear:both;"></div>
    </div>
  
    <div id="row">
    <h3>Auto Options</h3>
      <div class="heading">
        <label for="theme_settings[custom_auto]">
          <?php _e( 'Auto:' ); ?>
        </label>
      </div>
      <div class="input-area">
       <select id="theme_settings[custom_auto]" name="theme_settings[custom_auto]">
          <option <?php if($options['custom_auto'] == '') echo 'selected="selected"'; ?> value="">SELECT</option>
          <option <?php if($options['custom_auto'] == 'true') echo 'selected="selected"'; ?> value="true">True</option>
          <option <?php if($options['custom_auto'] == 'false') echo 'selected="selected"'; ?> value="false">False</option>
          
          </select>
      </div>
      <br/>
 <span>Slides will automatically transition.</span>
      <div style="clear:both;"></div>
    </div>
    <div id="row">
      <div class="heading">
        <label for="theme_settings[custom_pause]">
          <?php _e( 'Pause :' ); ?>
        </label>
      </div>
      <div class="input-area">
       <input type="number" id="theme_settings[custom_pause]" name="theme_settings[custom_pause]" value="<?php esc_attr_e( $options['custom_auto'] ); ?>"/>
      </div>
      <br/>
 <span>The amount of time (in ms) between each auto transition.</span>
      <div style="clear:both;"></div>
    </div>    
  </div>
  <p>
    <input name="submit" id="submit" value="Save Changes" class="button button-primary" type="submit" id="btn" style="margin-left: 20px;">
  </p>
</form>
<!-- END wrap -->
<?php
}
//sanitize and validate
function options_validate( $input ) {
    global $select_options, $radio_options;
    if ( ! isset( $input['option1'] ) )
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    $input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
    if ( ! isset( $input['radioinput'] ) )
        $input['radioinput'] = null;
    if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
        $input['radioinput'] = null;
    $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );
    return $input;
}
