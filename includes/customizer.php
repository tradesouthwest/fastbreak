<?php
/**
 * fastbreak Customizer functionality
 *
 * @package fastbreak
 * @subpackage inc/fastbreak
 * @since 1.0
 * 
 * @see https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
 */

/** 
 * suport footer background & text color
 * header background & color
 * page background & color
 */ 

add_action( 'customize_register', 'fastbreak_register_theme_customizer_setup' );

/**
 * Remove parts of the Options menu we don't use.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 * @since 1.0.2
*/

function fastbreak_register_theme_customizer_setup($wp_customize)
{
	//$transport = ( $wp_customize->selective_refresh ? 'postMessage' : 'refresh' );
    // Branding
   
    // Theme font choice section
    $wp_customize->add_section( 'fastbreak_header', array(
        'title'       => __( 'Theme Heading and Advert', 'fastbreak' ),
        'capability'  => 'edit_theme_options',
		'priority'    => 15
    ) );
	

    //-----------------Settings and Controls ----------------------------------
	
	// Add setting & control for hero h2
    $wp_customize->add_setting( 'fastbreak_strip_title', array(
		'default' => '',
		'transport' => $transport
	));
	$wp_customize->add_control( 'fastbreak_strip_title', array(
		'label'   => 'Title',
		'section'  => 'fastbreak_header',
		'settings'  => 'fastbreak_strip_title',
		'type'       => 'text',
		'description' => __( 'Add text to very top strip', 'fastbreak')
	));
	
	$wp_customize->add_setting(
		'fastbreak_topbars_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'fastbreak_topbars_color',
		array('label'  => __( 'Color for top bars.', 'fastbreak' ),
			'section'  => 'fastbreak_header',
			'settings' => 'fastbreak_topbars_color',
			'description' => __( 'Use darker colors only.', 'fastbreak')
		) ) 
	);

	// Add setting & control for hero image
	$wp_customize->add_setting( 'fastbreak_advert_image', array(
		'default'  => false,
		'transport' => $transport
	));
  
	$wp_customize->add_control(
		new WP_Customize_Cropped_Image_Control( 
	$wp_customize, 'fastbreak_advert_image', array(
		  'label'   => 'Image for Advert Box',
		  'section'  => 'fastbreak_header',
		  'context'   => 'advert-image',
		  'flex_width' => false,
		  'flex_height' => true,
		  'width'       => 500,
		  'height'      => 150
		) )
	  );

}
