<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Zorbix_Helper
 *
 * @wordpress-plugin
 * Plugin Name:       Zorbix Dev Helper
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-activator.php';

/**
 * The code that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';

/** This action is documented in includes/class-plugin-name-activator.php */
register_activation_hook( __FILE__, array( 'Zorbix_Helper_Activator', 'activate' ) );

/** This action is documented in includes/class-plugin-name-deactivator.php */
register_deactivation_hook( __FILE__, array( 'Zorbix_Helper_Deactivator', 'deactivate' ) );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Zorbix_Helper();
	$plugin->run();

}

function zorbix_livereload() {
	echo '<script src="http://192.168.1.20:35729/livereload.js?snipver=1"></script>';
	write_log('test');
}
// add_action( 'admin_head', 'zorbix_livereload', 20 );



# Uncomment for Logging capabilities
if (!function_exists('write_log')) {
	function write_log ( $log )  {
		if ( true === WP_DEBUG ) {
			if ( is_array( $log ) || is_object( $log ) ) {
				error_log( print_r( $log, true ) );
			} else {
				error_log( $log );
			}
		}
	}
}


function reduce_my_array($array, $value) {
    // look for location of $value in $array
	$offset=array_search($value, $array);

    // if not found return original
	if($offset===false) return $array;

    // remove from the found offset to the end of the array
	return array_splice($array, $offset);
}

if( !function_exists('zorbix_str_contains') ) {
	function zorbix_str_contains ($haystack, $needle) {
		if( strpos($haystack , $needle) !== false ) {
			return true;
		}
	}
}

write_log('Loading');

add_action( 'wp_footer', 'wpse69369_special_thingy' );
// add_action( 'admin_footer', 'wpse69369_special_thingy' );
function wpse69369_special_thingy() {
	zbx_globals_checker();
	write_log('???');
}
/*
	 * INSTRUCTINS: At the top put `$zbx_first_var = 'adfasd'`;
	 * At the bottom of functions.php put zbx_globals_checker
	 */
function zbx_globals_checker() {



	write_log( 'test' );
	$first_function = 'zbx_load_theme_textdomain';

	if ( !function_exists( $first_function ) ) {
		echo '<p><strong>first function not found</strong></p>';
	}

	$first_var = 'zbx_first_var';

	if ( !isset( $first_var ) ) {
		echo '<p><strong>First var not found</strong></p>';
	}

	$output = "<h1>Custom Variables</h1><ul>";

	$var_array = array_merge(array(), $GLOBALS);
		# Unset what variables we don't cate about
	unset($var_array['tgmpa']);
	unset($var_array['post']);
	unset($var_array['content_width']);
	unset($var_array['_wp_registered_nav_menus']);
	unset($var_array['_wp_additional_image_sizes']);
	unset($var_array['editor_styles']);
	unset($var_array['first_function']);
	unset($var_array['Zorbix_Helper']);
	unset($var_array['Zorbix_Helper']);
	unset($var_array['vpfs']);

	$unset_array = array( );

	$unset_array = array(
		'zbx_first_var', 'kirki', 'current_user', 'user_login', 'userdata', 'user_level', 'user_ID', 'user_email', 'user_url', 'user_identity', 'sidebars_widgets', 'wpsmiliestrans', 'wp_smiliessearch', 'custom_image_header', 'custom_background', 'wp_header_to_desc', 'error', 'm', 'p', 'post_parent', 'subpost', 'subpost_id', 'attachment', 'attachment_id', 'name', 'static', 'pagename', 'page_id', 'second', 'minute', 'hour', 'day', 'monthnum', 'year', 'w', 'category_name', 'tag', 'cat', 'tag_id', 'author', 'author_name', 'feed', 'tb', 'paged', 'comments_popup', 'meta_key', 'meta_value', 'preview', 's', 'sentence', 'fields', 'menu_order', 'category__in', 'category__not_in', 'category__and', 'post__in', 'post__not_in', 'tag__in', 'tag__not_in', 'tag__and', 'tag_slug__in', 'tag_slug__and', 'post_parent__in', 'post_parent__not_in', 'author__in', 'author__not_in', 'ignore_sticky_posts', 'suppress_filters', 'cache_results', 'update_post_term_cache', 'update_post_meta_cache', 'post_type', 'posts_per_page', 'nopaging', 'comments_per_page', 'no_found_rows', 'order', 'query_string', 'posts', 'request', 'more', 'single', 'wp_admin_bar', 'show_admin_bar', 'wp_scripts', 'wp_styles', 'template', 'id', 'comment', 'wp_cockneyreplace', 'page', 'wp_customize', '_wp_admin_css_colors', 'concatenate_scripts', 'compress_scripts', 'compress_css', 'authordata', 'currentday', 'currentmonth', 'pages', 'multipage', 'numpages', '_menu_item_sort_prop',
		'_GET', '_POST', '_COOKIE', '_FILES', 'wp_did_header', '_SERVER', 'table_prefix', 'GLOBALS', '_REQUEST', '_ENV', 'wp_version', 'wp_db_version', 'tinymce_version', 'required_php_version', 'required_mysql_version', 'blog_id', 'PHP_SELF', 'timestart', 'wp_filter', 'wp_actions', 'merged_filters', 'wp_current_filter', 'wpdb', '_wp_using_ext_object_cache', 'wp_object_cache', 'allowedposttags', 'allowedtags', 'allowedentitynames', 'current_site', 'shortcode_tags', 'wp_embed', 'wp_registered_sidebars', 'wp_registered_widgets', 'wp_registered_widget_controls', 'wp_registered_widget_updates', '_wp_sidebars_widgets', '_wp_deprecated_widgets_callbacks', 'wp_plugin_paths', 'pagenow', 'is_lynx', 'is_gecko', 'is_winIE', 'is_macIE', 'is_opera', 'is_NS4', 'is_safari', 'is_chrome', 'is_iphone', 'is_IE', 'is_apache', 'is_IIS', 'is_iis7', 'is_nginx', 'wp_rewrite', 'wp_taxonomies', 'wp', 'l10n', '_wp_theme_features', 'wp_post_types', '_wp_post_type_features', 'wp_post_statuses', 'wp_theme_directories', 'locale', 'wp_local_package', 'wp_the_query', 'wp_query', 'wp_widget_factory', 'wp_user_roles', 'wp_roles', 'weekday', 'weekday_initial', 'weekday_abbrev', 'month', 'month_abbrev', 'wp_locale',
		'ot_loader', '_debugger_extensions'
		);
foreach ($unset_array as $value) {
	unset($var_array[$value]);	
}

$var_array = reduce_my_array( array_keys($var_array), $first_var);

$i = 0;

	 /*
	 	// DO NOT REMOVE -Makes array for generating $unset array
	  echo 'array(';
		foreach($var_array as $key => $value) {
			echo "'$value', ";
		}
		echo ')';
	*/

$output .= "First var set to <strong>$$first_var</strong>";
foreach($var_array as $key => $value) {
	if(  !zorbix_str_contains($value, 'zorbix_') && !zorbix_str_contains($value, 'vp_') && !zorbix_str_contains($value, 'zbx_')) {
		$output .= "<li>var: $$value</li>";
		$i++;
	}
}
$output .= "<h2>$i</h2></ul>";


$arr = get_defined_functions();
$array = reduce_my_array($arr['user'], $first_function);

		// $array = $arr;
$output .= "<h1>Custom Functions</h1><ul>";
$output .= 'First function set to <strong>' . $first_function . '</strong>';
$e = 0;

$function_contains_array = array( 'ot_', 'load_tgm_plugin_activation', 'zorbix_',  'vp_', 'tgmpa', 'zbx_', 'option_tree');

foreach($array as $key => $value) {


	if ( !contains($value, $function_contains_array ) ) {
		$output .= "<li>$value</li>";
		$e++;
	}
	
	// if(  !zorbix_str_contains($value, '') && !zorbix_str_contains($value, 'zorbix_') && !zorbix_str_contains($value, 'vp_') && !zorbix_str_contains($value, 'tgmpa') && !zorbix_str_contains($value, 'reduce_my_array') && !zorbix_str_contains($value, 'zbx_')  ) {
	// 	$output .= "<li>$value</li>";
	// 	$e++;
	// }
}
$output .= "<h2>$e</h2></ul>";

echo ( $i > 0 || $e > 0 ) ? $output : '';
}


function contains($str, array $arr)
{
	foreach($arr as $a) {
		if (stripos($str,$a) !== false) return true;
	}
	return false;
}
run_plugin_name();
