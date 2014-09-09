<?php

/*
  Plugin Name: Footer Pop-up Banner
  Plugin URI: http://www.ninjapress.net/footer-pop-up-banner/
  Description: Publish powerfull ads on the footer of your pages
  Version: 1.2
  Author: Ninja Press
  Author URI: http://www.ninjapress.net
  License: GPL2
 * 
 */

if (!class_exists('WP_Footer_pop_up_banner')) {

   class WP_Footer_pop_up_banner {

      /**
       * Construct the plugin object
       */
      public function __construct() {
         // register actions
         add_action('admin_menu', array(&$this, 'add_menu'));
         add_action('admin_init', array(&$this, 'admin_init'));
      }

      /**
       * Activate the plugin
       */
      public static function activate() {
         // Do nothing
      }

      /**
       * Deactivate the plugin
       */
      public static function deactivate() {
         // Do nothing
      }

      /**
       * hook into WP's admin_init action hook
       */
      public function admin_init() {
         // Set up the settings for this plugin
         // register the settings for this plugin
         register_setting('wp_footer_pop_up_banner', 'fpub_delay');
         register_setting('wp_footer_pop_up_banner', 'fpub_persist');
         register_setting('wp_footer_pop_up_banner', 'fpub_link');
         register_setting('wp_footer_pop_up_banner', 'fpub_image');
         register_setting('wp_footer_pop_up_banner', 'fpub_width');
         register_setting('wp_footer_pop_up_banner', 'fpub_height');
         register_setting('wp_footer_pop_up_banner', 'fpub_btn_close');
         register_setting('wp_footer_pop_up_banner', 'fpub_background_colr');
         register_setting('wp_footer_pop_up_banner', 'fpub_background_fade');
         register_setting('wp_footer_pop_up_banner', 'fpub_line_color');

         // Possibly do additional admin_init tasks
      }

      /**
       * add a menu
       */
      public function add_menu() {
         add_options_page('Footer Pop-Up Banner', 'Footer Pop-Up Banner', 'manage_options', 'wp_footer_pop_up_banner', array(&$this, 'plugin_settings_page'));
      }

      public function plugin_settings_page() {
         if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
         }

         wp_enqueue_style('wp-color-picker');
         wp_enqueue_script('', plugins_url('js/admin.js', __FILE__), array('jquery', 'jquery-ui-core', 'wp-color-picker'), time(), true);
         
         // Render the settings template
         include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
      }

   }

}

if (class_exists('WP_Footer_pop_up_banner')) {
   // Installation and uninstallation hooks
   register_activation_hook(__FILE__, array('WP_Footer_pop_up_banner', 'activate'));
   register_deactivation_hook(__FILE__, array('WP_Footer_pop_up_banner', 'deactivate'));

   // instantiate the plugin class
   $wp_footer_pop_up_banner = new WP_Footer_pop_up_banner();

   if (isset($wp_footer_pop_up_banner)) {

      // Add the settings link to the plugins page
      function footer_popup_banner_settings_link($links) {
         $settings_link = '<a href="options-general.php?page=wp_footer_pop_up_banner">Settings</a>';
         array_unshift($links, $settings_link);
         return $links;
      }

      function show_banner() {
         wp_enqueue_script('', plugins_url('js/banner.js', __FILE__), array('jquery', 'jquery-ui-core'), time(), true);
         wp_enqueue_style('banner', plugins_url('css/banner.css', __FILE__));

         // Render the settings template
         include(sprintf("%s/templates/banner.php", dirname(__FILE__)));
      }

      $plugin = plugin_basename(__FILE__);
      add_filter("plugin_action_links_$plugin", 'footer_popup_banner_settings_link');
      add_filter('wp_head', 'show_banner');
   }
}   

function hex2rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}