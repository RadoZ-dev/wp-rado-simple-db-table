<?php
/*
Plugin Name: WP Rado Simple DB Table
Plugin URI: https://github.com/RadoZ-dev/wp-rado-simple-db-table
Description: Creates a database table and shortcode with a simple form to add data to the table.
Version: 0.1.0
Author: Radoslav Zdravkovic
Author URI: https://github.com/RadoZ-dev
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

use SimpleDbTable\PluginInit;

define ( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once( PLUGIN_DIR_PATH . 'vendor/autoload.php' );

require 'rest-api-extension.php';

PluginInit::getInstance();