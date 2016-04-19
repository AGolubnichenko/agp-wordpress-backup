<?php
return array(
    'captcha' => array(
        'captcha',
        array(
            array('display_label'),
            array('placeholder'),
        ),        
        array(
            array('field_id'),
            array('css_class'),
        ),        
        'description',
    ),    
    'checkbox' => array(
        'display_label',
        array(
            array('field_id'),
            array('css_class'),
        ),        
        'checkbox',        
        'description',                
    ),
    'radio' => array(
        'display_label',
        array(
            array('field_id'),
            array('css_class'),
        ),        
        'radio',        
        'description',                
    ),    
    'select' => array(
        array(
            array('display_label'),
            array('placeholder'),
        ),
        array(
            array('field_id'),
            array('css_class'),
        ),                
        'select',        
        'description',                
    ),        
    'email' => array(
        array(
            array('display_label'),
            array('placeholder'),
        ),        
        array(
            array('field_id'),
            array('css_class'),
        ),        
        'default_email',        
        'description',        
    ),
    'number' => array(
        array(
            array('display_label'),
            array('placeholder'),
        ),        
        array(
            array('field_id'),
            array('css_class'),
        ),        
        array(
            array('number_range'),
            array('default_number'),            
        ),                
        'description',
    ),
    'text' => array( 
        array(
            array('display_label'),
            array('placeholder'),
        ),
        array(
            array('field_id'),
            array('css_class'),
        ),        
        'default_text',        
        'description',
    ),
    'textarea' => array( 
        array(
            array('display_label'),
            array('placeholder'),
        ),
        array(
            array('field_id'),
            array('css_class'),
        ),        
        'default_textarea',        
        'description',
    ), 
);