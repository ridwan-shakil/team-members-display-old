<?php
/**
 * @link              https://github.com/ridwan-shakil
 * @since             1.0.0
 * @package           Team_Members_Display
 *
 * @wordpress-plugin
 * Plugin Name:       Team members display
 * Plugin URI:        https://#
 * Description:       This plugin adds a Team member CPT that allows you to create teams and add members to those teams. This plugin also adds a settings section where you can customize team members' design.
 * Version:           1.0.0
 * Author:            MD.Ridwan
 * Author URI:        https://github.com/ridwan-shakil
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       team-members-display
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TEAM_MEMBERS_DISPLAY_VERSION', '1.0.0' );

// defining plugin path.
if ( ! defined( 'TEAM_PLUGIN_DIR_PATH' ) ) {
	define( 'TEAM_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'TEAM_PLUGIN_URL' ) ) {
	define( 'TEAM_PLUGIN_URL', plugins_url() . '/team-members-display ' );
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-team-members-display.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_team_members_display() {

	$plugin = new Team_Members_Display();
	$plugin->run();
}
run_team_members_display();
