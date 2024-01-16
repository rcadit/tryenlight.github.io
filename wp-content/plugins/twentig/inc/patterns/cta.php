<?php
/**
 * Call-To-Action block patterns.
 *
 * @package twentig
 * @phpcs:disable Squiz.Strings.DoubleQuoteUsage.NotRequired
 */

twentig_register_block_pattern(
	'twentig/cta-colored-background',
	array(
		'title'      => __( 'CTA: Colored Background', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:group {\"backgroundColor\":\"subtle-background\",\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull has-subtle-background-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a call to action heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-colored-background-with-text',
	array(
		'title'      => __( 'CTA: Colored Background with Text', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:group {\"backgroundColor\":\"subtle-background\",\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull has-subtle-background-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"medium\"} -->\n<p class=\"has-text-align-center has-medium-font-size\"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-wide-gradient-background',
	array(
		'title'      => __( 'CTA: Wide Gradient Background', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:cover {\"gradient\":\"vivid-cyan-blue-to-vivid-purple\",\"align\":\"wide\"} -->\n<div class=\"wp-block-cover alignwide has-background-dim has-background-gradient has-vivid-cyan-blue-to-vivid-purple-gradient-background\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"medium\"} -->\n<p class=\"has-text-align-center has-medium-font-size\"> Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-gradient-background-with-buttons',
	array(
		'title'      => __( 'CTA: Gradient Background with Buttons', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:cover {\"gradient\":\"vivid-cyan-blue-to-vivid-purple\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim has-background-gradient has-vivid-cyan-blue-to-vivid-purple-gradient-background\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a call to action heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"customTextColor\":\"#ffffff\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color\" style=\"color:#ffffff\">" . esc_html_x( 'Learn more', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-cover',
	array(
		'title'      => __( 'CTA: Cover', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:cover {\"url\":\"" . twentig_get_pattern_asset( 'wide.jpg' ) . "\",\"minHeight\":500,\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim\" style=\"background-image:url(" . twentig_get_pattern_asset( 'wide.jpg' ) . ");min-height:500px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a call to action heading to engage your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-heading-on-left',
	array(
		'title'      => __( 'CTA: Heading on Left', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"twGutter\":\"large\",\"twStack\":\"md\"} -->\n<div class=\"wp-block-columns alignwide tw-gutter-large tw-cols-stack-md\"><!-- wp:column {\"className\":\"tw-mb-2\"} -->\n<div class=\"wp-block-column tw-mb-2\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a call to action heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"tw-mt-2\"} -->\n<div class=\"wp-block-column tw-mt-2\"><!-- wp:paragraph {\"fontSize\":\"medium\"} -->\n<p class=\"has-medium-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Venenatis nec convallis magna, eu congue velit.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-image-on-right',
	array(
		'title'      => __( 'CTA: Image on Right', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaType\":\"image\",\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile tw-stack-md\"><figure class=\"wp-block-media-text__media\"><img src=\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"medium\"} -->\n<p class=\"has-medium-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-horizontal-card',
	array(
		'title'      => __( 'CTA: Horizontal Card', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaType\":\"image\",\"imageFill\":true,\"className\":\"is-style-tw-shadow\",\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile is-image-fill is-style-tw-shadow tw-stack-md\"><figure class=\"wp-block-media-text__media\" style=\"background-image:url(" . twentig_get_pattern_asset( 'landscape1.jpg' ) . ");background-position:50% 50%\"><img src=\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"medium\"} -->\n<p class=\"has-medium-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-2-columns',
	array(
		'title'      => __( 'CTA: 2 Columns', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"twGutter\":\"large\",\"twStack\":\"md\"} -->\n<div class=\"wp-block-columns alignwide tw-gutter-large tw-cols-stack-md\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"align\":\"center\",\"fontSize\":\"h3\"} -->\n<h2 class=\"has-text-align-center has-h-3-font-size\">" . esc_html_x( 'Write a call to action heading to engage your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:separator {\"className\":\"tw-lg-hidden\"} -->\n<hr class=\"wp-block-separator tw-lg-hidden\"/>\n<!-- /wp:separator --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"align\":\"center\",\"fontSize\":\"h3\"} -->\n<h2 class=\"has-text-align-center has-h-3-font-size\">" . esc_html_x( 'Write a call to action heading to engage your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">" . esc_html_x( 'Contact us', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-gradient-background-with-2-columns',
	array(
		'title'      => __( 'CTA: Gradient Background with 2 Columns', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:cover {\"gradient\":\"vivid-cyan-blue-to-vivid-purple\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim has-background-gradient has-vivid-cyan-blue-to-vivid-purple-gradient-background\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"twColumnStyle\":\"card-gray\",\"twTextAlign\":\"center\",\"twStretchedLink\":true} -->\n<div class=\"wp-block-columns tw-cols-card tw-cols-card-gray has-text-align-center tw-stretched-link\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"fontSize\":\"h4\"} -->\n<h2 class=\"has-h-4-font-size\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet commodo erat elit.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"fontSize\":\"h4\"} -->\n<h2 class=\"has-h-4-font-size\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Integer enim risus suscipit eu iaculis sed metus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\">" . esc_html_x( 'Contact us', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
	)
);

twentig_register_block_pattern(
	'twentig/cta-2-columns-with-cover',
	array(
		'title'      => __( 'CTA: 2 Columns with Cover', 'twentig' ),
		'categories' => array( 'cta' ),
		'content'    => "<!-- wp:columns {\"align\":\"full\",\"className\":\"tw-mt-0\",\"twGutter\":\"no\",\"twStack\":\"md\",\"twTextAlign\":\"center\"} -->\n<div class=\"wp-block-columns alignfull tw-mt-0 tw-gutter-no tw-cols-stack-md has-text-align-center\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover {\"url\":\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\",\"twStretchedLink\":true,\"twHover\":\"opacity\"} -->\n<div class=\"wp-block-cover has-background-dim tw-stretched-link tw-hover-opacity\" style=\"background-image:url(" . twentig_get_pattern_asset( 'landscape1.jpg' ) . ")\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"fontSize\":\"h3\"} -->\n<h2 class=\"has-h-3-font-size\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\">" . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:cover {\"url\":\"" . twentig_get_pattern_asset( 'landscape2.jpg' ) . "\",\"twStretchedLink\":true,\"twHover\":\"opacity\"} -->\n<div class=\"wp-block-cover has-background-dim tw-stretched-link tw-hover-opacity\" style=\"background-image:url(" . twentig_get_pattern_asset( 'landscape2.jpg' ) . ")\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"fontSize\":\"h3\"} -->\n<h2 class=\"has-h-3-font-size\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"background-color:#ffffff;color:#000000\">" . esc_html_x( 'Contact us', 'Block pattern content', 'twentig' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
	)
);
