<?php
/**
 * Plugin Name: JetEngine - Forms - related posts as options
 * Plugin URI:
 * Description:
 * Version:     1.0.0
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

add_action( 'plugins_loaded', 'jet_engine_frlp' );

function jet_engine_frlp() {

	define( 'JET_FRLP__FILE__', __FILE__ );
	define( 'JET_FRLP_PLUGIN_BASE', plugin_basename( JET_FRLP__FILE__ ) );
	define( 'JET_FRLP_PATH', plugin_dir_path( JET_FRLP__FILE__ ) );

	add_filter( 'jet-engine/forms/options-generators', function( $instances ) {
		require JET_FRLP_PATH . 'generator.php';
		$instances[] = new JET_FRLP_Generator();
		return $instances;
	} );

}
