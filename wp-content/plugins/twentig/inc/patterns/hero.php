<?php
/**
 * Hero block patterns.
 *
 * @package twentig
 * @phpcs:disable Squiz.Strings.DoubleQuoteUsage.NotRequired
 */

twentig_register_block_pattern(
	'twentig/hero-with-colored-background',
	array(
		'title'      => __( 'Hero with Colored Background', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"backgroundColor\":\"subtle-background\",\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull has-subtle-background-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-button',
	array(
		'title'      => __( 'Hero with Button', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write a page title that captivates your audience', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-eyebrow-title',
	array(
		'title'      => __( 'Hero with Eyebrow Title', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-eyebrow\"} -->\n<h1 class=\"has-text-align-center tw-eyebrow\">" . esc_html_x( 'Page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"align\":\"center\",\"className\":\"tw-text-wide\",\"fontSize\":\"h1\"} -->\n<h2 class=\"has-text-align-center tw-text-wide has-h-1-font-size\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Sed do eiusmod tempor incididunt ut labore.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-button-and-image-on-right',
	array(
		'title'      => __( 'Hero with Button and Image on Right', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"backgroundColor\":\"subtle-background\",\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull has-subtle-background-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaType\":\"image\",\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile tw-stack-md\"><figure class=\"wp-block-media-text__media\"><img src=\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":1} -->\n<h1>" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Learn more', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-eyebrow-title-and-image-on-right',
	array(
		'title'      => __( 'Hero with Eyebrow Title and Image on Right', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"backgroundColor\":\"subtle-background\",\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull has-subtle-background-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaType\":\"image\",\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile tw-stack-md\"><figure class=\"wp-block-media-text__media\"><img src=\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":1,\"className\":\"tw-eyebrow\"} -->\n<h1 class=\"tw-eyebrow\">" . esc_html_x( 'Page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/full-width-hero-with-image-on-right',
	array(
		'title'      => __( 'Full Width Hero with Image on Right', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:media-text {\"align\":\"full\",\"backgroundColor\":\"subtle-background\",\"mediaPosition\":\"right\",\"mediaType\":\"image\",\"imageFill\":true,\"className\":\"tw-mb-0 tw-content-narrow\",\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignfull has-media-on-the-right has-background has-subtle-background-background-color is-stacked-on-mobile is-image-fill tw-mb-0 tw-content-narrow tw-stack-md\"><figure class=\"wp-block-media-text__media\" style=\"background-image:url(" . twentig_get_pattern_asset( 'landscape1.jpg' ) . ");background-position:50% 50%\"><img src=\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":1} -->\n<h1>" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:media-text -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-buttons-and-image',
	array(
		'title'      => __( 'Hero with Buttons and Image', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Learn more', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:image {\"align\":\"wide\"} -->\n<figure class=\"wp-block-image alignwide\"><img src=\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-eyebrow-title-and-image',
	array(
		'title'      => __( 'Hero with Eyebrow Title and Image', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-eyebrow\"} -->\n<h1 class=\"has-text-align-center tw-eyebrow\">" . esc_html_x( 'Page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"align\":\"center\",\"className\":\"tw-text-wide\",\"fontSize\":\"h1\"} -->\n<h2 class=\"has-text-align-center tw-text-wide has-h-1-font-size\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:image {\"align\":\"wide\"} -->\n<figure class=\"wp-block-image alignwide\"><img src=\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-overlap-image',
	array(
		'title'      => __( 'Hero with Overlap Image', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"backgroundColor\":\"subtle-background\",\"align\":\"full\",\"className\":\"tw-group-overlap-bottom\"} -->\n<div class=\"wp-block-group alignfull has-subtle-background-background-color has-background tw-group-overlap-bottom\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:image {\"align\":\"wide\"} -->\n<figure class=\"wp-block-image alignwide\"><img src=\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:group {\"backgroundColor\":\"background\",\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull has-background-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-title-on-left-and-image-at-the-bottom',
	array(
		'title'      => __( 'Hero with Title on Left and Image at the Bottom', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"twGutter\":\"large\",\"twStack\":\"md\"} -->\n<div class=\"wp-block-columns alignwide tw-gutter-large tw-cols-stack-md\"><!-- wp:column {\"className\":\"tw-mb-2\"} -->\n<div class=\"wp-block-column tw-mb-2\"><!-- wp:heading {\"level\":1} -->\n<h1>" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"tw-mt-2\"} -->\n<div class=\"wp-block-column tw-mt-2\"><!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Class aptent taciti sociosqu ad litora torquent.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"className\":\"tw-mb-0\"} -->\n<div class=\"wp-block-buttons tw-mb-0\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Learn more', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:image {\"align\":\"wide\"} -->\n<figure class=\"wp-block-image alignwide\"><img src=\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-cut-off-image',
	array(
		'title'      => __( 'Hero with Cut Off Image', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:group {\"backgroundColor\":\"subtle-background\",\"align\":\"full\",\"className\":\"tw-pb-0\"} -->\n<div class=\"wp-block-group alignfull has-subtle-background-background-color has-background tw-pb-0\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"className\":\"tw-mt-9\"} -->\n<figure class=\"wp-block-image tw-mt-9\"><img src=\"" . twentig_get_pattern_asset( 'illustration.svg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-cover',
	array(
		'title'      => __( 'Hero Cover', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:cover {\"url\":\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\",\"minHeight\":70,\"minHeightUnit\":\"vh\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim\" style=\"background-image:url(" . twentig_get_pattern_asset( 'wide.jpg' ) . ");min-height:70vh\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-cover-with-button',
	array(
		'title'      => __( 'Hero Cover with Button', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:cover {\"url\":\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\",\"minHeight\":70,\"minHeightUnit\":\"vh\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim\" style=\"background-image:url(" . twentig_get_pattern_asset( 'wide.jpg' ) . ");min-height:70vh\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write a page title that captivates your audience', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Learn more', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/fullscreen-hero-cover',
	array(
		'title'      => __( 'Fullscreen Hero Cover', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:cover {\"url\":\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\",\"align\":\"full\",\"twFullscreen\":true} -->\n<div class=\"wp-block-cover alignfull has-background-dim tw-fullscreen\" style=\"background-image:url(" . twentig_get_pattern_asset( 'wide.jpg' ) . ")\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-eyebrow\"} -->\n<h1 class=\"has-text-align-center tw-eyebrow\">" . esc_html_x( 'Page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"align\":\"center\",\"className\":\"tw-text-wide\",\"fontSize\":\"h1\"} -->\n<h2 class=\"has-text-align-center tw-text-wide has-h-1-font-size\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-cover-with-card',
	array(
		'title'      => __( 'Hero Cover with Card', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:cover {\"url\":\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\",\"dimRatio\":0,\"minHeight\":70,\"minHeightUnit\":\"vh\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull\" style=\"background-image:url(" . twentig_get_pattern_asset( 'wide.jpg' ) . ");min-height:70vh\"><div class=\"wp-block-cover__inner-container\"><!-- wp:group {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-group has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-eyebrow\"} -->\n<h1 class=\"has-text-align-center tw-eyebrow\">Page title</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"align\":\"center\",\"className\":\"tw-mt-3\"} -->\n<h2 class=\"has-text-align-center tw-mt-3\">Write a heading that captivates your audience</h2>\n<!-- /wp:heading --></div></div>\n<!-- /wp:group --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-gradient-background',
	array(
		'title'      => __( 'Hero with Gradient Background', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:cover {\"minHeight\":200,\"gradient\":\"vivid-cyan-blue-to-vivid-purple\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim has-background-gradient has-vivid-cyan-blue-to-vivid-purple-gradient-background\" style=\"min-height:200px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-with-gradient-background-and-buttons',
	array(
		'title'      => __( 'Hero with Gradient Background and Buttons', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:cover {\"minHeight\":200,\"gradient\":\"vivid-cyan-blue-to-vivid-purple\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim has-background-gradient has-vivid-cyan-blue-to-vivid-purple-gradient-background\" style=\"min-height:200px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\",\"level\":1,\"className\":\"tw-text-wide\"} -->\n<h1 class=\"has-text-align-center tw-text-wide\">" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"customTextColor\":\"#ffffff\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color\" style=\"color:#ffffff\">" . esc_html_x( 'Learn more', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/hero-cover-with-image-on-right',
	array(
		'title'      => __( 'Hero Cover with Image on Right', 'twentig' ),
		'categories' => array( 'hero' ),
		'content'    => "<!-- wp:cover {\"url\":\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim\" style=\"background-image:url(" . twentig_get_pattern_asset( 'wide.jpg' ) . ")\"><div class=\"wp-block-cover__inner-container\"><!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaType\":\"image\",\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile tw-stack-md\"><figure class=\"wp-block-media-text__media\"><img src=\"" . twentig_get_pattern_asset( 'landscape2.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":1} -->\n<h1>" . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . "</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:cover -->",
	)
);
