<?php
/**
 * Extend TinyMCE toolbar
 *
 * @package visual-portfolio/tinymce
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Visual_Portfolio_TinyMCE
 */
class Visual_Portfolio_TinyMCE {
    /**
     * Visual_Portfolio_TinyMCE constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    /**
     * Hooks.
     */
    public function init_hooks() {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
        add_action( 'admin_head', array( $this, 'admin_head' ) );
    }

    /**
     * Admin Head Action.
     */
    public function admin_head() {
        if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
            add_filter( 'mce_external_plugins', array( $this, 'mce_external_plugins' ) );
            add_filter( 'mce_buttons', array( $this, 'mce_buttons' ) );
        }
    }

    /**
     * Enqueue admin scripts
     *
     * @param string $page - page name.
     */
    public function admin_enqueue_scripts( $page ) {
        if ( 'post.php' === $page || 'post-new.php' === $page ) {
            // add tiny mce data.
            $data_tiny_mce = array();

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
            foreach ( $vp_query as $post ) {
                $data_tiny_mce[] = array(
                    'id'    => $post->ID,
                    'title' => '#' . $post->ID . ' - ' . $post->post_title,
                );
            }

            // return if no data.
            if ( ! count( $data_tiny_mce ) ) {
                return;
            }

            wp_enqueue_script( 'visual-portfolio-tinymce-localize', visual_portfolio()->plugin_url . 'assets/admin/js/mce-localize.min.js', array(), '2.8.2', true );
            wp_localize_script( 'visual-portfolio-tinymce-localize', 'VPTinyMCEOptions', $data_tiny_mce );
        }
    }

    /**
     * Add script for button
     *
     * @param array $plugins - available plugins.
     *
     * @return mixed
     */
    public function mce_external_plugins( $plugins ) {
        $plugins['visual_portfolio'] = visual_portfolio()->plugin_url . 'assets/admin/js/mce-dropdown.min.js';
        return $plugins;
    }

    /**
     * Add dropdown button to tinymce
     *
     * @param array $buttons - available buttons.
     *
     * @return mixed
     */
    public function mce_buttons( $buttons ) {
        array_push( $buttons, 'visual_portfolio' );
        return $buttons;
    }
}

new Visual_Portfolio_TinyMCE();
