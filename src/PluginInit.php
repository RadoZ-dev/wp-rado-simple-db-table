<?php 

namespace SimpleDbTable;

use SimpleDbTable\Helpers\SingletonTrait;
use SimpleDbTable\DatabaseSetup\SimpleTable;
use SimpleDbTable\Shortcodes\InsertDataForm;


if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class PluginInit 
{
    use SingletonTrait;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        SimpleTable::getInstance();
        InsertDataForm::getInstance();
    }
}