<?php
/*
Plugin Name: Spoontalk Social Media Icons Widget
Version: 1.0
Description: Quickly and Esily display Social Media Icons on your Website. 
Author: akhlesh-nagar, a.ankit
Author URI: http://spoontalk.com



License: GNU General Public License v2.0 (or later)
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

add_action( 'admin_init', 'spoontalk_social_admin_init' );
function spoontalk_social_admin_init() {
    /* Register our script. */
		wp_register_script( 'my_tabs_jquery', plugin_dir_url( __FILE__ ) . 'inc/js/spoontalk_tab.js',array('jquery-ui-tabs') );
		wp_register_style( 'my_custom_css', plugins_url( 'inc/css/settings-admin.css', __FILE__ ) );
		wp_register_style( 'css_for_fa_icon', plugins_url( 'inc/css/font-awesome-4.0.3/css/font-awesome.min.css', __FILE__ ) );
}

add_action('admin_menu', 'spoontalk_add_social_media_page');
function spoontalk_add_social_media_page()
{
 $setting_page=add_submenu_page( 'options-general.php', 'Link setting','Spoontalk Social Icons', 'administrator', 'spoontalk_social_media','spoontalk_social_media_setting'); 
  
      add_action('admin_print_scripts-' . $setting_page, 'spoontalk_social_admin_scripts');
}

function spoontalk_social_admin_scripts() {
    /*
     * It will be called only on your plugin admin page, enqueue our script here
     */
    wp_enqueue_style('css_for_fa_icon');
	
	wp_enqueue_style('my_custom_css');

    wp_enqueue_script ('my_tabs_jquery');
}

function spoontalk_social_media_setting()
{
 require_once('settings.php');
}
require_once('spoontalk_social_scripts.php');
add_action( 'wp_enqueue_scripts','social_media_enqueue_css');
function social_media_enqueue_css() 
{  
	
	
	wp_register_style( 'css_for_fa_icon', plugins_url( 'inc/css/font-awesome-4.0.3/css/font-awesome.min.css', __FILE__ ) );
	wp_enqueue_style('css_for_fa_icon');
	

}

// include widget php file
require_once('spoontalk_social_icon_widget.php');

// Add settings link on plugin page
function spoontalk_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=spoontalk_social_media">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'spoontalk_settings_link' );
?>