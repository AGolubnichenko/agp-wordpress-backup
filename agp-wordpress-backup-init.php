<?php
use Agp\WordpressBackup\Core\Agp_Autoloader;

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'awb_output_buffer');
function awb_output_buffer() {
    ob_start();
}

if (file_exists(dirname(__FILE__) . '/agp-core/agp-core.php' )) {
    include_once (dirname(__FILE__) . '/agp-core/agp-core.php' );
} 

add_action( 'plugins_loaded', 'awb_activate_plugin' );
function awb_activate_plugin() {
    if (class_exists('Agp\WordpressBackup\Core\Agp_Autoloader') && !function_exists('Awb')) {
        $autoloader = Agp_Autoloader::instance();
        $autoloader->setClassMap(array(
            'paths' => array(
                __DIR__ => array('classes'),
            ),
            'namespaces' => array(
                'Agp\WordpressBackup\Core' => array(
                    __DIR__ => array('agp-core'),
                ),
            ),
            'classmaps' => array (
                __DIR__ => 'classmap.json',
            ),            
        ));
        //$autoloader->generateClassMap(__DIR__);

        function Awb() {
            return Awb::instance();
        }    

        Awb();                
    }
}

awb_activate_plugin();
