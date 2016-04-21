<?php
return array(
    'version' => array(
        'agp_wordpress_backup' => '1.0.0',
    ),
    'admin' => array(
        'agp_wordpress_backup'=>array(
            'menu' => include (__DIR__ . '/admin-menu.php'),
            'options' => include (__DIR__ . '/admin-options.php'),                    
        ),
    ),   
);


