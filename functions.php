<?php
/**
 * fastbreak functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fastbreak
 * @since 1.0.0
 */

// FAST LOADER References ( find @id in DocBlocks )
// ------------------------- Actions ---------------------------
// A1
add_action( 'after_setup_theme',       'fastbreak_theme_setup' );
// A2
add_action( 'after_setup_theme',       'fastbreak_theme_content_width', 0 );
// A3
add_action( 'wp_enqueue_scripts',      'fastbreak_theme_enqueue_styles' );
// A4
add_action( 'widgets_init',            'fastbreak_theme_widgets_init' );
// A5
add_action( 'fastbreak_render_advert', 'fastbreak_render_advert_image' );
// A6
add_action( 'fastbreak_render_topstrip',    'fastbreak_render_topstrip_html' );
// A7
add_action( 'fastbreak_render_attachment',  'fastbreak_render_attachment_link' ); 
// A8 
add_action( 'fastbreak_single_meta_footer', 'fastbreak_single_meta_footer_render' );
// A9
add_action( 'fastbreak_check_pagination', 'fastbreak_check_pagination_pre' );
// A9
//add_action( 'admin_init',                 'fastbreak_theme_add_editor_styles' );

if ( ! function_exists( 'wp_body_open' ) ) {
    /**
    * Add backwards compatibility support for wp_body_open function.
    */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}


/** #A1
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own fastbreak_setup() function to override in a child theme.
 *
 * @since FastBreak 1.0
 */
if ( ! function_exists( 'fastbreak_theme_setup' ) ) :

	function fastbreak_theme_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
		* If you're building a theme based on fastbreak, use a find and replace
		* to change 'fastbreak' to the name of your theme in all the template files
		*/
		load_theme_textdomain( 'fastbreak', get_template_directory_uri() . '/languages' );

		/* a.
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		/* b.
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded "title" tag in the document head, and expect WordPress to provide it for us.
		*
		* Enable support for Post Thumbnails on posts and pages.
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		// a.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// b.
		add_theme_support( 'title-tag' );
    	add_theme_support( 'automatic-feed-links' ); // rss feederz 
        /*
		 * Enable support for custom logo.
		 * page background image and color support
		 */
		add_theme_support( 'post-thumbnails', array( 'post', 'page') );
		// register new phone-landscape featured image size. @width, @height, and @crop
		add_image_size( 'fastbreak-featured', 520, 300, false);   

		add_theme_support( 'custom-background', 
			array( 
		   'default-color'      => '#fcfcfc',
		   'default-image'       => '',
		   'wp-head-callback'     => '_custom_background_cb',
		   'admin-head-callback'   => '',
		   'admin-preview-callback' => ''
		) );
		add_theme_support( 'custom-logo' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Main Menu', 'fastbreak' ),
				'secondary-menu'  => __( 'Top - No stacking', 'fastbreak' ),
			)
		);
	}
endif;


/** #A2
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Classic Sixteen 1.0
 */
function fastbreak_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fastbreak_content_width', 766 );
}

/** #A3
 * Enqueues scripts and styles.
 *
 * @since Classic Sixteen 1.0
 */
function fastbreak_theme_enqueue_styles() {
	$ver = time();
	wp_enqueue_style( 
		'fastbreak-style', 
		get_stylesheet_uri() 
	);
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 
			'comment-reply' 
		);
	}

    wp_enqueue_script( 
		'fastbreak-menu', 
		get_template_directory_uri() . '/rels/fastbreak-menu.js', 
		array(), 
		$ver, 
		true 
	); 
/*
	wp_localize_script(
		'fastbreak-script',
		'screenReaderText',
		array(
			'expand'   => __( 'expand child menu', 'fastbreak' ),
			'collapse' => __( 'collapse child menu', 'fastbreak' ),
		)
	); */
}


/** #A5
 * Registers an editor stylesheet for the theme.
 *
 * @since 1.0.0
 */
function fastbreak_theme_add_editor_styles() {

    add_editor_style( 'editor-style.css' );
}

/**
 * Support for logo upload, output. 
 *
 * @since 1.0.1 
 */
function fastbreak_theme_custom_logo() {
    $output = '';

    if ( function_exists( 'the_custom_logo' ) ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo           = wp_get_attachment_image_src( $custom_logo_id , 'full' );

        if ( has_custom_logo() ) {
            $output = '<div class="header-logo"><img src="'. esc_url( $logo[0] ) .'" 
            alt="'. get_bloginfo( 'name' ) .'"></div>'; 
        } else { 
            $output = ''; 
        }
    }

        // Output sanitized in header to assure all html displays.
        return $output;
} 
/** #A4
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Classic Sixteen 1.0
 */
function fastbreak_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'fastbreak' ),
			'id'            => 'sidebar-first',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'fastbreak' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'fastbreak' ),
			'id'            => 'sidebar-last',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'fastbreak' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Section One', 'fastbreak' ),
			'id'            => 'footer-one',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'fastbreak' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Section Two', 'fastbreak' ),
			'id'            => 'footer-two',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'fastbreak' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
		array(
			'name'          => __( 'Footer Section Three', 'fastbreak' ),
			'id'            => 'footer-three',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'fastbreak' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

/** 
 * Customizer
 * suport footer background & text color
 * header background & color
 * page background & color
 */
require get_template_directory() . '/includes/fastbreak_wrap.php';
require get_template_directory() . '/includes/customizer.php';

/** #A5
 * Render advert image to header area
 */
function fastbreak_render_advert_image()
{
	$defimg = get_template_directory_uri() . '/rels/default-advert.jpg';
	$himg   = wp_get_attachment_url( get_theme_mod( 
		'fastbreak_advert_image' ) );
	if ( 0 != strlen($himg) ) {
		$url = '<img src="'.$himg.'" alt="banner" height=150>';
	} else {
		$url = '<img src="'. esc_url( $defimg ) . '" alt="banner" height=150>';
	}
	echo $url;
}


/** #A6
 * Render top strip text to header area
 */
function fastbreak_render_topstrip_html()
{
	$ttext = get_theme_mod( 'fastbreak_strip_title' );
	if ( 0 != strlen( $ttext ) ) {
		$text = wp_kses_post( $ttext );
	} else {
		$text = date_i18n( get_option( 'date_format' ), strtotime( 'now' ) );
	}
	echo $text;
}

/** #A7
 * Attachment link for featured images OR excerpt link with attachment image
 * Only use on single or home templates
 * 
 * @since 1.0
 * @param string $default_image URL of default image. 
 * @see https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 * @return HTML
 */

function fastbreak_render_attachment_link()
{
	$default_image = get_template_directory_uri() . '/rels/default-thumbnail.png';
    if ( is_singular() ) : ?>

	<figure class="linked-attachment-container">
		<?php if ( has_post_thumbnail() ) { ?>
		<a class="imgwrap-link"
		   href ="<?php echo esc_url( get_attachment_link( get_post_thumbnail_id() ) ); ?>" 
		   title="<?php the_title_attribute( 'before=Permalink to: &after=' ); ?>">
		<?php 
		the_post_thumbnail( 'fastbreak-featured', array( 
			'itemprop' => 'image', 
			'class'  => 'fastbreak-featured',
			'alt'  => get_attachment_link( get_post_thumbnail_id() )
			) 
		); ?></a>
		<?php 
		} ?>
	</figure>
	<?php  
	/* ends if single */ 
	else: ?>

		<figure class="linked-attachment-container">
		<?php 
		if ( has_post_thumbnail() ) { ?>

			<a class="imgwrap-link"	href ="<?php echo esc_url( get_permalink() ); ?>" 
			   title="<?php the_title_attribute( 'before=Permalink to: &after=' ); ?>">
			<?php 
			the_post_thumbnail( 'fastbreak-featured', array( 
				'itemprop' => 'image', 
				'class'  => 'fastbreak-featured',
				'alt'  => esc_attr( get_permalink() )
				) 
			); ?></a>
		<?php 
		} else { ?>
			<a class="imgwrap-link"	href ="<?php echo esc_url( get_permalink() ); ?>" 
			   title="<?php the_title_attribute( 'before=Permalink to: &after=' ); ?>">
			<img src="<?php echo esc_url( $default_image ); ?>" 
				 class="fastbreak-featured wp-post-image" 
				 alt="<?php the_title_attribute( 'before=Permalink to: &after=' ); ?>"/>
		    </a>
		<?php 
		} ?>
		</figure>
	<?php 
    endif; 
}

/** #A7
 * Attachment link for featured images
 *
 * @since 1.0
 * @return HTML
 */
function fastbreak_single_meta_footer_render(){
    ob_start();
	?>
    <aside class="after-content">
		<p class="after-cats"><span><small><?php esc_html_e('By: ', 'fastbreak'); ?></span> <em><?php the_author(); ?></em></small>
		| <span><small><?php esc_html_e('Categorized as: ', 'fastbreak'); ?></span> <em><?php the_category( ' &bull; ' ); ?></em></small>
		| <span><small><?php esc_html_e('Keys: ', 'fastbreak'); ?></span> <em><?php the_tags( ' ' ); ?></em></small>
		| <span><small><?php esc_html_e('Date: ', 'fastbreak'); ?></span> <em><?php the_date(); ?></em></small></p>
		

	</aside>
	<?php 
	echo ob_get_clean();
} 

/** #A9
 * Show prenav text if pagination
 * 
 * @since 1.0
 * @param string $prev_link Boolean
 * @param string $next_link Boolean
 */
function fastbreak_check_pagination_pre()
{
    $prev_link = get_previous_posts_link();
	$next_link = get_next_posts_link();
	
	if ( $next_link ) { 

	echo '<span class="prenav">' . esc_html__( 'More Pages', 'fastbreak' ) . '</span>';
	} 
	    elseif( $prev_link ) { 

	echo '<span class="prenav">' . esc_html__( 'No more entries for this page.', 'fastbreak' ) . '</span>';
	} 
	else {
		echo '';
	}
} 
