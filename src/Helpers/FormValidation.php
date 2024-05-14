<?php

namespace SimpleDbTable\Helpers;

class FormValidation
{
public static function validate( string $postField, string $nonceAction, string $nonceField, string $dbTable )
{
    if ( isset( $_POST[ $postField ] ) && wp_verify_nonce( $_POST[ $nonceField ], $nonceAction ) ) 
    {
        global $wpdb;
        $table_name = $wpdb->prefix . $dbTable;
        $data = sanitize_text_field( $_POST[ $postField ] );
        $wpdb->insert( $table_name, array( 'data' => $data ) );
        
        _e( $data . ' submitted successfully!', PLUGIN_SLUG );
    }
}
}