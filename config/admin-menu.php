<?php

return array(
    'agp_wordpress_backup' => array(
        'page_title' => 'AGP Wordpress Backup', 
        'menu_title' => 'AGP Wordpress Backup', 
        'capability' => 'manage_options',
        'function' => array('Agp\Plugin\Awb\Settings', 'renderSettingsPage'),
        'position' => null, 
        'hideInSubMenu' => TRUE,
        'icon_url'   => '',    
//        'submenu' => array(
//            'awb_plugin_options' => array(
//                'page_title' => 'Settings', 
//                'menu_title' => 'Settings', 
//                'capability' => 'manage_options',
//                'function' => array('Agp\Plugin\Awb\Settings', 'renderSettingsPage'),                         
//            ),   
//        ),
    ),
);
    