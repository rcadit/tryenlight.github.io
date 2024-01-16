<?php
/**
 * Twentig's Dashboard Menu.
 *
 * @package twentig
 */

/**
 * Adds a new wp-admin menu page for the Twentig.
 */
function twentig_menu_page() {
	global $submenu;

	add_menu_page(
		'Twentig',
		'Twentig',
		'edit_posts',
		'twentig',
		'twentig_render_menu_page',
		'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAyMCI+PHBhdGggZmlsbD0iYmxhY2siIGQ9Ik0yMCA1LjUzOXEtLjAwMi0uMzAyLS4wMS0uNjAzYTguNzI1IDguNzI1IDAgMDAtLjExNS0xLjMxMyA0LjQzNiA0LjQzNiAwIDAwLS40MTItMS4yNUE0LjIgNC4yIDAgMDAxNy42MjcuNTM3IDQuNDUyIDQuNDUyIDAgMDAxNi4zOC4xMjUgOC43MjUgOC43MjUgMCAwMDE1LjA2NC4wMXEtLjMtLjAwOC0uNjAzLS4wMUg1LjU0cS0uMzAyLjAwMi0uNjA0LjAxYTguODI3IDguODI3IDAgMDAtMS4zMTMuMTE1IDQuNDQ0IDQuNDQ0IDAgMDAtMS4yNDguNDEyQTQuMiA0LjIgMCAwMC41MzggMi4zNzNhNC40MjIgNC40MjIgMCAwMC0uNDEyIDEuMjVBOC42MDQgOC42MDQgMCAwMC4wMSA0LjkzNXEtLjAwNy4zMDItLjAwOC42MDRDMCA1Ljc3OSAwIDYuMDE3IDAgNi4yNTZ2Ny40ODhjMCAuMjM5IDAgLjQ3Ny4wMDIuNzE2IDAgLjIwMS4wMDMuNDAzLjAwOC42MDRhOC43ODQgOC43ODQgMCAwMC4xMTYgMS4zMTMgNC40MzEgNC40MzEgMCAwMC40MTIgMS4yNSA0LjIgNC4yIDAgMDAxLjgzNiAxLjgzNSA0LjQyOSA0LjQyOSAwIDAwMS4yNDguNDEzIDguNzE1IDguNzE1IDAgMDAxLjMxNC4xMTVxLjMwMS4wMDguNjAzLjAxaDguMjA1bC43MTctLjAwMnEuMzAyIDAgLjYwMy0uMDA5YTguNzI0IDguNzI0IDAgMDAxLjMxNS0uMTE1IDQuNDI2IDQuNDI2IDAgMDAxLjI0OC0uNDEyIDQuMiA0LjIgMCAwMDEuODM2LTEuODM2IDQuNDE3IDQuNDE3IDAgMDAuNDEyLTEuMjQ5IDguNzM1IDguNzM1IDAgMDAuMTE1LTEuMzEzYy4wMDUtLjIwMS4wMDgtLjQwMy4wMS0uNjA0VjUuODQyek0xNS4xMTMgMTRoLTEuMkwxMi4zNSA5LjcyNyAxMC43ODcgMTRIOS42TDcuNzMxIDguODM3SDUuMjY0djIuNjI5YTEuMTYgMS4xNiAwIDAwMS4yIDEuMjI2IDIuMDM4IDIuMDM4IDAgMDAuNTEyLS4wOGwuMDggMS4zMmExLjkyNiAxLjkyNiAwIDAxLS44MDguMTYyIDIuMzUgMi4zNSAwIDAxLTIuNDgtMi41NlY4LjgzNkgyLjVWNy40MDhoMS4yNjdWNS42NDJoMS40OTd2MS43NjZoMy41NTRsMS4zODkgNC4yNzMgMS41MzctNC4yNzNoMS4yMTNsMS41NSA0LjI3MyAxLjM4OS00LjI3M0gxNy41eiIvPjwvc3ZnPg=='
	);

	add_submenu_page(
		'twentig',
		esc_html__( 'Twentig Overview', 'twentig' ),
		esc_html__( 'Overview', 'twentig' ),
		'manage_options',
		'twentig',
		'twentig_render_menu_page'
	);

	add_submenu_page(
		'twentig',
		esc_html__( 'Twentig Settings', 'twentig' ),
		esc_html__( 'Settings', 'twentig' ),
		'manage_options',
		'twentig-settings',
		'twentig_render_settings_page'
	);
}
add_action( 'admin_menu', 'twentig_menu_page' );

/**
 * Renders Twentig dashboard page.
 */
function twentig_render_menu_page() {
	?>		
	<div class="tw-about__container">
		<div class="tw-about__header">
			<nav class="tw-about__header-navigation" aria-label="<?php esc_attr_e( 'Primary menu' ); ?>">
				<svg class="tw-nav__logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 23.27"><path d="M25.14 5.74l-2.6 8.02-2.92-8.02h-2.27l-2.89 8.02-2.6-8.02H5.19V2.43H2.38v3.31H0v2.68h2.38v5.06c0 3.06 1.92 4.8 4.65 4.8a3.61 3.61 0 001.52-.3l-.15-2.47a3.82 3.82 0 01-.96.15 2.18 2.18 0 01-2.25-2.3V8.42h4.63l3.5 9.7h2.23l2.93-8.03 2.94 8.02h2.25l4.48-12.37zM34.1 5.49a6.3 6.3 0 00-6.38 6.37 6.39 6.39 0 006.42 6.5c2.56 0 4.63-1 5.54-2.68l-2.25-1.44a3.76 3.76 0 01-3.24 1.57 3.52 3.52 0 01-3.66-3.21h9.4a6.93 6.93 0 00.1-1.22 5.85 5.85 0 00-5.94-5.9zm-3.47 4.96a3.29 3.29 0 013.31-2.63 2.98 2.98 0 013.14 2.63zM48.04 5.49a4.5 4.5 0 00-3.79 1.92V5.74h-2.8v12.37h2.8v-8.1a3.64 3.64 0 013.11-1.71c1.75 0 2.91 1.21 2.91 3.21v6.6h2.83v-7.06c0-3.41-1.97-5.56-5.06-5.56zM64.62 0a1.8 1.8 0 000 3.62 1.83 1.83 0 001.82-1.82A1.84 1.84 0 0064.62 0zM58.8 2.43h-2.81v3.31H53.6v2.68h2.38v5.06c0 3.06 1.92 4.8 4.65 4.8a3.61 3.61 0 001.52-.3L62 15.52a3.82 3.82 0 01-.96.15 2.18 2.18 0 01-2.26-2.3V8.42h4.4v9.7h2.82V5.73h-7.22zM77.2 5.72v1.64a4.77 4.77 0 00-3.95-1.87 6.05 6.05 0 00-5.95 6.27 6.08 6.08 0 005.95 6.33 4.83 4.83 0 003.94-1.88v1.4a3.2 3.2 0 01-3.41 3.13 5.89 5.89 0 01-4.1-1.46l-1.42 1.94a8.02 8.02 0 005.62 2.05c3.51 0 6.12-2.2 6.12-5.61V5.72zm0 7.94a4.01 4.01 0 01-3.37 1.8 3.68 3.68 0 110-7.37 3.94 3.94 0 013.36 1.83z"/></svg>
				<a href="<?php echo esc_url( 'https://wordpress.org/support/plugin/twentig/reviews/?filter=5' ); ?>" target="_blank"><?php esc_html_e( 'Leave a review', 'twentig' ); ?></a>
				<a href="https://twentig.com/newsletter?utm_source=wp-dash&utm_medium=overview-menu&utm_campaign=newsletter" target="_blank"><?php esc_html_e( 'Resources', 'twentig' ); ?></a>
			</nav>
		</div>

		<div class="tw-about__section is-feature">
			<div class="tw-about__section-inner">
				<h1><?php esc_html_e( 'Build your website with Twentig.', 'twentig' ); ?></h1>
				<p><?php esc_html_e( "From advanced Twenty Twenty options to enhanced blocks to pre‑designed layouts, you’ve got what you need to create a beautiful website.", 'twentig' ); ?></p>
			</div>
		</div>
		<div class="tw-about__section ">
			<div class="tw-about__section-inner">
				<h2 class="is-section-header"><?php esc_html_e( 'The most popular WordPress theme like you’ve never seen.', 'twentig' ); ?></h2>
				<p><?php esc_html_e( 'Twentig offers powerful features to customize Twenty Twenty — making it the perfect combination to build your website.', 'twentig' ); ?> </p>
				<p>
				<?php
				if ( 'twentytwenty' !== get_template() && current_user_can( 'switch_themes' ) ) {
					$installed_themes = search_theme_directories();
					if ( in_array( 'twentytwenty', array_keys( $installed_themes ), true ) ) {
						$install_url = wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=twentytwenty' ), 'switch-theme_twentytwenty' );
						?>
						<?php printf( '<a href="%s" class="button button-primary">%s</a>', esc_url( $install_url ), esc_html__( 'Activate Twenty Twenty', 'twentig' ) ); ?>
						<?php
					} else {
						$install_url = admin_url( 'theme-install.php?search=twentytwenty' );
						?>
						<?php printf( '<a href="%s" class="button button-primary">%s</a>', esc_url( $install_url ), esc_html__( 'Install Twenty Twenty', 'twentig' ) ); ?>
						<?php
					}
				}
				?>
				</p>
				<div class="tw-about__image less-margin">
					<img src="https://blocks.static-twentig.com/overview-theme.jpg" width="2000" height="714" alt="">
				</div>

				<div class="tw-about__columns has-3-columns">
					<div class="column">
						<h3><?php esc_html_e( 'Advanced customization', 'twentig' ); ?></h3>
						<p>
							<?php esc_html_e( 'From post grid to sticky header to footer layout, Twentig provides endless ways to enhance Twenty Twenty. Change the look and feel of your website by customizing the fonts, colors, global styles, 404 page, and more.', 'twentig' ); ?>
							<?php if ( 'twentytwenty' === get_template() ) : ?>
								<a href="<?php echo esc_url( admin_url( 'customize.php' ) . '?return=' . rawurlencode( admin_url() . '?page=twentig' ) ); ?>"><?php esc_html_e( 'Start customizing', 'twentig' ); ?></a>.
							<?php endif; ?>
						</p>						
					</div>
					<div class="column">
						<h3><?php esc_html_e( 'Design freedom', 'twentig' ); ?></h3>
						<p><?php esc_html_e( 'Our custom page templates allow you to control the look of your entire page. Now you can easily remove the page title, header, footer, or set a transparent header — enabling total design freedom.', 'twentig' ); ?></p>
					</div>
					<div class="column">
						<h3><?php esc_html_e( 'Tailored design', 'twentig' ); ?></h3>
						<p><?php esc_html_e( 'Twentig brings design improvements to the Twenty Twenty theme. Our additional block settings and pre-designed layouts are specially built for Twenty Twenty — so it’s easier than ever to make beautiful pages.', 'twentig' ); ?></p>
					</div>					
				</div>
			</div>
		</div>

		<div class="tw-about__section">
			<div class="tw-about__section-inner">
				<h2 class="is-section-header"><?php esc_html_e( 'Do more with blocks.', 'twentig' ); ?></h1></h2>
				<p><?php esc_html_e( 'Twentig enhances the existing WordPress blocks — taking the block editor to a new level of design and creativity.', 'twentig' ); ?></p>

				<div class="tw-about__image">
					<img src="https://blocks.static-twentig.com/overview-blocks.jpg" loading="lazy" width="2000" height="830" alt="">
				</div>

				<div class="tw-about__columns has-2-columns">
					<div class="column">
						<h3><?php esc_html_e( 'Ease of use', 'twentig' ); ?></h3>
						<p><?php esc_html_e( 'We’ve added the right amount of features to the WordPress core blocks. So you can easily customize your blocks to fit your needs with just a few clicks. Enjoy a seamless and familiar experience.', 'twentig' ); ?></p>
					</div>
					<div class="column">
						<h3><?php esc_html_e( 'Powerful features', 'twentig' ); ?></h3>
						<p><?php esc_html_e( 'Twentig provides alternative styles, advanced block settings, margin controls, and CSS classes. From columns style to group shape divider to typography settings, you have the best tools to build pages that stand out.', 'twentig' ); ?></p>
					</div>
				</div>

			</div>
		</div>

		<div class="tw-about__section">
			<div class="tw-about__section-inner">
				<h2><?php esc_html_e( 'Build your pages in no time with pre‑designed layouts.', 'twentig' ); ?></h2>
				<p><?php esc_html_e( 'Twentig brings hundreds of ready-to-use block patterns and page layouts — making it easier and faster than ever to create stunning pages.', 'twentig' ); ?></p>

				<div class="tw-about__image">
					<img src="https://blocks.static-twentig.com/overview-patterns.png" loading="lazy" width="1280" height="800" alt="">
				</div>	

				<div class="tw-about__columns has-2-columns">
					<div class="column">
						<h3><?php esc_html_e( 'Flexible layouts', 'twentig' ); ?></h3>
						<p><?php esc_html_e( 'Choose from a variety of versatile block patterns and page layouts that you can mix and match to fit your project. Our template library is designed to enable a wide range of uses and endless design possibilities.', 'twentig' ); ?></p>
					</div>
					<div class="column">
						<h3><?php esc_html_e( 'Professional design', 'twentig' ); ?></h3>
						<p><?php esc_html_e( 'Crafted by award-winning designers, Twentig layouts are responsive and give your pages a professional look right from the start. You don’t need to have coding and design skills to create the website of your dreams.', 'twentig' ); ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="tw-about__section is-cta">
			<div class="tw-about__section-inner">
				<h2><?php esc_html_e( 'Get more', 'twentig' ); ?></h2>
				<p><?php esc_html_e( 'Receive exclusive pre-designed templates and resources — for free.', 'twentig' ); ?></p>
				<a href="https://twentig.com/newsletter?utm_source=wp-dash&utm_medium=overview-cta&utm_campaign=newsletter" class="button button-primary" target="_blank"><?php esc_html_e( 'Subscribe now', 'twentig' ); ?></a>
			</div>
		</div>

		<div class="tw-about__footer">
			<p class="tw-rate-plugin">
				<?php
				echo sprintf(
					/* translators: %s: https://wordpress.org/support/plugin/twentig/reviews/?filter=5 */
					__( 'Enjoying Twentig? Rate it <a href="%1$s" target="_blank">★★★★★</a> on <a href="%2$s" target="_blank">WordPress</a>.', 'twentig' ),
					'https://wordpress.org/support/plugin/twentig/reviews/?filter=5',
					'https://wordpress.org/support/plugin/twentig/reviews/?filter=5'
				);
				?>
			</p>
			<ul class="tw-footer-links">
				<li>
					<a href="https://twentig.com" target="_blank">
						Twentig.com
					</a>
				</li>
				<li>
					<a href="https://www.youtube.com/channel/UCHZglgs5eTxkpRFl2r5RsGA?sub_confirmation=1" target="_blank">
						<?php esc_html_e( 'Tutorials', 'twentig' ); ?>
					</a>
				</li>
				<li>
					<a href="https://wordpress.org/support/plugin/twentig/" target="_blank">
						<?php esc_html_e( 'Support Forum', 'twentig' ); ?>
					</a>
				</li>
			</ul>
		</div>

	</div>

	<?php
}

/**
 * Renders Twentig settings page.
 */
function twentig_render_settings_page() {
	?>
	<div class="wrap">	
		<h1><?php esc_html_e( 'Twentig Settings', 'twentig' ); ?></h1>
		<?php settings_errors(); ?>
		<form method="post" action="options.php">
		<?php
			settings_fields( 'twentig-options' );
			do_settings_sections( 'twentig-options' );
			submit_button();
		?>
		</form>
	</div>

	<p class="tw-rate-plugin">
		<?php
			echo sprintf(
				/* translators: %s: https://wordpress.org/support/plugin/twentig/reviews/?filter=5 */
				__( 'Enjoying Twentig? Rate it <a href="%1$s" target="_blank">★★★★★</a> on <a href="%2$s" target="_blank">WordPress</a>.', 'twentig' ),
				'https://wordpress.org/support/plugin/twentig/reviews/?filter=5',
				'https://wordpress.org/support/plugin/twentig/reviews/?filter=5'
			);
		?>
	</p>
	<?php
}

/**
 * Loads specific css for the Twentig dashboard page.
 */
function twentig_admin_enqueue_about_scripts() {
	if ( in_array( get_current_screen()->base, array( 'toplevel_page_twentig', 'twentig_page_twentig-settings' ), true ) ) {
		wp_enqueue_style( 'twentig-about', plugins_url( 'dist/css/about.css', __DIR__ ), false, '1.0.1' );
	}
}
add_action( 'admin_enqueue_scripts', 'twentig_admin_enqueue_about_scripts' );
