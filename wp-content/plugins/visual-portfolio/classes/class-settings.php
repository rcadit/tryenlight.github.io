<?php
/**
 * Plugin Settings
 *
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once visual_portfolio()->plugin_path . 'vendors/class-settings-api.php';

/**
 * Visual Portfolio Settings Class
 */
class Visual_Portfolio_Settings {
    /**
     * Settings API instance
     *
     * @var object
     */
    public static $settings_api;

    /**
     * Visual_Portfolio_Settings constructor.
     */
    public function __construct() {
        self::init_actions();
    }

    /**
     * Get Option Value
     *
     * @param string $option - option name.
     * @param string $section - section name.
     * @param string $deprecated_default - default option value.
     *
     * @return bool|string
     */
    public static function get_option( $option, $section, $deprecated_default = '' ) {
        $options = get_option( $section );
        $result  = '';

        if ( isset( $options[ $option ] ) ) {
            $result = $options[ $option ];
        } else {
            // find default.
            $fields = self::get_settings_fields();

            if ( isset( $fields[ $section ] ) && is_array( $fields[ $section ] ) ) {
                foreach ( $fields[ $section ] as $field_data ) {
                    if ( $option === $field_data['name'] && isset( $field_data['default'] ) ) {
                        $result = $field_data['default'];
                    }
                }
            }
        }

        return 'off' === $result ? false : ( 'on' === $result ? true : $result );
    }

    /**
     * Update Option Value
     *
     * @param string $option - option name.
     * @param string $section - section name.
     * @param string $value - new option value.
     */
    public static function update_option( $option, $section, $value ) {
        $options = get_option( $section );

        if ( ! is_array( $options ) ) {
            $options = array();
        }

        $options[ $option ] = $value;

        update_option( $section, $options );
    }

    /**
     * Init actions
     */
    public static function init_actions() {
        self::$settings_api = new Visual_Portfolio_Settings_API();

        add_action( 'admin_init', array( __CLASS__, 'admin_init' ) );
        add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ), 11 );
    }

    /**
     * Initialize the settings
     *
     * @return void
     */
    public static function admin_init() {
        // set the settings.
        self::$settings_api->set_sections( self::get_settings_sections() );
        self::$settings_api->set_fields( self::get_settings_fields() );

        // initialize settings.
        self::$settings_api->admin_init();
    }

    /**
     * Register the admin settings menu
     *
     * @return void
     */
    public static function admin_menu() {
        add_submenu_page(
            'edit.php?post_type=portfolio',
            esc_html__( 'Settings', 'visual-portfolio' ),
            esc_html__( 'Settings', 'visual-portfolio' ),
            'manage_options',
            'visual-portfolio-settings',
            array( __CLASS__, 'print_settings_page' )
        );
    }

    /**
     * Plugin settings sections
     *
     * @return array
     */
    public static function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'vp_general',
                'title' => esc_html__( 'General', 'visual-portfolio' ),
            ),
            array(
                'id'    => 'vp_images',
                'title' => esc_html__( 'Images', 'visual-portfolio' ),
            ),
            array(
                'id'    => 'vp_popup_gallery',
                'title' => esc_html__( 'Popup Gallery', 'visual-portfolio' ),
            ),
            array(
                'id'    => 'vp_social_integrations',
                'title' => esc_html__( 'Social Integrations', 'visual-portfolio' ),
            ),
        );

        return apply_filters( 'vpf_settings_sections', $sections );
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    public static function get_settings_fields() {
        $settings_fields = array(
            'vp_general' => array(
                array(
                    'name'    => 'portfolio_slug',
                    'label'   => esc_html__( 'Portfolio Slug', 'visual-portfolio' ),
                    'type'    => 'text',
                    'default' => 'portfolio',
                ),
                array(
                    'name'    => 'filter_taxonomies',
                    'label'   => esc_html__( 'Filter Taxonomies', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'You can show custom taxonomies in the portfolio Filter. Enter some taxonomies by "," separating values. Example: "product_cat,product_tag"', 'visual-portfolio' ),
                    'type'    => 'text',
                    'default' => '',
                ),
                array(
                    'name'    => 'no_image',
                    'label'   => esc_html__( 'No Image', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'This image used if the featured image of a post is not specified.', 'visual-portfolio' ),
                    'type'    => 'image',
                    'default' => '',
                    'options' => array(
                        'button_label' => esc_html__( 'Choose image', 'visual-portfolio' ),
                    ),
                ),

                // AJAX Caching and Preloading.
                array(
                    'name'    => 'ajax_caching',
                    'label'   => esc_html__( 'AJAX Cache and Preload', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'Reduce AJAX calls request time.', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => ! class_exists( 'Visual_Portfolio_Pro' ) ? 'off' : 'on',
                    'is_pro'  => true,
                ),
            ),
            'vp_images' => array(
                array(
                    'name'    => 'lazy_loading',
                    'label'   => esc_html__( 'Lazy Loading', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'Enable', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),

                array(
                    'name'  => 'images_sizes_title',
                    'label' => esc_html__( 'Image Sizes', 'visual-portfolio' ),
                    'type'  => 'html',
                ),
                array(
                    'name'    => 'images_layouts_title',
                    'label'   => esc_html__( 'Layouts', 'visual-portfolio' ),
                    'desc'    => __( 'Image sizes used in portfolio layouts.', 'visual-portfolio' ),
                    'type'    => 'html',
                ),
                array(
                    'name'        => 'sm',
                    'label'       => esc_html__( 'Small', 'visual-portfolio' ),
                    'type'        => 'number',
                    'placeholder' => '500',
                    'default'     => 500,
                ),
                array(
                    'name'        => 'md',
                    'label'       => esc_html__( 'Medium', 'visual-portfolio' ),
                    'type'        => 'number',
                    'placeholder' => '800',
                    'default'     => 800,
                ),
                array(
                    'name'        => 'lg',
                    'label'       => esc_html__( 'Large', 'visual-portfolio' ),
                    'type'        => 'number',
                    'placeholder' => '1280',
                    'default'     => 1280,
                ),
                array(
                    'name'        => 'xl',
                    'label'       => esc_html__( 'Extra Large', 'visual-portfolio' ),
                    'type'        => 'number',
                    'placeholder' => '1920',
                    'default'     => 1920,
                ),
                array(
                    'name'    => 'images_popup_title',
                    'label'   => esc_html__( 'Popup Gallery', 'visual-portfolio' ),
                    'desc'    => __( 'Image sizes used in popup gallery images.', 'visual-portfolio' ),
                    'type'    => 'html',
                ),
                array(
                    'name'        => 'sm_popup',
                    'label'       => esc_html__( 'Small', 'visual-portfolio' ),
                    'type'        => 'number',
                    'placeholder' => '500',
                    'default'     => 500,
                ),
                array(
                    'name'        => 'md_popup',
                    'label'       => esc_html__( 'Medium', 'visual-portfolio' ),
                    'type'        => 'number',
                    'placeholder' => '800',
                    'default'     => 800,
                ),
                array(
                    'name'        => 'xl_popup',
                    'label'       => esc_html__( 'Large', 'visual-portfolio' ),
                    'type'        => 'number',
                    'placeholder' => '1920',
                    'default'     => 1920,
                ),
                array(
                    'name'    => 'images_sizes_note',
                    // translators: %s: regenerate thumbnails url.
                    'desc'    => sprintf( __( 'After publishing your changes, new image sizes may not be shown until you <a href="%s" target="_blank">Regenerate Thumbnails</a>.', 'visual-portfolio' ), 'https://wordpress.org/plugins/regenerate-thumbnails/' ),
                    'type'    => 'html',
                ),
            ),
            'vp_popup_gallery' => array(
                // Vendor.
                array(
                    'name'    => 'vendor',
                    'label'   => esc_html__( 'Vendor Script', 'visual-portfolio' ),
                    'type'    => 'select',
                    'options' => array(
                        'fancybox'   => esc_html__( 'Fancybox', 'visual-portfolio' ),
                        'photoswipe' => esc_html__( 'PhotoSwipe', 'visual-portfolio' ),
                    ),
                    'default' => 'fancybox',
                ),

                // Default WordPress Images.
                array(
                    'name'    => 'enable_on_wordpress_images',
                    'label'   => esc_html__( 'WordPress Images', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'Enable popup for WordPress images and galleries.', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'off',
                ),

                // Deeplinking.
                array(
                    'name'    => 'deep_linking',
                    'label'   => esc_html__( 'Deep Linking', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'Makes URL automatically change when you open popup and you can easily link to specific popup image.', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => ! class_exists( 'Visual_Portfolio_Pro' ) ? 'off' : 'on',
                    'is_pro'  => true,
                ),

                // General Popup Settings.
                array(
                    'name'    => 'show_arrows',
                    'label'   => esc_html__( 'Display Arrows', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'Arrows to navigate between images.', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),
                array(
                    'name'    => 'show_counter',
                    'label'   => esc_html__( 'Display Images Counter', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'On the top left corner will be showed images counter.', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),
                array(
                    'name'    => 'show_zoom_button',
                    'label'   => esc_html__( 'Display Zoom Button', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),
                array(
                    'name'    => 'show_fullscreen_button',
                    'label'   => esc_html__( 'Display Fullscreen Button', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),
                array(
                    'name'    => 'show_share_button',
                    'label'   => esc_html__( 'Display Share Button', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),
                array(
                    'name'    => 'show_close_button',
                    'label'   => esc_html__( 'Display Close Button', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),

                // Fancybox Popup Settings.
                array(
                    'name'    => 'show_thumbs',
                    'label'   => esc_html__( 'Display Thumbnails', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),
                array(
                    'name'    => 'show_download_button',
                    'label'   => esc_html__( 'Display Download Button', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'off',
                ),
                array(
                    'name'    => 'show_slideshow',
                    'label'   => esc_html__( 'Display Slideshow', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'off',
                ),

                // Click to Zoom.
                array(
                    'name'    => 'click_to_zoom',
                    'label'   => esc_html__( 'Click to Zoom', 'visual-portfolio' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                ),

                // Colors.
                array(
                    'name'    => 'background_color',
                    'label'   => esc_html__( 'Background Color', 'visual-portfolio' ),
                    'type'    => 'color',
                    'default' => '#1e1e1e',
                ),

                // Page iframe popup.
                array(
                    'name'    => 'pages_iframe_custom_css',
                    'label'   => esc_html__( 'Pages iFrame Custom CSS', 'visual-portfolio' ),
                    'desc'    => esc_html__( 'When you display pages in popup iframe, you may not need some page elements like header and footer. Hide it using custom CSS with classname `.vp-popup-iframe`.', 'visual-portfolio' ),
                    'type'    => 'textarea',
                    'default' => ! class_exists( 'Visual_Portfolio_Pro' ) ? '' : '
.vp-popup-iframe #site-header,
.vp-popup-iframe #site-footer,
.vp-popup-iframe #colophon {
    display: none;
}',
                    'is_pro'  => true,
                ),
            ),
            'vp_social_integrations' => array(
                array(
                    'name'    => 'social_pro_info',
                    'desc'    => '
                        <div class="vpf-settings-info-pro">
                            <h3>' . esc_html__( 'PRO Feature', 'visual-portfolio' ) . '</h3>
                            <div>
                                <p>' . esc_html__( 'Social feeds such as Instagram, Youtube, Flickr, Twitter, etc...', 'visual-portfolio' ) . '</p>
                                <a class="vpf-settings-info-pro-button" target="_blank" rel="noopener noreferrer" href="https://visualportfolio.co/pro/">' . esc_html__( 'Read More', 'visual-portfolio' ) . '</a>
                            </div>
                        </div>
                    ',
                    'type'    => 'html',
                ),
            ),
        );

        return apply_filters( 'vpf_settings_fields', $settings_fields );
    }

    /**
     * The plugin page handler
     *
     * @return void
     */
    public static function print_settings_page() {
        self::$settings_api->admin_enqueue_scripts();

        echo '<div class="wrap">';
        echo '<h2>' . esc_html__( 'Visual Portfolio Settings', 'visual-portfolio' ) . '</h2>';

        self::$settings_api->show_navigation();
        self::$settings_api->show_forms();

        echo '</div>';

        ?>
        <script>
            (function( $ ) {
                // update controls.
                function updateControls() {
                    // popup gallery.
                    var vendor = $('tr.vendor select').val();

                    $('tr.show_download_button, tr.show_slideshow, tr.show_thumbs')[ 'fancybox' === vendor ? 'show' : 'hide' ]();
                }

                updateControls();
                $('form').on('change', updateControls);
            })(jQuery);
        </script>
        <?php
    }
}

new Visual_Portfolio_Settings();
