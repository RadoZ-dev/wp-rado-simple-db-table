<?php 

namespace SimpleDbTable\Helpers;

use SimpleDbTable\Helpers\SingletonTrait;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class Twig
{
    use SingletonTrait;

    public $twig;

    private function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader( PLUGIN_DIR_PATH . 'src/Views' );
        $this->twig = new \Twig\Environment( $loader, [] );
    }
}