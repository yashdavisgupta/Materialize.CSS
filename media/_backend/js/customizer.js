function lg( params ){
	console.log( params );
}

function nandgatestudios_hex2rgb( hex )
{
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( hex );
    var colors = result ? {
        r: parseInt( result[1], 16 ),
        g: parseInt( result[2], 16 ),
        b: parseInt( result[3], 16 )
    } : null;

    var rett = '';

    if( colors.hasOwnProperty( 'r' ) ){
    	rett += colors.r + ' , ';
    }
    else{
    	rett += '255 , ';
    }

    if( colors.hasOwnProperty( 'g' ) ){
    	rett += colors.g + ' , ';
    }
    else{
    	rett += '255 , ';
    }

    if( colors.hasOwnProperty( 'b' ) ){
    	rett += colors.b;
    }
    else{
    	rett += '255';
    }

    return rett;
}

function nandgatestudios_brightness( hex, steps )
{
    var steps 	= Math.max( -255, Math.min( 255, steps ) );
    var hex 	= hex.toString().replace( /#/g, "" );

    if ( hex.length == 3 ) {
        hex =
        hex.substring( 0, 1 ) + hex.substring( 0, 1 ) +
        hex.substring( 1, 2 ) + hex.substring( 1, 2 ) +
        hex.substring( 2, 3 ) + hex.substring( 2, 3 );
    }

    var r = parseInt( hex.substring( 0, 2 ).toString() , 16 );
    var g = parseInt( hex.substring( 2, 4 ).toString() , 16 );
    var b = parseInt( hex.substring( 4, 6 ).toString() , 16 );

    r = Math.max( 0, Math.min( 255, r + steps ) ).toString(16).toUpperCase();
    g = Math.max( 0, Math.min( 255, g + steps ) ).toString(16).toUpperCase();
    b = Math.max( 0, Math.min( 255, b + steps ) ).toString(16).toUpperCase();

	var r_hex = Array( 3 - r.length ).join( '0' ) + r;
	var g_hex = Array( 3 - g.length ).join( '0' ) + g;
	var b_hex = Array( 3 - b.length ).join( '0' ) + b;

    return '#' + r_hex + g_hex + b_hex;
}

(function($){

    {   // site identity options

        // margin top
        wp.customize( 'nandgatestudios-blog-logo-m-top' , function( value ){
            value.bind(function( newval ){
                if( newval ){
                    if( jQuery( 'div.nandgatestudios-blog-identity .nandgatestudios-blog-logo' ).length ){
                        jQuery( 'div.nandgatestudios-blog-identity .nandgatestudios-blog-logo' ).css({ 'margin-top' : newval + 'px' });
                    }

                }
            });
        });

        // margin bottom
        wp.customize( 'nandgatestudios-blog-logo-m-bottom' , function( value ){
            value.bind(function( newval ){
                if( newval ){
                    if( jQuery( 'div.nandgatestudios-blog-identity .nandgatestudios-blog-logo' ).length ){
                        jQuery( 'div.nandgatestudios-blog-identity .nandgatestudios-blog-logo' ).css({ 'margin-bottom' : newval + 'px' });
                    }

                }
            });
        });
    }


    {   // header options

        {   // general options

            // header height
            wp.customize( 'nandgatestudios-header-height' , function( value ){
                value.bind(function( newval ){
                    if( jQuery( 'div.nandgatestudios-header.parallax-container' ).length ){
                        jQuery( 'div.nandgatestudios-header.parallax-container' ).css( 'height' , parseInt( newval ).toString() + 'px' );
                    }
                });
            });

            /**
             *  Header background color.
             *  if the header image is transparent
             *  then will be visible the background color.
             */

            wp.customize( 'nandgatestudios-header-background-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'body' ).css( 'background-color' , newval );
                    jQuery( 'body' ).css( 'backgroundColor' , newval );
                });
            });

            // mask color
            wp.customize( 'nandgatestudios-header-mask-color' , function( value ){
                value.bind(function( newval ){
                    var opacity = parseFloat( wp.customize.instance( 'nandgatestudios-header-mask-transp' ).get() / 100 ).toString();
                    jQuery( 'div.nandgatestudios-header div.valign-cell-wrapper' ).css( 'background-color' , 'rgba(' + nandgatestudios_hex2rgb( newval ) + ' , ' + opacity + ')' );
                });
            });

            // mask color
            wp.customize( 'nandgatestudios-header-mask-transp' , function( value ){
                value.bind(function( newval ){
                    var opacity = parseFloat( newval / 100 ).toString();
                    var color   = wp.customize.instance( 'nandgatestudios-header-mask-color' ).get().toString();
                    jQuery( 'div.nandgatestudios-header div.valign-cell-wrapper' ).css( 'background-color' , 'rgba(' + nandgatestudios_hex2rgb( color ) + ' , ' + opacity + ')' );
                });
            });
        }

        {   // content options

            {   // header headline options

                // header headline text
                wp.customize( 'nandgatestudios-header-headline' , function( value ){
                    value.bind(function( newval ){
                        if( newval ){
                            jQuery( '.nandgatestudios-header a.header-headline' ).html( newval );
                        }
                    });
                });

                // header headline color
                wp.customize( 'nandgatestudios-header-headline-color', function( value ){
                    value.bind(function( newval ){
                        jQuery( 'style#nandgatestudios-header-headline-color' ).html(
                            'div.nandgatestudios-header a.header-headline{' +
                            'color: ' + newval + ';' +
                            '}'
                        );
                    });
                });
            }

            {   // header description options

                // header description text
                wp.customize( 'nandgatestudios-header-description' , function( value ){
                    value.bind(function( newval ){
                        if( newval ){
                            jQuery( '.nandgatestudios-header a.header-description' ).html( newval );
                        }
                    });
                });

                // header description color
                wp.customize( 'nandgatestudios-header-description-color', function( value ){
                    value.bind(function( newval ){

                        var hex     = newval;
                        var rgba1   = 'rgba( ' + nandgatestudios_hex2rgb( hex ) + ', 0.55 )';
                        var rgba2   = 'rgba( ' + nandgatestudios_hex2rgb( hex ) + ', 1.0 )';

                        jQuery( 'style#nandgatestudios-header-description-color' ).html(
                            'div.nandgatestudios-header a.header-description{' +
                            'color: ' + rgba1 + ';' +
                            '}' +

                            'div.nandgatestudios-header a.header-description:hover{' +
                            'color: ' + rgba2 + ';' +
                            '}'
                        );
                    });
                });
            }
        }


        {   // header first button options

            // first button text color
            wp.customize( 'nandgatestudios-header-btn-1-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#nandgatestudios-header-btn-1-color' ).html(
                        'div.nandgatestudios-header.parallax-container div.nandgatestudios-header-buttons a.btn-large.nandgatestudios-first-button{' +
                        'color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button background color
            wp.customize( 'nandgatestudios-header-btn-1-bkg-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#nandgatestudios-header-btn-1-bkg-color' ).html(
                        'div.nandgatestudios-header.parallax-container div.nandgatestudios-header-buttons a.btn-large.nandgatestudios-first-button{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button background color
            wp.customize( 'nandgatestudios-header-btn-1-bkg-h-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#nandgatestudios-header-btn-1-bkg-h-color' ).html(
                        'div.nandgatestudios-header.parallax-container div.nandgatestudios-header-buttons a.btn-large.nandgatestudios-first-button:hover{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // first button url
            wp.customize( 'nandgatestudios-header-btn-1-url' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.nandgatestudios-header-buttons a.nandgatestudios-first-button' ).attr( 'href' , newval );
                });
            });

            // first button text
            wp.customize( 'nandgatestudios-header-btn-1-text' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.nandgatestudios-header-buttons a.nandgatestudios-first-button' ).html( newval );
                });
            });

            // first button description
            wp.customize( 'nandgatestudios-header-btn-1-description' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.nandgatestudios-header-buttons a.nandgatestudios-first-button' ).attr( 'title' , newval );
                });
            });
        }

        {   // header second button options

            // second button text color
            wp.customize( 'nandgatestudios-header-btn-2-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#nandgatestudios-header-btn-2-color' ).html(
                        'div.nandgatestudios-header.parallax-container div.nandgatestudios-header-buttons a.btn-large.nandgatestudios-second-button{' +
                        'color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button background color
            wp.customize( 'nandgatestudios-header-btn-2-bkg-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#nandgatestudios-header-btn-2-bkg-color' ).html(
                        'div.nandgatestudios-header.parallax-container div.nandgatestudios-header-buttons a.btn-large.nandgatestudios-second-button{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button background color
            wp.customize( 'nandgatestudios-header-btn-2-bkg-h-color' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'style#nandgatestudios-header-btn-2-bkg-h-color' ).html(
                        'div.nandgatestudios-header.parallax-container div.nandgatestudios-header-buttons a.btn-large.nandgatestudios-second-button:hover{' +
                        'background-color: ' + newval + ';' +
                        '}'
                    );
                });
            });

            // second button url
            wp.customize( 'nandgatestudios-header-btn-2-url' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.nandgatestudios-header-buttons a.nandgatestudios-second-button' ).attr( 'href' , newval );
                });
            });

            // second button text
            wp.customize( 'nandgatestudios-header-btn-2-text' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.nandgatestudios-header-buttons a.nandgatestudios-second-button' ).html( newval );
                });
            });

            // second button description
            wp.customize( 'nandgatestudios-header-btn-2-description' , function( value ){
                value.bind(function( newval ){
                    jQuery( 'div.nandgatestudios-header-buttons a.nandgatestudios-second-button' ).attr( 'title' , newval );
                });
            });
        }
    }


    {   // breadcrumbs options

        // home link text
        wp.customize( 'nandgatestudios-breadcrumbs-home-link-text' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.nandgatestudios-page-header li#home-label a span' ).length ){
                    jQuery( 'div.nandgatestudios-page-header li#home-label a span' ).html( newval );
                }
            });
        });

        // home link description
        wp.customize( 'nandgatestudios-breadcrumbs-home-link-description' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.nandgatestudios-page-header li#home-label a' ).length ){
                    jQuery( 'div.nandgatestudios-page-header li#home-label a' ).attr( 'title' , newval );
                }
            });
        });

        // space
        wp.customize( 'nandgatestudios-breadcrumbs-space' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.nandgatestudios-page-header' ).length ){
                    jQuery( 'div.nandgatestudios-page-header' ).css({
                        'padding-top' : parseInt( newval ) + 'px',
                        'padding-bottom' : parseInt( newval ) + 'px'
                    });
                }
            });
        });
    }

    {   // additional options

        wp.customize( 'nandgatestudios-blog-title' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.nandgatestudios-page-header h1#blog-title' ).length ){
            	   jQuery( 'div.nandgatestudios-page-header h1#blog-title' ).html( newval );
                }
            });
        });
    }


    {   // others options

        wp.customize( 'nandgatestudios-copyright' , function( value ){
            value.bind(function( newval ){
                if( jQuery( 'div.nandgatestudios-copyright span.copyright' ).length ){
                    jQuery( 'div.nandgatestudios-copyright span.copyright' ).html( newval );
                }
            });
        });
    }


    {   // colors options

        wp.customize( 'background_color' , function( value ){
            value.bind(function( newval ){

                var bg_color        = newval;
                var bg_color_rgba   = 'rgba( ' + nandgatestudios_hex2rgb( newval ) + ' , 0.91 )';
                jQuery( 'style#nandgatestudios-background-color' ).html(

                    // background color
                    'body > div.content{' +
                    'background-color: ' + bg_color + ';' +
                    '}' +

                    // menu navigation
                    // background color
                    'body.scroll-nav .nandgatestudios-poor{' +
                    'background-color: ' + bg_color_rgba + ';' +
                    '}' +

                    '.nandgatestudios-poor{' +
                    'background-color: ' + bg_color + ';' +
                    '}'
                );
            });
        });
    }


    {   // background image options

        wp.customize( 'background_image' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-image' , 'url(' + newval + ')' );
            });
        });

        wp.customize( 'background_repeat' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-repeat' , newval );
            });
        });

        wp.customize( 'background_position_x' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-position' , newval );
            });
        });

        wp.customize( 'background_attachment' , function( value ){
            value.bind(function( newval ){
                console.log( newval );
                jQuery( 'body > div.content' ).css( 'background-attachment' , newval );
            });
        });
    }

})(jQuery);
