<?php 
/**
 * Page options settings
 */

// A1
add_action( 'wp_head', 'fastbreak_theme_customizer_css', 12 );  
// A2
add_action( 'admin_menu',         'fastbreak_theme_options_help_page' );

/** @A2
 * Add theme menu
 *
 * @since 1.0.1
 * @uses add_theme_page()
 * $page_title, $menu_title, $capability, $menu_slug, $function
 */
function fastbreak_theme_options_help_page() {

    add_theme_page(
        __( 'Theme Information', 'fastbreak' ),
        __( 'Fastbreak Help', 'fastbreak' ),
        'edit_theme_options',
        'fastbreak-theme-help',
        'fastbreak_siteinfo_admin_render'
    );
}
/** A1
 * CUSTOM FONT OUTPUT, CSS
 * The @font-face rule should be added to the stylesheet before any styles. (priority 2)
 * @uses background-image as linear gradient meerly remove any input background image.
 * @since 1.0.0
*/
function fastbreak_theme_customizer_css() 
{   
    $fnt = '';
    $tsb  = ( empty( get_theme_mod( 'fastbreak_topbars_color' ) ) ) ? '#3d3d3d' 
               : get_theme_mod( 'fastbreak_topbars_color' );
    $fnt  = ( empty( get_theme_mod( 'fastbreak_font_choices' ) ) ) ? 'montserrat' 
               : get_theme_mod( 'fastbreak_font_choices' );
    
    if( $fnt == 'initial' ) {

        $font = '<style id="fastbreak-fonts-style" type="text/css">';
        $font .= 'body, button, input, select, textarea, .h1{';
        $font .= 'font-family: initial;}</style>';

    } 
    if( $fnt == 'montserrat' ) { 

        $urib  = get_stylesheet_directory_uri() . '/rels/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCtr6Hw5aXo.woff2';
        $font = '<style id="fastbreak-montserrat-style" type="text/css">';
        $font .= 
        "@font-face {font-family: 'Montserrat';font-style: normal;font-weight: 400;src: url( $urib ) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }";
        $font .= 'body, button, input, select, textarea, .h1{';
        $font .= 'font-family: "Montserrat";}</style>';
    }
    if( $fnt == 'arial' ) { 

        $font = '';
    }

    /* use above set values into inline styles */
    $css = '<style id="fastbreak-inline-customizer" type="text/css">';
    $css .= '#footerCopy,.top-strip,.nav{background-color: ' . esc_attr($tsb) . '}';
    $css .= '</style>' . $font;

    echo $css;  
        
} 


/**
 * information about website
 * @since 1.0.1
 * @return HTML string
 */

 function fastbreak_siteinfo_admin_render(){
    if ( !is_admin() ) return;
    ?>
    <div class="wrap">
        <div id="icon-themes" class="icon32"></div>
        <h2>Fastbreak Theme Help</h2>
        <?php settings_errors(); ?>
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            } 
    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'display_options';
        ?>
    <h2 class="nav-tab-wrapper">
    <a href="?page=fastbreak-theme-help&tab=display_options" class="nav-tab">Environment</a>
    <a href="?page=fastbreak-theme-help&tab=theme_options" class="nav-tab">Help</a>
    </h2>
    <?php 
    if( $active_tab == 'display_options' ) { ?>
    
    <section>
    <h2><?php _e( 'Basic Information', 'fastbreak'); ?></h2>
    <div id="fastbreak-short" style="background:oldlace;height:3em">
        <?php echo fastbreak_short_basic_debug_info(); ?>
    </div>
    <hr id="fastbreak-hr"><br>
    <div id="fastbreak-short" style="background:oldlace;height:3em">
        <p><a class="button" href="<?php echo admin_url( '/customize.php?autofocus[section]=fastbreak_header' ); ?>" 
           title="Customizer">Customize Theme Settings</a></p>
    </div>
    </section>
    <?php } else { ?>

    <section><h2><?php esc_html_e( 'Theme Help', 'fastbreak' ); ?></h2>
    <p><?php esc_html_e( 'For support issues please use the Issues panel on our Github account for this theme.', 'fastbreak'); ?>
    <a href="<?php echo esc_url('https://github.com/tradesouthwest/fastbreak/issues'); ?>" 
       title="<?php echo esc_attr('theme support', 'fastbreak'); ?>" target="_blank">
       <?php esc_html_e('Open Issue for Support', 'fastbreak'); ?></a>
       <small><?php esc_html_e('[opens in new window]', 'fastbreak'); ?><small></p>


    <?php } ?>
    
    </div>
<?php 
}
function fastbreak_short_basic_debug_info( $html = true ) {
    global $wp_version, $wpdb;

    $data = array(
        'WordPress Version'     => $wp_version,
        'PHP Version'           => phpversion(),
        'MySQL Version'         => $wpdb->db_version(),
        'WP_DEBUG'              => ( WP_DEBUG === true ) ?  
                                   'Enabled' : 'Disabled',
    );
    if ( $html ) {
        $html = '<ol>';
        foreach ( $data as $what_v => $v ) {
$html .= '<li style="display: inline;"><strong>' . $what_v . '</strong>: ' . $v . ' </li>';
        }
        $html .= '</ol>';
    }
    return $html;
} 

