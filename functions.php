<?php
/**
 * Blank Theme functions and definitions
 *
 * @package Blank Theme
 */

if ( ! defined( 'BLANK_THEME_VERSION' ) ) {
	define( 'BLANK_THEME_VERSION', 1.0 );
}
if ( ! defined( 'BLANK_THEME_TEMP_URI' ) ) {
	define( 'BLANK_THEME_TEMP_URI', get_template_directory_uri() );
}
if ( ! defined( 'BLANK_THEME_TEMP_DIR' ) ) {
	define( 'BLANK_THEME_TEMP_DIR', get_template_directory() );
}
if ( ! defined( 'BLANK_THEME_CSS_URI' ) ) {
	define( 'BLANK_THEME_CSS_URI', BLANK_THEME_TEMP_URI . '/css' );
}
if ( ! defined( 'BLANK_THEME_JS_URI' ) ) {
	define( 'BLANK_THEME_JS_URI', BLANK_THEME_TEMP_URI . '/js' );
}
if ( ! defined( 'BLANK_THEME_IMG_URI' ) ) {
	define( 'BLANK_THEME_IMG_URI', BLANK_THEME_TEMP_URI . '/images' );
}
if ( ! defined( 'BLANK_THEME_IS_DEV' ) ) {
	define( 'BLANK_THEME_IS_DEV', true );
}

do_action( 'blank_theme_before' );

if ( ! function_exists( 'blank_theme_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blank_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blank Theme, use a find and replace
		 * to change 'blank-theme' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'blank-theme', BLANK_THEME_TEMP_DIR . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for custom logo.
		 */
		add_theme_support( 'custom-logo', array( 'header-text' => array( 'site-title', 'site-description' ) ) );

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
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'blank-theme' ),
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

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'blank_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-header', apply_filters( 'blank_theme_custom_header_args', array(
			'default-image'          => '',
			'default-text-color'     => '000000',
			'width'                  => 1000,
			'height'                 => 250,
			'flex-height'            => true,
			'wp-head-callback'       => 'blank_theme_header_style',
		) ) );

		add_editor_style( array( 'editor-style.css', blank_theme_main_font_url() ) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		do_action( 'blank_theme_after_setup_theme' );
	}
endif; // blank_theme_setup
add_action( 'after_setup_theme', 'blank_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blank_theme_content_width() {
	global $content_width;
	$content_width = apply_filters( 'blank_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'blank_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function blank_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blank-theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget widget-sidebar large-12 column %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'blank-theme' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget widget-footer column %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'					=> esc_html__( 'Pages', 'blank-theme' ),
		'id'						=> 'sidebar-widget-pages',
		'description'		=> 'sidebar containing widget area for widgets that display pages',
		'before_widget'	=> '<div id="%1$s" class="st-widget-pages large-3 column %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-pages-title">',
		'after_title'		=> '</h4>',
	) );
}
add_action( 'widgets_init', 'blank_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blank_theme_scripts() {
	/*==============================
	          GOOGLE FONTS
	===============================*/

	//wp_enqueue_style( 'google-font-opensanscondensed', blank_theme_main_font_url() );

	/*==============================
	          STYLES
	===============================*/

	wp_enqueue_style( 'blank-theme-style', get_stylesheet_uri() );

	/*==============================
	          SCRIPTS
	===============================*/

	// Add simpletheme scripts

	if ( BLANK_THEME_IS_DEV ) {
		//echo "<br>dev<br>";
		wp_register_script( 'blank-theme-nav', BLANK_THEME_JS_URI . '/vendor/navigation.js', array( 'jquery' ), BLANK_THEME_VERSION, true );
		wp_register_script( 'blank-theme-mmenu', BLANK_THEME_JS_URI . '/vendor/jquery.mmenu.min.all.js', array( 'jquery' ), BLANK_THEME_VERSION, true );
		wp_register_script( 'blank-theme-slick', BLANK_THEME_JS_URI . '/vendor/slick.js', array( 'jquery' ), BLANK_THEME_VERSION, true );
		wp_register_script( 'blank-theme-main', BLANK_THEME_JS_URI . '/main.js', array( 'jquery', 'blank-theme-nav', 'blank-theme-mmenu', 'blank-theme-slick' ), BLANK_THEME_VERSION, true );
	} else {
		//echo "<br>nonD<br>";
		wp_register_script( 'blank-theme-main', BLANK_THEME_JS_URI . '/main.min.js', array( 'jquery' ), BLANK_THEME_VERSION, true );
	}

	wp_enqueue_script( 'blank-theme-main' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'blank_theme_scripts' );


/*==============================
          FILE INCLUDES
===============================*/

$blank_theme_depedencies = apply_filters( 'blank_theme_depedencies', array(
	BLANK_THEME_TEMP_DIR . '/inc/*.php',
	BLANK_THEME_TEMP_DIR . '/admin/*.php',
));

foreach ( $blank_theme_depedencies as $path ) {
	foreach ( glob( $path ) as $filename ) {
		include $filename;
	}
}

do_action( 'blank_theme_after' );


//SimpleTheme Modifications
function simpletheme_scripts() {
	wp_enqueue_style( 'open-sans-style', 'https://fonts.googleapis.com/css?family=Open+Sans' );
}



class My_Widget extends WP_Widget {

    function __construct() {

        parent::__construct(
            'my-text',  // Base ID
            'Page Select'   // Name
        );

        add_action( 'widgets_init', function() {
            register_widget( 'My_Widget' );
        });

    }

    public function widget( $args, $instance ) {

				echo $args['before_widget'];

				$page_args = array(
					'p'	=> $instance['page_id'],
					'post_type'	=> 'page'
				);

				global $post;

				$page = new WP_Query( $page_args );
				$page->the_post();

			?>

				<?php echo get_the_post_thumbnail( $instance['page_id'], array( 99, 99 ), array( 'class' => 'st-widget-post-image')); ?>
				<h2 class="st-widget-post-title">
					<?php the_title(); ?>
				</h2>
				<p class="st-widget-post-content">
					<?php echo wp_kses_post( wp_trim_words( get_the_content(), 15 ) ); ?>
				</p>
				<a class="st-widget-post-readmore" href="<?php echo the_guid(); ?>"><?php _e( 'Read More', 'blank-theme' ) ?></a>

			<?php

				echo $args['after_widget'];

    }

    public function form( $instance ) {

        $page_id = ! empty( $instance['page_id'] ) ? $instance['page_id'] : esc_html__( '', 'blank-theme' );
        ?>

				<?php

					$args = array(
						'include' => array( 40, 42, 44, 47 ),
						'post_type' => 'page',
						'post_status' => 'publish'
					);

					$pages = get_pages( $args );

				?>

				<select id="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page_id' ) ); ?>">

					<?php	foreach ( $pages as $page ) { ?>
			 				<option <?php selected( $page_id, $page->ID ); ?> value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
					<?php	} ?>

				</select>

        <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['page_id'] = ( !empty( $new_instance['page_id'] ) ) ? strip_tags( $new_instance['page_id'] ) : '';

        return $instance;
    }

}

add_action( 'widgets_init', function() { register_widget( 'My_Widget' ); } );
