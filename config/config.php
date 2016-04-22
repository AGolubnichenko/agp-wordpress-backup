<?php
return array(
    'agp_wordpress_backup' => array(
        'version' => '1.0.0',   
        'admin' => array(
            'menu' => include (__DIR__ . '/admin-menu.php'),
            'options' => include (__DIR__ . '/admin-options.php'),     
            'style' => array(
                'main_color' => 'red',
            ),
        ),           
    ),
);
