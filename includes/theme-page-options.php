<?php 
/**
 * Page options settings
 */

// A1
add_action( 'init', 'fastbreak_theme_customizer_css' );  
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

        //$font = '<style id="fastbreak-fonts-style" type="text/css">';
        $font = 'body, button, input, select, textarea, .h1{';
        $font = 'font-family: initial;}';

    } 
    if( $fnt == 'montserrat' ) { 

        $urib  = get_stylesheet_directory_uri() . '/rels/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCtr6Hw5aXo.woff2';
        //$font = '<style id="fastbreak-montserrat-style" type="text/css">';
        $font = 
        "@font-face {font-family: 'Montserrat';font-style: normal;font-weight: 400;src: url( $urib ) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }";
        $font .= 'body, button, input, select, textarea, .h1{';
        $font .= 'font-family: "Montserrat";}';
    }
    if( $fnt == 'arial' ) { 

        $font = '';
    }

    /* use above set values into inline styles */
    //$css = '<style id="fastbreak-inline-customizer" type="text/css">';
    $css = '#footerCopy,.top-strip,.nav{background-color: ' . esc_attr($tsb) . '}' . $font;
    //$css .= '</style>' . $font;

    wp_register_style( 'fastbreak-inline-customizer', false );
	wp_enqueue_style( 'fastbreak-inline-customizer' );
	wp_add_inline_style( 'fastbreak-inline-customizer', $css );
        
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
        <h2><?php esc_html_e( 'Fastbreak Theme Help', 'fastbreak' ); ?></h2>
        <?php settings_errors(); ?>
       
    <section>
    <h3><?php esc_html_e( 'Basic Information', 'fastbreak'); ?></h3>
    <div style="background:oldlace;height:3em">
        <?php echo fastbreak_short_basic_debug_info(); ?>
    </div>
    <hr id="fastbreak-hr"><br>
    <div style="background:oldlace;height:3em">
        <p><a class="button" href="<?php echo admin_url( '/customize.php?autofocus[section]=fastbreak_header' ); ?>" 
           title="Customizer">Customize Theme Settings</a></p>
    </div>
    </section>
    
    <section><h2><?php esc_html_e( 'Theme Help', 'fastbreak' ); ?></h2>
    <p><?php esc_html_e( 'For support issues please use the Issues panel on our Github account for this theme.', 'fastbreak'); ?>
    <a href="<?php echo esc_url('https://github.com/tradesouthwest/fastbreak/issues'); ?>" 
       title="<?php echo esc_attr('theme support', 'fastbreak'); ?>" target="_blank">
       <?php esc_html_e('Open Issue for Support', 'fastbreak'); ?></a>
       <small><?php esc_html_e('[opens in new window]', 'fastbreak'); ?></small></p>
        <h3><?php esc_html_e('Tips', 'fastbreak'); ?></h3>
        <ul>
            <li>&#9733; <?php esc_html_e('Advert box in header can be used for more than advertising. Try adding player of the month or deal for the day.', 'fastbreak'); ?></li>
            <li>&#9733; <?php esc_html_e('For cusomtizations you can reach out to the theme author on Github Issues tracker, linked above.', 'fastbreak'); ?></li>
            <li>&#9733; <?php esc_html_e('Mobile menus should be well adjusted on all devices. If you find a particular browser/device that is looking odd, please open a new issue so we can update the theme.', 'fastbreak'); ?></li>
            <li>&#9733; <?php esc_html_e('Base background color for top bars and footer has white text. Be sure to compensate by using darker backgrounds.', 'fastbreak'); ?></li>
            <li>&#9733; <?php esc_html_e('Title on Front Page template is hidden. To show title edit out line 1148 in the stylesheet.', 'fastbreak'); ?>
            <code>.home .page-title{ display: flex; }</code></li>
            <li>&#9733; <?php esc_html_e('Theme by TradeSouthWest - https://tradesouthwest.com', 'fastbreak'); ?></li>
            <li>&#9733; <?php esc_html_e('', 'fastbreak'); ?></li>
        </ul>
    </section>
    
    </div>
<?php 
}
function fastbreak_short_basic_debug_info( $html = true ) {
    global $cp_version, $wpdb;

    $data = array(
        __('ClassicPress Version', 'fastbreak' )  => $cp_version,
        __('PHP Version', 'fastbreak' )           => phpversion(),
        __('MySQL Version', 'fastbreak' )         => $wpdb->db_version(),
        __('WP_DEBUG State', 'fastbreak' )        => ( WP_DEBUG === true ) ?  
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

