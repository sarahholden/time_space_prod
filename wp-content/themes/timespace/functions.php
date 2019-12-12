<?php
/**
 * sh_template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sh_template
 */

if ( ! function_exists( 'sh_template_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sh_template_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sh_template, use a find and replace
		 * to change 'sh_template' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sh_template', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-nav' => esc_html__( 'Header Nav' ),
			'footer-nav' => esc_html__( 'Footer Nav' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'sh_template_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'sh_template_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sh_template_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'sh_template_content_width', 640 );
}
add_action( 'after_setup_theme', 'sh_template_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sh_template_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sh_template' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sh_template' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sh_template_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sh_template_scripts() {

	wp_enqueue_style( 'typekit', '//use.typekit.net/sov8qsd.css', array(), '1.0.0' );

	$ver = time();

	wp_enqueue_style('sh-style', get_template_directory_uri() . '/style.php/style.scss', array(), $ver);
	wp_enqueue_style( 'sh-swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/css/swiper.min.css' );
	wp_enqueue_style( 'sh-jquery-ui-css', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css' );

	wp_enqueue_script( 'sh-jquery', 'https://code.jquery.com/jquery-3.4.1.min.js' );
	wp_enqueue_script( 'sh-jquery-ui-js', 'https://code.jquery.com/ui/1.12.0/jquery-ui.min.js' );
	wp_enqueue_script( 'sh-jquery-ui-touch', '//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js' );
	wp_enqueue_script( 'sh-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '20151215', true );
	wp_enqueue_script( 'sh-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/jquery.gsap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'sh-tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js', array(), '20151215', true );
	wp_enqueue_script( 'sh-scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array(), '20151215', true );
	wp_enqueue_script( 'sh-sm-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js', array(), '20151215', true );
	wp_enqueue_script( 'sh-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array(), '20151215', true );
	wp_enqueue_script( 'sh-lazy', 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js', array(), '20151215', true );
	wp_enqueue_script( 'sh-swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/js/swiper.min.js', array(), '20151215', true );
	wp_enqueue_script( 'sh-theme', get_template_directory_uri() . '/js/theme.js', array(), $ver, true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sh_template_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Options Pages
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Instagram Settings',
	// 	'menu_title'	=> 'Instagram',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Analytics Settings',
	// 	'menu_title'	=> 'Analytics',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Google Maps Settings',
	// 	'menu_title'	=> 'Google Maps',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
}

// ONLY show Custom Fields options, replace textarea
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  $home = get_the_title($post_id);
  //$contact = get_the_title($post_id);
  if($home == 'Home' || $contact == 'Contact'){
    remove_post_type_support('page', 'editor');
  }
}

add_action( 'init', function() {
remove_post_type_support( 'post', 'editor' );
remove_post_type_support( 'page', 'editor' );
}, 99);


// function my_acf_google_map_api( $api ){
//     $api['key'] = 'AIzaSyCAKwFsBkDZ_NM__i-Jst1y4nCpcG_dLts';
//     return $api;
// }
// add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
//


/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 */

function acf_responsive_image($image_id){

	// check the image ID is not blank
	if ($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, 'large' );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, 'full_size' );

		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'"';

	}
}




/* ADD CUSTOM IMAGE SIZES FOR POST FEATURED IMAGE
================================================== */

add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'aw_custom_add_image_sizes' );
function aw_custom_add_image_sizes() {
    add_image_size( 'xs', 500, 9999 ); // 500 wide unlimited height
    add_image_size( 'small', 768, 9999 ); // 768 wide unlimited height
    add_image_size( 'medium-small', 1050, 9999 ); // 1050px wide unlimited height
    add_image_size( 'xl', 1400, 9999 ); // 1400 wide unlimited height
    add_image_size( 'full_size', 2800, 9999 ); // 2800 wide unlimited height

}

add_filter( 'image_size_names_choose', 'aw_custom_add_image_size_names' );
function aw_custom_add_image_size_names( $sizes ) {
  return array_merge( $sizes, array(
    'xs' => __( 'Extra Small' ),
    'small' => __( 'Small' ),
    'medium-small' => __( 'Medium Small' ),
    'xl' => __( 'Extra Large' ),
    'full_size' => __( 'Full Size' ),
  ) );
}

/* PAGINATION
================================================== */
// if ( ! function_exists( 'my_pagination' ) ) :
//     function my_pagination() {
//         global $wp_query;
//
//         $big = 999999999; // need an unlikely integer
//
//         echo paginate_links( array(
//             'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
//             'format' => '?paged=%#%',
//             'current' => max( 1, get_query_var('paged') ),
//             'total' => $wp_query->max_num_pages,
// 						'next_text' => (''),
//     				'prev_text' => (''),
//         ) );
//     }
// endif;
