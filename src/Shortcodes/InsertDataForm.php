<?php 

namespace SimpleDbTable\Shortcodes;

use SimpleDbTable\Helpers\SingletonTrait;
use SimpleDbTable\Helpers\Twig;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


class InsertDataForm
{
    use SingletonTrait;

    public function __construct()
    {
        add_shortcode( 'wprado_insert_data_form', [ $this, 'wprado_form_shortcode_render' ] );
    }

    public function wprado_form_shortcode_render() 
    {
        $template = Twig::getInstance()->twig->load( 'insert-data-form.twig' );
        $templateRender = $template->render();
        
        return $templateRender;
    }

}
