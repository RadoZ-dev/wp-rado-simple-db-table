<?php 

namespace SimpleDbTable\Shortcodes;

use SimpleDbTable\Helpers\FormValidation;
use SimpleDbTable\Helpers\SingletonTrait;
use SimpleDbTable\Helpers\Twig;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


class SimpleDbForm
{
    use SingletonTrait;

    private $formValidation;
    private $postField;
    private $nonceAction;
    private $nonceField;
    private $dbTable;

    public function __construct()
    {
        $this->postField = 'rado_data';
        $this->nonceAction = 'write_data_nonce_action';
        $this->nonceField = 'write_data_nonce_field';
        $this->dbTable = 'simple_db_table';

        add_shortcode( 'wprado_insert_data_form', [ $this, 'wprado_form_shortcode_render' ] );
        add_action( 'init', [ $this, 'validate_form' ] );
    }

    public function validate_form()
    { 
        FormValidation::validate( 
            postField: $this->postField, 
            nonceAction:$this->nonceAction, 
            nonceField:$this->nonceField, 
            dbTable: $this->dbTable 
        );
    }

    public function wprado_form_shortcode_render() 
    {
        $contentVariables = [
            'nonce_field' => wp_nonce_field( $this->nonceAction, $this->nonceField, true, false )
        ];

        $template = Twig::getInstance()->twig->load( 'simple-db-form.twig' );
        $templateRender = $template->render( $contentVariables );
        
        return $templateRender;
    }
}
