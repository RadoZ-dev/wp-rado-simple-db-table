<form method="post">
    <label for="gemini_data">Enter Data:</label>
    <input type="text" name="rado_data" id="rado_data" required>
    <input type="submit" value="Submit">
    <?php wp_nonce_field( 'add_data_nonce_action', 'add_data_nonce_field' ); ?>
</form>

<?php

if ( isset( $_POST[ 'rado_data' ] ) && wp_verify_nonce( $_POST[ 'add_data_nonce_field' ], 'add_data_nonce_action' ) ) 
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'simple_db_table';
    $data = sanitize_text_field($_POST[ 'rado_data' ]);
    $wpdb->insert($table_name, array( 'data' => $data ));
    
    echo 'Data submitted successfully!';
}
