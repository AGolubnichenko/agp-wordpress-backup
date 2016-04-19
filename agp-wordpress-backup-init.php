<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'awb_output_buffer');
function awb_output_buffer() {
    ob_start();
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php' )) {
    global $awbAutoloader;
    $awbAutoloader = include_once (dirname(__FILE__) . '/vendor/autoload.php' );
} 

function Awb() {
    return Agp\Plugin\Awb\Awb::instance();
}    
    
Awb();
