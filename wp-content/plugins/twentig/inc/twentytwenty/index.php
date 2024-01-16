<?php
/**
 * Additional options for Twenty Twenty
 *
 * @package twentig
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register custom control types.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function twentig_register_control_types( $wp_customize ) {
	require_once TWENTIG_PATH . 'inc/twentytwenty/customizer/class-twentig-customize-checkbox-multiple-control.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/customizer/class-twentig-customize-select-optgroup-control.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/customizer/class-twentig-customize-dropdown-pages-private-control.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/customizer/class-twentig-customize-font-presets-control.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/customizer/class-twentig-customize-title-control.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/customizer/class-twentig-customize-more-section.php';
	$wp_customize->register_section_type( 'Twentig_Customize_Title_Control' );
	$wp_customize->register_section_type( 'Twentig_Customize_More_Section' );
}
add_action( 'customize_register', 'twentig_register_control_types' );


/**
 * Add new Customizer parameters.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function twentig_twentytwenty_customize_register( $wp_customize ) {

	// Prevent options from displaying when previewing another theme in the Customizer.
	if ( 'twentytwenty' !== get_template() ) {
		return;
	}

	/*
	 * Site Identity
	 */
	$wp_customize->add_setting(
		'twentig_custom_logo_transparent',
		array(
			'theme_supports' => array( 'custom-logo' ),
		)
	);

	$custom_logo_args = get_theme_support( 'custom-logo' );
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control(
			$wp_customize,
			'twentig_custom_logo_transparent',
			array(
				'label'         => __( 'Transparent Header Logo', 'twentig' ),
				'section'       => 'title_tagline',
				'priority'      => 9,
				'height'        => isset( $custom_logo_args[0]['height'] ) ? $custom_logo_args[0]['height'] : null,
				'width'         => isset( $custom_logo_args[0]['width'] ) ? $custom_logo_args[0]['width'] : null,
				'flex_height'   => isset( $custom_logo_args[0]['flex-height'] ) ? $custom_logo_args[0]['flex-height'] : null,
				'flex_width'    => isset( $custom_logo_args[0]['flex-width'] ) ? $custom_logo_args[0]['flex-width'] : null,
				'button_labels' => array(
					'select'       => __( 'Select logo' ),
					'change'       => __( 'Change logo' ),
					'remove'       => __( 'Remove' ),
					'default'      => __( 'Default' ),
					'placeholder'  => __( 'No logo selected' ),
					'frame_title'  => __( 'Select logo' ),
					'frame_button' => __( 'Choose logo' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_header_tagline',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_header_tagline',
		array(
			'label'    => __( 'Display Tagline', 'twentig' ),
			'type'     => 'checkbox',
			'section'  => 'title_tagline',
			'priority' => 10,
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_mobile_width',
		array(
			'sanitize_callback' => 'twentig_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		'twentig_logo_mobile_width',
		array(
			'label'       => __( 'Logo Width on Mobile (px)', 'twentig' ),
			'section'     => 'title_tagline',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => '20',
				'step' => '10',
				'max'  => '280',
			),
			'priority'    => 12,
		)
	);

	/*
	 * Colors
	 */

	$wp_customize->get_setting( 'accent_hue_active' )->transport = 'refresh';

	$wp_customize->get_control( 'accent_hue_active' )->choices = array(
		'default' => __( 'Default', 'twentig' ),
		'custom'  => __( 'Custom Hue', 'twentig' ),
		'hex'     => __( 'Custom Hexadecimal Color', 'twentig' ),
	);

	$wp_customize->add_setting(
		'twentig_accent_hex_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'twentig_accent_hex_color',
			array(
				'description' => __( 'Caution: make sure that the color is accessible throughout the site (header, content, footer).', 'twentig' ),
				'section'     => 'colors',
				'priority'    => 19,
			)
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_colors_section_title',
			array(
				'label'    => __( 'Twentig Colors', 'twentig' ),
				'section'  => 'colors',
				'settings' => array(),
				'priority' => 20,
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_page_header_no_background',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_page_header_no_background',
		array(
			'label'    => __( 'Apply “Background Color” to the page title section', 'twentig' ),
			'section'  => 'colors',
			'type'     => 'checkbox',
			'priority' => 21,
		)
	);

	$wp_customize->add_setting(
		'twentig_accessible_colors',
		array(
			'default'           => array(),
			'type'              => 'theme_mod',
			'sanitize_callback' => 'twentig_sanitize_accessible_colors',
		)
	);

	$wp_customize->add_setting(
		'twentig_footer_background_color',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'twentig_footer_background_color',
			array(
				'label'       => __( 'Footer Background Color', 'twentig' ),
				'description' => __( 'Apply a custom color to the footer.', 'twentig' ),
				'section'     => 'colors',
				'priority'    => 22,
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_subtle_background_color',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	/*
	 * Cover Template
	 */

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_cover_section_twentig_title',
			array(
				'label'    => __( 'Twentig Settings', 'twentig' ),
				'section'  => 'cover_template_options',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_cover_vertical_align',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_cover_vertical_align',
		array(
			'label'   => __( 'Content Vertical Alignment', 'twentig' ),
			'section' => 'cover_template_options',
			'type'    => 'select',
			'choices' => array(
				'center' => __( 'Middle', 'twentig' ),
				''       => __( 'Bottom', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_cover_page_height',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_cover_page_height',
		array(
			'label'   => __( 'Page Cover Height', 'twentig' ),
			'section' => 'cover_template_options',
			'type'    => 'select',
			'choices' => array(
				'medium' => _x( 'Medium', 'height', 'twentig' ),
				''       => _x( 'Full', 'height', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_cover_page_scroll_indicator',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_cover_page_scroll_indicator',
		array(
			'label'   => __( 'Display scroll indicator on page cover', 'twentig' ),
			'section' => 'cover_template_options',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'twentig_cover_post_height',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_cover_post_height',
		array(
			'label'   => __( 'Post Cover Height', 'twentig' ),
			'section' => 'cover_template_options',
			'type'    => 'select',
			'choices' => array(
				'medium' => _x( 'Medium', 'height', 'twentig' ),
				''       => _x( 'Full', 'height', 'twentig' ),
			),
		)
	);

	/*
	 * Twentig Options Panel
	 */

	$wp_customize->add_panel(
		'twentig_twentytwenty_panel',
		array(
			'title'    => __( 'Twentig Options', 'twentig' ),
			'priority' => 150,
		)
	);

	/**
	 * Site Layout
	 */

	$wp_customize->add_section(
		'twentig_layout_section',
		array(
			'title'    => __( 'Site Layout', 'twentig' ),
			'panel'    => 'twentig_twentytwenty_panel',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting(
		'twentig_text_width',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_text_width',
		array(
			'label'   => __( 'Text Width', 'twentig' ),
			'section' => 'twentig_layout_section',
			'type'    => 'radio',
			'choices' => array(
				''       => _x( 'Narrow (default)', 'text width', 'twentig' ),
				'medium' => _x( 'Medium', 'text width', 'twentig' ),
				'wide'   => _x( 'Wide', 'text width', 'twentig' ),
			),
		)
	);

	/*
	 * Fonts
	 */

	$wp_customize->add_section(
		'twentig_fonts_section',
		array(
			'title'    => __( 'Fonts', 'twentig' ),
			'panel'    => 'twentig_twentytwenty_panel',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Font_Presets_Control(
			$wp_customize,
			'twentig_font_presets',
			array(
				'section'  => 'twentig_fonts_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_fonts_section_title_body',
			array(
				'label'    => __( 'Body', 'twentig' ),
				'section'  => 'twentig_fonts_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_body_font',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_fonts',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Select_Optgroup_Control(
			$wp_customize,
			'twentig_body_font',
			array(
				'label'   => __( 'Body Font', 'twentig' ),
				'section' => 'twentig_fonts_section',
				'choices' => array(
					esc_html__( 'Standard Fonts', 'twentig' )       => array(
						''           => __( 'Default Theme Font', 'twentig' ),
						'sans-serif' => __( 'UI System Font', 'twentig' ),
					),
					esc_html__( 'Curated Google Fonts', 'twentig' ) => twentig_get_body_fonts(),
					esc_html__( 'Additional Fonts', 'twentig' )     => array(
						'custom-google-font' => __( 'Custom Google Font', 'twentig' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_body_font_custom',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'twentig_body_font_custom',
		array(
			'label'       => __( 'Custom Body Font', 'twentig' ),
			'section'     => 'twentig_fonts_section',
			'type'        => 'text',
			'input_attrs' => array(
				'placeholder' => __( 'Font Name', 'twentig' ),
			),
			'description' => sprintf(
				/* translators: link to Google Fonts website */
				__( 'It’s recommended that the 400 italic and 700 styles be available for your <a href="%s" target="_blank">Google Font</a>.', 'twentig' ),
				'https://fonts.google.com/'
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_body_font_fallback',
		array(
			'default'           => 'sans-serif',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_body_font_fallback',
		array(
			'label'   => __( 'Fallback Body Font', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'sans-serif' => 'sans-serif',
				'serif'      => 'serif',
				'monospace'  => 'monospace',
				'cursive'    => 'cursive',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_body_font_size',
		array(
			'default'           => twentig_get_default_body_font_size(),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_body_font_size',
		array(
			'label'   => __( 'Body Font Size', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'small'  => _x( 'Small', 'font size', 'twentig' ),
				'medium' => _x( 'Medium', 'font size', 'twentig' ),
				'large'  => _x( 'Large', 'font size', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_body_line_height',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_body_line_height',
		array(
			'label'   => __( 'Body Line Height', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				''       => _x( 'Tight', 'line height', 'twentig' ),
				'medium' => _x( 'Medium', 'line height', 'twentig' ),
				'loose'  => _x( 'Loose', 'line height', 'twentig' ),
			),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_fonts_section_title_headings',
			array(
				'label'    => __( 'Headings', 'twentig' ),
				'section'  => 'twentig_fonts_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_heading_font',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_fonts',
		)
	);

	$wp_customize->add_control(
		'twentig_heading_font',
		array(
			'label'   => __( 'Headings Font', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => twentig_get_heading_fonts(),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Select_Optgroup_Control(
			$wp_customize,
			'twentig_heading_font',
			array(
				'label'   => __( 'Headings Font', 'twentig' ),
				'section' => 'twentig_fonts_section',
				'choices' => array(
					esc_html__( 'Standard Fonts', 'twentig' )       => array(
						''           => __( 'Default Theme Font', 'twentig' ),
						'sans-serif' => __( 'UI System Font', 'twentig' ),
					),
					esc_html__( 'Curated Google Fonts', 'twentig' ) => twentig_get_heading_fonts(),
					esc_html__( 'Additional Fonts', 'twentig' )     => array(
						'custom-google-font' => __( 'Custom Google Font', 'twentig' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_heading_font_custom',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'twentig_heading_font_custom',
		array(
			'label'       => __( 'Custom Headings Font', 'twentig' ),
			'section'     => 'twentig_fonts_section',
			'type'        => 'text',
			'input_attrs' => array(
				'placeholder' => __( 'Font Name', 'twentig' ),
			),
			'description' => sprintf(
				/* translators: link to Google Fonts website */
				__( 'If the Headings Font is set as Secondary Font, it’s recommended that the 600 or 700 styles be available for your <a href="%s" target="_blank">Google Font</a>.', 'twentig' ),
				'https://fonts.google.com/'
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_heading_font_fallback',
		array(
			'default'           => 'sans-serif',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_heading_font_fallback',
		array(
			'label'   => __( 'Fallback Headings Font', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'sans-serif' => 'sans-serif',
				'serif'      => 'serif',
				'monospace'  => 'monospace',
				'cursive'    => 'cursive',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_heading_font_weight',
		array(
			'default'           => '700',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_font_weight',
		)
	);

	$wp_customize->add_control(
		'twentig_heading_font_weight',
		array(
			'label'   => __( 'Headings Font Weight', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(),
		)
	);

	$wp_customize->add_setting(
		'twentig_heading_letter_spacing',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_heading_letter_spacing',
		array(
			'label'   => __( 'Headings Letter Spacing', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				''       => _x( 'Tight', 'letter spacing', 'twentig' ),
				'normal' => _x( 'Normal', 'letter spacing', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_h1_font_size',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_h1_font_size',
		array(
			'label'   => __( 'Heading 1 Font Size', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'small'  => _x( 'Small', 'font size', 'twentig' ),
				'medium' => _x( 'Medium', 'font size', 'twentig' ),
				'large'  => _x( 'Large', 'font size', 'twentig' ),
				''       => _x( 'Larger', 'font size', 'twentig' ),
			),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_fonts_section_title_secondary',
			array(
				'label'    => __( 'Secondary Elements', 'twentig' ),
				'section'  => 'twentig_fonts_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_secondary_font',
		array(
			'default'           => 'heading',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_secondary_font',
		array(
			'label'       => __( 'Secondary Font', 'twentig' ),
			'section'     => 'twentig_fonts_section',
			'type'        => 'select',
			'choices'     => array(
				'body'    => __( 'Body Font', 'twentig' ),
				'heading' => __( 'Headings Font', 'twentig' ),
			),
			'description' => __( 'Applies to meta, footer, button, caption, input…', 'twentig' ),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_fonts_section_title_logo',
			array(
				'label'       => __( 'Site Title', 'twentig' ),
				'section'     => 'twentig_fonts_section',
				'settings'    => array(),
				'description' => __( 'As you’ve selected an image for the Logo, font settings for the Site Title are unavailable.', 'twentig' ),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_font',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_fonts',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Select_Optgroup_Control(
			$wp_customize,
			'twentig_logo_font',
			array(
				'label'   => __( 'Site Title Font', 'twentig' ),
				'section' => 'twentig_fonts_section',
				'choices' => array(
					esc_html__( 'Standard Fonts', 'twentig' )       => array(
						''           => __( 'Default Theme Font', 'twentig' ),
						'sans-serif' => __( 'UI System Font', 'twentig' ),
					),
					esc_html__( 'Curated Google Fonts', 'twentig' ) => twentig_get_heading_fonts(),
					esc_html__( 'Additional Fonts', 'twentig' )     => array(
						'custom-google-font' => __( 'Custom Google Font', 'twentig' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_font_custom',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'twentig_logo_font_custom',
		array(
			'label'       => __( 'Custom Site Title Font', 'twentig' ),
			'section'     => 'twentig_fonts_section',
			'type'        => 'text',
			'input_attrs' => array(
				'placeholder' => __( 'Font Name', 'twentig' ),
			),
			'description' => sprintf(
				/* translators: link to Google Fonts website */
				__( 'Enter a <a href="%s" target="_blank">Google Font</a> name.', 'twentig' ),
				'https://fonts.google.com/'
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_font_fallback',
		array(
			'default'           => 'sans-serif',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_logo_font_fallback',
		array(
			'label'   => __( 'Fallback Site Title Font', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'sans-serif' => 'sans-serif',
				'serif'      => 'serif',
				'monospace'  => 'monospace',
				'cursive'    => 'cursive',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_font_weight',
		array(
			'default'           => '700',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_font_weight',
		)
	);

	$wp_customize->add_control(
		'twentig_logo_font_weight',
		array(
			'label'   => __( 'Site Title Font Weight', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'400' => 'Regular 400',
				'700' => 'Bold 700',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_font_size',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		'twentig_logo_font_size',
		array(
			'label'       => __( 'Site Title Font Size (px)', 'twentig' ),
			'section'     => 'twentig_fonts_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => '14',
				'step' => '1',
				'max'  => '72',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_mobile_font_size',
		array(
			'sanitize_callback' => 'twentig_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		'twentig_logo_mobile_font_size',
		array(
			'label'       => __( 'Site Title Font Size on Mobile (px)', 'twentig' ),
			'section'     => 'twentig_fonts_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => '14',
				'step' => '1',
				'max'  => '72',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_letter_spacing',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_float',
		)
	);

	$wp_customize->add_control(
		'twentig_logo_letter_spacing',
		array(
			'label'       => __( 'Site Title Letter Spacing', 'twentig' ),
			'section'     => 'twentig_fonts_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => '-0.1',
				'step' => '0.01',
				'max'  => '0.2',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_logo_text_transform',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_logo_text_transform',
		array(
			'label'   => __( 'Site Title Text Transform', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				''           => _x( 'None', 'text transform', 'twentig' ),
				'uppercase'  => __( 'Uppercase', 'twentig' ),
				'lowercase'  => __( 'Lowercase', 'twentig' ),
				'capitalize' => __( 'Capitalize', 'twentig' ),
			),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_fonts_section_title_menu',
			array(
				'label'    => __( 'Menu', 'twentig' ),
				'section'  => 'twentig_fonts_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_menu_font',
		array(
			'default'           => 'heading',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_menu_font',
		array(
			'label'   => __( 'Menu Font', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'body'    => __( 'Body Font', 'twentig' ),
				'heading' => __( 'Headings Font', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_menu_font_weight',
		array(
			'default'           => '500',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_font_weight',
		)
	);

	$wp_customize->add_control(
		'twentig_menu_font_weight',
		array(
			'label'   => __( 'Menu Font Weight', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'400' => 'Regular 400',
				'700' => 'Bold 700',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_menu_font_size',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_menu_font_size',
		array(
			'label'   => __( 'Menu Font Size', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				'small'  => _x( 'Small', 'font size', 'twentig' ),
				'medium' => _x( 'Medium', 'font size', 'twentig' ),
				''       => _x( 'Large', 'font size', 'twentig' ),
				'larger' => _x( 'Larger', 'font size', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_menu_text_transform',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_menu_text_transform',
		array(
			'label'   => __( 'Menu Text Transform', 'twentig' ),
			'section' => 'twentig_fonts_section',
			'type'    => 'select',
			'choices' => array(
				''           => _x( 'None', 'text transform', 'twentig' ),
				'uppercase'  => __( 'Uppercase', 'twentig' ),
				'lowercase'  => __( 'Lowercase', 'twentig' ),
				'capitalize' => __( 'Capitalize', 'twentig' ),
			),
		)
	);

	/*
	 * Header
	 */

	$wp_customize->add_section(
		'twentig_header_section',
		array(
			'title'    => __( 'Header', 'twentig' ),
			'panel'    => 'twentig_twentytwenty_panel',
			'priority' => 10,
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_header_section_title_header',
			array(
				'label'    => __( 'Layout', 'twentig' ),
				'section'  => 'twentig_header_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_header_layout',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_header_layout',
		array(
			'label'   => __( 'Header Layout', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'select',
			'choices' => array(
				''            => __( 'Default', 'twentig' ),
				'inline-left' => __( 'Menu on Left', 'twentig' ),
				'stack'       => _x( 'Stack', 'layout', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_header_width',
		array(
			'default'           => 'wider',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_header_width',
		array(
			'label'   => __( 'Header Width', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'select',
			'choices' => array(
				'wide'  => _x( 'Wide (1200px)', 'width', 'twentig' ),
				'wider' => _x( 'Wider (1680px)', 'width', 'twentig' ),
				'full'  => _x( 'Full', 'width', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_header_sticky',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_header_sticky',
		array(
			'label'   => __( 'Sticky Header', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'twentig_header_decoration',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_header_decoration',
		array(
			'label'   => __( 'Header Decoration', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'select',
			'choices' => array(
				''       => _x( 'None', 'decoration', 'twentig' ),
				'border' => __( 'Border', 'twentig' ),
				'shadow' => __( 'Shadow', 'twentig' ),
			),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_header_section_title_menu',
			array(
				'label'       => __( 'Menu', 'twentig' ),
				'section'     => 'twentig_header_section',
				'description' => sprintf(
					/* translators: link to fonts panel */
					__( 'Visit the <a href="%s">Fonts panel</a> to set the menu font.', 'twentig' ),
					"javascript:wp.customize.control( 'twentig_menu_font' ).focus();"
				),
				'settings'    => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_menu_spacing',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_menu_spacing',
		array(
			'label'   => __( 'Menu Item Spacing', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'select',
			'choices' => array(
				''       => _x( 'Small', 'spacing', 'twentig' ),
				'medium' => _x( 'Medium', 'spacing', 'twentig' ),
				'large'  => _x( 'Large', 'spacing', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_menu_color',
		array(
			'default'           => 'accent',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_menu_color',
		array(
			'label'   => __( 'Menu Link Color', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'select',
			'choices' => array(
				'accent'    => __( 'Primary Color', 'twentig' ),
				'secondary' => __( 'Secondary Color', 'twentig' ),
				'text'      => __( 'Text Color', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_menu_hover',
		array(
			'default'           => 'underline',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_menu_hover',
		array(
			'label'   => __( 'Menu Hover/Active Link Style', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'select',
			'choices' => array(
				'none'      => _x( 'None', 'style', 'twentig' ),
				'underline' => _x( 'Underline', 'adjective', 'twentig' ),
				'border'    => __( 'Border', 'twentig' ),
				'color'     => __( 'Color', 'twentig' ),
			),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_header_section_title_toggles',
			array(
				'label'    => __( 'Menu & Search Buttons', 'twentig' ),
				'section'  => 'twentig_header_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_burger_icon',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_burger_icon',
		array(
			'label'   => __( 'Replace the menu icon (horizontal dots) with a hamburger icon', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'twentig_toggle_label',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_toggle_label',
		array(
			'label'   => __( 'Display label for menu and search buttons', 'twentig' ),
			'section' => 'twentig_header_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_header_section_title_socials',
			array(
				'label'       => __( 'Social Icons', 'twentig' ),
				'section'     => 'twentig_header_section',
				'description' => sprintf(
					/* translators: link to theme options panel */
					__( 'Visit the <a href="%s">Additional Settings panel</a> to set the locations and style of the social icons.', 'twentig' ),
					"javascript:wp.customize.section( 'twentig_additional_section' ).focus();"
				),
				'settings'    => array(),
			)
		)
	);

	/*
	 * Footer
	 */

	$wp_customize->add_section(
		'twentig_footer_section',
		array(
			'title'    => __( 'Footer', 'twentig' ),
			'panel'    => 'twentig_twentytwenty_panel',
			'priority' => 15,
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_footer_section_title_layout',
			array(
				'label'    => __( 'Layout', 'twentig' ),
				'section'  => 'twentig_footer_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_footer_layout',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_footer_layout',
		array(
			'label'   => __( 'Bottom Footer Layout', 'twentig' ),
			'section' => 'twentig_footer_section',
			'type'    => 'select',
			'choices' => array(
				''              => __( 'Default', 'twentig' ),
				'inline-left'   => __( 'Inline with Menu on Left', 'twentig' ),
				'inline-right'  => __( 'Inline with Menu on Right', 'twentig' ),
				'inline-center' => _x( 'Inline Center', 'layout', 'twentig' ),
				'stack'         => _x( 'Stack', 'layout', 'twentig' ),
				'hidden'        => _x( 'Hidden', 'layout', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_footer_widget_layout',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_footer_widget_layout',
		array(
			'label'       => __( 'Widgets Layout', 'twentig' ),
			'section'     => 'twentig_footer_section',
			'type'        => 'select',
			'choices'     => array(
				''    => __( 'Column (default)', 'twentig' ),
				'row' => __( 'Row', 'twentig' ),
			),
			'description' => __( 'For Row layout, Footer #1 area is above Footer #2 area, and the widgets are displayed inline inside each area.', 'twentig' ),
		)
	);

	$wp_customize->add_setting(
		'twentig_footer_width',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_footer_width',
		array(
			'label'   => __( 'Footer Width', 'twentig' ),
			'section' => 'twentig_footer_section',
			'type'    => 'select',
			'choices' => array(
				''      => _x( 'Wide (1200px)', 'width', 'twentig' ),
				'wider' => _x( 'Wider (1680px)', 'width', 'twentig' ),
				'full'  => _x( 'Full', 'width', 'twentig' ),
			),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_footer_section_title_styles',
			array(
				'label'    => __( 'Styles', 'twentig' ),
				'section'  => 'twentig_footer_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_footer_font_size',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_footer_font_size',
		array(
			'label'   => __( 'Footer Font Size', 'twentig' ),
			'section' => 'twentig_footer_section',
			'type'    => 'select',
			'choices' => array(
				'small'  => _x( 'Small', 'font size', 'twentig' ),
				'medium' => _x( 'Medium', 'font size', 'twentig' ),
				''       => _x( 'Large', 'font size', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_footer_link_color',
		array(
			'default'           => 'accent',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_footer_link_color',
		array(
			'label'   => __( 'Footer Link Color', 'twentig' ),
			'section' => 'twentig_footer_section',
			'type'    => 'select',
			'choices' => array(
				'accent'    => __( 'Primary Color', 'twentig' ),
				'secondary' => __( 'Secondary Color', 'twentig' ),
				'text'      => __( 'Text Color', 'twentig' ),
			),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_footer_section_title_credit',
			array(
				'label'    => __( 'Footer Credit', 'twentig' ),
				'section'  => 'twentig_footer_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_footer_credit',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_footer_credit',
		array(
			'label'   => __( 'Credit', 'twentig' ),
			'section' => 'twentig_footer_section',
			'type'    => 'select',
			'choices' => array(
				''               => __( 'Default', 'twentig' ),
				'copyright-only' => __( 'Copyright Only', 'twentig' ),
				'custom'         => _x( 'Custom', 'footer credit', 'twentig' ),
				'none'           => _x( 'None', 'footer credit', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_footer_credit_text',
		array(
			'sanitize_callback' => 'twentig_sanitize_credit',
		)
	);

	$wp_customize->add_control(
		'twentig_footer_credit_text',
		array(
			'label'       => __( 'Custom Credit', 'twentig' ),
			'section'     => 'twentig_footer_section',
			'type'        => 'text',
			'description' => __( 'To automatically display the current year, insert <code>[Y]</code>', 'twentig' ),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_footer_section_title_socials',
			array(
				'label'       => __( 'Social Icons', 'twentig' ),
				'section'     => 'twentig_footer_section',
				'description' => sprintf(
					/* translators: link to theme options panel */
					__( 'Visit the <a href="%s">Additional Settings panel</a> to set the locations and style of the social icons.', 'twentig' ),
					"javascript:wp.customize.section( 'twentig_additional_section' ).focus();"
				),
				'settings'    => array(),
			)
		)
	);

	/*
	 * Page
	 */

	$wp_customize->add_section(
		'twentig_page_section',
		array(
			'title'    => _x( 'Page', 'Customizer Section Title', 'twentig' ),
			'panel'    => 'twentig_twentytwenty_panel',
			'priority' => 20,
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_page_section_title_standard',
			array(
				'label'    => __( 'Standard Pages', 'twentig' ),
				'section'  => 'twentig_page_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_page_hero_layout',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_page_hero_layout',
		array(
			'label'       => __( 'Featured Image Layout', 'twentig' ),
			'section'     => 'twentig_page_section',
			'type'        => 'select',
			'choices'     => array(
				''             => __( 'Default', 'twentig' ),
				'narrow-image' => _x( 'Narrow', 'image width', 'twentig' ),
				'full-image'   => __( 'Full Width', 'twentig' ),
				'no-image'     => __( 'No Image', 'twentig' ),
			),
			'description' => sprintf(
				/* translators: link to cover template panel */
				__( 'Visit the <a href="%s">Cover Template panel</a> if you want to change the settings of the cover.', 'twentig' ),
				"javascript:wp.customize.section( 'cover_template_options' ).focus();"
			),
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_page_section_title_search',
			array(
				'label'    => __( 'Search Page', 'twentig' ),
				'section'  => 'twentig_page_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_page_search_layout',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_page_search_layout',
		array(
			'label'   => __( 'Search Results Layout', 'twentig' ),
			'section' => 'twentig_page_section',
			'type'    => 'select',
			'choices' => array(
				''      => __( 'Default', 'twentig' ),
				'stack' => _x( 'Stack', 'layout', 'twentig' ),
			),
		)
	);
	
	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_page_section_title_404',
			array(
				'label'    => __( '404 Page', 'twentig' ),
				'section'  => 'twentig_page_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_page_404',
		array(
			'default'           => '0',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Dropdown_Pages_Private_Control(
			$wp_customize,
			'twentig_page_404',
			array(
				'label'       => __( 'Custom 404 Page', 'twentig' ),
				'section'     => 'twentig_page_section',
				'description' => __( 'To set a 404 page, you’ll first need to create a private page (to prevent search engines from indexing this page).', 'twentig' ),
			)
		)
	);

	/*
	 * Blog
	 */

	$wp_customize->add_section(
		'twentig_blog_section',
		array(
			'title'    => __( 'Blog', 'twentig' ),
			'panel'    => 'twentig_twentytwenty_panel',
			'priority' => 25,
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_blog_section_archives_title',
			array(
				'label'    => __( 'Posts Page', 'twentig' ),
				'section'  => 'twentig_blog_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_layout',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_layout',
		array(
			'label'   => __( 'Blog Layout', 'twentig' ),
			'section' => 'twentig_blog_section',
			'type'    => 'select',
			'choices' => array(
				''           => __( 'Default', 'twentig' ),
				'stack'      => _x( 'Stack', 'layout', 'twentig' ),
				'grid-basic' => __( 'Grid', 'twentig' ),
				'grid-card'  => __( 'Card Grid', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_columns',
		array(
			'default'           => '3',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_columns',
		array(
			'label'   => __( 'Columns', 'twentig' ),
			'section' => 'twentig_blog_section',
			'type'    => 'select',
			'choices' => array(
				'2' => '2',
				'3' => '3',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_content',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_content',
		array(
			'label'       => __( 'Display post content', 'twentig' ),
			'section'     => 'twentig_blog_section',
			'type'        => 'checkbox',
			'description' => sprintf(
				/* translators: link to theme options panel */
				__( 'Set post content in the <a href="%s">Theme Options panel</a>.', 'twentig' ),
				"javascript:wp.customize.section( 'options' ).focus();"
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_excerpt_length',
		array(
			'sanitize_callback' => 'twentig_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_excerpt_length',
		array(
			'label'       => __( 'Excerpt Length (words)', 'twentig' ),
			'section'     => 'twentig_blog_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 10,
				'step' => 1,
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_excerpt_more',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_excerpt_more',
		array(
			'label'   => __( 'Display “Continue reading”', 'twentig' ),
			'section' => 'twentig_blog_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_image',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_image',
		array(
			'section' => 'twentig_blog_section',
			'label'   => __( 'Display featured image', 'twentig' ),
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_image_ratio',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_image_ratio',
		array(
			'label'   => __( 'Featured Image Aspect Ratio', 'twentig' ),
			'section' => 'twentig_blog_section',
			'type'    => 'select',
			'choices' => array(
				''     => _x( 'Original', 'image aspect ratio', 'twentig' ),
				'20-9' => '20:9',
				'16-9' => '16:9',
				'3-2'  => '3:2',
				'4-3'  => '4:3',
				'1-1'  => __( 'Square', 'twentig' ),
				'3-4'  => '3:4',
				'2-3'  => '2:3',
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_meta',
		array(
			'default'           => array(
				'top-categories',
				'author',
				'post-date',
				'comments',
				'tags',
			),
			'sanitize_callback' => 'twentig_sanitize_multi_choices',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Checkbox_Multiple_Control(
			$wp_customize,
			'twentig_blog_meta',
			array(
				'label'   => __( 'Post Meta', 'twentig' ),
				'section' => 'twentig_blog_section',
				'choices' => array(
					'top-categories' => __( 'Categories above Title', 'twentig' ),
					'author'         => __( 'Author', 'twentig' ),
					'post-date'      => __( 'Date', 'twentig' ),
					'categories'     => __( 'Categories', 'twentig' ),
					'comments'       => _x( 'Comment', 'noun', 'twentig' ),
					'tags'           => __( 'Tags', 'twentig' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_meta_icon',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_meta_icon',
		array(
			'section' => 'twentig_blog_section',
			'label'   => __( 'Display meta icons', 'twentig' ),
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_blog_section_single_title',
			array(
				'label'    => __( 'Single Post', 'twentig' ),
				'section'  => 'twentig_blog_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_post_hero_layout',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_post_hero_layout',
		array(
			'label'       => __( 'Featured Image Layout', 'twentig' ),
			'section'     => 'twentig_blog_section',
			'type'        => 'select',
			'choices'     => array(
				''             => __( 'Default', 'twentig' ),
				'narrow-image' => _x( 'Narrow', 'image width', 'twentig' ),
				'full-image'   => __( 'Full Width', 'twentig' ),
				'no-image'     => __( 'No Image', 'twentig' ),
			),
			'description' => sprintf(
				/* translators: link to cover template panel */
				__( 'Visit the <a href="%s">Cover Template panel</a> if you want to change the settings of the cover.', 'twentig' ),
				"javascript:wp.customize.section( 'cover_template_options' ).focus();"
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_post_excerpt',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_post_excerpt',
		array(
			'label'   => __( 'Display manual excerpt below the title', 'twentig' ),
			'section' => 'twentig_blog_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'twentig_post_meta',
		array(
			'default'           => array(
				'top-categories',
				'author',
				'post-date',
				'comments',
				'tags',
			),
			'sanitize_callback' => 'twentig_sanitize_multi_choices',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Checkbox_Multiple_Control(
			$wp_customize,
			'twentig_post_meta',
			array(
				'label'   => __( 'Post Meta', 'twentig' ),
				'section' => 'twentig_blog_section',
				'choices' => array(
					'top-categories' => __( 'Categories above Title', 'twentig' ),
					'author'         => __( 'Author', 'twentig' ),
					'post-date'      => __( 'Date', 'twentig' ),
					'categories'     => __( 'Categories', 'twentig' ),
					'comments'       => _x( 'Comment', 'noun', 'twentig' ),
					'tags'           => __( 'Tags', 'twentig' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_post_navigation',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_post_navigation',
		array(
			'label'   => __( 'Navigation', 'twentig' ),
			'section' => 'twentig_blog_section',
			'type'    => 'select',
			'choices' => array(
				''      => __( 'Default', 'twentig' ),
				'image' => __( 'Image', 'twentig' ),
				'none'  => _x( 'None', 'navigation', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_blog_comments',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_blog_comments',
		array(
			'section' => 'twentig_blog_section',
			'label'   => __( 'Display comments section', 'twentig' ),
			'type'    => 'checkbox',
		)
	);

	/*
	 * Additional Settings
	 */

	$wp_customize->add_section(
		'twentig_additional_section',
		array(
			'title'    => __( 'Additional Settings', 'twentig' ),
			'panel'    => 'twentig_twentytwenty_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_additional_section_title_styles',
			array(
				'label'    => __( 'Elements Style', 'twentig' ),
				'section'  => 'twentig_additional_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_separator_style',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_separator_style',
		array(
			'label'   => __( 'Separator Style', 'twentig' ),
			'section' => 'twentig_additional_section',
			'type'    => 'select',
			'choices' => array(
				''        => __( 'Default', 'twentig' ),
				'minimal' => _x( 'Minimal', 'style', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_button_shape',
		array(
			'default'           => 'square',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_button_shape',
		array(
			'label'   => __( 'Button Shape', 'twentig' ),
			'section' => 'twentig_additional_section',
			'type'    => 'select',
			'choices' => array(
				'square'  => _x( 'Square', 'button shape', 'twentig' ),
				'rounded' => _x( 'Rounded', 'button shape', 'twentig' ),
				'pill'    => _x( 'Pill', 'button shape', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_button_hover',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_button_hover',
		array(
			'label'   => __( 'Button Hover Style', 'twentig' ),
			'section' => 'twentig_additional_section',
			'type'    => 'select',
			'choices' => array(
				''      => _x( 'Underline', 'adjective', 'twentig' ),
				'color' => __( 'Color', 'twentig' ),
			),
		)
	);

	$wp_customize->add_setting(
		'twentig_button_uppercase',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'twentig_button_uppercase',
		array(
			'label'   => __( 'Make the button text uppercase', 'twentig' ),
			'section' => 'twentig_additional_section',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Title_Control(
			$wp_customize,
			'twentig_additional_section_title_socials',
			array(
				'label'    => __( 'Social Icons', 'twentig' ),
				'section'  => 'twentig_additional_section',
				'settings' => array(),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_socials_location',
		array(
			'default'           => array(
				'modal-desktop',
				'modal-mobile',
				'footer',
			),
			'sanitize_callback' => 'twentig_sanitize_multi_choices',
		)
	);

	$wp_customize->add_control(
		new Twentig_Customize_Checkbox_Multiple_Control(
			$wp_customize,
			'twentig_socials_location',
			array(
				'label'   => __( 'Social Icons Locations', 'twentig' ),
				'section' => 'twentig_additional_section',
				'choices' => array(
					'primary-menu'  => __( 'Desktop Horizontal Menu', 'twentig' ),
					'modal-desktop' => __( 'Desktop Expanded Menu', 'twentig' ),
					'modal-mobile'  => __( 'Mobile Menu', 'twentig' ),
					'footer'        => __( 'Footer', 'twentig' ),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'twentig_socials_style',
		array(
			'default'           => '',
			'sanitize_callback' => 'twentig_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'twentig_socials_style',
		array(
			'label'   => __( 'Social Icons Style', 'twentig' ),
			'section' => 'twentig_additional_section',
			'type'    => 'select',
			'choices' => array(
				''                 => __( 'Default', 'twentig' ),
				'logos-only'       => __( 'Logos Only', 'twentig' ),
				'logos-only-large' => __( 'Logos Only - Large Size', 'twentig' ),
			),
		)
	);

	$wp_customize->add_section(
		new Twentig_Customize_More_Section(
			$wp_customize,
			'twentig_more',
			array(
				'title'       => esc_html__( 'Get more for free', 'twentig' ),
				'panel'       => 'twentig_twentytwenty_panel',
				'button_text' => esc_html__( 'Subscribe', 'twentig' ),
				'button_url'  => 'https://twentig.com/newsletter?utm_source=wp-dash&utm_medium=customizer&utm_campaign=newsletter',
				'priority'    => 50,
			)
		)
	);
}
add_action( 'customize_register', 'twentig_twentytwenty_customize_register', 11 );

/**
 * Sanitize select.
 *
 * @param string $choice  The value from the setting.
 * @param object $setting The selected setting.
 */
function twentig_sanitize_choices( $choice, $setting ) {
	$choice  = sanitize_key( $choice );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $choice, $choices ) ? $choice : $setting->default );
}

/**
 * Sanitize multiple choices.
 *
 * @param array $value Array holding values from the setting.
 */
function twentig_sanitize_multi_choices( $value ) {
	$value = ! is_array( $value ) ? explode( ',', $value ) : $value;
	return ( ! empty( $value ) ? array_map( 'sanitize_text_field', $value ) : array() );
}

/**
 * Sanitize fonts choices.
 *
 * @param string $choice  The value from the setting.
 * @param object $setting The selected setting.
 */
function twentig_sanitize_fonts( $choice, $setting ) {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	$choices = call_user_func_array( 'array_merge', $choices );
	return ( array_key_exists( $choice, $choices ) ? $choice : $setting->default );
}

/**
 * Sanitizes font-weight value.
 *
 * @param string $choice  The value from the setting.
 * @param object $setting The selected setting.
 */
function twentig_sanitize_font_weight( $choice, $setting ) {
	$valid = array( '100', '200', '300', '400', '500', '600', '700', '800', '900' );
	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}
	return $setting->default;
}

/**
 * Sanitizes accessible colors array.
 *
 * @param array $value The value we want to sanitize.
 */
function twentig_sanitize_accessible_colors( $value ) {

	$value = is_array( $value ) ? $value : array();

	foreach ( $value as $area => $values ) {
		foreach ( $values as $context => $color_val ) {
			$value[ $area ][ $context ] = sanitize_hex_color( $color_val );
		}
	}

	return $value;
}

/**
 * Sanitizes integer.
 *
 * @param int $value The value from the setting.
 */
function twentig_sanitize_integer( $value ) {
	if ( ! $value || is_null( $value ) ) {
		return $value;
	}
	return intval( $value );
}

/**
 * Sanitizes float.
 *
 * @param float $value The value from the setting.
 */
function twentig_sanitize_float( $value ) {
	if ( ! $value || is_null( $value ) ) {
		return $value;
	}
	return floatval( $value );
}

/**
 * Sanitizes credit content.
 *
 * @param string $content The credit content.
 */
function twentig_sanitize_credit( $content ) {
	$kses_defaults = wp_kses_allowed_html( 'post' );
	$svg_args      = array(
		'svg'   => array(
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'role'            => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'viewbox'         => true,
			'style'           => true,
		),
		'g'     => array( 'fill' => true ),
		'title' => array( 'title' => true ),
		'path'  => array(
			'd'    => true,
			'fill' => true,
		),
	);

	$allowed_tags = array_merge( $kses_defaults, $svg_args );
	return wp_kses( $content, $allowed_tags );
}

/**
 * Enqueue scripts for customizer preview.
 */
function twentig_twentytwenty_customize_preview_init() {
	wp_enqueue_script( 'twentig-twentytwenty-customize-preview', TWENTIG_ASSETS_URI . '/js/twentytwenty-customize-preview.js', array( 'customize-preview' ), TWENTIG_VERSION, true );
}
add_action( 'customize_preview_init', 'twentig_twentytwenty_customize_preview_init', 11 );

/**
 * Enqueue scripts for customizer controls.
 */
function twentig_twentytwenty_customize_controls_enqueue_scripts() {
	wp_enqueue_script(
		'twentig-twentytwenty-customize-controls',
		TWENTIG_ASSETS_URI . '/js/twentytwenty-customize-controls.js',
		array(),
		TWENTIG_VERSION,
		true
	);

	wp_localize_script(
		'twentig-twentytwenty-customize-controls',
		'twentigCustomizerSettings',
		array(
			'colorVars'    => array(
				'footer' => array( 'setting' => 'twentig_footer_background_color' ),
			),
			'fonts'        => twentig_get_fonts(),
			'fontVariants' => twentig_get_font_styles(),
			'fontPresets'  => twentig_get_font_presets(),
		)
	);

	wp_enqueue_style(
		'twentig-twentytwenty-customize-controls',
		TWENTIG_ASSETS_URI . '/css/twentytwenty-customize-controls.css',
		array(),
		TWENTIG_VERSION
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentig_twentytwenty_customize_controls_enqueue_scripts', 11 );

/**
 * Enqueue specific stylesheets for Twenty Twenty.
 */
function twentig_theme_styles() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style(
		'twentig-twentytwenty',
		TWENTIG_ASSETS_URI . "/css/twentytwenty{$min}.css",
		array(),
		TWENTIG_VERSION
	);

	wp_style_add_data( 'twentig-twentytwenty', 'rtl', 'replace' );
	wp_style_add_data( 'twentig-twentytwenty', 'suffix', $min );

	wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		'twentig-theme-fonts',
		twentig_fonts_url(),
		array(),
		null
	);

	wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		'twentig-theme-logo-font',
		twentig_logo_font_url(),
		array(),
		null
	);

}
add_action( 'wp_enqueue_scripts', 'twentig_theme_styles', 12 );

/**
 * Determines if AMP
 */
function twentig_is_amp_endpoint() {
	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		return true;
	}
	return false;
}

/**
 * Enqueue specific scripts for Twenty Twenty.
 */
function twentig_theme_scripts() {

	// Skip enqueueing JavaScript if this is an AMP response.
	if ( twentig_is_amp_endpoint() ) {
		return;
	}

	wp_enqueue_script( 'twentig-twentytwenty', TWENTIG_ASSETS_URI . '/js/twentig-twentytwenty.js', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'twentig_theme_scripts', 12 );

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 */
function twentig_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentig-theme-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentig_resource_hints', 10, 2 );

/**
 * Add custom classes generated by Customizer settings to the array of body classes.
 *
 * @param array $classes Classes added to the body tag.
 */
function twentig_twentytwenty_body_class( $classes ) {

	$header_layout     = get_theme_mod( 'twentig_header_layout' );
	$header_decoration = get_theme_mod( 'twentig_header_decoration' );
	$text_width        = get_theme_mod( 'twentig_text_width' );
	$h1_font_size      = get_theme_mod( 'twentig_h1_font_size' );
	$body_font_size    = get_theme_mod( 'twentig_body_font_size', twentig_get_default_body_font_size() );
	$body_line_height  = get_theme_mod( 'twentig_body_line_height' );
	$header_width      = get_theme_mod( 'twentig_header_width' );
	$menu_font_size    = get_theme_mod( 'twentig_menu_font_size' );
	$menu_spacing      = get_theme_mod( 'twentig_menu_spacing' );
	$menu_hover        = get_theme_mod( 'twentig_menu_hover', 'underline' );
	$footer_layout     = get_theme_mod( 'twentig_footer_layout' );
	$has_sidebar_1     = is_active_sidebar( 'sidebar-1' );
	$has_sidebar_2     = is_active_sidebar( 'sidebar-2' );
	$footer_width      = get_theme_mod( 'twentig_footer_width' );
	$footer_size       = get_theme_mod( 'twentig_footer_font_size' );
	$socials_style     = get_theme_mod( 'twentig_socials_style' );
	$separator_style   = get_theme_mod( 'twentig_separator_style' );
	$button_shape      = get_theme_mod( 'twentig_button_shape', 'square' );
	$button_hover      = get_theme_mod( 'twentig_button_hover' );

	if ( $header_layout ) {
		$classes[] = 'tw-header-layout-' . $header_layout;
	}

	if ( get_theme_mod( 'twentig_header_sticky' ) ) {
		$classes[] = 'tw-header-sticky';
	}

	if ( $header_decoration ) {
		$classes[] = 'tw-header-' . $header_decoration;
	}

	if ( $text_width ) {
		$classes[] = 'tw-text-width-' . $text_width;
	}

	if ( get_theme_mod( 'twentig_page_header_no_background', false ) ) {
		$classes[] = 'tw-entry-header-no-bg';
	}

	if ( get_theme_mod( 'twentig_body_font' ) || get_theme_mod( 'twentig_heading_font' ) ) {
		$classes[] = 'tw-font-active';
	}

	if ( $h1_font_size ) {
		$classes[] = 'tw-h1-font-' . $h1_font_size;
	}

	if ( $body_font_size ) {
		$classes[] = 'tw-site-font-' . $body_font_size;
	}

	if ( $body_line_height ) {
		$classes[] = 'tw-site-lh-' . $body_line_height;
	}

	if ( 'normal' === get_theme_mod( 'twentig_heading_letter_spacing' ) ) {
		$classes[] = 'tw-heading-ls-normal';
	}

	if ( is_page_template( 'tw-header-transparent-light.php' ) ) {
		$classes[] = 'overlay-header';
	}

	if ( twentig_is_amp_endpoint() && ( in_array( 'overlay-header', $classes, true ) || in_array( 'tw-header-transparent', $classes, true ) ) && in_array( 'tw-header-sticky', $classes, true ) ) {
		$classes[] = 'has-header-opaque';
	}

	if ( $header_width && 'wider' !== $header_width ) {
		$classes[] = 'tw-header-' . $header_width;
	}

	if ( $menu_font_size ) {
		$classes[] = 'tw-nav-size-' . $menu_font_size;
	}

	if ( $menu_spacing ) {
		$classes[] = 'tw-nav-spacing-' . $menu_spacing;
	}

	if ( 'underline' !== $menu_hover ) {
		$classes[] = 'tw-nav-hover-' . $menu_hover;
	}

	if ( get_theme_mod( 'twentig_burger_icon', false ) ) {
		$classes[] = 'tw-menu-burger';
	}

	if ( ! get_theme_mod( 'twentig_toggle_label', true ) ) {
		$classes[] = 'tw-toggle-label-hidden';
	}

	if ( has_nav_menu( 'social' ) ) {
		if ( twentig_is_socials_location( 'primary-menu' ) ) {
			$classes[] = 'tw-menu-has-socials';
		}

		if ( ! twentig_is_socials_location( 'modal-mobile' ) && ! twentig_is_socials_location( 'modal-desktop' ) ) {
			$classes[] = 'modal-socials-hidden';
		} elseif ( ! twentig_is_socials_location( 'modal-mobile' ) ) {
			$classes[] = 'modal-socials-mobile-hidden';
		} elseif ( ! twentig_is_socials_location( 'modal-desktop' ) ) {
			$classes[] = 'modal-socials-desktop-hidden';
		}
	} else {
		$classes[] = 'modal-socials-hidden';
	}

	if ( $footer_layout ) {
		if ( ! $has_sidebar_1 && ! $has_sidebar_2 ) {
			$classes[] = 'footer-top-hidden';
			$classes   = array_diff( $classes, array( 'footer-top-visible' ) );
		}
	} else {
		if ( ! $has_sidebar_1 && ! $has_sidebar_2 && ( ! has_nav_menu( 'social' ) || ! twentig_is_socials_location( 'footer' ) ) && ! has_nav_menu( 'footer' ) ) {
			$classes[] = 'footer-top-hidden';
			$classes   = array_diff( $classes, array( 'footer-top-visible' ) );
		}
	}

	if ( $footer_width ) {
		$classes[] = 'tw-footer-' . $footer_width;
	}

	if ( 'row' === get_theme_mod( 'twentig_footer_widget_layout' ) ) {
		$classes[] = 'tw-footer-widgets-row';
	}

	if ( $footer_size ) {
		$classes[] = 'tw-footer-size-' . $footer_size;
	}

	if ( $socials_style ) {
		$classes[] = 'tw-socials-' . $socials_style;
	}

	if ( $separator_style ) {
		$classes[] = 'tw-hr-' . $separator_style;
	}

	if ( 'square' !== $button_shape ) {
		$classes[] = 'tw-btn-' . $button_shape;
	}

	if ( $button_hover ) {
		$classes[] = 'tw-button-hover-' . $button_hover;
	}

	if ( is_home() || is_author() || is_category() || is_tag() || is_date() || is_tax( get_object_taxonomies( 'post' ) ) ) {

		$blog_layout = get_theme_mod( 'twentig_blog_layout' );

		if ( $blog_layout ) {
			$classes[] = 'tw-blog-' . $blog_layout;
		}

		if ( 'grid-basic' === $blog_layout || 'grid-card' === $blog_layout ) {
			$classes[] = 'tw-blog-grid';
			$classes[] = 'tw-blog-columns-' . get_theme_mod( 'twentig_blog_columns', '3' );
			add_filter(
				'post_thumbnail_size',
				function() {
					return 'large';
				}
			);
			if ( '' === get_the_posts_pagination() ) {
				$classes[] = 'tw-blog-no-pagination';
			}
		} elseif ( '' == $blog_layout && 'narrow-image' === get_theme_mod( 'twentig_post_hero_layout' ) ) {
			$classes[] = 'tw-hero-narrow-image';
		}
	} elseif ( is_search() ) {
		if ( 'stack' === get_theme_mod( 'twentig_page_search_layout' ) ) {
			$classes[] = 'tw-blog-stack';
		}
	} elseif ( is_page() ) {
		if ( is_page_template( 'templates/template-cover.php' ) ) {
			$cover_height = get_theme_mod( 'twentig_cover_page_height' );
			if ( $cover_height ) {
				$classes[] = 'tw-cover-' . $cover_height;
			} elseif ( ! get_theme_mod( 'twentig_cover_page_scroll_indicator', true ) ) {
				$classes[] = 'tw-cover-hide-arrow';
			}
			if ( 'center' === get_theme_mod( 'twentig_cover_vertical_align' ) ) {
				$classes[] = 'tw-cover-center';
			}
		}

		if ( is_page_template( 'tw-no-title.php' ) || is_page_template( 'tw-no-header-footer.php' ) ) {
			$classes = array_diff( $classes, array( 'has-post-thumbnail', 'missing-post-thumbnail' ) );
		}

		$hero_type = get_theme_mod( 'twentig_page_hero_layout' );
		if ( $hero_type && has_post_thumbnail() && ( ! is_page_template() || is_page_template( 'templates/template-full-width.php' ) ) ) {
			$classes[] = 'tw-hero-' . $hero_type;
		}
	} elseif ( is_singular( 'post' ) ) {

		if ( is_page_template( 'templates/template-cover.php' ) ) {
			$cover_height = get_theme_mod( 'twentig_cover_post_height' );
			if ( $cover_height ) {
				$classes[] = 'tw-cover-' . $cover_height;
			}
			if ( 'center' === get_theme_mod( 'twentig_cover_vertical_align' ) ) {
				$classes[] = 'tw-cover-center';
			}
		} else {
			$hero_type = get_theme_mod( 'twentig_post_hero_layout' );
			if ( $hero_type && has_post_thumbnail() && ( ! is_page_template() || is_page_template( 'templates/template-full-width.php' ) ) ) {
				$classes[] = 'tw-hero-' . $hero_type;
			}
		}

		if ( has_excerpt() && ! get_theme_mod( 'twentig_post_excerpt', true ) ) {
			$classes[] = 'tw-no-excerpt';
		}

		if ( 'image' === get_theme_mod( 'twentig_post_navigation' ) ) {
			$classes[] = 'tw-nav-image';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'twentig_twentytwenty_body_class', 11 );

/**
 * Display custom CSS generated by the Customizer settings.
 */
function twentig_twentytwenty_print_customizer_css() {
	$css = '';

	$body_font           = get_theme_mod( 'twentig_body_font' );
	$heading_font        = get_theme_mod( 'twentig_heading_font' );
	$heading_font_weight = get_theme_mod( 'twentig_heading_font_weight', '700' );
	$secondary_font      = get_theme_mod( 'twentig_secondary_font', 'heading' );
	$menu_font           = get_theme_mod( 'twentig_menu_font', 'heading' );
	$body_font_stack     = twentig_get_font_stack( 'body' );
	$heading_font_stack  = twentig_get_font_stack( 'heading' );

	if ( $body_font || $heading_font ) {
		$css .= '
			body,
			.entry-content,
			.entry-content p,
			.entry-content ol,
			.entry-content ul,
			.widget_text p,
			.widget_text ol,
			.widget_text ul,
			.widget-content .rssSummary,
			.comment-content p,			
			.entry-content .wp-block-latest-posts__post-excerpt,
			.entry-content .wp-block-latest-posts__post-full-content,
			.has-drop-cap:not(:focus):first-letter { font-family: ' . $body_font_stack . '; }';

		$css .= 'h1, h2, h3, h4, h5, h6, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, .faux-heading, .site-title, .pagination-single a { font-family: ' . $heading_font_stack . '; }';

		if ( 'heading' === $menu_font ) {
			$css .= 'ul.primary-menu, ul.modal-menu { font-family: ' . $heading_font_stack . '; }';
		}

		if ( 'heading' === $secondary_font ) {
			$css .= '
				.intro-text,
				input,
				textarea,
				select,
				button, 
				.button, 
				.faux-button, 
				.wp-block-button__link,
				.wp-block-file__button,
				.entry-content .wp-block-file,	
				.primary-menu li.menu-button > a,
				.entry-content .wp-block-pullquote,
				.entry-content .wp-block-quote.is-style-large,
				.entry-content .wp-block-quote.is-style-tw-large-icon,
				.entry-content cite,
				.entry-content figcaption,
				.wp-caption-text,
				.entry-content .wp-caption-text,
				.widget-content cite,
				.widget-content figcaption,
				.widget-content .wp-caption-text,
				.entry-categories,
				.post-meta,
				.comment-meta, 
				.comment-footer-meta,
				.author-bio,
				.comment-respond p.comment-notes, 
				.comment-respond p.logged-in-as,
				.entry-content .wp-block-archives,
				.entry-content .wp-block-categories,
				.entry-content .wp-block-latest-posts,
				.entry-content .wp-block-latest-comments,
				p.comment-awaiting-moderation,
				.pagination,
				#site-footer,							
				.widget:not(.widget-text),
				.footer-menu,
				label,
				.toggle .toggle-text {
					font-family: ' . $heading_font_stack . ';
				}';
		} else {
			$css .= '
			input,
			textarea,			
			select,
			button, 
			.button, 
			.faux-button, 
			.wp-block-button__link,
			.wp-block-file__button,	
			.primary-menu li.menu-button > a,	
			.entry-content .wp-block-pullquote,
			.entry-content .wp-block-quote.is-style-large,
			.entry-content cite,
			.entry-content figcaption,
			.wp-caption-text,
			.entry-content .wp-caption-text,
			.widget-content cite,
			.widget-content figcaption,
			.widget-content .wp-caption-text,
			.entry-content .wp-block-archives,
			.entry-content .wp-block-categories,
			.entry-content .wp-block-latest-posts,
			.entry-content .wp-block-latest-comments,
			p.comment-awaiting-moderation {
				font-family: ' . $body_font_stack . ';
			}';
		}

		$css .= 'table {font-size: inherit;} ';
	}

	if ( 'body' === $menu_font ) {
		$css .= 'ul.primary-menu, ul.modal-menu { font-family: ' . $body_font_stack . '; }';
	}

	if ( $heading_font_weight && '700' !== $heading_font_weight ) {
		$css .= 'h1, .heading-size-1, h2, h3, h4, h5, h6, .faux-heading, .archive-title, .site-title, .pagination-single a { font-weight: ' . $heading_font_weight . ';}';
	} elseif ( $heading_font ) {
		$css .= 'h1, .heading-size-1 { font-weight: ' . $heading_font_weight . ';}';
	}

	/* Site title */
	if ( ! has_custom_logo() ) {
		$css_logo = '';

		$logo_font             = get_theme_mod( 'twentig_logo_font' );
		$logo_font_weight      = get_theme_mod( 'twentig_logo_font_weight', '700' );
		$logo_font_size        = get_theme_mod( 'twentig_logo_font_size', false );
		$logo_letter_spacing   = get_theme_mod( 'twentig_logo_letter_spacing', false );
		$logo_transform        = get_theme_mod( 'twentig_logo_text_transform' );
		$logo_mobile_font_size = get_theme_mod( 'twentig_logo_mobile_font_size' );

		if ( $heading_font || $logo_font ) {
			$css .= '#site-header .site-title a { text-decoration: none; }';
		}

		if ( $logo_font ) {
			$css_logo .= 'font-family: ' . twentig_get_font_stack( 'logo' ) . ' ;';
		}

		if ( $logo_font_weight ) {
			$css_logo .= 'font-weight: ' . $logo_font_weight . ';';
		}

		if ( $logo_font_size ) {
			$css_logo .= 'font-size:' . $logo_font_size . 'px;';
		}

		if ( $logo_letter_spacing ) {
			$css_logo .= 'letter-spacing:' . $logo_letter_spacing . 'em;';
		}

		if ( $logo_transform ) {
			$css_logo .= 'text-transform: ' . esc_attr( $logo_transform ) . ';';
		}

		if ( $css_logo ) {
			$css .= '#site-header .site-title { ' . $css_logo . '}';
		}

		if ( $logo_mobile_font_size ) {
			$css .= '@media(max-width:699px) { #site-header .site-title { font-size:' . intval( $logo_mobile_font_size ) . 'px; } }';
		}
	} else {
		$logo_responsive_width = get_theme_mod( 'twentig_logo_mobile_width' );
		if ( $logo_responsive_width ) {
			$css .= '@media(max-width:699px) { .site-logo .custom-logo-link img { width:' . intval( $logo_responsive_width ) . 'px; height:auto !important; max-height: none; } }';
		}
	}

	/* Menu */

	$menu_font_weight = get_theme_mod( 'twentig_menu_font_weight', 500 );
	$menu_transform   = get_theme_mod( 'twentig_menu_text_transform' );
	$menu_accent      = sanitize_hex_color( twentytwenty_get_color_for_area( 'header-footer', 'accent' ) );
	$menu_secondary   = sanitize_hex_color( twentytwenty_get_color_for_area( 'header-footer', 'secondary' ) );
	$menu_color       = get_theme_mod( 'twentig_menu_color', 'accent' );
	$menu_hover       = get_theme_mod( 'twentig_menu_hover', 'underline' );
	$header_sticky    = get_theme_mod( 'twentig_header_sticky' );
	$hex              = get_theme_mod( 'twentig_accent_hex_color' );

	if ( $menu_font_weight ) {
		$css .= 'ul.primary-menu, ul.modal-menu > li .ancestor-wrapper a { font-weight:' . esc_attr( $menu_font_weight ) . ';}';
	}

	if ( $menu_transform ) {
		$css .= 'ul.primary-menu li a, ul.modal-menu li .ancestor-wrapper a { text-transform:' . esc_attr( $menu_transform ) . ';';
		if ( 'uppercase' === $menu_transform ) {
			$css .= 'letter-spacing: 0.0333em;';
		}
		$css .= '}';
	}

	if ( ! get_theme_mod( 'twentig_button_uppercase', true ) ) {
		$css .= 'button, .button, .faux-button, .wp-block-button__link, .wp-block-file__button, input[type="button"], input[type="submit"] { text-transform: none; letter-spacing: normal; }';
	}

	if ( is_customize_preview() && 'hex' === get_theme_mod( 'accent_hue_active' ) && $hex ) {
		$css .= '.color-accent, :root .has-accent-color, .header-footer-group .color-accent, .has-drop-cap:not(:focus):first-letter, .wp-block-button.is-style-outline, a, .modal-menu a, .footer-menu a, .footer-widgets a, #site-footer .wp-block-button.is-style-outline, .wp-block-pullquote:before, .singular:not(.overlay-header) .entry-header a, .archive-header a {
			color:' . $hex . '}';

		if ( 'accent' === $menu_color ) {
			$css .= 'body:not(.overlay-header) .primary-menu > li > a, body:not(.overlay-header) .primary-menu > li > .icon { color:' . $hex . '}';
		}

		$css .= 'blockquote{ border-color:' . $hex . '}';
		$css .= 'button:not(.toggle), .wp-block-button__link, .wp-block-file .wp-block-file__button, input[type="button"], input[type="submit"], .faux-button, .bg-accent, :root .has-accent-background-color, .comment-reply-link, .social-icons a, #site-footer .button, #site-footer .faux-button, #site-footer .wp-block-button__link, #site-footer input[type="button"], #site-footer input[type="submit"], #site-header ul.primary-menu li.menu-button > a, .menu-modal ul.modal-menu > li.menu-button > .ancestor-wrapper > a { background-color:' . $hex . '}';
	}

	if ( $header_sticky ) {
		if ( 'secondary' === $menu_color ) {
			$css .= 'body.has-header-opaque .primary-menu > li:not(.menu-button) > a, body.has-header-opaque .primary-menu > li > .icon { color: ' . $menu_secondary . '; }';
		} elseif ( 'accent' === $menu_color ) {
			$css .= 'body.has-header-opaque .primary-menu > li:not(.menu-button) > a, body.has-header-opaque .primary-menu > li > .icon { color: ' . $menu_accent . '; }';
		}
	}

	if ( 'text' === $menu_color ) {
		$css .= 'body:not(.overlay-header) .primary-menu > li > a, body:not(.overlay-header) .primary-menu > li > .icon, .modal-menu > li > .ancestor-wrapper > a { color: inherit; }';
	} elseif ( 'secondary' === $menu_color ) {
		$menu_secondary = sanitize_hex_color( twentytwenty_get_color_for_area( 'header-footer', 'secondary' ) );
		$css           .= 'body:not(.overlay-header) .primary-menu > li > a, body:not(.overlay-header) .primary-menu > li > .icon, .modal-menu > li > .ancestor-wrapper > a { color: ' . $menu_secondary . '; }';
	}

	if ( 'color' === $menu_hover ) {
		$menu_hover_color = 'inherit';
		if ( 'text' === $menu_color ) {
			$menu_hover_color = $menu_accent;
		}
		$css .= 'body:not(.overlay-header) .primary-menu > li > a:hover, body:not(.overlay-header) .primary-menu > li > a:hover + .icon, 
		body:not(.overlay-header) .primary-menu > li.current-menu-item > a, body:not(.overlay-header) .primary-menu > li.current-menu-item > .icon, 
		body:not(.overlay-header) .primary-menu > li.current_page_ancestor > a, body:not(.overlay-header) .primary-menu > li.current_page_ancestor > .icon,
		body:not(.overlay-header) .primary-menu > li.current-page-ancestor > a, body:not(.overlay-header) .primary-menu > li.current-page-ancestor > .icon,
		.single-post:not(.overlay-header) .primary-menu li.current_page_parent > a, .single-post .modal-menu li.current_page_parent > .ancestor-wrapper > a,
		.modal-menu > li > .ancestor-wrapper > a:hover, .modal-menu > li > .ancestor-wrapper > a:hover + .toggle,
		.modal-menu > li.current-menu-item > .ancestor-wrapper > a, .modal-menu > li.current-menu-item > .ancestor-wrapper > .toggle,
		.modal-menu > li.current_page_ancestor > .ancestor-wrapper > a, .modal-menu > li.current_page_ancestor > .ancestor-wrapper > .toggle,
		.modal-menu > li.current-page-ancestor > .ancestor-wrapper > a, .modal-menu > li.current-page-ancestor > .ancestor-wrapper > .toggle { 
			color: ' . $menu_hover_color . ';}';
		if ( $header_sticky ) {
			$css .= 'body.has-header-opaque .primary-menu > li > a:hover, body.has-header-opaque .primary-menu > li > a:hover + .icon, 
			body.has-header-opaque .primary-menu > li.current-menu-item > a, body.has-header-opaque .primary-menu > li.current-menu-item > .icon,
			body.has-header-opaque .primary-menu li.current_page_ancestor > a, body.has-header-opaque .primary-menu li.current_page_ancestor > .icon,
			body.has-header-opaque .primary-menu li.current-page-ancestor > a, body.has-header-opaque .primary-menu li.current-page-ancestor > .icon,
			.single-post.has-header-opaque .primary-menu li.current_page_parent > a { color: ' . $menu_hover_color . '; }';
		}
	}

	/* Footer */

	$footer_bgcolor = get_theme_mod( 'twentig_footer_background_color' );
	if ( $footer_bgcolor ) {

		$css .= twentig_get_footer_colors_css();

		$background_color = get_theme_mod( 'background_color', 'f5efe0' );
		$background_color = strtolower( '#' . ltrim( $background_color, '#' ) );

		if ( $background_color !== $footer_bgcolor ) {
			$css .= '.reduced-spacing.footer-top-visible .footer-nav-widgets-wrapper, .reduced-spacing.footer-top-hidden #site-footer{ border: 0; }';
		} else {
			$css .= '.footer-top-visible .footer-nav-widgets-wrapper, .footer-top-hidden #site-footer { border-top-width: 0.1rem; }';
		}
	} else {
		$footer_link_color = get_theme_mod( 'twentig_footer_link_color' );
		if ( 'text' === $footer_link_color || 'secondary' === $footer_link_color ) {
			$footer_link_color_value = sanitize_hex_color( twentytwenty_get_color_for_area( 'header-footer', $footer_link_color ) );
			$css                    .= '.footer-widgets a, .footer-menu a{ color:' . $footer_link_color_value . ';}';
		}
	}

	if ( 'hidden' === get_theme_mod( 'twentig_footer_layout' ) ) {
		$css .= '.footer-widgets-outer-wrapper { border-bottom: 0; }';
	}

	/* Subtle Color */

	$subtle_background = get_theme_mod( 'twentig_subtle_background_color' );
	if ( $subtle_background ) {
		$css .= ':root .has-subtle-background-background-color{ background-color: ' . $subtle_background . '; }';
		$css .= ':root .has-subtle-background-color{ color: ' . $subtle_background . '; }';
	}

	/* Jetpack */
	if ( $hex ) {
		$css .= '.infinite-scroll #site-content #infinite-handle span button { background-color:' . $hex . '}';
	}

	$css = apply_filters( 'twentig_customizer_css', $css );

	if ( $css ) :
		?>
	<style type="text/css" id="twentig-theme-custom-css">
		<?php echo twentig_minify_css( $css ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</style>

		<?php
	endif;
}
add_action( 'wp_head', 'twentig_twentytwenty_print_customizer_css' );

/**
 * Remove line breaks and white space chars.
 *
 * @param string $css String containing CSS.
 * @see wp_strip_all_tags
 */
function twentig_minify_css( $css ) {
	$css = preg_replace( '/[\r\n\t ]+/', ' ', $css );
	return trim( $css );
}

/**
 * Outputs an Underscore template that generates dynamically the CSS for instant display in the Customizer preview.
 */
function twentig_customizer_font_css_template() {
	?>

	<script type="text/html" id="tmpl-twentig-customizer-live-style">

		<# 
		var body_font        = data.twentig_body_font;
		var body_font_custom = data.twentig_body_font_custom;
		var body_font_stack  = "'NonBreakingSpaceOverride', 'Hoefler Text', Garamond, 'Times New Roman', serif";

		if ( body_font ) {
			if ( 'sans-serif' === body_font ) {
				body_font_stack = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica Neue, Helvetica, sans-serif";
			} else if ( 'custom-google-font' === body_font ) {
				if ( body_font_custom ) {
					body_font_stack = "'" + body_font_custom + "', sans-serif";
				}
			} else {
				body_font_stack = "'" + body_font + "', sans-serif";
			}
		}

		var heading_font        = data.twentig_heading_font;
		var heading_font_custom = data.twentig_heading_font_custom;
		var heading_font_stack  = "'Inter var', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, sans-serif";

		if ( heading_font ) {
			if ( 'sans-serif' === heading_font ) {
				heading_font_stack = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica Neue, Helvetica, sans-serif";
			} else if ( 'custom-google-font' === heading_font ) {
				if ( heading_font_custom ) {
					heading_font_stack = "'" + heading_font_custom + "', sans-serif";
				}
			} else {
				heading_font_stack = "'" + heading_font + "', sans-serif";
			}
		}

		var heading_font_weight  = data.twentig_heading_font_weight;
		var secondary_font       = data.twentig_secondary_font;
		var secondary_font_stack = 'body' === secondary_font ? body_font_stack : heading_font_stack;
		var menu_font            = data.twentig_menu_font;
		var menu_font_weight     = data.twentig_menu_font_weight;
		var logo_font            = data.twentig_logo_font;
		var logo_font_custom     = data.twentig_logo_font_custom;
		var logo_font_weight     = data.twentig_logo_font_weight;
		var logo_font_size       = data.twentig_logo_font_size;
		var logo_letter_spacing  = data.twentig_logo_letter_spacing;
		var subtle_color         = data.twentig_subtle_background_color;

		logo_font = 'custom-google-font' === logo_font ? logo_font_custom : logo_font;
		#>

		<# if ( body_font || heading_font ) { #>
			body,
			.entry-content,
			.entry-content p,
			.entry-content ol,
			.entry-content ul,
			.widget_text p,
			.widget_text ol,
			.widget_text ul,
			.widget-content .rssSummary,
			.comment-content p,			
			.has-drop-cap:not(:focus):first-letter { font-family: {{ body_font_stack }}; }

			h1, h2, h3, h4, h5, h6, .entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, .faux-heading, .site-title, .pagination-single a { font-family: {{ heading_font_stack }}; }

			table {font-size: inherit;} 
		<# } #>	

		.intro-text,
		input,
		textarea,
		select,
		button, 
		.button, 
		.faux-button, 
		.wp-block-button__link,
		.wp-block-file__button,			
		.primary-menu li.menu-button > a,
		.entry-content .wp-block-pullquote,
		.entry-content .wp-block-quote.is-style-large,
		.entry-content cite,
		.entry-content figcaption,
		.wp-caption-text,
		.entry-content .wp-caption-text,
		.widget-content cite,
		.widget-content figcaption,
		.widget-content .wp-caption-text,
		.entry-categories,
		.post-meta,
		.comment-meta, 
		.comment-footer-meta,
		.author-bio,
		.comment-respond p.comment-notes, 
		.comment-respond p.logged-in-as,
		.entry-content .wp-block-archives,
		.entry-content .wp-block-categories,
		.entry-content .wp-block-latest-posts,
		.entry-content .wp-block-latest-comments,
		.pagination,
		#site-footer,						
		.widget:not(.widget-text),
		.footer-menu,
		label,
		.toggle .toggle-text { font-family: {{ secondary_font_stack }}; }

		<# if ( 'body' === menu_font ) { #>
			ul.primary-menu, ul.modal-menu { font-family: {{ body_font_stack }}; }
		<# } else { #>	
			ul.primary-menu, ul.modal-menu { font-family: {{ heading_font_stack }}; }
		<# } #>

		<# if ( heading_font_weight ) { #>
			h1, .heading-size-1, h2, h3, h4, h5, h6, .faux-heading, .archive-title, .site-title, .pagination-single a { font-weight: {{ heading_font_weight }} ; }
		<# } #>

		<# if ( menu_font_weight ) { #>
			ul.primary-menu, ul.modal-menu ul li a, ul.modal-menu > li .ancestor-wrapper a { font-weight: {{ menu_font_weight }}; }
		<# } #>	

		#site-header .site-title {
			<# if ( logo_font ) { #>
				font-family: '{{ logo_font }}', sans-serif;
			<# } #>	
			<# if ( logo_font_weight ) { #>
				font-weight: {{ logo_font_weight }};
			<# } #>
			<# if ( logo_font_size ) { #>
				font-size: {{ logo_font_size }}px;
			<# } #>	
			<# if ( logo_letter_spacing ) { #>
			letter-spacing: {{ logo_letter_spacing }}em;
			<# } #>
		}		

		<# if ( subtle_color ) { #>
			:root .has-subtle-background-background-color { background-color: {{ subtle_color }}; }
			:root .has-subtle-background-color { color: {{ subtle_color }}; }
		<# } #>	

	</script>
	<?php
}
add_action( 'customize_controls_print_footer_scripts', 'twentig_customizer_font_css_template' );

/**
 * Display custom CSS generated by the Customizer settings inside the block editor.
 */
function twentig_twentytwenty_print_editor_customizer_css() {

	wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		'twentig-fonts',
		twentig_fonts_url(),
		array(),
		null
	);

	wp_enqueue_style(
		'twentig-twentytwenty-editor-styles',
		TWENTIG_ASSETS_URI . '/css/twentytwenty-editor.css',
		array(),
		TWENTIG_VERSION
	);

	$css = '';

	$body_font              = get_theme_mod( 'twentig_body_font' );
	$body_font_size         = get_theme_mod( 'twentig_body_font_size', twentig_get_default_body_font_size() );
	$heading_font           = get_theme_mod( 'twentig_heading_font' );
	$heading_font_weight    = get_theme_mod( 'twentig_heading_font_weight', '700' );
	$secondary_font         = get_theme_mod( 'twentig_secondary_font', 'heading' );
	$body_line_height       = get_theme_mod( 'twentig_body_line_height' );
	$h1_font_size           = get_theme_mod( 'twentig_h1_font_size' );
	$heading_letter_spacing = get_theme_mod( 'twentig_heading_letter_spacing' );
	$body_font_stack        = twentig_get_font_stack( 'body' );
	$heading_font_stack     = twentig_get_font_stack( 'heading' );
	$secondary_font_stack   = 'body' === $secondary_font ? $body_font_stack : $heading_font_stack;
	$content_width          = get_theme_mod( 'twentig_text_width' );

	// Layout.
	if ( 'medium' === $content_width ) {
		$css .= '.wp-block,
		.wp-block-cover h2,
		.wp-block .wp-block[data-type="core/group"]:not([data-align="full"]):not([data-align="wide"]):not([data-align="left"]):not([data-align="right"]),
		.wp-block .wp-block[data-type="core/cover"]:not([data-align="full"]):not([data-align="wide"]):not([data-align="left"]):not([data-align="right"]),
		[data-align="wide"] > .wp-block-image figcaption,
		[data-align="full"] > .wp-block-image figcaption  {
			max-width: 700px; 
		}';
	} elseif ( 'wide' === $content_width ) {
		$css .= '.wp-block,
		.wp-block-cover h2,
		.wp-block .wp-block[data-type="core/group"]:not([data-align="full"]):not([data-align="wide"]):not([data-align="left"]):not([data-align="right"]),
		.wp-block .wp-block[data-type="core/cover"]:not([data-align="full"]):not([data-align="wide"]):not([data-align="left"]):not([data-align="right"]),
		[data-align="wide"] > .wp-block-image figcaption,
		[data-align="full"] > .wp-block-image figcaption { 
			max-width: 800px; 
		}';
	}

	// Typography.
	if ( $body_font ) {
		$css .= '.editor-styles-wrapper > *,
			.editor-styles-wrapper p,
			.editor-styles-wrapper ol,
			.editor-styles-wrapper ul {
				font-family:' . $body_font_stack . ';
		}';
	}

	if ( 'small' === $body_font_size ) {
		$css .= '.editor-styles-wrapper > *, .editor-styles-wrapper .wp-block-latest-posts__post-excerpt { font-size: 17px; }';
	} elseif ( 'medium' === $body_font_size ) {
		$css .= '.editor-styles-wrapper > * { font-size: 19px; }';
	}

	if ( 'medium' === $body_line_height ) {
		$css .= '.edit-post-visual-editor.editor-styles-wrapper, .editor-styles-wrapper p, .editor-styles-wrapper p.wp-block-paragraph { line-height: 1.6;}';
	} elseif ( 'loose' === $body_line_height ) {
		$css .= '.edit-post-visual-editor.editor-styles-wrapper, .editor-styles-wrapper p, .editor-styles-wrapper p.wp-block-paragraph { line-height: 1.8;}';
	}

	$css .= '
		.editor-post-title__block .editor-post-title__input,
		.editor-styles-wrapper h1,
		.editor-styles-wrapper h2,
		.editor-styles-wrapper h3,
		.editor-styles-wrapper h4,
		.editor-styles-wrapper h5,
		.editor-styles-wrapper h6,
		.editor-styles-wrapper .wp-block h1,
		.editor-styles-wrapper .wp-block h2,
		.editor-styles-wrapper .wp-block h3,
		.editor-styles-wrapper .wp-block h4,
		.editor-styles-wrapper .wp-block h5,
		.editor-styles-wrapper .wp-block h6 {';

	if ( $heading_font ) {
		$css .= 'font-family:' . $heading_font_stack . ';';
	}

	if ( $heading_font_weight ) {
		$css .= 'font-weight:' . $heading_font_weight . ';';
	}

	if ( 'normal' === $heading_letter_spacing ) {
		$css .= 'letter-spacing: normal;';
	} else {
		$css .= 'letter-spacing: -0.015em;';
	}

	$css .= ';} ';

	$css .= '.editor-styles-wrapper h6, .editor-styles-wrapper .wp-block h6 { letter-spacing: 0.03125em; }';

	$accent = sanitize_hex_color( twentytwenty_get_color_for_area( 'content', 'accent' ) );
	$css   .= '.editor-styles-wrapper a { color: ' . $accent . '}';

	$css .= '
		.editor-styles-wrapper .wp-block-button .wp-block-button__link,
		.editor-styles-wrapper .wp-block-file .wp-block-file__button,
		.editor-styles-wrapper .wp-block-paragraph.has-drop-cap:not(:focus):first-letter,
		.editor-styles-wrapper .wp-block-pullquote, 
		.editor-styles-wrapper .wp-block-quote.is-style-large,
		.editor-styles-wrapper .wp-block-quote.is-style-tw-large-icon,
		.editor-styles-wrapper .wp-block-quote .wp-block-quote__citation,
		.editor-styles-wrapper .wp-block-pullquote .wp-block-pullquote__citation,				
		.editor-styles-wrapper figcaption { font-family: ' . $secondary_font_stack . '; }';

	if ( $h1_font_size ) {
		$css .= '@media (min-width: 1220px) {
			.editor-styles-wrapper .wp-block[data-type="core/pullquote"][data-align="wide"] blockquote p, 
			.editor-styles-wrapper .wp-block[data-type="core/pullquote"][data-align="full"] blockquote p {
				font-size: 48px;
			}
		}';

		if ( 'small' === $h1_font_size ) {
			$css .= '@media (min-width: 700px) {
				.editor-post-title__block .editor-post-title__input, .editor-styles-wrapper h1, .editor-styles-wrapper .wp-block h1, .editor-styles-wrapper .wp-block.has-h-1-font-size {
					font-size: 56px;
				}				
			}';
		} elseif ( 'medium' === $h1_font_size ) {
			$css .= '@media (min-width: 1220px) {
				.editor-post-title__block .editor-post-title__input, .editor-styles-wrapper h1, .editor-styles-wrapper .wp-block h1, .editor-styles-wrapper .wp-block.has-h-1-font-size {
					font-size: 64px;
				}
			}';
		} elseif ( 'large' === $h1_font_size ) {
			$css .= '@media (min-width: 1220px) {
				.editor-post-title__block .editor-post-title__input, .editor-styles-wrapper h1, .editor-styles-wrapper .wp-block h1, .editor-styles-wrapper .wp-block.has-h-1-font-size {
					font-size: 72px;
				}
			}';
		}
	}

	// Layout blocks adjustments.
	if ( '#ffffff' === strtolower( twentytwenty_get_color_for_area( 'content', 'text' ) ) ) {
		$css .= ':root .has-background-background-color, :root .has-subtle-background-background-color{ color: #fff; }';
	}

	// Elements styling.
	if ( ! get_theme_mod( 'twentig_button_uppercase', true ) ) {
		$css .= '.editor-styles-wrapper .wp-block-button .wp-block-button__link,
		.editor-styles-wrapper .wp-block-file .wp-block-file__button { text-transform: none; }';
	}

	$button_shape = get_theme_mod( 'twentig_button_shape', 'square' );
	if ( 'rounded' === $button_shape ) {
		$css .= '.editor-styles-wrapper .wp-block-button__link { border-radius: 6px; }';
	} elseif ( 'pill' === $button_shape ) {
		$css .= '.editor-styles-wrapper .wp-block-button__link { border-radius: 50px; padding: 1.1em 1.8em; }';
	}

	if ( 'minimal' === get_theme_mod( 'twentig_separator_style' ) ) {
		$css .= '.editor-styles-wrapper hr:not(.is-style-dots ) { 
			background: currentColor !important;
		}

		.editor-styles-wrapper hr:not(.has-background):not(.is-style-dots) {
			color: currentColor;
			opacity: 0.15;
		}	

		.editor-styles-wrapper hr:not(.is-style-dots)::before,
		.editor-styles-wrapper hr:not(.is-style-dots)::after {
			display: none;
		}';
	}
	wp_add_inline_style( 'twentig-twentytwenty-editor-styles', $css );
}
add_action( 'enqueue_block_editor_assets', 'twentig_twentytwenty_print_editor_customizer_css', 20 );

/**
 * Set up theme defaults and register support for various features.
 */
function twentig_theme_support() {

	// Set editor font sizes based on body font-size.
	$body_font_size = get_theme_mod( 'twentig_body_font_size', twentig_get_default_body_font_size() );

	$font_sizes = current( (array) get_theme_support( 'editor-font-sizes' ) );

	// Add medium font size option in the editor dropdown.
	$medium = array(
		'name' => _x( 'Medium', 'Name of the medium font size in the block editor', 'twentig' ),
		'size' => 23,
		'slug' => 'medium',
	);
	array_splice( $font_sizes, 2, 0, array( $medium ) );

	if ( 'small' === $body_font_size || 'medium' === $body_font_size ) {
		$size_s      = 14;
		$size_normal = 17;
		$size_m      = 19;
		$size_l      = 21;
		$size_xl     = 25;

		if ( 'medium' === $body_font_size ) {
			$size_s      = 16;
			$size_normal = 19;
			$size_m      = 21;
			$size_l      = 24;
			$size_xl     = 28;
		}

		foreach ( $font_sizes as $index => $settings ) {
			if ( 'small' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_s;
			} elseif ( 'normal' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_normal;
			} elseif ( 'medium' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_m;
			} elseif ( 'large' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_l;
			} elseif ( 'larger' === $settings['slug'] ) {
				$font_sizes[ $index ]['size'] = $size_xl;
			}
		}
	}
	add_theme_support( 'editor-font-sizes', $font_sizes );

	// Update subtle color.
	$color_palette     = current( (array) get_theme_support( 'editor-color-palette' ) );
	$subtle_background = get_theme_mod( 'twentig_subtle_background_color' );

	if ( $subtle_background ) {
		foreach ( $color_palette as $index => $settings ) {
			if ( 'subtle-background' === $settings['slug'] ) {
				$color_palette[ $index ]['color'] = $subtle_background;
			}
		}
	}

	add_theme_support( 'editor-color-palette', $color_palette );

	// Set content-width based on text width.
	$text_width = get_theme_mod( 'twentig_text_width' );
	if ( $text_width ) {
		global $content_width;
		if ( 'medium' === $text_width ) {
			$content_width = 700;
		} elseif ( 'wide' === $text_width ) {
			$content_width = 800;
		}
	}

	// Define units for the Cover block height.
	add_theme_support( 'custom-units', 'px', 'vh' );
}
add_action( 'after_setup_theme', 'twentig_theme_support', 12 );
