<?php

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

function wpsw_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		"background_color"        => "#ffffff",
		"background_hover_color"  => "#000000",
		"icon_color"              => "#000000",
		"icon_hover_color"        => "#ffffff",
		"target"                  => "_blank",
		"icon_circle"             => "no",
		"title"	                  => "",
		"facebook" 		          => "",
		"twitter" 		          => "",
		"behance" 		          => "",
		"dribbble" 		          => "",
		"flickr"		          => "",
		"foursquare" 	          => "",
		"github" 		          => "",
		"google" 		          => "",
		"instagram" 	          => "",
		"linkedin" 		          => "",
		"mail" 			          => "",
		"pinterest" 	          => "",
		"rss" 			          => "",
		"skype" 		          => "",
		"soundcloud" 	          => "",
		"stumbleupon" 	          => "",
		"tumblr" 		          => "",
		"vimeo" 		          => "",
		"vine" 			          => "",
		"vk" 			          => "",
		"xing" 			          => "",
		"yelp" 			          => "",
		"youtube" 		          => "",

	), $atts, 'wpsw' );


	$style = "";

	// if( "yes" == $atts['add_style'] ){

		$style .= "<style type='text/css'>
			body .wpsw-social-links-shortcode li a .social-icon {
				background: ".$atts['background_color'] ." !important;
				color:".$atts['icon_color']." !important;
			}

			body .wpsw-social-links-shortcode li a .social-icon:hover,
			body .wpsw-social-links-shortcode li a .social-icon:focus {
				background: ".$atts['background_hover_color'] ." !important;
				color:".$atts['icon_hover_color']." !important;

			}";
		if( "yes" == $atts['icon_circle'] ) {
			$style .= " body .wpsw-social-links-shortcode li .social-icon,
						body .wpsw-social-links-shortcode li .social-icon:after {
	                    -webkit-border-radius: 50%;
	                    -moz-border-radius: 50%;
	                    -ms-border-radius: 50%;
	                    -o-border-radius: 50%;
	                    border-radius: 50%;
	                    }";
		}
		
		$style .= "</style>";	
	// }
	
	$socialBlock = $style;

	if( isset($atts['title']) && $atts['title']!="" ){
		$socialBlock .= $atts['title'];		
	}
	
	$socialBlock .= "<ul class='wpsw-social-links-shortcode'>";
	
	if( $atts['behance'] ){
		$socialBlock .= '<li class="behance"><a href="'.$atts['behance'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-behance"></span></a></li>';
	}

	if( $atts['dribbble'] ){
		$socialBlock .= '<li class="dribbble"><a href="'.$atts['dribbble'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-dribbble"></span></a></li>';
	}

	if( $atts['facebook'] ){
		$socialBlock .= '<li class="facebook"><a href="'.$atts['facebook'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-facebook"></span></a></li>';
	}

	if( $atts['flickr'] ){
		$socialBlock .= '<li class="flickr"><a href="'.$atts['flickr'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-flickr"></span></a></li>';
	}
	
	if( $atts['foursquare'] ){
		$socialBlock .= '<li class="foursquare"><a href="'.$atts['foursquare'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-foursquare"></span></a></li>';
	}

	if( $atts['github'] ){
		$socialBlock .= '<li class="github"><a href="'.$atts['github'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-github"></span></a></li>';
	}

	if( $atts['google'] ){
		$socialBlock .= '<li class="google"><a href="'.$atts['google'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-google"></span></a></li>';
	}

	if( $atts['instagram'] ){
		$socialBlock .= '<li class="instagram"><a href="'.$atts['instagram'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-instagram"></span></a></li>';
	}

	if( $atts['linkedin'] ){
		$socialBlock .= '<li class="linkedin"><a href="'.$atts['linkedin'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-linkedin"></span></a></li>';
	}

	if( $atts['mail'] ){
		$socialBlock .= '<li class="mail"><a href="mailto:'.$atts['mail'].'" ><span class="social-icon sicon-mail"></span></a></li>';
	}

	if( $atts['pinterest'] ){
		$socialBlock .= '<li class="pinterest"><a href="'.$atts['pinterest'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-pinterest"></span></a></li>';
	}

	if( $atts['rss'] ){
		$socialBlock .= '<li class="rss"><a href="'.$atts['rss'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-rss"></span></a></li>';
	}

	if( $atts['skype'] ){
		$socialBlock .= '<li class="skype"><a href="'.$atts['skype'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-skype"></span></a></li>';
	}

	if( $atts['soundcloud'] ){
		$socialBlock .= '<li class="soundcloud"><a href="'.$atts['soundcloud'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-soundcloud"></span></a></li>';
	}

	if( $atts['stumbleupon'] ){
		$socialBlock .= '<li class="stumbleupon"><a href="'.$atts['stumbleupon'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-stumbleupon"></span></a></li>';
	}

	if( $atts['tumblr'] ){
		$socialBlock .= '<li class="tumblr"><a href="'.$atts['tumblr'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-tumblr"></span></a></li>';
	}

	if( $atts['twitter'] ){
		$socialBlock .= '<li class="twitter"><a href="'.$atts['twitter'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-twitter"></span></a></li>';
	}

	if( $atts['vimeo'] ){
		$socialBlock .= '<li class="vimeo"><a href="'.$atts['vimeo'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-vimeo"></span></a></li>';
	}

	if( $atts['vine'] ){
		$socialBlock .= '<li class="vine"><a href="'.$atts['vine'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-vine"></span></a></li>';
	}

	if ( $atts['vk'] ) {
		$socialBlock .= '<li class="vk"><a href="'.$atts['vk'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-vk"></span></a></li>';
	}

	if( $atts['xing'] ){
		$socialBlock .= '<li class="xing"><a href="'.$atts['xing'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-xing"></span></a></li>';
	}

	if( $atts['yelp'] ){
		$socialBlock .= '<li class="yelp"><a href="'.$atts['yelp'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-yelp"></span></a></li>';
	}
	
	if( $atts['youtube'] ){
		$socialBlock .= '<li class="youtube"><a href="'.$atts['youtube'].'" target="'. $atts['target'] .'" ><span class="social-icon sicon-youtube"></span></a></li>';
	}

	$socialBlock .= "</ul>";


	return $socialBlock;
}
add_shortcode( 'wpsw', 'wpsw_shortcode' );