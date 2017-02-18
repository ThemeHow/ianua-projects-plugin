<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ianua.imagewize.com
 * @since             1.0.0
 * @package           Ianua_Projects
 *
 * @wordpress-plugin
 * Plugin Name:       Ianua Projects
 * Plugin URI:        https://ianua.imagewize.com/ianua-projects/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Imagewize
 * Author URI:        https://magewize.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ianua-projects
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ianua-projects-activator.php
 */
function activate_Ianua_Projects() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ianua-projects-activator.php';
	Ianua_Projects_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ianua-projects-deactivator.php
 */
function deactivate_Ianua_Projects() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ianua-projects-deactivator.php';
	Ianua_Projects_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Ianua_Projects' );
register_deactivation_hook( __FILE__, 'deactivate_Ianua_Projects' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ianua-projects.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Ianua_Projects() {

	$plugin = new Ianua_Projects();
	$plugin->run();

}
run_Ianua_Projects();
