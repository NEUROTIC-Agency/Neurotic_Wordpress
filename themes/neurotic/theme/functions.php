<?php

/**
 * Neurotic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Neurotic
 */

if (!defined('NEUROTIC_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('NEUROTIC_VERSION', '0.1.0');
}

if (!defined('NEUROTIC_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `neurotic_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'NEUROTIC_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (!function_exists('neurotic_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function neurotic_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Neurotic, use a find and replace
		 * to change 'neurotic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('neurotic', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'neurotic'),
				'menu-2' => __('Footer Menu', 'neurotic'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'neurotic_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function neurotic_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'neurotic'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'neurotic'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'neurotic_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function neurotic_scripts()
{
	wp_enqueue_style('neurotic-style', get_stylesheet_uri(), array(), NEUROTIC_VERSION);
	wp_enqueue_script('neurotic-script', get_template_directory_uri() . '/js/script.min.js', array(), NEUROTIC_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'neurotic_scripts');

/**
 * Enqueue the block editor script.
 */
function neurotic_enqueue_block_editor_script()
{
	wp_enqueue_script(
		'neurotic-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		NEUROTIC_VERSION,
		true
	);
}
add_action('enqueue_block_editor_assets', 'neurotic_enqueue_block_editor_script');

/**
 * Create a JavaScript array containing the Tailwind Typography classes from
 * NEUROTIC_TYPOGRAPHY_CLASSES for use when adding Tailwind Typography support
 * to the block editor.
 */
function neurotic_admin_scripts()
{
?>
	<script>
		tailwindTypographyClasses = '<?php echo esc_attr(NEUROTIC_TYPOGRAPHY_CLASSES); ?>'.split(' ');
	</script>
<?php
}
add_action('admin_print_scripts', 'neurotic_admin_scripts');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function neurotic_tinymce_add_class($settings)
{
	$settings['body_class'] = NEUROTIC_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'neurotic_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

// Register services

function register_service_post_type()
{
	$labels = array(
		'name' => 'Services',
		'singular_name' => 'Service',
		'add_new_item' => 'Add New Service',
		'attributes' => 'Service attributes',
		'edit_item' => 'Edit Service',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
	);

	register_post_type('service', $args);
}
add_action('init', 'register_service_post_type');

// Register brands

// function register_brand_post_type()
// {
// 	$labels = array(
// 		'name' => 'Brands',
// 		'singular_name' => 'Brand'
// 	);

// 	$args = array(
// 		'labels' => array(
// 			'name' => 'Brands',
// 			'add_new_item' => 'Add New Brand',
// 			'attributes' => 'Brand attributes',
// 			'edit_item' => 'Edit Brand',
// 		),
// 		'public' => true,
// 		'has_archive' => false,
// 		'publicly_queryable' => false,
// 		'supports' => array('title', 'thumbnail', 'excerpt', 'page-attributes'),
// 	);

// 	register_post_type('brand', $args);
// }
// add_action('init', 'register_brand_post_type');

// Register reviews

function register_review_post_type()
{
	$labels = array(
		'name' => 'Reviews',
		'singular_name' => 'Review'
	);

	$args = array(
		'labels' => array(
			'name' => 'Reviews',
			'add_new_item' => 'Add New Review',
			'attributes' => 'Review attributes',
			'edit_item' => 'Edit Review',
		),
		'public' => true,
		'has_archive' => false,
		'publicly_queryable' => false,
		'supports' => array('title', 'thumbnail', 'excerpt', 'page-attributes'),
	);

	register_post_type('review', $args);
}
add_action('init', 'register_review_post_type');

// Register techs

function register_tech_post_type()
{
	$labels = array(
		'name' => 'Tech',
		'singular_name' => 'Tech',
		'add_new_item' => 'Add New Tech',
		'attributes' => 'Tech attributes',
		'edit_item' => 'Edit Tech',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
	);

	register_post_type('tech', $args);
}
add_action('init', 'register_tech_post_type');

// Register knowledges

function register_knowledge_post_type()
{
	$labels = array(
		'name' => 'Knowledges',
		'singular_name' => 'Knowledge',
		'add_new_item' => 'Add New Knowledge',
		'attributes' => 'Knowledge attributes',
		'edit_item' => 'Edit Knowledge',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
		'rewrite' => array(
			'slug' => 'learn',
		),
		'search_fields' => array('post_title', 'post_content', 'post_excerpt'),
	);

	register_post_type('knowledge', $args);
}
add_action('init', 'register_knowledge_post_type');

// Register clients

function register_client_post_type()
{
	$labels = array(
		'name' => 'Clients',
		'singular_name' => 'Client',
		'add_new_item' => 'Add New Client',
		'attributes' => 'Client attributes',
		'edit_item' => 'Edit Client',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
		'rewrite' => array(
			'slug' => 'client',
		),
	);

	register_post_type('client', $args);
}
add_action('init', 'register_client_post_type');


// Add excerpt to pages
function add_excerpt_to_pages()
{
	add_post_type_support('page', 'excerpt');
}
add_action('init', 'add_excerpt_to_pages');
