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


function wprado_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'simple_db_table';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id int(11) NOT NULL AUTO_INCREMENT,
        data varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

register_activation_hook( __FILE__, 'wprado_create_table' );

function wprado_form_shortcode() {
    ob_start();
    include 'form-template.php';
    return ob_get_clean();
}

add_shortcode( 'wprado_form', 'wprado_form_shortcode' );

require 'rest-api-extension.php';