<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Zorbix_Helper
 * @subpackage Zorbix_Helper/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Zorbix_Helper
 * @subpackage Zorbix_Helper/includes
 * @author     Your Name <email@example.com>
 */
class Zorbix_Helper {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Zorbix_Helper_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'plugin-name';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Zorbix_Helper_Loader. Orchestrates the hooks of the plugin.
	 * - Zorbix_Helper_i18n. Defines internationalization functionality.
	 * - Zorbix_Helper_Admin. Defines all hooks for the dashboard.
	 * - Zorbix_Helper_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-name-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-plugin-name-public.php';

		$this->loader = new Zorbix_Helper_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Zorbix_Helper_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Zorbix_Helper_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Zorbix_Helper_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Zorbix_Helper_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Zorbix_Helper_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

		public function reduce_my_array($array, $value) {
    // look for location of $value in $array
			$offset=array_search($value, $array);

    // if not found return original
			if($offset===false) return $array;

    // remove from the found offset to the end of the array
			return array_splice($array, $offset);
		}

function zorbix_str_contains ($haystack, $needle) {
		if( strpos($haystack , $needle) !== false ) {
			return true;
		}
	}


	public function globals_checker() {
		$first_function = 'zorbix_remove_more_tag_link_jump';

		$output = "<h1>Custom Variables</h1><ul>";

		$var_array = array_merge(array(), $GLOBALS);
		# Unset what we don't cate about
		unset($var_array['tgmpa']);
		unset($var_array['post']);
		unset($var_array['content_width']);
		unset($var_array['_wp_registered_nav_menus']);
		unset($var_array['_wp_additional_image_sizes']);
		unset($var_array['editor_styles']);
		unset($var_array['first_function']);
		unset($var_array['Zorbix_Helper']);

		$var_array = $this->reduce_my_array( array_keys($var_array), 'zorbix_preset_main_colors');
		$i = 0;


		foreach($var_array as $key => $value) {
			if( !$this->zorbix_str_contains($value, 'zorbix_') && !$this->zorbix_str_contains($value, 'vp_') ) {
				$output .= "<li>$value</li>";
				$i++;
			}
		}
		$output .= "<h2>$i</h2></ul>";

		$arr = get_defined_functions();
		$array = $this->reduce_my_array($arr['user'], 'zorbix_remove_more_tag_link_jump');
		// $array = $arr;
		$output .= "<h1>Custom Functions</h1><ul>";
		$e = 0;
		foreach($array as $key => $value) {
			if(  !$this->zorbix_str_contains($value, 'zorbix_') && !$this->zorbix_str_contains($value, 'vp_') && !$this->zorbix_str_contains($value, 'tgmpa') && !$this->zorbix_str_contains($value, 'reduce_my_array')  ) {
				$output .= "<li>$value</li>";
				$e++;
			}
		}
		$output .= "<h2>$e</h2></ul>";

		echo ( $i > 0 || $e > 0 ) ? $output : '';
	}


}
