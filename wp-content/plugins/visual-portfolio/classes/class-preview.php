<?php
/**
 * Register fake page for portfolio preview.
 *
 * @package visual-portfolio/preview
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Visual_Portfolio_Preview
 */
class Visual_Portfolio_Preview {

    /**
     * Preview enabled.
     *
     * @var bool
     */
    public $preview_enabled = false;

    /**
     * Visual_Portfolio_Preview constructor.
     */
    public function __construct() {
        $this->init_hooks();
    }

    /**
     * Hooks.
     */
    public function init_hooks() {
        add_action( 'init', array( $this, 'is_preview_check' ) );
        add_filter( 'pre_handle_404', array( $this, 'pre_handle_404' ) );
        add_filter( 'vpf_get_options', array( $this, 'filter_preview_option' ) );
        add_action( 'template_redirect', array( $this, 'template_redirect' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ), 11 );

        add_action( 'wp_print_scripts', array( $this, 'localize_scripts' ), 9 );
    }

    /**
     * Prepare preview URL to use from our preview iframe.
     *
     * @return string
     */
    public function get_preview_url() {
        add_filter( 'pre_option_permalink_structure', '__return_empty_string' );

        $preview_url = set_url_scheme(
            add_query_arg(
                array(
                    'vp_preview'      => 'vp_preview',
                    'vp_preview_time' => time(),
                ),
                // We used `get_site_url()` before, but it does not work on some hosts,
                // that have custom URL structure in admin area.
                //
                // For example:
                // * Admin URL: https://mysite.com/wp/
                // * Front URL: https://mysite.com/
                //
                // Use `trailingslashit` to fix some rare servers problems
                // when preview is not working if no trailing slash in URL.
                //
                // For example:
                // * Error:   https://mysite.com/wp
                // * Success: https://mysite.com/wp/
                // .
                trailingslashit( home_url( '/' ) )
            )
        );

        remove_filter( 'pre_option_permalink_structure', '__return_empty_string' );

        return $preview_url;
    }

    /**
     * Localize scripts with preview URL.
     */
    public function localize_scripts() {
        $preview_url = $this->get_preview_url();

        // Localize scripts.
        wp_localize_script(
            'visual-portfolio-gutenberg',
            'VPAdminGutenbergVariables',
            array(
                'preview_url' => $preview_url,
            )
        );
        wp_localize_script(
            'visual-portfolio-elementor',
            'VPAdminElementorVariables',
            array(
                'preview_url' => $preview_url,
            )
        );
    }

    /**
     * Check if the page is preview.
     */
    public function is_preview_check() {
        // phpcs:ignore
        if ( ! isset( $_GET['vp_preview'] ) ) {
            return false;
        }

        // phpcs:disable
        $frame = isset( $_POST['vp_preview_frame'] ) ? esc_attr( wp_unslash( $_POST['vp_preview_frame'] ) ) : false;
        $id    = isset( $_POST['vp_preview_frame_id'] ) ? esc_attr( wp_unslash( $_POST['vp_preview_frame_id'] ) ) : false;

        // Elementor preview.
        if ( ! $frame && ! $id && isset( $_REQUEST['vp_preview_type'] ) && 'elementor' === $_REQUEST['vp_preview_type'] ) {
            $frame = isset( $_REQUEST['vp_preview_frame'] ) ? esc_attr( wp_unslash( $_REQUEST['vp_preview_frame'] ) ) : false;
            $id    = isset( $_REQUEST['vp_preview_frame_id'] ) ? esc_attr( wp_unslash( $_REQUEST['vp_preview_frame_id'] ) ) : false;
        }
        // phpcs:enable

        $this->preview_enabled = 'true' === $frame;
    }

    /**
     * Prevent 404 headers if it is vp_preview page.
     *
     * @param bool $val - handle 404 headers.
     *
     * @return bool
     */
    public function pre_handle_404( $val ) {
        return $this->preview_enabled ? true : $val;
    }

    /**
     * Disable infinite loading in preview.
     *
     * @param array $options - options.
     *
     * @return array
     */
    public function filter_preview_option( $options ) {
        if ( $this->preview_enabled && isset( $options['pagination'] ) && 'infinite' === $options['pagination'] ) {
            $options['pagination'] = 'load-more';
        }

        return $options;
    }

    /**
     * Display preview frame
     * Available by requesting:
     * SITE/?vp_preview=vp_preview with POST data: `vp_preview_frame=true&vp_preview_frame_id=10`
     */
    public function template_redirect() {
        if ( is_admin() || ! $this->preview_enabled ) {
            return;
        }

        $this->print_template();
        exit;
    }

    /**
     * Enqueue scripts action.
     */
    public function wp_enqueue_scripts() {
        // Dequeue WooCommerce Geolocation script, since it reloads our preview iframe.
        // Thanks to https://wordpress.org/support/topic/in-editor-the-normal-preview-replaced-with-a-smaller-website-load/ .
        if ( $this->preview_enabled && wp_script_is( 'wc-geolocation', 'enqueued' ) ) {
            wp_dequeue_script( 'wc-geolocation' );
        }
    }

    /**
     * Do not cache.
     *
     * Tell WordPress cache plugins not to cache this request.
     */
    public function do_not_cache() {
        // Disable cache plugins.
        if ( ! defined( 'DONOTCACHEPAGE' ) ) {
            // phpcs:ignore
            define( 'DONOTCACHEPAGE', true );
        }

        if ( ! defined( 'DONOTCACHEDB' ) ) {
            // phpcs:ignore
            define( 'DONOTCACHEDB', true );
        }

        if ( ! defined( 'DONOTMINIFY' ) ) {
            // phpcs:ignore
            define( 'DONOTMINIFY', true );
        }

        if ( ! defined( 'DONOTCDN' ) ) {
            // phpcs:ignore
            define( 'DONOTCDN', true );
        }

        if ( ! defined( 'DONOTCACHCEOBJECT' ) ) {
            // phpcs:ignore
            define( 'DONOTCACHCEOBJECT', true );
        }

        // Set the headers to prevent caching for the different browsers.
        nocache_headers();
    }

    /**
     * Template of preview page.
     */
    public function print_template() {
        do_action( 'vpf_preview_template' );

        // Tell to WP Cache plugins do not cache this request.
        $this->do_not_cache();

        // Don't redirect to permalink.
        remove_action( 'template_redirect', 'redirect_canonical' );

        // Compatibility with Yoast SEO plugin when 'Removes unneeded query variables from the URL' enabled.
        if ( class_exists( 'WPSEO_Frontend' ) ) {
            remove_action( 'template_redirect', array( \WPSEO_Frontend::get_instance(), 'clean_permalink' ), 1 );
        }

        // Disable the WP admin bar.
        add_filter( 'show_admin_bar', '__return_false' );

        // Enqueue assets.
        wp_enqueue_script( 'iframe-resizer-content', visual_portfolio()->plugin_url . 'assets/vendor/iframe-resizer/js/iframeResizer.contentWindow.min.js', array(), '4.2.11', true );
        wp_enqueue_script( 'visual-portfolio-preview', visual_portfolio()->plugin_url . 'assets/js/preview.min.js', array( 'jquery', 'iframe-resizer-content' ), '2.8.2', true );

        // Post data for script.
        wp_localize_script(
            'visual-portfolio-preview',
            'vp_preview_post_data',
            // phpcs:ignore
            isset( $_POST ) && ! empty( $_POST ) ? $_POST : array()
        );

        $class_name = 'vp-preview-wrapper';

        // preview type.
        // phpcs:ignore
        $type = isset( $_POST['vp_preview_type'] ) ? esc_attr( wp_unslash( $_POST['vp_preview_type'] ) ) : false;

        if ( $type ) {
            $class_name .= ' vp-preview-type-' . $type;
        }

        // Prepare portfolio post options.
        $options = array();

        // phpcs:disable
        if ( isset( $_POST ) && ! empty( $_POST ) ) {
            // phpcs:ignore
            foreach ( $_POST as $name => $val ) {
                if ( strpos( $name, 'vp_' ) === 0 ) {
                    $options[ preg_replace( '/^vp_/', '', $name ) ] = $val;
                }
            }
        }

        // Elementor preview.
        if ( isset( $_REQUEST['vp_preview_type'] ) && 'elementor' === $_REQUEST['vp_preview_type'] && isset( $_REQUEST['vp_preview_frame_id'] ) ) {
            $options[ 'id' ] = esc_attr( wp_unslash( $_REQUEST['vp_preview_frame_id'] ) );
        }
        // phpcs:enable

        // Register assets.
        Visual_Portfolio_Assets::enqueue( $options );

        // Custom styles.
        visual_portfolio()->include_template_style( 'visual-portfolio-preview', 'preview/style', array(), '2.8.2' );

        // Output template.
        visual_portfolio()->include_template(
            'preview/preview',
            array(
                'options'    => $options,
                'class_name' => $class_name,
            )
        );
    }
}

new Visual_Portfolio_Preview();
