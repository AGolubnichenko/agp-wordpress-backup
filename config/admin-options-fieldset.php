<?php
return array(
    'pages' => array('SCFP_Settings', 'getPagesFieldSet'),
    'emails' => array('SCFP_Settings', 'getEmailsFieldSet'),
    'userNames' => array('SCFP_Settings', 'getNamesFieldSet'),
    'formFields' => array('SCFP_Settings', 'getFormFieldSet'),
    'formTextFields' => array('SCFP_Settings', 'getFormTextFieldSet'),
    'fieldTypes' => array(
        'captcha' => 'Captcha',
        'checkbox' => 'Checkbox',
        'email' => 'Email',
        'number' => 'Number',
        'text' => 'Text',
        'textarea' => 'Textarea',
        'radio' => 'Radio Buttons',
        'select' => 'Drop Down',
    ),
    'borderStyle' => array (
        'solid' => 'Solid',
        'dotted' => 'Dotted',
        'dashed' => 'Dashed',
    ),
    'buttonPosition' => array(
        'left' => 'Left',
        'right' => 'Right',
        'center' => 'Center',
    ),
    'recaptchaTheme' => array(
        'light' => 'Light',        
        'dark' => 'Dark',
    ),
    'recaptchaType' => array(
        'image' => 'Image',        
        'audio' => 'Audio',
    ),    
    'recaptchaSize' => array(
        'normal' => 'Normal',        
        'compact' => 'Compact',
    ),        
);