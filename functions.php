<?php
/**
 * Avada Media functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Avada_Media
 */

require_once('inc/kernel.php');

if ( ! function_exists( 'avada_media_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function avada_media_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Avada Media, use a find and replace
		 * to change 'avada-media' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'avada-media', get_template_directory() . '/languages' );

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
		add_theme_support( 'custom-background', apply_filters( 'avada_media_custom_background_args', array(
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
add_action( 'after_setup_theme', 'avada_media_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avada_media_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'avada_media_content_width', 640 );
}
add_action( 'after_setup_theme', 'avada_media_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function avada_media_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Menu Widget 1', 'avada-media' ),
// 		'id'            => 'menu-widget-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'avada-media' ),
// 		'before_widget' => '<ul class="toggleMenu">',
// 		'after_widget'  => '</ul>',
// 		'before_title'  => '<span class="toggle">',
// 		'after_title'   => '</span>',
// 	) );
// }
// add_action( 'widgets_init', 'avada_media_widgets_init' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => esc_html__( 'Primary', 'avada-media' ),
	'secondary' => esc_html__( 'Secondary', 'avada-media' ),
	'trinity' => esc_html__( 'Trinity', 'avada-media' ),
	'four' => esc_html__( 'Four', 'avada-media' ),
	'fivefold' => esc_html__( 'Fivefold', 'avada-media' ),
) );

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
 * Post types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Post taxonomies
 */
require get_template_directory() . '/inc/post-taxonomies.php';

add_action(
    'intermediate_image_sizes_advanced',
    'wpse162413_unset_sizes_if_gif'
);
function wpse162413_unset_sizes_if_gif( $sizes ) {
    // we're only having the sizes available
    // we're using debug_backtrace to get additional information
    $dbg_back = debug_backtrace();
    // scan $dbg_back array for function and get $args
    foreach ( $dbg_back as $sub ) {
        if ( $sub[ 'function'] == 'wp_generate_attachment_metadata' ) {
            $args = $sub[ 'args' ];
        }
    }
    // attachment id
    $att_id       = $args[0];
    // attachment path
    $att_path     = $args[1];
    // split up file information
    $pathinfo = pathinfo( $att_path );
    // if extension is gif unset sizes
    if ( $pathinfo[ 'extension' ] == 'gif' ) {
        // get all intermediate sizes
        $intermediate_image_sizes = get_intermediate_image_sizes();
        // loop trough the intermediate sizes array
        foreach ( $intermediate_image_sizes as $size ) {
            // unset the size in the sizes array
            unset( $sizes[ $size ] );
        }
    }
    // return sizes
    return $sizes;
}

function my_wp_is_mobile() {
    static $is_mobile;

    if ( isset($is_mobile) )
        return $is_mobile;

    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}
function JSConsoleLog($string){
    add_action('wp_footer', function() use ($string){
        ?>
        <script>
            console.log('<?=$string?>');
        </script>
        <?php
    });
}
function isAppleDevice(){
    return strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad') || strpos( $_SERVER['HTTP_USER_AGENT'], 'Safari');
}
function webPMagic($img){

    if(isAppleDevice()){
        return $img;
    }
    $src_parts = explode('/', $img);
    $file_name = end($src_parts);
    $upload_dir = wp_get_upload_dir();
    $site_url = get_site_url();
    $img_dir = ABSPATH.str_replace([$site_url.'/'], [''], $img);
    JSConsoleLog($img_dir);
    $webp_dir = $upload_dir['basedir'].'/webp';
    JSConsoleLog($img_dir);
    if(!is_dir($webp_dir)){
        mkdir($webp_dir);
    }

    $file_name_parts = explode('.', $file_name);
    $file_n = $file_name_parts[0].md5_file($img_dir);
    $file_ext = end($file_name_parts);

    if($file_ext == 'gif'){
        if(!wp_is_mobile()){
            return $img;
        }
    }

    if(!file_exists($webp_dir.'/'.$file_n.".webp")){
        $i = null;

        if($file_ext == 'jpg' || $file_ext == 'jpeg'){
            $i = imagecreatefromjpeg($img_dir);
            imagewebp($i, $webp_dir.'/'.$file_n.".webp");
            imagedestroy($i);
        }
        else if($file_ext == 'png'){
            $i= imagecreatefrompng($img_dir);
            imagewebp($i, $webp_dir.'/'.$file_n.".webp");
            imagedestroy($i);
        }
        else if($file_ext == 'gif'){
            if(!wp_is_mobile()){
                return $img;
            }
            else{
                $i= imagecreatefromgif($img_dir);
                imagewebp($i, $webp_dir.'/'.$file_n.".webp");
                imagedestroy($i);
            }
        }
        JSConsoleLog($file_ext);
    }
    return $upload_dir['baseurl'].'/webp/'.$file_n.".webp";
}

class ACFThemeCacher{
    private static $instance;

    private $cachedFields = [];

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new ACFThemeCacher();
            self::$instance->cachedFields = get_fields();
        }
        return self::$instance;
    }

    public function get($serializedArguments)
    {
        return $this->cachedFields[$serializedArguments];
    }

    public function exists($serializedArguments)
    {
        if (!array_key_exists($serializedArguments, $this->cachedFields)) {
            return false;
        }

        return true;
    }

    public function add($serializedArguments, $fieldValue)
    {
        $this->cachedFields[$serializedArguments] = $fieldValue;
    }
}
function get_cache_field($fieldName, $postId = false, $formatValue = true){
    // Get an instance of Cache class.
    $cache = ACFThemeCacher::getInstance();

    // Get valid post ID using acf core function
    $validPostId = acf_get_valid_post_id($postId);

    // Serialize function arguments. I can't simply 'use serialize(func_get_args())' because of $postId which if not passed as an argument defaults to current $post->ID
    $serializedArguments = serialize([$fieldName, $validPostId, $formatValue]);

    // Check if the value is already cached and return the cached value if the condition is evaluates to <code>true</code>
    if ($cache->exists($serializedArguments)) {
        return $cache->get($serializedArguments);
    }

    // Otherwise use get_field() function to retrieve the vale
    $fieldValue = get_field($fieldName, $validPostId, $formatValue);

    // Save the value to cache
    $cache->add($serializedArguments, $fieldValue);

    // And return the value
    return $fieldValue;
}

require_once 'inc/kubster.php';