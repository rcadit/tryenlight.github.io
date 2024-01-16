<?php
if( !function_exists( 'wpsw_social_admin_css_styles' )) {

    add_action('admin_enqueue_scripts','wpsw_social_admin_css_styles');
    add_action('wp_enqueue_scripts','wpsw_social_admin_css_styles');
    // add_action('load-widgets.php','wpsw_social_admin_css_styles');
    function wpsw_social_admin_css_styles(){

        $min = '';
        if( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ){
            $min = '';
        }
    	// add social style css file
    	wp_register_style( 'wpsw_social-icons', SOCIAL_NETWORK_URL.'assets/css/social-icons' . $min . '.css', false, SOCIAL_NETWORK_VERSION );
    	wp_enqueue_style('wpsw_social-icons' );

        wp_register_style( 'wpsw_social-css', SOCIAL_NETWORK_URL.'assets/css/social-style' . $min . '.css', false, SOCIAL_NETWORK_VERSION );
        wp_enqueue_style('wpsw_social-css' );

    	if( is_admin() ) {
    		// Add the color picker css file       
            wp_enqueue_style( 'wp-color-picker' ); 
            // wp_enqueue_script( 'wp-color-picker' ); 
            wp_register_script( 'wpsw_social-color-picker-js', SOCIAL_NETWORK_URL.'assets/js/social-color_picker.js',array('jquery','wp-color-picker'), SOCIAL_NETWORK_VERSION );
            wp_enqueue_script('wpsw_social-color-picker-js'); 

            wp_register_style( 'wpsw_social-admin_style', SOCIAL_NETWORK_URL.'assets/css/social-admin_style' . $min . '.css',false, SOCIAL_NETWORK_VERSION );
            wp_enqueue_style('wpsw_social-admin_style');
    	}
    }
}