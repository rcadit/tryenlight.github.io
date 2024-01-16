/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function( api, $ ) {

	api.bind( 'preview-ready', function() {	
		// Disable smooth scroll when controls sidebar is expanded
		$( 'html' ).css( 'scroll-behavior', 'auto' );
		
		api.preview.bind( 'twentig-customizer-sidebar-expanded', function( expanded ) {
			$( 'html' ).css( 'scroll-behavior', 'true' === expanded ? 'auto' : 'smooth' );
		} );
	} );

	api( 'twentig_text_width', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-text-width-medium tw-text-width-wide' );	
			if ( to ) {
				$( 'body' ).addClass( 'tw-text-width-' + to );		
			}
		} );
	} );

	api( 'twentig_body_font_size', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-site-font-small tw-site-font-medium' );	
			if ( to ) {
				$( 'body' ).addClass( 'tw-site-font-' + to );		
			}
		} );
	} );

	api( 'twentig_body_line_height', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-site-lh-medium tw-site-lh-loose' );	
			if ( to ) {
				$( 'body' ).addClass( 'tw-site-lh-' + to );		
			}
		} );
	} );

	api( 'twentig_heading_letter_spacing', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).toggleClass( 'tw-heading-ls-normal', to === 'normal' );	
		} );
	} );

	api( 'twentig_h1_font_size', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-h1-font-small tw-h1-font-medium tw-h1-font-large' );	
			if ( to ) {
				$( 'body' ).addClass( 'tw-h1-font-' + to );		
			}
		} );
	} );

	api( 'twentig_logo_text_transform', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).css( { 'text-transform': to ? to : 'none' } );
		} );
	} );

	api( 'twentig_header_decoration', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-header-border tw-header-shadow' );
			if ( to ) {
				$( 'body' ).addClass( 'tw-header-' + to );
			}		
		} );
	} );

	api( 'twentig_menu_spacing', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-nav-spacing-medium tw-nav-spacing-large' );	
			if ( to ) {
				$( 'body' ).addClass( 'tw-nav-spacing-' + to );		
			}
		} );
	} );

	api( 'twentig_menu_font_size', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-nav-size-small tw-nav-size-medium tw-nav-size-larger' );	
			if ( to ) {
				$( 'body' ).addClass( 'tw-nav-size-' + to );		
			}
		} );
	} );

	api( 'twentig_menu_text_transform', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( 'ul.primary-menu a, ul.modal-menu a' ).css( { 'text-transform': to, 'letter-spacing': 'uppercase' === to ? '0.0333em' : 'normal' } );
			} else {
				$( 'ul.primary-menu a, ul.modal-menu a' ).css( { 'text-transform': 'none', 'letter-spacing':'normal' } );
			}
		} );
	} );

	api( 'twentig_cover_page_height', function( value ) {
		value.bind( function( to ) {
			$( '.page-template-template-cover' ).removeClass( 'tw-cover-medium' );
			if ( to ) {
				$( '.page-template-template-cover' ).addClass( 'tw-cover-' + to );
			}
		} );
	} );

	api( 'twentig_cover_post_height', function( value ) {
		value.bind( function( to ) {
			$( '.post-template-template-cover' ).removeClass( 'tw-cover-medium' );
			if ( to ) {
				$( '.post-template-template-cover' ).addClass( 'tw-cover-' + to );
			}
		} );
	} );

	api( 'twentig_cover_vertical_align', function( value ) {
		value.bind( function( to ) {
			$( '.template-cover' ).removeClass( 'tw-cover-center' );
			if ( to ) {
				$( '.template-cover' ).addClass( 'tw-cover-' + to );
			}
		} );
	} );
	
	api( 'twentig_cover_page_scroll_indicator', function( value ) {
		value.bind( function( to ) {
			$( '.page-template-template-cover' ).toggleClass( 'tw-cover-hide-arrow' );
		} );
	} );
		
	api( 'twentig_header_width', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-header-wide tw-header-full' );
			if ( to ) {
				$( 'body' ).addClass( 'tw-header-' + to );
			}
		} );
	} );

	api( 'twentig_footer_width', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-footer-wider tw-footer-full' );
			if ( to ) {
				$( 'body' ).addClass( 'tw-footer-' + to );
			}
		} );
	} );

	api( 'twentig_blog_columns', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).removeClass( 'tw-blog-columns-2 tw-blog-columns-3' );
			if ( to ) {
				$( 'body.tw-blog-grid' ).addClass( 'tw-blog-columns-' + to );
			} 
		} );
	} );

	api( 'twentig_blog_image_ratio', function( value ) {
		value.bind( function( to ) {	
			$( '.blog .hentry, .archive .hentry' ).removeClass( 'tw-post-has-image-20-9 tw-post-has-image-16-9 tw-post-has-image-3-2 tw-post-has-image-4-3 tw-post-has-image-1-1 tw-post-has-image-3-4 tw-post-has-image-2-3' );
			if ( to ) {
				$( '.blog .hentry, .archive .hentry' ).addClass( 'tw-post-has-image-' + to );
			}
		} );
	} );

	function twentigLoadGoogleFont( context, to ) {
		if ( to && 'sans-serif' !== to && 'custom-google-font' !== to ) {
			var font, style, el, styleID, fontVariations;
			font = to.replace( / /g, '+' );
			fontVariations = 'body' === context ? 'ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400' : 'wght@400;500;600;700;800;900';
			styleID = 'twentig-customizer-font-' + context;
			style = '<link rel="stylesheet" type="text/css" id="' + styleID + '" href="https://fonts.googleapis.com/css2?family=' + font + ':' + fontVariations + '&display=swap">';
			el = $( '#' + styleID );
				
			if ( el.length ) {
				el.replaceWith( style );
			} else {
				$( 'head' ).append( style );
			}
		}
	}

	$.each( [ 'body', 'heading', 'logo' ], function( index, setting ) {
		api( 'twentig_' + setting + '_font', function( value ) {
			var onChange = function( to ) {
				twentigLoadGoogleFont( setting, to );
			};
			onChange( value.get() );
			value.bind( onChange );
		} );
	} );

	var style = $( '#twentig-customizer-live-css' );
	if ( ! style.length ) {
		style = $( 'head' ).append( '<style type="text/css" id="twentig-customizer-live-css" />' ).find( '#twentig-customizer-live-css' );
	}

	api.bind( 'preview-ready', function() {	
		api.preview.bind( 'update-customizer-live-css', function( css ) {
			style.text( css );
		} );				
	} );

})( wp.customize, jQuery );
