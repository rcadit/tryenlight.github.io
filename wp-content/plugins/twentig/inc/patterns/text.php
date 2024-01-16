<?php
/**
 * Text block patterns.
 *
 * @package twentig
 */

twentig_register_block_pattern(
	'twentig/heading-and-text',
	array(
		'title'      => __( 'Heading and Text', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet. Fusce sed magna eu ligula commodo hendrerit.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Morbi fringilla sapien libero. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/centered-heading-and-text',
	array(
		'title'      => __( 'Centered Heading and text', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet. Fusce sed magna eu ligula commodo hendrerit.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Morbi fringilla sapien libero. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/large-text',
	array(
		'title'      => __( 'Large Text', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Class aptent taciti sociosqu ad litora torquent.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/heading-and-large-text',
	array(
		'title'      => __( 'Heading and Large Text', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/heading-and-lead-paragraph',
	array(
		'title'      => __( 'Heading and Lead Paragraph', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\"><strong>" . esc_html_x( 'Write a lead paragraph.', 'Block pattern content', 'twentig' ) . " Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet. Fusce sed magna eu ligula commodo hendrerit.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Morbi fringilla sapien libero. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/eyebrow-heading',
	array(
		'title'      => __( 'Eyebrow Heading', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"className\":\"tw-eyebrow\"} -->\n<h2 class=\"tw-eyebrow\">" . esc_html_x( 'Short heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"h2\"} -->\n<h3 class=\"has-h-2-font-size\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Class aptent taciti sociosqu ad litora torquent.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet. Fusce sed magna eu ligula commodo hendrerit fringilla ac purus.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/heading-on-left-and-text',
	array(
		'title'      => __( 'Heading on Left and Text', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"twGutter\":\"large\",\"twStack\":\"md\"} -->\n<div class=\"wp-block-columns alignwide tw-gutter-large tw-cols-stack-md\"><!-- wp:column {\"className\":\"tw-mb-2\"} -->\n<div class=\"wp-block-column tw-mb-2\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"tw-mt-2\"} -->\n<div class=\"wp-block-column tw-mt-2\"><!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Class aptent tacit sociosqu ad litora torquent per conubia nostra.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet. Fusce sed magna eu ligula commodo hendrerit fringilla ac purus.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/small-heading-and-wide-text',
	array(
		'title'      => __( 'Small Heading and Wide Text', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"className\":\"tw-eyebrow tw-text-wide\"} -->\n<h2 class=\"tw-eyebrow tw-text-wide\">" . esc_html_x( 'Short heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"larger\",\"className\":\"tw-text-wide\"} -->\n<p class=\"has-larger-font-size tw-text-wide\">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"larger\",\"className\":\"tw-text-wide\"} -->\n<p class=\"has-larger-font-size tw-text-wide\">Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet fusce sed magna eu ligula.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/bordered-heading-and-small-headings',
	array(
		'title'      => __( 'Bordered Heading and Small Headings', 'twentig' ),
		'categories' => array( 'text' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"className\":\"tw-heading-border-bottom\"} -->\n<h2 class=\"tw-heading-border-bottom\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus, suscipit eu iaculis sed, ullamcorper at metus. Venenatis nec convallis magna, eu congue velit. Fusce sed magna eu ligula commodo hendrerit fringilla.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Venenatis nec convallis magna, eu congue velit. Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet. Fusce sed magna eu ligula commodo hendrerit fringilla ac purus.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->",
	)
);
