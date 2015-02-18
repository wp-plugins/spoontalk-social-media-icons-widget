<?php 

// Lets write the default styling Settings Variable which we will be supporting  default value 

if ( isset( $_POST['submit'] ) ) 
{
$Facebook = $_POST['fb'];
$Linkedin = $_POST['lnkd'];
$Twitter = $_POST['twtr'];
$GooglePlus = $_POST['gp'];


update_option('Facebook',$Facebook);
update_option('Linkedin',$Linkedin);
update_option('Twitter',$Twitter);
update_option('GooglePlus',$GooglePlus);

}
// default data  settings for the plugin 

function spoontalk_get_option_defaults() {
$defaults = array ( 
    'border' => 1,
    'align' => 'left',
	'size' => 30,
	'spacing' => 10,
	'bottom_spacing' => 5
        ); 
  
   return apply_filters( 'spoontalk_social_style_settings', $defaults );
}
if ( false == get_option( 'spoontalk_social_style_settings' ) ) {
	update_option( 'spoontalk_social_style_settings', spoontalk_get_option_defaults() );
}
$spoontalk_social_style_settings = get_option( 'spoontalk_social_style_settings' );


$spoontalk_social_style_settings = wp_parse_args( 
    get_option( 'spoontalk_social_style_settings', array() ), 
    spoontalk_get_option_defaults() 
);

if ( isset( $_POST['submit1'] ) ) 
{
$spoontalk_social_style_settings['border'] = $_POST['border'];
$spoontalk_social_style_settings['align'] = $_POST['align'];
$spoontalk_social_style_settings['size'] = $_POST['size'];
$spoontalk_social_style_settings['spacing'] = $_POST['spacing'];
$spoontalk_social_style_settings['bottom_spacing'] = $_POST['bottom_spacing'];

update_option('spoontalk_social_style_settings', $spoontalk_social_style_settings);


}
?>

<div class="wrap settings-wrap" id="page-settings">
    <h2> Spoontalk Social Icon Settings</h2>
    <div id="option-tree-header-wrap">
        <ul id="option-tree-header">
            <li id=""><a href="" target="_blank"></a>
            </li>
            <li id="option-tree-version"><span>Social Media Link Plugin </span>
            </li>
        </ul>
    </div>
<div id="option-tree-settings-api">
    <div id="option-tree-sub-header"></div>
     <div class = "ui-tabs ui-widget ui-widget-content ui-corner-all">
      <ul>
        <li id="tab_create_setting"><a href="#section_general">Social Media URL</a></li>
        <li id="tab_import"><a href="#section_design" >Design Customization</a></li>
        <li id="tab_import"><a href="#section_howto" >How To</a></li>
      </ul>
<div id="poststuff" class="metabox-holder">
  <div id="post-body">
    <div id="post-body-content">
    
<div id="section_general" class = "postbox">
 <div class="inside">
  <div id="setting_theme_options_ui_text" class="format-settings">
   <div class="format-setting-wrap">
                                        
	<form method="post" action="#section_general">
    <table class="form-table">
         
		<tr valign="top">
		<th scope="row"><i class="fa fa-facebook"></i><br/><label class="icon_label" for="fb">Facebook:</label></th>
        <td><input class="regular-text" type="text" size="20" name="fb" id="fb" value= "<?php echo get_option( 'Facebook' );?>" />
		<p class="description">enter facebook URL for eg https://www.facebook.com</p>
		</td>
		<th scope="row"><i class="fa fa-linkedin"></i><br/><label for="lnkd">Linkedin:</label></th>
        <td><input class="regular-text" type="text" size="64" name="lnkd" id="lnkd" value= "<?php echo get_option( 'Linkedin' );?>" />
		<p class="description">enter linkedin URL for eg https://www.linkedin.com</p></td>
		</tr>
		
		<tr valign="top">
	
		<th scope="row"><i class="fa fa-twitter"></i><br/><label for="twtr">Twitter:</label></th>
		
        <td><input class="regular-text" type="text" size="64" name="twtr" id="twtr" value= "<?php echo get_option( 'Twitter' );?>" />
		
		<p class="description">enter twitter URL for eg https://www.twitter.com</p></td>
			<th scope="row"><i class="fa fa-google-plus"></i><br/><label for="gp">G Plus:</label></th>
        <td><input class="regular-text" type="text" size="64" name="gp" id="gp" value= "<?php echo get_option( 'Googleplus' );?>" />
			
		<p class="description">enter twitter URL for eg https://www.plus.google.com</p></td>
	
		</tr>
		<tr valign="top">
        <td><input type="submit" name="submit" value="save settings" class="button button-primary" /></td>
        </tr>
    </table>
	
	</form>
                                        
   </div>
  </div>
 </div>
</div>
    
<div id="section_design" class = "postbox">
 <div class="inside">
  <div id="setting_import_xml_text" class="format-settings">
   <div class="format-setting-wrap">
    <div class="format-setting-label">
                                            
	<form method="post" action="#section_design">
	
	<?php
		$spoontalk_social_style_settings = get_option ('spoontalk_social_style_settings');
		
	  $size = $spoontalk_social_style_settings['size'];
	  	$border = $spoontalk_social_style_settings['border'];
	$align = $spoontalk_social_style_settings['align'];
		$spacing=$spoontalk_social_style_settings['spacing'];
			$bottom_spacing=$spoontalk_social_style_settings['bottom_spacing'];
	?>
	
    <table class="form-table">									
		
		<tr valign="top">
		<th scope="row"><label for="border">Icon Border Radius:</label></th>
		<td><select id="border" name="border">
		<?php for($p=1; $p<=50; $p++){ ?>
		<option  <?php
		if ($border==$p) echo 'selected="selected"';  ?>  ><?php echo $p;  }?></option> 
		</select><label for="border">%Percent</label><p class="description">Select 50% for round shape icon </p></td>
		<th scope="row"><label for="size">Icon Size:</label></th>
		<td><select id="size" name="size">
	
		<option  <?php
		if ($size=="25") echo 'selected="selected"';  ?>  ><?php _e('25',''); ?></option>
		<option  <?php
		if ($size=="30") echo 'selected="selected"';  ?>  ><?php _e('30',''); ?></option>
			<option  <?php
		if ($size=="35") echo 'selected="selected"';  ?>  ><?php _e('35',''); ?></option>
		<option  <?php
		if ($size=="40") echo 'selected="selected"';  ?>  ><?php _e('40',''); ?></option> 
		</select><label for="size">px</label><p class="description">select icon size from list. for eg 25 px</p></td>
		</tr>
	
		
		<tr valign="top">
		<th scope="row"><label for="align">Alignment:</label></th>
		<td><select id="align" name="align">
		
		<option  <?php
		if ($align=="left") echo 'selected="selected"';  ?>  ><?php _e('left',''); ?></option> 
		<option  <?php
		if ($align=="center") echo 'selected="selected"';  ?>  ><?php _e('center',''); ?></option>
		<option  <?php
		if ($align=="right") echo 'selected="selected"';  ?>  ><?php _e('right',''); ?></option>
		</select><p class="description">select icons alignment. for eg left</p></td>
		
		<th scope="row"><label for="spacing">Spacing:</label></th>
		<td><select id="spacing" name="spacing">
		<?php for($s=1; $s<=20; $s++){ ?>
		<option  <?php
		if ($spacing==$s) echo 'selected="selected"';  ?>  ><?php echo $s;  }?></option> 
		</select><label for="spacing">PX</label><p class="description">Manage space between icons  </p></td>
		</tr>
		
		
		<tr valign="top">
		
		
		<th scope="row"><label for="bottom_spacing">Bottom Spacing:</label></th>
		<td><select id="bottom_spacing" name="bottom_spacing">
		<?php for($bottom_s=1; $bottom_s<=20; $bottom_s++){ ?>
		<option  <?php
		if ($bottom_spacing==$bottom_s) echo 'selected="selected"';  ?>  ><?php echo $bottom_s;  }?></option> 
		</select><label for="bottom_spacing">PX</label><p class="description">Manage bottom Space of icons  </p></td>
		</tr>
		
		<tr valign="top">
        <td><input type="submit" name="submit1" value="save settings" class="button button-primary" /></td>
        </tr>
		</table>
		</form>									
				
    </div>
   </div>
  </div>
 </div>
</div>

  <div id="section_howto" class = "postbox">

<p>1. Add Social Media Urls by goinf to Social Media URL Tab. If you plan to hide a particular social icon then simply leave the url empty. </p>

<p>2. Customize the Design to suit your style. We currently Support 5 Design Settings</p>
<p>3. In order to create circular / round icons simply set Icon Border Radius 50%</p>
<p>4. Now go to Appearance ->Widgtes and use the SpoonTalk Social Icons Widget.</p>
<p>4. For any query contact us via the <a href = "https://wordpress.org/support/plugin/spoontalk-social-media-icons-widget" target = "_blank">Wordpress Forums</a></p>
<br>




	</div>


                        
        </div>
       </div>
      </div>
    <div class="clear"></div>
    </div>
   </div>
</div>
