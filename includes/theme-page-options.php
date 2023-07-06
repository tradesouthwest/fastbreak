<?php 
/**
 * Page options settings
 */

// A1
add_action( 'wp_head', 'fastbreak_theme_customizer_css', 12 );  


/** A1
 * CUSTOM FONT OUTPUT, CSS
 * The @font-face rule should be added to the stylesheet before any styles. (priority 2)
 * @uses background-image as linear gradient meerly remove any input background image.
 * @since 1.0.0
*/
function fastbreak_theme_customizer_css() 
{   
$tsb  = ( empty( get_theme_mod( 'fastbreak_topbars_color' ) ) ) ? '#3d3d3d' 
               : get_theme_mod( 'fastbreak_topbars_color' );

    /* use above set values into inline styles */
    $css = '<style id="fastbreak-inline-customizer" type="text/css">';
    $css .= '#footerCopy,.top-strip,.nav{background-color: ' . esc_attr($tsb) . '}';
    $css .= '</style>';

    echo $css;  
        
} 