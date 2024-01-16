<?php
/**
 * List block patterns.
 *
 * @package twentig
 */

twentig_register_block_pattern(
	'twentig/list-and-text-aligned',
	array(
		'title'      => __( 'List and Text Aligned', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list {\"className\":\"tw-mt-5\"} -->\n<ul class=\"tw-mt-5\"><li>Integer enim risus suscipit eu iaculis</li><li>Quisque lorem sapien, egestas sed venenatis</li><li>Aliquam tempus mi nulla porta luctus nec congue velit</li><li>Sed non neque at lectus bibendum blandit</li></ul>\n<!-- /wp:list --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/list-and-heading-on-left',
	array(
		'title'      => __( 'List and Heading on Left', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"twGutter\":\"large\",\"twStack\":\"md\"} -->\n<div class=\"wp-block-columns alignwide tw-gutter-large tw-cols-stack-md\"><!-- wp:column {\"className\":\"tw-mb-3\"} -->\n<div class=\"wp-block-column tw-mb-3\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:list {\"ordered\":true,\"className\":\"is-style-tw-border-inner tw-list-spacing-medium\"} -->\n<ol class=\"is-style-tw-border-inner tw-list-spacing-medium\"><li>Lorem ipsum dolor sit amet, commodo erat adipiscing elit</li><li>Integer enim risus suscipit eu iaculis sed, ullamcorper at metus</li><li>Aliquam tempus mi nulla porta luctus</li><li>Duis enim elit, porttitor id feugiat at blandit at erat</li><li>Fusce sed magna eu ligula commodo hendrerit ac purus</li></ol>\n<!-- /wp:list --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/emphasized-list-and-heading-on-left',
	array(
		'title'      => __( 'Emphasized List and Heading on Left', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"align\":\"wide\",\"twGutter\":\"large\",\"twStack\":\"md\"} -->\n<div class=\"wp-block-columns alignwide are-vertically-aligned-center tw-gutter-large tw-cols-stack-md\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:group {\"customBackgroundColor\":\"#ffffff\",\"customTextColor\":\"#000000\",\"twDecoration\":\"shadow\"} -->\n<div class=\"wp-block-group has-text-color has-background tw-shadow\" style=\"background-color:#ffffff;color:#000000\"><div class=\"wp-block-group__inner-container\"><!-- wp:list {\"className\":\"is-style-tw-checkmark tw-list-spacing-loose\"} -->\n<ul class=\"is-style-tw-checkmark tw-list-spacing-loose\"><li>Integer enim risus suscipit eu iaculis</li><li>Quisque lorem sapien egestas sed venenatis</li><li>Aliquam tempus mi nulla porta luctus</li><li>Sed non neque at lectus bibendum blandit</li><li>Proin varius libero sit amet tortor volutpat diam</li></ul>\n<!-- /wp:list --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/list-and-image-on-left',
	array(
		'title'      => __( 'List and Image on Left', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"mediaType\":\"image\",\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile tw-stack-md\"><figure class=\"wp-block-media-text__media\"><img src=\"" . twentig_get_pattern_asset( 'square1.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading -->\n<h2>" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul><li>Integer enim risus suscipit eu iaculis</li><li>Quisque lorem sapien, egestas sed venenatis</li><li>Aliquam tempus mi nulla porta luctus</li><li>Sed non neque at lectus bibendum blandit</li></ul>\n<!-- /wp:list --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/bold-list-and-image-on-left',
	array(
		'title'      => __( 'Bold List and Image on Left', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:media-text {\"mediaType\":\"image\",\"className\":\"tw-mt-8\",\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile tw-mt-8 tw-stack-md\"><figure class=\"wp-block-media-text__media\"><img src=\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:list {\"className\":\"is-style-tw-checkmark tw-list-spacing-loose\"} -->\n<ul class=\"is-style-tw-checkmark tw-list-spacing-loose\"><li><strong>Lorem ipsum dolor sit amet</strong><br>Sed do eiusmod ut tempor incididunt ut labore et dolore.</li><li><strong>Integer enim risus</strong><br>Venenatis nec convallis magna eu congue velit. Fusce sed magna eu ligula commodo hendrerit fringilla.</li><li><strong>Aliquam tempus mi nulla porta luctus</strong><br>Duis enim elit porttitor id feugiat at blandit at erat.</li></ul>\n<!-- /wp:list --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/alternating-list-and-image',
	array(
		'title'      => __( 'Alternating List and Image', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:media-text {\"mediaType\":\"image\",\"mediaWidth\":49,\"imageFill\":false,\"twStackedMd\":true} -->\n<div class=\"wp-block-media-text alignwide is-stacked-on-mobile tw-stack-md\" style=\"grid-template-columns:49% auto\"><figure class=\"wp-block-media-text__media\"><img src=\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h4\"} -->\n<h3 class=\"has-h-4-font-size\">" . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul><li>Proin varius libero sit amet tortor volutpat diam</li><li>Venenatis nec convallis magna eu congue velit</li><li>Duis enim elit porttitor id feugiat blandit</li></ul>\n<!-- /wp:list --></div></div>\n<!-- /wp:media-text -->\n\n<!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaType\":\"image\",\"mediaWidth\":49,\"imageFill\":false,\"twStackedMd\":true,\"twStackedReverse\":true} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile tw-stack-md tw-stack-reverse\" style=\"grid-template-columns:auto 49%\"><figure class=\"wp-block-media-text__media\"><img src=\"" . twentig_get_pattern_asset( 'landscape2.jpg' ) . "\" alt=\"\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h4\"} -->\n<h3 class=\"has-h-4-font-size\">" . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Integer enim risus suscipit eu iaculis sed ullamcorper at metus. Venenatis nec convallis magna eu congue velit.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul><li>Aliquam tempus mi eu nulla porta luctus</li><li>Fusce sed magna eu ligula commodo</li><li>Mauris dui tellus mollis quis varius amet ultrices</li></ul>\n<!-- /wp:list --></div></div>\n<!-- /wp:media-text --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/lists-2-columns',
	array(
		'title'      => __( 'Lists: 2 Columns', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"twGutter\":\"large\"} -->\n<div class=\"wp-block-columns tw-gutter-large\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit ut tempor.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list {\"className\":\"is-style-tw-dash\"} -->\n<ul class=\"is-style-tw-dash\"><li>Venenatis convallis</li><li>Sed eiusmod</li><li>Integer enim</li><li>Aliquam tempus</li><li>Sed non neque</li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Integer enim risus suscipit eu iaculis sed, ullamcorper at metus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list {\"className\":\"is-style-tw-dash\"} -->\n<ul class=\"is-style-tw-dash\"><li>Morbi fringilla</li><li>Duis enim elit</li><li>Proin varius libero</li><li>Fusce magna</li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/lists-3-columns',
	array(
		'title'      => __( 'Lists: 3 Columns', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit tempor.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list {\"className\":\"is-style-tw-arrow\"} -->\n<ul class=\"is-style-tw-arrow\"><li>Venenatis convallis</li><li>Sed eiusmod</li><li>Integer enim</li><li>Aliquam tempus </li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Integer enim risus suscipit eu iaculis sed, ullamcorper at metus.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list {\"className\":\"is-style-tw-arrow\"} -->\n<ul class=\"is-style-tw-arrow\"><li>Sed non neque</li><li>Morbi fringilla</li><li>Duis enim elit</li><li>Proin varius libero</li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Third item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list {\"className\":\"is-style-tw-arrow\"} -->\n<ul class=\"is-style-tw-arrow\"><li>Fusce magna</li><li>Integer sagittis</li><li>Mauris dui tellus</li><li>Class aptent  </li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/lists-3-columns-with-border',
	array(
		'title'      => __( 'Lists: 3 Columns with Border', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"align\":\"wide\",\"twGutter\":\"large\"} -->\n<div class=\"wp-block-columns alignwide tw-gutter-large\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:list {\"className\":\"is-style-tw-border-inner\"} -->\n<ul class=\"is-style-tw-border-inner\"><li>Venenatis convallis</li><li>Sed eiusmod</li><li>Integer enim</li><li>Aliquam tempus</li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:list {\"className\":\"is-style-tw-border-inner\"} -->\n<ul class=\"is-style-tw-border-inner\"><li>Sed non neque</li><li>Morbi fringilla</li><li>Duis enim elit</li><li>Proin varius libero</li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Third item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:list {\"className\":\"is-style-tw-border-inner\"} -->\n<ul class=\"is-style-tw-border-inner\"><li>Fusce magna</li><li>Integer sagittis</li><li>Mauris dui tellus</li><li>Class aptent</li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/lists-4-columns-with-image',
	array(
		'title'      => __( 'Lists: 4 Columns with Image', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Write a heading', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img src=\"" . twentig_get_pattern_asset( 'landscape1.jpg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>Venenatis convallis</li><li>Sed eiusmod</li><li>Integer enim</li><li>Aliquam tempus </li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img src=\"" . twentig_get_pattern_asset( 'landscape2.jpg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>Sed non neque</li><li>Morbi fringilla</li><li>Duis enim elit</li><li>Proin varius libero </li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img src=\"" . twentig_get_pattern_asset( 'landscape3.jpg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Third item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>Fusce magna</li><li>Integer sagittis</li><li>Mauris dui tellus</li><li>Class aptent </li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img src=\"" . twentig_get_pattern_asset( 'landscape4.jpg' ) . "\" alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"h5\"} -->\n<h3 class=\"has-h-5-font-size\">" . esc_html_x( 'Fourth item', 'Block pattern content', 'twentig' ) . "</h3>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>Rhoncus justo </li><li>Amet velit</li><li>Erat vitae</li><li>Maecenas convallis </li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	)
);

twentig_register_block_pattern(
	'twentig/inline-list',
	array(
		'title'      => __( 'Inline List', 'twentig' ),
		'categories' => array( 'list' ),
		'content'    => "<!-- wp:group {\"align\":\"full\"} -->\n<div class=\"wp-block-group alignfull\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">" . esc_html_x( 'Our clients', 'Block pattern content', 'twentig' ) . "</h2>\n<!-- /wp:heading -->\n\n<!-- wp:list {\"className\":\"tw-mt-6 has-text-align-center has-larger-font-size is-style-tw-inline tw-text-wide\"} -->\n<ul class=\"tw-mt-6 has-text-align-center has-larger-font-size is-style-tw-inline tw-text-wide\"><li>Airbnb</li><li>Apple</li><li>Dropbox</li><li>Facebook</li><li>Github</li><li>Google</li><li>LinkedIn</li><li>Mailchimp</li><li>Microsoft</li><li>Netflix</li><li>Paypal</li><li>Slack</li><li>Spotify</li><li>Twitter</li><li>Uber</li><li>Zoom</li></ul>\n<!-- /wp:list --></div></div>\n<!-- /wp:group -->",
	)
);
