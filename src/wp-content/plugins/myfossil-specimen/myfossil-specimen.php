<?php
namespace myFOSSIL\Plugin\Specimen;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin Dashboard. This file also includes all of the dependencies used by
 * the plugin, registers the activation and deactivation functions, and defines
 * a function that starts the plugin.
 *
 * @link              http://atmoapps.com
 * @since             0.0.1
 * @package           myFOSSIL_Specimen
 *
 * @wordpress-plugin
 * Plugin Name:       myFOSSIL Specimen
 * Plugin URI:        http://atmoapps.com/
 * Description:       Adds fossil management and PBDB functionality
 * Version:           0.0.1
 * Author:            AtmoApps
 * Author URI:        http://atmoapps.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       myfossil-specimen
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-myfossil-specimen-activator.php';

/**
 * The code that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-myfossil-specimen-deactivator.php';

/** This action is documented in includes/class-myfossil-specimen-activator.php */
register_activation_hook( __FILE__, array( 'myFOSSIL_Specimen_Activator', 'activate' ) );

/** This action is documented in includes/class-myfossil-specimen-deactivator.php */
register_deactivation_hook( __FILE__, array( 'myFOSSIL_Specimen_Deactivator', 'deactivate' ) );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-myfossil-specimen.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
function run_myfossil_specimen() {

	$plugin = new myFOSSIL_Specimen();
	$plugin->run();

}
run_myfossil_specimen();
