<?php
/*
Plugin Name: WP Rado Simple DB Table
Plugin URI: https://github.com/RadoZ-dev/wp-rado-simple-db-table
Description: Creates a database table and shortcode with a simple form to add data to the table.
Version: 0.1.0
Text Domain: wp-rado-simple-db-table
Author: Radoslav Zdravkovic
Author URI: https://github.com/RadoZ-dev
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} 

use SimpleDbTable\PluginInit;

define ( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define ( 'PLUGIN_SLUG', 'wp-rado-simple-db-table' );

require_once( PLUGIN_DIR_PATH . 'vendor/autoload.php' );
require 'rest-api-extension.php';

add_action( 'plugins_loaded', function () {
    PluginInit::getInstance();
} );

load_plugin_textdomain( PLUGIN_SLUG, false, basename( dirname( __FILE__ ) ) . '/languages' );