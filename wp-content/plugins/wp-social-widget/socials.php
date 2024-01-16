<?php
/*
Plugin Name: WP Social Widget
Plugin URI: https://wordpress.org/plugins/wp-social-widget/
Description: A wordpress plugin to share links of social networking sites.
Version: 2.2.0
Author: catchsquare
Author URI: http://catchsquare.com
License: GPLv2 or later
Text Domain: wp-social-widget
*/


/*Make sure we don't expose any info if called directly*/
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

/*
prefix : wpsw_
 */

/*Define Constants for this plugin*/
define( 'SOCIAL_NETWORK_VERSION', '2.2.0' );
define( 'SOCIAL_NETWORK_PATH', plugin_dir_path( __FILE__ ) );
define( 'SOCIAL_NETWORK_URL', plugin_dir_url( __FILE__ ) );



require SOCIAL_NETWORK_PATH."inc/include_file.php";
require SOCIAL_NETWORK_PATH."inc/shortcodes.php";
require SOCIAL_NETWORK_PATH."inc/social-widget.php";
