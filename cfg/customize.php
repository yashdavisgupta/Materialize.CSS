<?php
/**
 *
 *  This file contain the theme options settings
 *
 *  @package WordPress
 *  @subpackage Materialize.CSS
 *  @since Materialize.CSS 1.0
 */

    function nandgatestudios_customize_register( $wp_customize )
	{

        {   // site identity options

            $wp_customize -> add_section( 'title_tagline', array(
                'title'             => __( 'Site Identity', 'materialize' ),
                'capability'        => 'edit_theme_options',
                'priority'          => 0
            ));

            if ( !function_exists( 'the_custom_logo' ) ){
                $wp_customize -> add_setting( 'nandgatestudios-blog-logo', array(
                    'default'           => get_template_directory_uri() . '/media/_frontend/img/logo.png',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Upload_Control(
                    $wp_customize,
                    'nandgatestudios-blog-logo',
                    array(
                        'label'         => __( 'Preview Logo', 'materialize' ),
                        'section'       => 'title_tagline',
                        'settings'      => 'nandgatestudios-blog-logo',
                    )
                ));
            }

            // margin top
            $wp_customize -> add_setting( 'nandgatestudios-blog-logo-m-top', array(
                'default'           => 0,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'nandgatestudios_validate_number',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-blog-logo-m-top', array(
                'label'             => __( 'Logo Margin Top', 'materialize' ),
                'section'           => 'title_tagline',
                'settings'          => 'nandgatestudios-blog-logo-m-top',
                'type'              => 'range',
                'input_attrs'       => array(
                    'min'       => 0,
                    'max'       => 100,
                    'step'      => 1
                )
            ));


            // margin bottom
            $wp_customize -> add_setting( 'nandgatestudios-blog-logo-m-bottom', array(
                'default'           => 0,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'nandgatestudios_validate_number',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-blog-logo-m-bottom', array(
                'label'             => __( 'Logo Marign Bottom', 'materialize' ),
                'section'           => 'title_tagline',
                'settings'          => 'nandgatestudios-blog-logo-m-bottom',
                'type'              => 'range',
                'input_attrs'       => array(
                    'min'       => 0,
                    'max'       => 100,
                    'step'      => 1
                )
            ));

            $wp_customize -> add_setting( 'display_header_text' );
            $wp_customize -> add_control( 'display_header_text', array( 'theme_supports' => false ) );
        }


        {   // colors options

            $wp_customize -> add_section( 'colors', array(
                'title'             => __( 'Colors', 'materialize' ),
                'capability'        => 'edit_theme_options',
                'priority'          => 1
            ));

            // disabled colors unsupported options
            $wp_customize -> add_setting( 'header_textcolor' );
            $wp_customize -> add_control( 'header_textcolor', array( 'theme_supports' => false ) );
        }


        {   // background image options

            $wp_customize -> add_section( 'background_image', array(
                'title'             => __( 'Background Image', 'materialize' ),
                'capability'        => 'edit_theme_options',
                'priority'          => 2
            ));
        }


        {   // header image options

            $wp_customize -> add_section( 'header_image', array(
                'title'             => __( 'Header Image', 'materialize' ),
                'capability'        => 'edit_theme_options',
                'priority'          => 3
            ));
        }


    	{   // header elements options

            $header_panel_args = array(
                'title'         => __( 'Header Elements', 'materialize' ),
                'priority'      => 4,
                'capability'    => 'edit_theme_options'
            );

            $wp_customize -> add_panel( 'nandgatestudios-header-panel', $header_panel_args );


            {   // general options

            	$wp_customize -> add_section( 'nandgatestudios-header', array(
                    'title'             => __( 'General' , 'materialize' ),
                    'priority'          => 30,
                    'panel'             => 'nandgatestudios-header-panel',
                    'capability'        => 'edit_theme_options'
            	));

                // front page
                $wp_customize -> add_setting( 'nandgatestudios-header-front-page', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-front-page', array(
                    'label'             => __( 'Display Header on Front Page', 'materialize' ),
                    'section'           => 'nandgatestudios-header',
                    'settings'          => 'nandgatestudios-header-front-page',
                    'type'              => 'checkbox',
                ));

                // blog page
                $wp_customize -> add_setting( 'nandgatestudios-header-blog-page', array(
                    'default'           => false,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-blog-page', array(
                    'label'             => __( 'Display Header on Blog Page', 'materialize' ),
                    'section'           => 'nandgatestudios-header',
                    'settings'          => 'nandgatestudios-header-blog-page',
                    'type'              => 'checkbox',
                ));

                // templates
                $wp_customize -> add_setting( 'nandgatestudios-header-templates', array(
                    'default'           => false,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-templates', array(
                    'label'             => __( 'Display Header on Templates', 'materialize' ),
                    'description'       => __( 'enabale / disable header on: Archives, Categories, Tags, Author, 404 and Search Results.' , 'materialize' ),
                    'section'           => 'nandgatestudios-header',
                    'settings'          => 'nandgatestudios-header-templates',
                    'type'              => 'checkbox',
                ));

                // single post
                $wp_customize -> add_setting( 'nandgatestudios-header-single-post', array(
                    'default'           => false,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-single-post', array(
                    'label'             => __( 'Display Header on Single Post', 'materialize' ),
                    'section'           => 'nandgatestudios-header',
                    'settings'          => 'nandgatestudios-header-single-post',
                    'type'              => 'checkbox',
                ));

                // single page
                $wp_customize -> add_setting( 'nandgatestudios-header-single-page', array(
                    'default'           => false,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-single-page', array(
                    'label'             => __( 'Display Header on Single Page', 'materialize' ),
                    'section'           => 'nandgatestudios-header',
                    'settings'          => 'nandgatestudios-header-single-page',
                    'type'              => 'checkbox'
                ));

                // header height
                $wp_customize -> add_setting( 'nandgatestudios-header-height', array(
                    'default'           => 450,
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'nandgatestudios_validate_number',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-height', array(
                    'label'             => __( 'Header height', 'materialize' ),
                    'section'           => 'nandgatestudios-header',
                    'settings'          => 'nandgatestudios-header-height',
                    'type'              => 'number',
                    'input_attrs'       => array(
                        'min'   => 0,
                        'max'   => 500,
                        'step'  => 1
                    )
                ));

                // header background color
                $wp_customize -> add_setting( 'nandgatestudios-header-background-color', array(
                    'default'           => '#ffffff',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-background-color',
                    array(
                        'label'         => __( 'Background Color', 'materialize' ),
                        'section'       => 'nandgatestudios-header',
                        'settings'      => 'nandgatestudios-header-background-color',
                    )
                ));

                // mask color
                $wp_customize -> add_setting( 'nandgatestudios-header-mask-color', array(
                    'default'           => '#ffffff',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-mask-color',
                    array(
                        'label'     => __( 'Mask Color', 'materialize' ),
                        'section'   => 'nandgatestudios-header',
                        'settings'  => 'nandgatestudios-header-mask-color',
                    )
                ));

                // mask transparency
                $wp_customize -> add_setting( 'nandgatestudios-header-mask-transp', array(
                    'default'           => 75,
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'nandgatestudios_validate_number',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-mask-transp', array(
                    'label'             => __( 'Mask Transparency', 'materialize' ),
                    'description'       => __( 'by default the mask is a dark transparent foil over the header background image.' , 'materialize' ),
                    'section'           => 'nandgatestudios-header',
                    'settings'          => 'nandgatestudios-header-mask-transp',
                    'type'              => 'range',
                    'input_attrs' => array(
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 1
                    ),
                ));
            }


            {   // content options

                $wp_customize -> add_section( 'nandgatestudios-header-content', array(
                    'title'             => __( 'Content' , 'materialize' ),
                    'panel'             => 'nandgatestudios-header-panel',
                    'priority'          => 30,
                    'capability'        => 'edit_theme_options'
                ));

                // show headline
                $wp_customize -> add_setting( 'nandgatestudios-header-show-headline', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-show-headline', array(
                    'label'             => __( 'Show Headline', 'materialize' ),
                    'section'           => 'nandgatestudios-header-content',
                    'settings'          => 'nandgatestudios-header-show-headline',
                    'type'              => 'checkbox',
                ));

                // headline text
                $wp_customize -> add_setting( 'nandgatestudios-header-headline', array(
                    'default'           => __( 'The best WordPress Theme based on Material Design' , 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-headline', array(
                    'label'             => __( 'Headline Text', 'materialize' ),
                    'section'           => 'nandgatestudios-header-content',
                    'settings'          => 'nandgatestudios-header-headline',
                    'type'              => 'text'
                ));

                // headline color
                $wp_customize -> add_setting( 'nandgatestudios-header-headline-color', array(
                    'default'           => '#e53932',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-headline-color',
                    array(
                        'label'         => __( 'Headline Color', 'materialize' ),
                        'section'       => 'nandgatestudios-header-content',
                        'settings'      => 'nandgatestudios-header-headline-color',
                    )
                ));

                // show description
                $wp_customize -> add_setting( 'nandgatestudios-header-show-description', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-show-description', array(
                    'label'             => __( 'Show Description', 'materialize' ),
                    'section'           => 'nandgatestudios-header-content',
                    'settings'          => 'nandgatestudios-header-show-description',
                    'type'              => 'checkbox',
                ));

                // description text
                $wp_customize -> add_setting( 'nandgatestudios-header-description', array(
                    'default'           => __( 'WordPress theme developed by Yash Gupta' , 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-description', array(
                    'label'             => __( 'Header Description', 'materialize' ),
                    'section'           => 'nandgatestudios-header-content',
                    'settings'          => 'nandgatestudios-header-description',
                    'type'              => 'text',
                ));

                // description color
                $wp_customize -> add_setting( 'nandgatestudios-header-description-color', array(
                    'default'           => '#000000',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-description-color',
                    array(
                        'label'         => __( 'Description Color', 'materialize' ),
                        'section'       => 'nandgatestudios-header-content',
                        'settings'      => 'nandgatestudios-header-description-color',
                    )
                ));
            }


            {   // first button options

                $wp_customize -> add_section( 'nandgatestudios-header-btn-1', array(
                    'title'             => __( 'First Button' , 'materialize' ),
                    'panel'             => 'nandgatestudios-header-panel',
                    'priority'          => 30,
                    'capability'        => 'edit_theme_options'
                ));

                // show first button
                $wp_customize -> add_setting( 'nandgatestudios-header-show-btn-1', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-show-btn-1', array(
                    'label'             => __( 'Show Button', 'materialize' ),
                    'section'           => 'nandgatestudios-header-btn-1',
                    'settings'          => 'nandgatestudios-header-show-btn-1',
                    'type'              => 'checkbox'
                ));

                // text color
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-1-color', array(
                    'default'           => '#ffffff',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-btn-1-color',
                    array(
                        'label'         => __( 'Text Color', 'materialize' ),
                        'section'       => 'nandgatestudios-header-btn-1',
                        'settings'      => 'nandgatestudios-header-btn-1-color',
                    )
                ));

                // background color
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-1-bkg-color', array(
                    'default'           => '#4caf50',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-btn-1-bkg-color',
                    array(
                        'label'         => __( 'Background Color', 'materialize' ),
                        'section'       => 'nandgatestudios-header-btn-1',
                        'settings'      => 'nandgatestudios-header-btn-1-bkg-color',
                    )
                ));

                // hover background color
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-1-bkg-h-color', array(
                    'default'           => '#43a047',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-btn-1-bkg-h-color',
                    array(
                        'label'         => __( 'Background Color ( over )', 'materialize' ),
                        'description'   => __( 'When the mouse is over the button.' , 'materialize' ),
                        'section'       => 'nandgatestudios-header-btn-1',
                        'settings'      => 'nandgatestudios-header-btn-1-bkg-h-color'
                    )
                ));

                // url
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-1-url', array(
                    'default'           => esc_url( home_url( '#' ) ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-btn-1-url', array(
                    'label'             => __( 'URL', 'materialize' ),
                    'description'       => __( 'Link for first button', 'materialize' ),
                    'section'           => 'nandgatestudios-header-btn-1',
                    'settings'          => 'nandgatestudios-header-btn-1-url',
                    'type'              => 'url',
                ));

                // text
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-1-text', array(
                    'default'           => __( 'First Button', 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-btn-1-text', array(
                    'label'             => __( 'Text', 'materialize' ),
                    'description'       => __( 'Text for first button', 'materialize' ),
                    'section'           => 'nandgatestudios-header-btn-1',
                    'settings'          => 'nandgatestudios-header-btn-1-text',
                    'type'              => 'text',
                ));

                // description
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-1-description', array(
                    'default'           => __( 'first button link description...', 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'esc_textarea',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-btn-1-description', array(
                    'label'             => __( 'Description', 'materialize' ),
                    'description'       => __( 'link description for first button', 'materialize' ),
                    'section'           => 'nandgatestudios-header-btn-1',
                    'settings'          => 'nandgatestudios-header-btn-1-description',
                    'type'              => 'textarea',
                ));
            }


            {   // second button options

                $wp_customize -> add_section( 'nandgatestudios-header-btn-2', array(
                    'title'             => __( 'Second Button' , 'materialize' ),
                    'panel'             => 'nandgatestudios-header-panel',
                    'priority'          => 30,
                    'capability'        => 'edit_theme_options'
                ));

                // show second button
                $wp_customize -> add_setting( 'nandgatestudios-header-show-btn-2', array(
                    'default'           => true,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_logic',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-show-btn-2', array(
                    'label'             => __( 'Display second button', 'materialize' ),
                    'section'           => 'nandgatestudios-header-btn-2',
                    'settings'          => 'nandgatestudios-header-show-btn-2',
                    'type'              => 'checkbox'
                ));

                // text color
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-2-color', array(
                    'default'           => '#ffffff',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-btn-2-color',
                    array(
                        'label'         => __( 'Text Color', 'materialize' ),
                        'section'       => 'nandgatestudios-header-btn-2',
                        'settings'      => 'nandgatestudios-header-btn-2-color',
                    )
                ));

                // background color
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-2-bkg-color', array(
                    'default'           => '#e53935',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-btn-2-bkg-color',
                    array(
                        'label'         => __( 'Background Color', 'materialize' ),
                        'section'       => 'nandgatestudios-header-btn-2',
                        'settings'      => 'nandgatestudios-header-btn-2-bkg-color',
                    )
                ));

                // hover background color
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-2-bkg-h-color', array(
                    'default'           => '#d32f2f',
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_hex_color',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( new WP_Customize_Color_Control(
                    $wp_customize,
                    'nandgatestudios-header-btn-2-bkg-h-color',
                    array(
                        'label'         => __( 'Background Color ( over )', 'materialize' ),
                        'description'   => __( 'When the mouse is over the button.' , 'materialize' ),
                        'section'       => 'nandgatestudios-header-btn-2',
                        'settings'      => 'nandgatestudios-header-btn-2-bkg-h-color'
                    )
                ));

                // url
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-2-url', array(
                    'default'           => esc_url( home_url( '#' ) ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'esc_url_raw',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-btn-2-url', array(
                    'label'             => __( 'URL', 'materialize' ),
                    'description'       => __( 'Link for second button', 'materialize' ),
                    'section'           => 'nandgatestudios-header-btn-2',
                    'settings'          => 'nandgatestudios-header-btn-2-url',
                    'type'              => 'url'
                ));

                // text
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-2-text', array(
                    'default'           => __( 'Second Button', 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'sanitize_text_field',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-btn-2-text', array(
                    'label'             => __( 'Text', 'materialize' ),
                    'description'       => __( 'Text for second button', 'materialize' ),
                    'section'           => 'nandgatestudios-header-btn-2',
                    'settings'          => 'nandgatestudios-header-btn-2-text',
                    'type'              => 'text',
                ));

                // description
                $wp_customize -> add_setting( 'nandgatestudios-header-btn-2-description', array(
                    'default'           => __( 'second button link description...', 'materialize' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'esc_textarea',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-header-btn-2-description', array(
                    'label'             => __( 'Description', 'materialize' ),
                    'description'       => __( 'link description for second button', 'materialize' ),
                    'section'           => 'nandgatestudios-header-btn-2',
                    'settings'          => 'nandgatestudios-header-btn-2-description',
                    'type'              => 'textarea'
                ));
            }
        }


        {   // breadcrumbs options

            $wp_customize -> add_section( 'nandgatestudios-breadcrumbs', array(
                'title'             => __( 'Breadcrumbs' , 'materialize' ),
                'priority'          => 5,
                'capability'        => 'edit_theme_options'
            ));

            // show breadcrumbs
            $wp_customize -> add_setting( 'nandgatestudios-show-breadcrumbs', array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'nandgatestudios_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-show-breadcrumbs', array(
                'label'             => __( 'Show Breadcrumbs', 'materialize' ),
                'section'           => 'nandgatestudios-breadcrumbs',
                'settings'          => 'nandgatestudios-show-breadcrumbs',
                'type'              => 'checkbox',
            ));

            // breadcrumbs "Home" link text
            $wp_customize -> add_setting( 'nandgatestudios-breadcrumbs-home-link-text', array(
                'default'           => __( 'Home', 'materialize' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-breadcrumbs-home-link-text', array(
                'label'             => __( '"Home" link text', 'materialize' ),
                'description'       => __( 'breadcrumbs "Home" link text.', 'materialize' ),
                'section'           => 'nandgatestudios-breadcrumbs',
                'settings'          => 'nandgatestudios-breadcrumbs-home-link-text',
                'type'              => 'text',
            ));

            // breadcrumbs "Home" link description
            $wp_customize -> add_setting( 'nandgatestudios-breadcrumbs-home-link-description', array(
                'default'           => __( 'go to home', 'materialize' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'esc_textarea',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-breadcrumbs-home-link-description', array(
                'label'             => __( '"Home" link description', 'materialize' ),
                'description'       => __( 'breadcrumbs "Home" link description.', 'materialize' ),
                'section'           => 'nandgatestudios-breadcrumbs',
                'settings'          => 'nandgatestudios-breadcrumbs-home-link-description',
                'type'              => 'textarea',
            ));

            // breadcrumbs space ( inner above and below )
            $wp_customize -> add_setting( 'nandgatestudios-breadcrumbs-space', array(
                'default'           => 60,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'nandgatestudios_validate_number',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-breadcrumbs-space', array(
                'label'             => __( 'Space', 'materialize' ),
                'description'       => __( 'inner above and below space allow you to change breadcrumbs height.', 'materialize' ),
                'section'           => 'nandgatestudios-breadcrumbs',
                'settings'          => 'nandgatestudios-breadcrumbs-space',
                'type'              => 'number',
                'input_attrs'       => array(
                    'min'   => 0,
                    'max'   => 100,
                )
            ));
        }


        {   // additional option

            $wp_customize -> add_section( 'nandgatestudios-additional', array(
                'title'             => __( 'Additional' , 'materialize' ),
                'priority'          => 6,
                'capability'        => 'edit_theme_options'
            ));

            // text "Blog" ( breadcrumbs blog page )
            $wp_customize -> add_setting( 'nandgatestudios-blog-title', array(
                'default'           => __( 'Blog', 'materialize' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-blog-title', array(
                'label'             => __( 'Title for Blog Page', 'materialize' ),
                'section'           => 'nandgatestudios-additional',
                'settings'          => 'nandgatestudios-blog-title',
                'type'              => 'text'
            ));

            // show top meta
            $wp_customize -> add_setting( 'nandgatestudios-top-meta', array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'nandgatestudios_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-top-meta', array(
                'label'             => __( 'Display top meta', 'materialize' ),
                'description'       => __( 'enable / disable top meta from single posts ( all posts ).', 'materialize' ),
                'section'           => 'nandgatestudios-additional',
                'settings'          => 'nandgatestudios-top-meta',
                'type'              => 'checkbox'
            ));

            // show bottom meta
            $wp_customize -> add_setting( 'nandgatestudios-bottom-meta', array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'nandgatestudios_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-bottom-meta', array(
                'label'             => __( 'Display bottom meta', 'materialize' ),
                'description'       => __( 'enable / disable bottom meta from single posts ( all posts ).', 'materialize' ),
                'section'           => 'nandgatestudios-additional',
                'settings'          => 'nandgatestudios-bottom-meta',
                'type'              => 'checkbox'
            ));

            // show html suggestions
            $wp_customize -> add_setting( 'nandgatestudios-html-suggestions', array(
                'default'           => true,
                'transport'         => 'refresh',
                'sanitize_callback' => 'nandgatestudios_validate_logic',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-html-suggestions', array(
                'label'             => __( 'HTML Suggestions', 'materialize' ),
                'description'       => __( 'enable / disable HTML Suggestions after comments form ( all posts ).', 'materialize' ),
                'section'           => 'nandgatestudios-additional',
                'settings'          => 'nandgatestudios-html-suggestions',
                'type'              => 'checkbox'
            ));
        }


        {   // layout options

            $layout_panel = array(
                'title'             => __( 'Layout' , 'materialize' ),
                'priority'          => 7,
                'capability'        => 'edit_theme_options'
            );

            $wp_customize -> add_panel( 'nandgatestudios-layout-panel', $layout_panel );

            $sidebars   = array(
                'main'              => __( 'Main Sidebar' , 'materialize' ),
                'front-page'        => __( 'Front Page Sidebar' , 'materialize' ),
                'page'              => __( 'Page Sidebar' , 'materialize' ),
                'post'              => __( 'Post Sidebar' , 'materialize' ),
                'special-page'      => __( 'Special Page Sidebar' , 'materialize' )
            );


            {   // default layout options

                $wp_customize -> add_section( 'nandgatestudios-layout', array(
                    'title'             => __( 'Default' , 'materialize' ),
                    'description'       => __( 'Default Layout is used for the next templates: Blog, Archives, Categories, Tags, Author and Search Results.' , 'materialize' ),
                    'panel'             => 'nandgatestudios-layout-panel',
                    'capability'        => 'edit_theme_options'
                ));

                // layout
                $wp_customize -> add_setting( 'nandgatestudios-layout', array(
                    'default'           => 'right',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'nandgatestudios-layout',
                    'settings'          => 'nandgatestudios-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'nandgatestudios-sidebar', array(
                    'default'           => 'main',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'nandgatestudios-layout',
                    'settings'          => 'nandgatestudios-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'nandgatestudios-sidebar', $sidebar_args );
            }


            {   // front page layout options

                $wp_customize -> add_section( 'nandgatestudios-front-page-layout', array(
                    'title'             => __( 'Front Page' , 'materialize' ),
                    'description'       => __( 'In order to use this option set you need to activate a staic page on Front Page from - "Static Front Page" tab' , 'materialize' ),
                    'panel'             => 'nandgatestudios-layout-panel',
                    'capability'        => 'edit_theme_options'
                ));

                // layout
                $wp_customize -> add_setting( 'nandgatestudios-front-page-layout', array(
                    'default'           => 'full',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-front-page-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'nandgatestudios-front-page-layout',
                    'settings'          => 'nandgatestudios-front-page-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'nandgatestudios-front-page-sidebar', array(
                    'default'           => 'front-page',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $front_page_sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'nandgatestudios-front-page-layout',
                    'settings'          => 'nandgatestudios-front-page-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'nandgatestudios-front-page-sidebar', $front_page_sidebar_args);
            }


            {   // single page layout options

                $page_layout_args = array(
                    'title'             => __( 'Single Page' , 'materialize' ),
                    'panel'             => 'nandgatestudios-layout-panel',
                    'capability'        => 'edit_theme_options'
                );

                $wp_customize -> add_section( 'nandgatestudios-page-layout', $page_layout_args );

                // layout
                $wp_customize -> add_setting( 'nandgatestudios-page-layout', array(
                    'default'           => 'full',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-page-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'nandgatestudios-page-layout',
                    'settings'          => 'nandgatestudios-page-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'nandgatestudios-page-sidebar', array(
                    'default'           => 'page',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $page_sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'nandgatestudios-page-layout',
                    'settings'          => 'nandgatestudios-page-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'nandgatestudios-page-sidebar', $page_sidebar_args );
            }


            {   // single post layout

                $post_layout_args = array(
                    'title'             => __( 'Single Post' , 'materialize' ),
                    'panel'             => 'nandgatestudios-layout-panel',
                    'capability'        => 'edit_theme_options'
                );

                $wp_customize -> add_section( 'nandgatestudios-post-layout', $post_layout_args );

                // layout
                $wp_customize -> add_setting( 'nandgatestudios-post-layout', array(
                    'default'           => 'right',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-post-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'nandgatestudios-post-layout',
                    'settings'          => 'nandgatestudios-post-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'nandgatestudios-post-sidebar', array(
                    'default'           => 'post',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $post_sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'nandgatestudios-post-layout',
                    'settings'          => 'nandgatestudios-post-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'nandgatestudios-post-sidebar', $post_sidebar_args );
            }


            {   // special page layout options

                $special_page_layout_args = array(
                    'title'             => __( 'Special Page' , 'materialize' ),
                    'panel'             => 'nandgatestudios-layout-panel',
                    'capability'        => 'edit_theme_options'
                );

                $wp_customize -> add_section( 'nandgatestudios-special-page-layout', $special_page_layout_args );

                // special page
                $wp_customize -> add_setting( 'nandgatestudios-special-page', array(
                    'default'           => 2,
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_number',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-special-page', array(
                    'label'             => __( 'Special page' , 'materialize' ),
                    'description'       => __( 'for selected page you can overwrite default page layout settings with special layout settings', 'materialize' ),
                    'section'           => 'nandgatestudios-special-page-layout',
                    'settings'          => 'nandgatestudios-special-page',
                    'type'              => 'dropdown-pages'
                ));

                // layout
                $wp_customize -> add_setting( 'nandgatestudios-special-page-layout', array(
                    'default'           => 'right',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_layout',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-special-page-layout', array(
                    'label'             => __( 'Layout' , 'materialize' ),
                    'section'           => 'nandgatestudios-special-page-layout',
                    'settings'          => 'nandgatestudios-special-page-layout',
                    'type'              => 'select',
                    'choices'           => array(
                        'left'  => __( 'Left Sidebar', 'materialize' ),
                        'full'  => __( 'Full Width', 'materialize' ),
                        'right' => __( 'Right Sidebar', 'materialize' )
                    )
                ));

                // sidebar
                $wp_customize -> add_setting( 'nandgatestudios-special-page-sidebar', array(
                    'default'           => 'special-page',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'nandgatestudios_validate_sidebar',
                    'capability'        => 'edit_theme_options'
                ));
                $special_page_sidebar_args = array(
                    'label'             => __( 'Sidebar' , 'materialize' ),
                    'section'           => 'nandgatestudios-special-page-layout',
                    'settings'          => 'nandgatestudios-special-page-sidebar',
                    'type'              => 'select',
                    'choices'           => $sidebars
                );

                $wp_customize -> add_control( 'nandgatestudios-special-page-sidebar', $special_page_sidebar_args );
            }
        }


        {   // social options

            $wp_customize -> add_section( 'nandgatestudios-social', array(
                'title'             => __( 'Social' , 'materialize' ),
                'priority'          => 35,
                'capability'        => 'edit_theme_options'
            ));

            // vimeo
            $wp_customize -> add_setting( 'nandgatestudios-vimeo', array(
                'default'           => 'http://vimeo.com/#',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-vimeo', array(
                'label'             => __( 'Vimeo', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-vimeo',
                'type'              => 'url',
            ));

            // twitter
            $wp_customize -> add_setting( 'nandgatestudios-twitter', array(
                'default'           => 'http://twitter.com/#',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-twitter', array(
                'label'             => __( 'Twitter', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'sanitize_callback' => 'esc_url_raw',
                'settings'          => 'nandgatestudios-twitter',
                'type'              => 'url',
            ));

            // skype
            $wp_customize -> add_setting( 'nandgatestudios-skype', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-skype', array(
                'label'             => __( 'Skype', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-skype',
                'type'              => 'url',
            ));

            // renren
            $wp_customize -> add_setting( 'nandgatestudios-renren', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-renren', array(
                'label'             => __( 'Renren', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-renren',
                'type'              => 'url',
            ));

            // github
            $wp_customize -> add_setting( 'nandgatestudios-github', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-github', array(
                'label'             => __( 'Github', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-github',
                'type'              => 'url',
            ));

            // rdio
            $wp_customize -> add_setting( 'nandgatestudios-rdio', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-rdio', array(
                'label'             => __( 'Rdio', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-rdio',
                'type'              => 'url'
            ));

            // linkedin
            $wp_customize -> add_setting( 'nandgatestudios-linkedin', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-linkedin', array(
                'label'             => __( 'Linkedin', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-linkedin',
                'type'              => 'url',
            ));

            // behance
            $wp_customize -> add_setting( 'nandgatestudios-behance', array(
                'default'           => 'http://behance.com/#',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-behance', array(
                'label'             => __( 'Behance', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-behance',
                'type'              => 'url',
            ));

            // dropbox
            $wp_customize -> add_setting( 'nandgatestudios-dropbox', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-dropbox', array(
                'label'             => __( 'Dropbox', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-dropbox',
                'type'              => 'url',
            ));

            // flickr
            $wp_customize -> add_setting( 'nandgatestudios-flickr', array(
                'default'           => 'http://flickr.com/#',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-flickr', array(
                'label'             => __( 'Flickr', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-flickr',
                'type'              => 'url',
            ));

            // tumblr
            $wp_customize -> add_setting( 'nandgatestudios-tumblr', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-tumblr', array(
                'label'             => __( 'Tumblr', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-tumblr',
                'type'              => 'url',
            ));

            // instagram
            $wp_customize -> add_setting( 'nandgatestudios-instagram', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-instagram', array(
                'label'             => __( 'Instagram', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-instagram',
                'type'              => 'url',
            ));

            // vkontakte
            $wp_customize -> add_setting( 'nandgatestudios-vkontakte', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-vkontakte', array(
                'label'             => __( 'Vkontakte', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-vkontakte',
                'type'              => 'url',
            ));

            // facebook
            $wp_customize -> add_setting( 'nandgatestudios-facebook', array(
                'default'           => 'http://facebook.com/#',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-facebook', array(
                'label'             => __( 'Facebook', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-facebook',
                'type'              => 'url',
            ));

            // evernote
            $wp_customize -> add_setting( 'nandgatestudios-evernote', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-evernote', array(
                'label'             => __( 'Evernote', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-evernote',
                'type'              => 'url'
            ));

            // flattr
            $wp_customize -> add_setting( 'nandgatestudios-flattr', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-flattr', array(
                'label'             => __( 'Flattr', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-flattr',
                'type'              => 'url',
            ));

            // picasa
            $wp_customize -> add_setting( 'nandgatestudios-picasa', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-picasa', array(
                'label'             => __( 'Picasa', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-picasa',
                'type'              => 'url',
            ));

            // dribbble
            $wp_customize -> add_setting( 'nandgatestudios-dribbble', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-dribbble', array(
                'label'             => __( 'Dribbble', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-dribbble',
                'type'              => 'url',
            ));

            // mixi
            $wp_customize -> add_setting( 'nandgatestudios-mixi', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-mixi', array(
                'label'             => __( 'Mixi', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-mixi',
                'type'              => 'url',
            ));

            // stumbleupon
            $wp_customize -> add_setting( 'nandgatestudios-stumbleupon', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-stumbleupon', array(
                'label'             => __( 'Stumbleupon', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-stumbleupon',
                'type'              => 'url',
            ));

            // lastfm
            $wp_customize -> add_setting( 'nandgatestudios-lastfm', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-lastfm', array(
                'label'             => __( 'Lastfm', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-lastfm',
                'type'              => 'url',
            ));

            // gplus
            $wp_customize -> add_setting( 'nandgatestudios-gplus', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-gplus', array(
                'label'             => __( 'GPlus', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-gplus',
                'type'              => 'url',
            ));

            // google circles
            $wp_customize -> add_setting( 'nandgatestudios-google-circles', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-google-circles', array(
                'label'             => __( 'Google circles', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-google-circles',
                'type'              => 'url',
            ));

            // pinterest
            $wp_customize -> add_setting( 'nandgatestudios-pinterest', array(
                'default'           => 'http://pinterest.com/#',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-pinterest', array(
                'label'             => __( 'Pinterest', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-pinterest',
                'type'              => 'url',
            ));

            // shashing
            $wp_customize -> add_setting( 'nandgatestudios-smashing', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-smashing', array(
                'label'             => __( 'Smashing', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-smashing',
                'type'              => 'url'
            ));

            // soundcloud
            $wp_customize -> add_setting( 'nandgatestudios-soundcloud', array(
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-soundcloud', array(
                'label'             => __( 'Soundcloud', 'materialize' ),
                'section'           => 'nandgatestudios-social',
                'settings'          => 'nandgatestudios-soundcloud',
                'type'              => 'url',
            ));

            // rss
            $wp_customize -> add_setting( 'nandgatestudios-rss', array(
                'default'           => esc_url( get_bloginfo('rss2_url') ),
                'transport'         => 'refresh',
                'sanitize_callback' => 'esc_url_raw',
                'capability'        => 'edit_theme_options'
            ));
            $wp_customize -> add_control( 'nandgatestudios-rss', array(
                'label'         => __( 'Rss', 'materialize' ),
                'section'       => 'nandgatestudios-social',
                'settings'      => 'nandgatestudios-rss',
                'type'          => 'url',
            ));
        }

        {   // others options

            $others_panel = array(
                'title'             => __( 'Others' , 'materialize' ),
                'priority'          => 36,
                'capability'        => 'edit_theme_options'
            );

            $wp_customize -> add_panel( 'nandgatestudios-others-panel', $others_panel );

            {
                $wp_customize -> add_section( 'nandgatestudios-custom-css', array(
                    'title'             => __( 'Custom CSS' , 'materialize' ),
                    'panel'             => 'nandgatestudios-others-panel',
                    'capability'        => 'edit_theme_options'
                ));

                if ( function_exists( 'wp_update_custom_css_post' ) ) {

            		// Migrate any existing theme CSS to the core option added in WordPress 4.7.
                	$css = get_theme_mod( 'nandgatestudios-custom-css' );

            	    if ( $css ) {
            	        $core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
            	        $return = wp_update_custom_css_post( $core_css . $css );

            	        if ( ! is_wp_error( $return ) ) {
            	            // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
            	            remove_theme_mod( 'nandgatestudios-custom-css' );
            	        }
            	    }
            	}

            	else{
                    // custom css
                    $wp_customize -> add_setting( 'nandgatestudios-custom-css', array(
                        'default'               => '',
                        'transport'             => 'refresh',
                        'sanitize_callback'     => 'wp_filter_nohtml_kses',
                        'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                        'capability'            => 'edit_theme_options'
                    ));
                    $wp_customize -> add_control( 'nandgatestudios-custom-css', array(
                        'label'                 => __( 'Custom CSS', 'materialize' ),
                        'description'           => __( 'This is a general Custom CSS field.', 'materialize' ),
                        'section'               => 'nandgatestudios-custom-css',
                        'settings'              => 'nandgatestudios-custom-css',
                        'type'                  => 'textarea',
                    ));
            	}

                // custom css ie
                $wp_customize -> add_setting( 'nandgatestudios-custom-css-ie', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-custom-css-ie', array(
                    'label'                 => __( 'Custom CSS IE', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer', 'materialize' ),
                    'section'               => 'nandgatestudios-custom-css',
                    'settings'              => 'nandgatestudios-custom-css-ie',
                    'type'                  => 'textarea',
                ));

                // custom css ie 11
                $wp_customize -> add_setting( 'nandgatestudios-custom-css-ie-11', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-custom-css-ie-11', array(
                    'label'                 => __( 'Custom CSS IE 11', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer 11', 'materialize' ),
                    'section'               => 'nandgatestudios-custom-css',
                    'settings'              => 'nandgatestudios-custom-css-ie-11',
                    'type'                  => 'textarea',
                ));

                // custom css ie 10
                $wp_customize -> add_setting( 'nandgatestudios-custom-css-ie-10', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-custom-css-ie-10', array(
                    'label'                 => __( 'Custom CSS IE 10', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer 10', 'materialize' ),
                    'section'               => 'nandgatestudios-custom-css',
                    'settings'              => 'nandgatestudios-custom-css-ie-10',
                    'type'                  => 'textarea',
                ));

                // custom css ie 9
                $wp_customize -> add_setting( 'nandgatestudios-custom-css-ie-9', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-custom-css-ie-9', array(
                    'label'                 => __( 'Custom CSS IE 9', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer 9', 'materialize' ),
                    'section'               => 'nandgatestudios-custom-css',
                    'settings'              => 'nandgatestudios-custom-css-ie-9',
                    'type'                  => 'textarea',
                ));

                // custom css ie 8
                $wp_customize -> add_setting( 'nandgatestudios-custom-css-ie-8', array(
                    'default'               => '',
                    'transport'             => 'refresh',
                    'sanitize_callback'     => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback'  => 'wp_filter_nohtml_kses',
                    'capability'            => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-custom-css-ie-8', array(
                    'label'                 => __( 'Custom CSS IE 8', 'materialize' ),
                    'description'           => __( 'This Custom CSS field is used just for Internet Explorer 8', 'materialize' ),
                    'section'               => 'nandgatestudios-custom-css',
                    'settings'              => 'nandgatestudios-custom-css-ie-8',
                    'type'                  => 'textarea',
                ));
            }

            {
                $wp_customize -> add_section( 'nandgatestudios-copyright', array(
                    'title'             => __( 'Copyright' , 'materialize' ),
                    'panel'             => 'nandgatestudios-others-panel',
                    'capability'        => 'edit_theme_options'
                ));

                // content copyright
                $wp_customize -> add_setting( 'nandgatestudios-copyright', array(
                    'default'           => sprintf( __( 'Copyright &copy; %1s. Powered by %2s.' , 'materialize' ), date( 'Y' ), '<a href="http://wordpress.org/">WordPress</a>' ),
                    'transport'         => 'postMessage',
                    'sanitize_callback' => 'nandgatestudios_validate_copyright',
                    'capability'        => 'edit_theme_options'
                ));
                $wp_customize -> add_control( 'nandgatestudios-copyright', array(
                    'label'             => __( 'Website content Copyright', 'materialize' ),
                    'description'       => __( 'From the theme options you can change only the website content copyright.' , 'materialize' ),
                    'section'           => 'nandgatestudios-copyright',
                    'settings'          => 'nandgatestudios-copyright',
                    'type'              => 'textarea',
                ));
            }
        }
	}

	add_action( 'customize_register' , 'nandgatestudios_customize_register' );

	function nandgatestudios_customizer_live_preview()
	{
        $nandgatestudios_js_ajaxurl = esc_url( admin_url( '/admin-ajax.php' ) );
    	wp_register_script( 'nandgatestudios-themecustomizer', get_template_directory_uri() . '/media/_backend/js/customizer.js', array( 'jquery', 'customize-preview' ), '',  true );
        wp_localize_script( 'nandgatestudios-themecustomizer', 'nandgatestudios_js_ajaxurl', $nandgatestudios_js_ajaxurl );
        wp_enqueue_script( 'nandgatestudios-themecustomizer' );
	}

	add_action( 'customize_preview_init', 'nandgatestudios_customizer_live_preview' );

    if( is_user_logged_in() ){
        add_action( 'wp_ajax_nandgatestudios_layout_load_sidebar' , array( 'nandgatestudios_layout', 'load_sidebar' ), 100 );
    }

    /* FUNCTIONS FOR VALIDATE */
    function nandgatestudios_validate_logic( $value )
    {
        $rett = true;

        if( absint( $value ) == 0 ){
            $rett = false;
        }

        return $rett;
    }

    function nandgatestudios_validate_number( $value )
    {
        return absint( $value );
    }

    function nandgatestudios_validate_layout( $value )
    {
        if( !in_array( $value , array( 'left' , 'full' , 'right' ) ) ){
            $value = 'right';
        }

        return $value;
    }

    function nandgatestudios_validate_sidebar( $value )
    {
        if( !in_array( $value , array( 'main', 'front-page', 'page', 'post', 'special-page' ) ) ){
            $value = 'main';
        }

        return $value;
    }

    function nandgatestudios_validate_copyright( $value )
    {
        return wp_kses( $value, array(
            'a' => array(
                'href'  => array(),
                'title' => array(),
                'class' => array(),
                'id'    => array()
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'span'      => array()
        ));
    }
?>
