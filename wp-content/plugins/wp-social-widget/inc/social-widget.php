<?php
/**
 * Widget Class for Social networking links
 */
class Social_Networking_Links extends WP_Widget {
	function __construct() {
		$control_options = array(
			'width'  => 750
		);
	 	parent::__construct(
				    'wp-social-widget', // base ID of the widget
				    __( 'WP Social Widget', 'wp-social-widget' ), // name of the widget
				    // widget options
				    array (
				        'description' => __( 'Sharing Social networks link', 'wp-social-widget' ),
				        'classname'   => 'wp-social-widget',
				    )
				   // $control_options
				);
	}

	function form( $instance ){
		/*generate form*/
		$defaults = array('title' => 'Image','target'=>'_blank','icon_circle'=>'','background_color' => '', 'background_hover_color' => '','icon_color' => '', 'icon_hover_color' => '', 'mail' => '', 'rss' => '', 'behance' => '', 'foursquare' => '', 'skype' => '', 'soundcloud' => '', 'vine' => '', 'youtube' => '', 'vk' => '', 'xing' => '', 'yelp' => '', 'dribbble' => '', 'facebook' => '', 'flickr' => '', 'github' => '', 'google' => '', 'instagram' => '', 'linkedin' => '', 'pinterest' => '', 'stumbleupon' => '', 'tumblr' => '', 'twitter' => '', 'vimeo' => '');

		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$target = isset( $instance['target'] ) ? $instance['target'] : '';
		$background_color = isset( $instance['background_color'] ) ? $instance['background_color'] : '';
		$background_hover_color = isset( $instance['background_hover_color'] ) ? $instance['background_hover_color'] : '';
		$icon_color = isset( $instance['icon_color'] ) ? $instance['icon_color'] : '';
		$icon_hover_color = isset( $instance['icon_hover_color'] ) ? $instance['icon_hover_color'] : '';
		$icon_circle = isset( $instance['icon_circle'] ) ? $instance['icon_circle'] : '';
		
        $mail = isset( $instance['mail'] ) ? $instance['mail'] : '';
        $show_hide_mail = ( '' != $instance['mail'] ) ? 'on' : 'off';

        $rss = isset( $instance['rss'] ) ? $instance['rss'] : '';
		$show_hide_rss = ( '' != $instance['rss'] ) ? 'on' : 'off';

        $behance = isset( $instance['behance'] ) ? $instance['behance'] : '';
		$show_hide_behance = ( '' != $instance['behance'] ) ? 'on' : 'off';

        $foursquare = isset( $instance['foursquare'] ) ? $instance['foursquare'] : '';
		$show_hide_foursquare = ( '' != $instance['foursquare'] ) ? 'on' : 'off';

        $skype = isset( $instance['skype'] ) ? $instance['skype'] : '';
		$show_hide_skype = ( '' != $instance['skype'] ) ? 'on' : 'off';

        $soundcloud = isset( $instance['soundcloud'] ) ? $instance['soundcloud'] : '';
		$show_hide_soundcloud = ( '' != $instance['soundcloud'] ) ? 'on' : 'off';

        $vine = isset( $instance['vine'] ) ? $instance['vine'] : '';
		$show_hide_vine = ( '' != $instance['vine'] ) ? 'on' : 'off';

        $vk = isset( $instance['vk'] ) ? $instance['vk'] : '';
		$show_hide_vk = ( '' != $instance['vk'] ) ? 'on' : 'off';

        $xing = isset( $instance['xing'] ) ? $instance['xing'] : '';
		$show_hide_xing = ( '' != $instance['xing'] ) ? 'on' : 'off';

        $yelp = isset( $instance['yelp'] ) ? $instance['yelp'] : '';
		$show_hide_yelp = ( '' != $instance['yelp'] ) ? 'on' : 'off';

        $youtube = isset( $instance['youtube'] ) ? $instance['youtube'] : '';
		$show_hide_youtube = ( '' != $instance['youtube'] ) ? 'on' : 'off';

        $dribbble = isset( $instance['dribbble'] ) ? $instance['dribbble'] : '';
		$show_hide_dribbble = ( '' != $instance['dribbble'] ) ? 'on' : 'off';

        $facebook = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
		$show_hide_facebook = ( '' != $instance['facebook'] ) ? 'on' : 'off';

        $flickr = isset( $instance['flickr'] ) ? $instance['flickr'] : '';
		$show_hide_flickr = ( '' != $instance['flickr'] ) ? 'on' : 'off';

        $github = isset( $instance['github'] ) ? $instance['github'] : '';
		$show_hide_github = ( '' != $instance['github'] ) ? 'on' : 'off';

        $google = isset( $instance['google'] ) ? $instance['google'] : '';
		$show_hide_google = ( '' != $instance['google'] ) ? 'on' : 'off';

        $instagram = isset( $instance['instagram'] ) ? $instance['instagram'] : '';
		$show_hide_instagram = ( '' != $instance['instagram'] ) ? 'on' : 'off';

        $linkedin = isset( $instance['linkedin'] ) ? $instance['linkedin'] : '';
		$show_hide_linkedin = ( '' != $instance['linkedin'] ) ? 'on' : 'off';

        $pinterest = isset( $instance['pinterest'] ) ? $instance['pinterest'] : '';
		$show_hide_pinterest = ( '' != $instance['pinterest'] ) ? 'on' : 'off';

        $stumbleupon = isset( $instance['stumbleupon'] ) ? $instance['stumbleupon'] : '';
		$show_hide_stumbleupon = ( '' != $instance['stumbleupon'] ) ? 'on' : 'off';

        $tumblr = isset( $instance['tumblr'] ) ? $instance['tumblr'] : '';
		$show_hide_tumblr = ( '' != $instance['tumblr'] ) ? 'on' : 'off';

        $twitter = isset( $instance['twitter'] ) ? $instance['twitter'] : '';
		$show_hide_twitter = ( '' != $instance['twitter'] ) ? 'on' : 'off';

        $vimeo = isset( $instance['vimeo'] ) ? $instance['vimeo'] : '';
		$show_hide_vimeo = ( '' != $instance['vimeo'] ) ? 'on' : 'off';

		?>
			<div class="wp-social-row">
				<div class="wp-social-col-full">
					<p>
                        <label><?php _e( 'Title', 'wp-social-widget' );?> :</label>
                        <input class="" type="text" id="<?php echo $this->get_field_id("mail")?>" name="<?php echo $this->get_field_name("title")?>" value="<?php echo esc_attr($title)?>" />
                    </p>
				</div>

		 		<div class="wp-social-col-full">
					<p>
                        <label><?php _e( 'Open Social Profile Links in', 'wp-social-widget' );?> :</label>
                        <select id="<?php echo $this->get_field_id("target")?>" name="<?php echo $this->get_field_name('target')?>">
                            <option value="_blank" <?php selected(esc_attr($target),'_blank')?> > <?php _e( 'Blank(New Tab) Page', 'wp-social-widget' );?></option>
                            <option value="_self" <?php selected(esc_attr($target),'_self')?> > <?php _e( 'Same Page', 'wp-social-widget' );?></option>
                        </select>
                    </p>
				</div>
			</div>

        <div class="wp-social-row">
            <div class="wp-social-col-half">
                <p>
                    <label><?php _e( 'Background Color', 'wp-social-widget' );?>:</label>
                    <input class="color-field" type="text" id="<?php echo $this->get_field_id("background_color")?>" name="<?php echo $this->get_field_name('background_color')?>" value="<?php echo esc_attr($background_color)?>" />
                </p>

            </div>
            <div class="wp-social-col-half">
                <p>
                    <label><?php _e( 'Background Hover Color', 'wp-social-widget' );?>:</label>
                    <input class="color-field" type="text"  id="<?php echo $this->get_field_id("background_hover_color")?>" name="<?php echo $this->get_field_name('background_hover_color')?>" value="<?php echo esc_attr($background_hover_color)?>" />
                </p>
            </div>
        </div>
        <div class="wp-social-row">
            <div class="wp-social-col-half">
                <p>
                    <label><?php _e( 'Icon Color', 'wp-social-widget' );?>:</label>
                    <input class="color-field" type="text"  id="<?php echo $this->get_field_id("icon_color")?>" name="<?php echo $this->get_field_name('icon_color')?>" value="<?php echo esc_attr($icon_color)?>" />
                </p>
            </div>
            <div class="wp-social-col-half">
                <p>
                    <label><?php _e( 'Icon Hover Color', 'wp-social-widget' );?>:</label>
                    <input class="color-field" type="text"  id="<?php echo $this->get_field_id("icon_hover_color")?>" name="<?php echo $this->get_field_name('icon_hover_color')?>" value="<?php echo esc_attr($icon_hover_color)?>" />
                </p>
            </div>
        </div>

		<div class="wp-social-row">
			<div class="wp-social-col-full">
				<p>
                    <label><?php _e( 'Icon Circle', 'wp-social-widget' );?>:</label>
                    <input type="checkbox"  id="<?php echo $this->get_field_id("icon_circle")?>" name="<?php echo $this->get_field_name('icon_circle')?>" value="yes" <?php echo ( "yes" == esc_attr($icon_circle))?'checked="checked"':''?> />
                </p>
			</div>
		</div>

        <div class="wp-social-row social-choose">
            <div class="wp-social-col-full">
                <p>
                    <label for="">
                        <?php _e( 'Click on social icon to show social link field(s)', 'wp-social-widget' );?>
                    </label>
                    <span title="<?php _e( 'Behance', 'wp-social-widget' );?>" class="outline behance <?php echo $this->get_field_id("behance")?> <?php echo ( 'on' == $show_hide_behance ) ? 'active' : '';?>">
                        <span class="sicon-behance"></span>
                        <input type="hidden" id="show_hide_behance" name="<?php echo $this->get_field_name('show_hide_behance');?>" value="<?php echo ( 'on' == $show_hide_behance ) ? 'on' : 'off' ;?>" />
                    </span>
                    <span title="<?php _e( 'Dribble', 'wp-social-widget' );?>" class="outline dribbble <?php echo $this->get_field_id("dribbble")?> <?php echo ( 'on' == $show_hide_dribbble ) ? 'active' : '';?>">
                        <span class="sicon-dribbble"></span>
                        <input type="hidden" id="show_hide_dribbble" name="<?php echo $this->get_field_name('show_hide_dribbble');?>" value="<?php echo ( 'on' == $show_hide_dribbble ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Facebook', 'wp-social-widget' );?>" class="outline facebook <?php echo $this->get_field_id("facebook")?> <?php echo ( 'on' == $show_hide_facebook ) ? 'active' : '';?>">
                        <span class="sicon-facebook"></span>
                        <input type="hidden" id="show_hide_facebook" name="<?php echo $this->get_field_name('show_hide_facebook');?>" value="<?php echo ( 'on' == $show_hide_facebook ) ? 'on' : 'off' ;?>" />
                    </span>
                    <span title="<?php _e( 'Flickr', 'wp-social-widget' );?>" class="outline flickr <?php echo $this->get_field_id("flickr")?> <?php echo ( 'on' == $show_hide_flickr ) ? 'active' : '';?>">
                        <span class="sicon-flickr"></span>
                        <input type="hidden" id="show_hide_flickr" name="<?php echo $this->get_field_name('show_hide_flickr');?>" value="<?php echo ( 'on' == $show_hide_flickr ) ? 'on' : 'off' ;?>" />
                    </span>
                    <span title="<?php _e( 'Foursquare', 'wp-social-widget' );?>" class="outline foursquare <?php echo $this->get_field_id("foursquare")?> <?php echo ( 'on' == $show_hide_foursquare ) ? 'active' : '';?>">
                        <span class="sicon-foursquare"></span>
                        <input type="hidden" id="show_hide_foursquare" name="<?php echo $this->get_field_name('show_hide_foursquare');?>" value="<?php echo ( 'on' == $show_hide_foursquare ) ? 'on' : 'off' ;?>" />
                    </span>
                    <span title="<?php _e( 'Github', 'wp-social-widget' );?>" class="outline github <?php echo $this->get_field_id("github")?> <?php echo ( 'on' == $show_hide_github ) ? 'active' : '';?>">
                        <span class="sicon-github"></span>
                        <input type="hidden" id="show_hide_github" name="<?php echo $this->get_field_name('show_hide_github');?>" value="<?php echo ( 'on' == $show_hide_github ) ? 'on' : 'off' ;?>" />
                    </span>
                    <span title="<?php _e( 'Google', 'wp-social-widget' );?>" class="outline google <?php echo $this->get_field_id("google")?> <?php echo ( 'on' == $show_hide_google ) ? 'active' : '';?>">
                        <span class="sicon-google"></span>
                        <input type="hidden" id="show_hide_google" name="<?php echo $this->get_field_name('show_hide_google');?>" value="<?php echo ( 'on' == $show_hide_google ) ? 'on' : 'off' ;?>" />
                    </span>
                    <span title="<?php _e( 'Instagram', 'wp-social-widget' );?>" class="outline instagram <?php echo $this->get_field_id("instagram")?> <?php echo ( 'on' == $show_hide_instagram ) ? 'active' : '';?>">
                        <span class="sicon-instagram"></span>
                        <input type="hidden" id="show_hide_instagram" name="<?php echo $this->get_field_name('show_hide_instagram');?>" value="<?php echo ( 'on' == $show_hide_instagram ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Linkedin', 'wp-social-widget' );?>" class="outline linkedin <?php echo $this->get_field_id("linkedin")?> <?php echo ( 'on' == $show_hide_linkedin ) ? 'active' : '';?>">
                        <span class="sicon-linkedin"></span>
                        <input type="hidden" id="show_hide_linkedin" name="<?php echo $this->get_field_name('show_hide_linkedin');?>" value="<?php echo ( 'on' == $show_hide_linkedin ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Mail', 'wp-social-widget' );?>" class="outline mail <?php echo $this->get_field_id("mail")?> <?php echo ( 'on' == $show_hide_mail ) ? 'active' : '';?>">
                        <span class="sicon-mail"></span>
                        <input type="hidden" id="show_hide_mail" name="<?php echo $this->get_field_name('show_hide_mail');?>" value="<?php echo ( 'on' == $show_hide_mail ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Pinterest', 'wp-social-widget' );?>" class="outline pinterest <?php echo $this->get_field_id("pinterest")?> <?php echo ( 'on' == $show_hide_pinterest ) ? 'active' : '';?> ">
                        <span class="sicon-pinterest"></span>
                        <input type="hidden" id="show_hide_pinterest" name="<?php echo $this->get_field_name('show_hide_pinterest');?>" value="<?php echo ( 'on' == $show_hide_pinterest ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Rss', 'wp-social-widget' );?>" class="outline rss <?php echo $this->get_field_id("rss")?> <?php echo ( 'on' == $show_hide_rss ) ? 'active' : '';?>">
                        <span class="sicon-rss"></span>
                        <input type="hidden" id="show_hide_rss" name="<?php echo $this->get_field_name('show_hide_rss');?>" value="<?php echo ( 'on' == $show_hide_rss ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Skype', 'wp-social-widget' );?>" class="outline skype <?php echo $this->get_field_id("skype")?> <?php echo ( 'on' == $show_hide_skype ) ? 'active' : '';?>">
                        <span class="sicon-skype"></span>
                        <input type="hidden" id="show_hide_skype" name="<?php echo $this->get_field_name('show_hide_skype');?>" value="<?php echo ( 'on' == $show_hide_skype ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Soundcloud', 'wp-social-widget' );?>" class="outline soundcloud <?php echo $this->get_field_id("soundcloud")?> <?php echo ( 'on' == $show_hide_soundcloud ) ? 'active' : '';?>">
                        <span class="sicon-soundcloud"></span>
                        <input type="hidden" id="show_hide_soundcloud" name="<?php echo $this->get_field_name('show_hide_soundcloud');?>" value="<?php echo ( 'on' == $show_hide_soundcloud ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Stumbleupon', 'wp-social-widget' );?>" class="outline stumbleupon <?php echo $this->get_field_id("stumbleupon")?> <?php echo ( 'on' == $show_hide_stumbleupon ) ? 'active' : '';?>">
                        <span class="sicon-stumbleupon"></span>
                        <input type="hidden" id="show_hide_stumbleupon" name="<?php echo $this->get_field_name('show_hide_stumbleupon');?>" value="<?php echo ( 'on' == $show_hide_stumbleupon ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Tumblr', 'wp-social-widget' );?>" class="outline tumblr <?php echo $this->get_field_id("tumblr")?> <?php echo ( 'on' == $show_hide_tumblr ) ? 'active' : '';?>">
                        <span class="sicon-tumblr"></span>
                        <input type="hidden" id="show_hide_tumblr" name="<?php echo $this->get_field_name('show_hide_tumblr');?>" value="<?php echo ( 'on' == $show_hide_tumblr ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Twitter', 'wp-social-widget' );?>" class="outline twitter <?php echo $this->get_field_id("twitter")?> <?php echo ( 'on' == $show_hide_twitter ) ? 'active' : '';?>">
                        <span class="sicon-twitter"></span>
                        <input type="hidden" id="show_hide_twitter" name="<?php echo $this->get_field_name('show_hide_twitter');?>" value="<?php echo ( 'on' == $show_hide_twitter ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Vimeo', 'wp-social-widget' );?>" class="outline vimeo <?php echo $this->get_field_id("vimeo")?> <?php echo ( 'on' == $show_hide_vimeo ) ? 'active' : '';?>">
                        <span class="sicon-vimeo"></span>
                        <input type="hidden" id="show_hide_vimeo" name="<?php echo $this->get_field_name('show_hide_vimeo');?>" value="<?php echo ( 'on' == $show_hide_vimeo ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Vine', 'wp-social-widget' );?>" class="outline vine <?php echo $this->get_field_id("vine")?> <?php echo ( 'on' == $show_hide_vine ) ? 'active' : '';?>">
                        <span class="sicon-vine"></span>
                        <input type="hidden" id="show_hide_vine" name="<?php echo $this->get_field_name('show_hide_vine');?>" value="<?php echo ( 'on' == $show_hide_vine ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Vk', 'wp-social-widget' );?>" class="outline vk <?php echo $this->get_field_id("vk")?> <?php echo ( 'on' == $show_hide_vk ) ? 'active' : '';?>">
                        <span class="sicon-vk"></span>
                        <input type="hidden" id="show_hide_vk" name="<?php echo $this->get_field_name('show_hide_vk');?>" value="<?php echo ( 'on' == $show_hide_vk ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Xing', 'wp-social-widget' );?>" class="outline xing <?php echo $this->get_field_id("xing")?> <?php echo ( 'on' == $show_hide_xing ) ? 'active' : '';?>">
                        <span class="sicon-xing"></span>
                        <input type="hidden" id="show_hide_xing" name="<?php echo $this->get_field_name('show_hide_xing');?>" value="<?php echo ( 'on' == $show_hide_xing ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Yelp', 'wp-social-widget' );?>" class="outline yelp <?php echo $this->get_field_id("yelp")?> <?php echo ( 'on' == $show_hide_yelp ) ? 'active' : '';?>">
                        <span class="sicon-yelp"></span>
                        <input type="hidden" id="show_hide_yelp" name="<?php echo $this->get_field_name('show_hide_yelp');?>" value="<?php echo ( 'on' == $show_hide_yelp ) ? 'on' : 'off' ;?>" />
                    </span>
                        <span title="<?php _e( 'Youtube', 'wp-social-widget' );?>" class="outline youtube <?php echo $this->get_field_id("youtube")?> <?php echo ( 'on' == $show_hide_youtube ) ? 'active' : '';?>">
                        <span class="sicon-youtube"></span>
                        <input type="hidden" id="show_hide_youtube" name="<?php echo $this->get_field_name('show_hide_youtube');?>" value="<?php echo ( 'on' == $show_hide_youtube ) ? 'on' : 'off' ;?>" />
                    </span>
                </p>
            </div>
        </div>
		<div class="wp-social-row social-url">
			<div class="url-link <?php echo $this->get_field_id("behance")?> behance <?php echo ( 'on' == $show_hide_behance ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-behance"></span> <?php _e( 'Behance link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("behance")?>" name="<?php echo $this->get_field_name("behance")?>" value="<?php echo esc_attr($behance)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("dribbble")?> dribbble <?php echo ( 'on' == $show_hide_dribbble ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-dribbble"></span> <?php _e( 'Dribbble link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("dribbble")?>" name="<?php echo $this->get_field_name("dribbble")?>" value="<?php echo esc_attr($dribbble)?>" />
                </p>
            </div>
            <div class="url-link <?php echo $this->get_field_id("facebook")?> facebook <?php echo ( 'on' == $show_hide_facebook ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-facebook"></span> <?php _e( 'Facebook link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("facebook")?>" name="<?php echo $this->get_field_name("facebook")?>" value="<?php echo esc_attr($facebook)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("flickr")?> flickr <?php echo ( 'on' == $show_hide_flickr ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-flickr"></span> <?php _e( 'Flickr link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("flickr")?>" name="<?php echo $this->get_field_name("flickr")?>" value="<?php echo esc_attr($flickr)?>" />
                </p>
            </div>


            <div class="url-link <?php echo $this->get_field_id("foursquare")?> foursquare <?php echo ( 'on' == $show_hide_foursquare ) ? 'active' : '';?> ">
                <p>
                    <label><span class="sicon-foursquare"></span> <?php _e( 'Foursquare link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("foursquare")?>" name="<?php echo $this->get_field_name("foursquare")?>" value="<?php echo esc_attr($foursquare)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("github")?> github <?php echo ( 'on' == $show_hide_github ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-github"></span> <?php _e( 'Github link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("github")?>" name="<?php echo $this->get_field_name("github")?>" value="<?php echo esc_attr($github)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("google")?> google <?php echo ( 'on' == $show_hide_google ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-google"></span> <?php _e( 'Google link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("google")?>" name="<?php echo $this->get_field_name("google")?>" value="<?php echo esc_attr($google)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("instagram")?> instagram <?php echo ( 'on' == $show_hide_instagram ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-instagram"></span> <?php _e( 'Instagram link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("instagram")?>" name="<?php echo $this->get_field_name("instagram")?>" value="<?php echo esc_attr($instagram)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("linkedin")?> linkedin <?php echo ( 'on' == $show_hide_linkedin ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-linkedin"></span> <?php _e( 'Linkedin link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("linkedin")?>" name="<?php echo $this->get_field_name("linkedin")?>" value="<?php echo esc_attr($linkedin)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("mail")?> mail <?php echo ( 'on' == $show_hide_mail ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-mail"></span> <?php _e( 'Mail link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("mail")?>" name="<?php echo $this->get_field_name("mail")?>" value="<?php echo esc_attr($mail)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("pinterest")?> pinterest <?php echo ( 'on' == $show_hide_pinterest ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-pinterest"></span> <?php _e( 'Pinterest link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("pinterest")?>" name="<?php echo $this->get_field_name("pinterest")?>" value="<?php echo esc_attr($pinterest)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("rss")?> rss <?php echo ( 'on' == $show_hide_rss ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-rss"></span> <?php _e( 'Rss link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("rss")?>" name="<?php echo $this->get_field_name("rss")?>" value="<?php echo esc_attr($rss)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("skype")?> skype <?php echo ( 'on' == $show_hide_skype ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-skype"></span> <?php _e( 'Skype link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("skype")?>" name="<?php echo $this->get_field_name("skype")?>" value="<?php echo esc_attr($skype)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("soundcloud")?> soundcloud <?php echo ( 'on' == $show_hide_soundcloud ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-soundcloud"></span> <?php _e( 'Soundcloud link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("soundcloud")?>" name="<?php echo $this->get_field_name("soundcloud")?>" value="<?php echo esc_attr($soundcloud)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("stumbleupon")?> stumbleupon <?php echo ( 'on' == $show_hide_stumbleupon ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-stumbleupon"></span> <?php _e( 'Stumbleupon link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("stumbleupon")?>" name="<?php echo $this->get_field_name("stumbleupon")?>" value="<?php echo esc_attr($stumbleupon)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("tumblr")?> tumblr <?php echo ( 'on' == $show_hide_tumblr ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-tumblr"></span> <?php _e( 'Tumblr link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("tumblr")?>" name="<?php echo $this->get_field_name("tumblr")?>" value="<?php echo esc_attr($tumblr)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("twitter")?> twitter <?php echo ( 'on' == $show_hide_twitter ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-twitter"></span> <?php _e( 'Twitter link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("twitter")?>" name="<?php echo $this->get_field_name("twitter")?>" value="<?php echo esc_attr($twitter)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("vimeo")?> vimeo <?php echo ( 'on' == $show_hide_vimeo ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-vimeo"></span> <?php _e( 'Vimeo link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("vimeo")?>" name="<?php echo $this->get_field_name("vimeo")?>" value="<?php echo esc_attr($vimeo)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("vine")?> vine <?php echo ( 'on' == $show_hide_vine ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-vine"></span> <?php _e( 'Vine link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("vine")?>" name="<?php echo $this->get_field_name("vine")?>" value="<?php echo esc_attr($vine)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("vk")?> vk <?php echo ( 'on' == $show_hide_vk ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-vk"></span> <?php _e( 'Vk link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("vk")?>" name="<?php echo $this->get_field_name("vk")?>" value="<?php echo esc_attr($vk)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("xing")?> xing <?php echo ( 'on' == $show_hide_xing ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-xing"></span> <?php _e( 'Xing link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("xing")?>" name="<?php echo $this->get_field_name("xing")?>" value="<?php echo esc_attr($xing)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("yelp")?> yelp <?php echo ( 'on' == $show_hide_yelp ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-yelp"></span> <?php _e( 'Yelp link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("yelp")?>" name="<?php echo $this->get_field_name("yelp")?>" value="<?php echo esc_attr($yelp)?>" />
                </p>
            </div>

            <div class="url-link <?php echo $this->get_field_id("youtube")?> youtube <?php echo ( 'on' == $show_hide_youtube ) ? 'active' : '';?> wp-social-col-full">
                <p>
                    <label><span class="sicon-youtube"></span> <?php _e( 'Youtube link', 'wp-social-widget' );?> :</label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id("youtube")?>" name="<?php echo $this->get_field_name("youtube")?>" value="<?php echo esc_attr($youtube)?>" />
                </p>
            </div>

		</div>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					social_color_picker();

                    jQuery(document).on( 'click', '.social-choose .outline', function( event ){
                        event.stopImmediatePropagation();
                        var getTargetClassName = jQuery(this).attr('class').split(' ');
                        var uniqueTargetClassSingleName = getTargetClassName[1];
                        var uniqueTargetClassName = getTargetClassName[2];

                        if ( jQuery(this).hasClass('active') ) {
                            jQuery(this).removeClass('active');
                            jQuery('.url-link.' + uniqueTargetClassName ).removeClass('active');
                            jQuery('input#show_hide_' + uniqueTargetClassSingleName ).val('off');
                        } else {
                            jQuery(this).addClass('active');
                            jQuery('.url-link.' + uniqueTargetClassName ).addClass('active');
                            jQuery('input#show_hide_' + uniqueTargetClassSingleName ).val('on');
                        }
                    });
				});
			</script>
		<?php
	}

	function update( $new_instance, $old_instance ){
        // print_r( $new_instance );die;
		$instance['title' ] = strip_tags( $new_instance['title' ] );
		$instance['target' ] = strip_tags( $new_instance['target' ] );

		$instance['background_color'] = $new_instance['background_color'];
		$instance['background_hover_color'] = $new_instance['background_hover_color'];
		$instance['icon_color'] = $new_instance['icon_color'];
		$instance['icon_hover_color'] = $new_instance['icon_hover_color'];
		$instance['icon_circle'] = $new_instance['icon_circle'];

        
        $instance['mail'] = strip_tags( $new_instance['mail'] );
		$instance['show_hide_mail'] = strip_tags( $new_instance['show_hide_mail'] );
        
        $instance['rss'] = strip_tags( $new_instance['rss'] );
		$instance['show_hide_rss'] = strip_tags( $new_instance['show_hide_rss'] );
        
        $instance['behance'] = strip_tags( $new_instance['behance'] );
		$instance['show_hide_behance'] = strip_tags( $new_instance['show_hide_behance'] );
        
        $instance['foursquare'] = strip_tags( $new_instance['foursquare'] );
		$instance['show_hide_foursquare'] = strip_tags( $new_instance['show_hide_foursquare'] );
        
        $instance['skype'] = strip_tags( $new_instance['skype'] );
		$instance['show_hide_skype'] = strip_tags( $new_instance['show_hide_skype'] );
        
        $instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
		$instance['show_hide_soundcloud'] = strip_tags( $new_instance['show_hide_soundcloud'] );
        
        $instance['vine'] = strip_tags( $new_instance['vine'] );
		$instance['show_hide_vine'] = strip_tags( $new_instance['show_hide_vine'] );
        
        $instance['vk'] = strip_tags( $new_instance['vk'] );
		$instance['show_hide_vk'] = strip_tags( $new_instance['show_hide_vk'] );
        
        $instance['xing'] = strip_tags( $new_instance['xing'] );
		$instance['show_hide_xing'] = strip_tags( $new_instance['show_hide_xing'] );
        
        $instance['yelp'] = strip_tags( $new_instance['yelp'] );
		$instance['show_hide_yelp'] = strip_tags( $new_instance['show_hide_yelp'] );
        
        $instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
		$instance['show_hide_dribbble'] = strip_tags( $new_instance['show_hide_dribbble'] );
        
        $instance['facebook'] = strip_tags( $new_instance['facebook'] );
		$instance['show_hide_facebook'] = strip_tags( $new_instance['show_hide_facebook'] );
        
        $instance['flickr'] = strip_tags( $new_instance['flickr'] );
		$instance['show_hide_flickr'] = strip_tags( $new_instance['show_hide_flickr'] );
        
        $instance['github'] = strip_tags( $new_instance['github'] );
		$instance['show_hide_github'] = strip_tags( $new_instance['show_hide_github'] );
        
        $instance['google'] = strip_tags( $new_instance['google'] );
		$instance['show_hide_google'] = strip_tags( $new_instance['show_hide_google'] );
        
        $instance['instagram'] = strip_tags( $new_instance['instagram'] );
		$instance['show_hide_instagram'] = strip_tags( $new_instance['show_hide_instagram'] );
        
        $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
		$instance['show_hide_linkedin'] = strip_tags( $new_instance['show_hide_linkedin'] );
        
        $instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
		$instance['show_hide_pinterest'] = strip_tags( $new_instance['show_hide_pinterest'] );
        
        $instance['stumbleupon'] = strip_tags( $new_instance['stumbleupon'] );
		$instance['show_hide_stumbleupon'] = strip_tags( $new_instance['show_hide_stumbleupon'] );
        
        $instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
		$instance['show_hide_tumblr'] = strip_tags( $new_instance['show_hide_tumblr'] );
        
        $instance['twitter'] = strip_tags( $new_instance['twitter'] );
		$instance['show_hide_twitter'] = strip_tags( $new_instance['show_hide_twitter'] );
        
        $instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
		$instance['show_hide_vimeo'] = strip_tags( $new_instance['show_hide_vimeo'] );
        
        $instance['youtube'] = strip_tags( $new_instance['youtube'] );
		$instance['show_hide_youtube'] = strip_tags( $new_instance['show_hide_youtube'] );
		return $instance;
	}

	function widget( $args, $instance ) {
		// display in front end
		extract( $args );

		$instance['background_color']       = ( isset($instance['background_color']) && $instance['background_color']!="" )?$instance['background_color']:'#ffffff';
		$instance['background_hover_color'] = ( isset($instance['background_hover_color']) && $instance['background_hover_color'] !="" )?$instance['background_hover_color']:'#000000';
		$instance['icon_color']             = ( isset($instance['icon_color']) && $instance['icon_color'] !="" )?$instance['icon_color']:'#000000';
		$instance['icon_hover_color']       = ( isset($instance['icon_hover_color']) && $instance['icon_hover_color'] !="" )?$instance['icon_hover_color']:'#ffffff';

		$target = ( isset($instance['target']) && $instance['target'] !="" )?$instance['target']:'_blank';

		$style = "<style type='text/css'>
			body .wpsw-social-links li a .social-icon {
				background: ".$instance['background_color'] ." !important;
				color:".$instance['icon_color']." !important;
			}

			body .wpsw-social-links li a .social-icon:hover,
			body .wpsw-social-links li a .social-icon:focus {
				background: ".$instance['background_hover_color'] ." !important;
				color:".$instance['icon_hover_color']." !important;

			}";
		if( "yes" == $instance['icon_circle'] ){
		$style .= " body .wpsw-social-links li .social-icon,
					body .wpsw-social-links li .social-icon:after {
                        -webkit-border-radius: 50%;
                        -moz-border-radius: 50%;
                        -ms-border-radius: 50%;
                        -o-border-radius: 50%;
                        border-radius: 50%;
                        }";
		}
		$style .= "</style>";


		$socialBlock = $style;
		$socialBlock .= $before_widget;
		if( isset($instance['title']) && $instance['title']!="" )
			$socialBlock .= $before_title . $instance['title'] . $after_title;
			$socialBlock .= "<ul class='wpsw-social-links'>";

		if ( ( isset($instance['behance']) && $instance['behance']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['behance'].'" target="'. $target .'" ><span class="social-icon sicon-behance"></span></a></li>';

		if ( ( isset($instance['dribbble']) && $instance['dribbble']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['dribbble'].'" target="'. $target .'" ><span class="social-icon sicon-dribbble"></span></a></li>';

		if ( ( isset($instance['facebook']) && $instance['facebook']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['facebook'].'" target="'. $target .'" ><span class="social-icon sicon-facebook"></span></a></li>';

		if ( ( isset($instance['flickr']) && $instance['flickr']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['flickr'].'" target="'. $target .'" ><span class="social-icon sicon-flickr"></span></a></li>';

		if ( ( isset($instance['foursquare']) && $instance['foursquare']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['foursquare'].'" target="'. $target .'" ><span class="social-icon sicon-foursquare"></span></a></li>';

		if ( ( isset($instance['github']) && $instance['github']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['github'].'" target="'. $target .'" ><span class="social-icon sicon-github"></span></a></li>';

		if ( ( isset($instance['google']) && $instance['google']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['google'].'" target="'. $target .'" ><span class="social-icon sicon-google"></span></a></li>';

		if ( ( isset($instance['instagram']) && $instance['instagram']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['instagram'].'" target="'. $target .'" ><span class="social-icon sicon-instagram"></span></a></li>';

		if ( ( isset($instance['linkedin']) && $instance['linkedin']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['linkedin'].'" target="'. $target .'" ><span class="social-icon sicon-linkedin"></span></a></li>';

		if ( ( isset($instance['mail']) && $instance['mail']!="" ) )
			$socialBlock .= '<li><a href="mailto:'.$instance['mail'].'" ><span class="social-icon sicon-mail"></span></a></li>';

		if ( ( isset($instance['pinterest']) && $instance['pinterest']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['pinterest'].'" target="'. $target .'" ><span class="social-icon sicon-pinterest"></span></a></li>';

		if ( ( isset($instance['rss']) && $instance['rss']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['rss'].'" target="'. $target .'" ><span class="social-icon sicon-rss"></span></a></li>';

		if ( ( isset($instance['skype']) && $instance['skype']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['skype'].'" target="'. $target .'" ><span class="social-icon sicon-skype"></span></a></li>';

		if ( ( isset($instance['soundcloud']) && $instance['soundcloud']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['soundcloud'].'" target="'. $target .'" ><span class="social-icon sicon-soundcloud"></span></a></li>';

		if ( ( isset($instance['stumbleupon']) && $instance['stumbleupon']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['stumbleupon'].'" target="'. $target .'" ><span class="social-icon sicon-stumbleupon"></span></a></li>';

		if ( ( isset($instance['tumblr']) && $instance['tumblr']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['tumblr'].'" target="'. $target .'" ><span class="social-icon sicon-tumblr"></span></a></li>';

		if ( ( isset($instance['twitter']) && $instance['twitter']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['twitter'].'" target="'. $target .'" ><span class="social-icon sicon-twitter"></span></a></li>';

		if ( ( isset($instance['vimeo']) && $instance['vimeo']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['vimeo'].'" target="'. $target .'" ><span class="social-icon sicon-vimeo"></span></a></li>';

		if ( ( isset($instance['vine']) && $instance['vine']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['vine'].'" target="'. $target .'" ><span class="social-icon sicon-vine"></span></a></li>';

		if ( ( isset($instance['vk']) && $instance['vk']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['vk'].'" target="'. $target .'" ><span class="social-icon sicon-vk"></span></a></li>';

		if ( ( isset($instance['xing']) && $instance['xing']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['xing'].'" target="'. $target .'" ><span class="social-icon sicon-xing"></span></a></li>';

		if ( ( isset($instance['yelp']) && $instance['yelp']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['yelp'].'" target="'. $target .'" ><span class="social-icon sicon-yelp"></span></a></li>';

		if ( ( isset($instance['youtube']) && $instance['youtube']!="" ) )
			$socialBlock .= '<li><a href="'.$instance['youtube'].'" target="'. $target .'" ><span class="social-icon sicon-youtube"></span></a></li>';

		$socialBlock .= "</ul>";

		$socialBlock .= $after_widget;

		echo $socialBlock;
	}
}

function wpsw_register_social_network() {
    register_widget( 'Social_Networking_Links' );
}
add_action( 'widgets_init', 'wpsw_register_social_network' );