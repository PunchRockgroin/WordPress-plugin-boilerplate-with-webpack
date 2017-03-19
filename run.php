<?php

namespace wppb;

use wppb\activate;
use wppb\deactivate;
use wppb\plugin;

/**
 * The plugin bootstrap file
 *
 *
 * @link              https://www.bobz.co
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       WP Plugin Boilerplate
 * Plugin URI:        https://github.com/Bobz-zg/WordPress-plugin-boilerplate-with-webpack
 * Description:       WP Plugin Boilerplate with webpack build script and php namespacing
 * Version:           1.0.0
 * Author:            Vlado Bosnjak
 * Author URI:        https://www.bobz.co
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
 * Base plugin Path and URI
 */
define( 'PLUGIN_URI', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-activator.php
 */
function activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
	wppb\activate\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-deactivator.php
 */
function deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deactivator.php';
	wppb\deactivate\Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-assets.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-init.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run() {

	$plugin = new plugin\Plugin_Init();
	$plugin->run();

}
run();
