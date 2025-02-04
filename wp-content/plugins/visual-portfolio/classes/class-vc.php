<?php
/**
 * Shortcode for Visual Composer
 *
 * @package visual-portfolio/vc
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Visual_Portfolio_VC
 */
class Visual_Portfolio_VC {
    /**
     * Visual_Portfolio_VC constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    /**
     * Hooks.
     */
    public function init_hooks() {
        add_action( 'init', array( $this, 'add_shortcode' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
    }

    /**
     * Enqueue script for frontend VC
     *
     * @param object $page - page object.
     */
    public function admin_enqueue_scripts( $page ) {
        if ( 'post.php' === $page || 'post-new.php' === $page ) {
            wp_enqueue_script( 'visual-portfolio-vc-frontend', visual_portfolio()->plugin_url . 'assets/admin/js/vc-frontend.min.js', array( 'jquery' ), '2.8.2', true );
        }
    }

    /**
     * Add shortcode to the visual composer
     */
    public function add_shortcode() {
        if ( function_exists( 'vc_map' ) ) {
            // get all visual-portfolio post types.
            // Don't use WP_Query on the admin side https://core.trac.wordpress.org/ticket/18408 .
            $vp_query = get_posts(
                array(
                    'post_type'      => 'vp_lists',
                    'posts_per_page' => -1,
                    'showposts'      => -1,
                    'paged'          => -1,
                )
            );

            $data_vc = array();
            foreach ( $vp_query as $post ) {
                $data_vc[] = array( $post->ID, '#' . $post->ID . ' - ' . $post->post_title );
            }

            vc_map(
                array(
                    'name'     => esc_html__( 'Visual Portfolio', 'visual-portfolio' ),
                    'base'     => 'visual_portfolio',
                    'controls' => 'full',
                    'icon'     => 'icon-visual-portfolio',
                    'params'   => array(
                        array(
                            'type'        => 'dropdown',
                            'heading'     => esc_html__( 'Select Layout', 'visual-portfolio' ),
                            'param_name'  => 'id',
                            'value'       => $data_vc,
                            'description' => '',
                            'admin_label' => true,
                        ),
                        array(
                            'type'        => 'textfield',
                            'heading'     => esc_html__( 'Custom Classes', 'visual-portfolio' ),
                            'param_name'  => 'class',
                            'value'       => '',
                            'description' => '',
                        ),
                        array(
                            'type'       => 'css_editor',
                            'heading'    => esc_html__( 'CSS', 'visual-portfolio' ),
                            'param_name' => 'vc_css',
                            'group'      => esc_html__( 'Design Options', 'visual-portfolio' ),
                        ),
                    ),
                )
            );
        }
    }
}

new Visual_Portfolio_VC();
