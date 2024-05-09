<?php

use WP_REST_Request;
use WP_REST_Response;
use WP_Error;

add_action( 'rest_api_init', function () {
  register_rest_route( 'simple_db/v1', '/insert', array(
    'methods' => 'POST',
    'callback' => 'insert_data_into_simple_db_table',
  ) );

  register_rest_route( 'simple_db/v1', '/select', array(
    'methods' => 'GET',
    'callback' => 'select_data_from_simple_db_table',
  ) );
} );


function insert_data_into_simple_db_table( WP_REST_Request $request ) {
  global $wpdb;

  $data = $request->get_json_params();
  $result = $wpdb->insert( 'wp_simple_db_table', $data );

  if ( $result ) {
    return new WP_REST_Response( array( 'message' => 'Data inserted successfully' ), 201 );
  } else {
    return new WP_Error( 'insert_failed', 'Failed to insert data', array( 'status' => 500 ) );
  }
}


function select_data_from_simple_db_table() {
  global $wpdb;

  $sql = "SELECT * FROM wp_simple_db_table";

  $results = $wpdb->get_results($sql);

  if ( $results ) {
    return new WP_REST_Response( $results, 200 );
  } else {
    return new WP_Error( 'select_failed', 'Failed to select data', array( 'status' => 404 ) );
  }
}