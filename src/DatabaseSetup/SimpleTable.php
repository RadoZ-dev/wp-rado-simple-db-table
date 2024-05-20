<?php 

namespace SimpleDbTable\DatabaseSetup;

use SimpleDbTable\Helpers\SingletonTrait;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

class SimpleTable
{
    use SingletonTrait;

    public function __construct()
    {
        register_activation_hook( PLUGIN_DIR_PATH . '/wp-rado-simple-db-table.php', [ $this, 'wprado_create_table' ] );
    }

    public function wprado_create_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'simple_db_table';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id int(11) NOT NULL AUTO_INCREMENT,
            data varchar(255) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        include_once ABSPATH . 'wp-admin/includes/upgrade.php';
        
        dbDelta( $sql );
    }
}
