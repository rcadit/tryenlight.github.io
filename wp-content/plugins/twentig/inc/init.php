<?php
/**
 * Twentig plugin file.
 *
 * @package twentig
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueues block assets for frontend and backend editor.
 */
function twentig_block_assets() {

	if ( ! twentig_is_option_enabled( 'twentig_block_options' ) ) {
		return;
	}

	$asset_file = include TWENTIG_PATH . 'dist/index.asset.php';

	wp_enqueue_style(
		'twentig-blocks',
		plugins_url( 'dist/style-index.css', dirname( __FILE__ ) ),
		array(),
		$asset_file['version']
	);

	wp_style_add_data( 'twentig-blocks', 'rtl', 'replace' );
}
add_action( 'enqueue_block_assets', 'twentig_block_assets' );


/**
 * Enqueues block assets for backend editor.
 */
function twentig_block_editor_assets() {

	if ( ! twentig_is_option_enabled( 'twentig_block_options' ) ) {
		return;
	}

	$asset_file = include TWENTIG_PATH . 'dist/index.asset.php';

	wp_enqueue_script(
		'twentig-blocks-editor',
		plugins_url( '/dist/index.js', dirname( __FILE__ ) ),
		$asset_file['dependencies'],
		$asset_file['version'],
		false
	);

	$config = apply_filters(
		'twentig_blocks_editor_config',
		array(
			'theme'                  => get_template(),
			'cssClasses'             => twentig_get_block_css_classes(),
			'blockPatternCategories' => twentig_get_registered_pattern_categories(),
			'blockPageCategories'    => twentig_get_registered_page_categories(),
			'blockPatterns'          => Twentig_Block_Patterns_Registry::get_instance()->get_all_registered(),
			'blockPatternsAssetsUri' => TWENTIG_ASSETS_URI . '/images/patterns/',
			'headingFontSizes'       => array_merge( twentig_get_editor_font_sizes(), get_theme_support( 'editor-font-sizes' ) ? get_theme_support( 'editor-font-sizes' )[0] : [] ),
			'editorFontSizes'        => get_theme_support( 'editor-font-sizes' )[0],
		)
	);

	wp_localize_script( 'twentig-blocks-editor', 'twentigEditorConfig', $config );

	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'twentig-blocks-editor', 'twentig' );
	}

	wp_enqueue_style(
		'twentig-editor',
		plugins_url( 'dist/index.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' ),
		$asset_file['version']
	);

	wp_style_add_data( 'twentig-editor', 'rtl', 'replace' );

}
add_action( 'enqueue_block_editor_assets', 'twentig_block_editor_assets' );

require_once TWENTIG_PATH . 'inc/about.php';
require_once TWENTIG_PATH . 'inc/settings.php';
require_once TWENTIG_PATH . 'inc/block-presets.php';
require_once TWENTIG_PATH . 'inc/block-patterns.php';

/**
 * Include Twenty Twenty specific files.
 */
if ( 'twentytwenty' === get_template() ) {
	require_once TWENTIG_PATH . 'inc/twentytwenty/index.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/font.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/color.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/header.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/footer.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/blog.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/404.php';
	require_once TWENTIG_PATH . 'inc/twentytwenty/class-twentig-page-templater.php';
}
