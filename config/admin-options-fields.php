<?php
return array(
    'scfp_form_settings' => array(
        'sections' => array(
            'field_settings' => array(
                'label' => 'Fields Settings <span class="scfp-form-shortcode-hint">Form shortcode: <span>[wcp_contactform id="wcpform_1"]</span></span>',
            ),            
            'send_button_settings' => array(
                'label' => 'Submit Button',
            ),                     
            'thankyou_page_settings' => array(
                'label' => '"Thank You" Page',
            ),            
            'other_settings' => array(
                'label' => 'Other Settings',
            ),                                    
        ),
        'fields' => array(
            'field_settings' => array(
                'type' => 'metabox',
                'label' => '',
                'default' => '',
                'section' => 'field_settings',
                'class' => '',
                'note' => 'You can configure fields of the contact form in the table below. Each field has following available parameters for configuration : '
                . '<strong>Type</strong> - allows to choose field type from preset; '
                . '<strong>Field Name</strong> - allows to define technical field label that uses for "Inbox" page and notification emails; '
                . '<strong>Visibility</strong> - allows to enable/disable field visibility; '
                . '<strong>Required</strong> - allows to make field required; '
                . '<strong>Export to CSV</strong> - allows to add field to CSV export. '
                . 'Also each field has <strong>advanced options</strong> that you can find by click on <strong>"gear"</strong> icon.',
                'atts' => array(
                ),                
            ),            
            'button_name' => array(
                'type' => 'text',
                'label' => 'Caption',
                'default' => 'Send',
                'section' => 'send_button_settings',
                'class' => 'widefat regular-text',
                'note' => 'option allows to change submit button text',
                'atts' => array(
                ),                
            ),        
            'button_position' => array(
                'type' => 'select',
                'label' => 'Button Position',
                'fieldSet' => 'buttonPosition',
                'default' => 'left',
                'section' => 'send_button_settings',
                'class' => 'widefat regular-select',
                'note' => 'option allows to set submit button position',
            ),                  
            'page_name' => array(
                'type' => 'page_or_link',
                'label' => 'Redirect To',
                'fieldSet' => 'pages',
                'default' => array(
                    'mode' => 'page',
                    'page' => '',
                    'url' => '',
                ),
                'section' => 'thankyou_page_settings',
                'class' => 'widefat',
                'note' => 'option allows to set "Thank You" page from the list of existed pages or directly specify URL link to the site',
            ),                  
            'html5_enabled' => array(
                'type' => 'checkbox',
                'label' => 'Enable HTML5 Validation',
                'default' => 1,
                'section' => 'other_settings',
                'note' => 'option allows to enable/disable HTML5 validation on the contact form',
                'class' => '',
            ),                                      
            'tinymce_button_enabled' => array(
                'type' => 'checkbox',
                'label' => 'TinyMCE Support',
                'default' => 1,
                'section' => 'other_settings',
                'note' => 'option allows to enable/disable button in the TinyMCE editor for adding contact form shortcode to editor area',
                'class' => '',
            ),                                                  
            'scripts_in_footer' => array(
                'type' => 'checkbox',
                'label' => 'Footer Scripts',
                'default' => 1,
                'section' => 'other_settings',
                'note' => 'option allows to enqueue scripts and styles only for the pages with contact form',
                'class' => '',
            ),                                      
            
        ),
    ),
    'scfp_style_settings' => array(
        'sections' => array(
            'common_style_settings' => array(
                'label' => 'Style Options',
            ),                                                         
            'send_button_settings' => array(
                'label' => 'Submit Button',
            ),                     
            'field_style_settings' => array(
                'label' => 'Fields Style',
            ),                                 
        ),  
        'fields' => array(
            'no_style' => array(
                'type' => 'checkbox',
                'label' => 'Disable Plugin CSS',
                'default' => 0,
                'section' => 'common_style_settings',
                'class' => '',
                'note' => 'option allows to disable all styles of the plugin and use default styles of your theme for the form'
            ),                  
            'button_color' => array(
                'type' => 'colorpicker',
                'label' => 'Background Color',
                'default' => '#404040',
                'section' => 'send_button_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to change background color of the "Submit" button',
                'atts' => array(
                ),                                
            ),
            'text_color' => array(
                'type' => 'colorpicker',
                'label' => 'Text Color',
                'default' => '#FFF',
                'section' => 'send_button_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to change text color of the "Submit" button',
                'atts' => array(
                ),                                
            ),        
            'hover_button_color' => array(
                'type' => 'colorpicker',
                'label' => 'Hover Background Color',
                'default' => '',
                'section' => 'send_button_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to change hover background color of the "Submit" button',
                'atts' => array(
                ),                                
            ),
            'hover_text_color' => array(
                'type' => 'colorpicker',
                'label' => 'Hover Text Color',
                'default' => '',
                'section' => 'send_button_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to change hover text color of the "Submit" button',
                'atts' => array(
                ),                                
            ),        
            'field_label_text_color' => array(
                'type' => 'colorpicker',
                'label' => 'Label Color',
                'default' => '',
                'section' => 'field_style_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to change color of field labels (labels are displayed above the form fields)',
                'atts' => array(
                ),                                
            ),                    
            'field_label_marker_text_color' => array(
                'type' => 'colorpicker',
                'label' => '"Required" Marker Color',
                'default' => '',
                'section' => 'field_style_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to change color of "Required" marker (*)',
                'atts' => array(
                ),                                
            ),                                
            'field_text_color' => array(
                'type' => 'colorpicker',
                'label' => 'Text Color',
                'default' => '',
                'section' => 'field_style_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to change field text color inside the form fields',
                'atts' => array(
                ),                                
            ),                           
            'field_description_color' => array(
                'type' => 'colorpicker',
                'label' => 'Description Color',
                'default' => '',
                'section' => 'field_style_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to change color of field description that placed below the form fields',
                'atts' => array(
                ),                                
            ),                                       
            'no_border' => array(
                'type' => 'checkbox',
                'label' => 'No Border',
                'default' => 0,
                'section' => 'field_style_settings',
                'class' => '',
                'note' => 'option allows to disable border around the form fields'
            ),                  
            'border_size' => array(
                'type' => 'text',
                'label' => 'Border Size',
                'default' => '',
                'section' => 'field_style_settings',
                'class' => 'widefat regular-text',
                'note' => 'option allows to set size of the border around the form fields (positive digital value with "px")',
                'atts' => array(
                ),                
            ),  
            'border_style' => array (
                'type' => 'select',
                'label' => 'Border Style',
                'fieldSet' => 'borderStyle',
                'default' => 'solid',
                'section' => 'field_style_settings',
                'class' => 'widefat regular-select',
                'note' => 'option allows to set style of the border around the form fields',                
            ),
            'border_color' => array(
                'type' => 'colorpicker',
                'label' => 'Border Color',
                'default' => '',
                'section' => 'field_style_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to set color of the border around the form fields',
                'atts' => array(
                ),                                
            ),   
            'no_background' => array(
                'type' => 'checkbox',
                'label' => 'No Background',
                'default' => 0,
                'section' => 'field_style_settings',
                'class' => '',
                'note' => 'option allows to disable background inside the form fields'
            ),      
            'background_color' => array(
                'type' => 'colorpicker',
                'label' => 'Background Color',
                'default' => '',
                'section' => 'field_style_settings',
                'class' => 'scfp-color-picker',
                'note' => 'option allows to set background color inside the form fields',
                'atts' => array(
                ),                                
            ),               
        ),
    ),            
    'scfp_error_settings' => array(
        'sections' => array(
            'error_settings' => array(
                'label' => 'Error Messages',
            ),            
            'notification_settings' => array(
                'label' => 'Notification Messages',
            ),                        
        ),  
        'fields' => array(
            'errors' => array(
                'type' => 'errors',
                'label' => '',
                'default' => '',
                'section' => 'error_settings',
                'class' => '',
                'note' => 'You can change error messages for non-HTML5 validation below',
            ),        
            'submit_confirmation' => array(
                'type' => 'text',
                'label' => 'Submit Success',
                'default' => 'Thanks for contacting us! We will get in touch with you shortly.',
                'section' => 'notification_settings',
                'class' => 'widefat',
                'note' => 'option allows to set submit success message for the form',
                'atts' => array(
                ),                
            ),                    
        ),
    ),    
    'scfp_notification_settings' => array(
        'sections' => array(
            'general_notifications_settings' => array(
                'label' => 'Autoresponder Variables',
            ),                        
            'admin_notifications_settings' => array(
                'label' => 'Admin Autoresponder Notifications',
            ),            
            'user_notifications_settings' => array(
                'label' => 'User Autoresponder Notifications',
            ),                        
        ),  
        'fields' => array(
            'user_email' => array(
                'type' => 'select',
                'label' => 'User Email Field',
                'fieldSet' => 'emails',
                'default' => 'email',
                'section' => 'general_notifications_settings',
                'class' => 'widefat regular-select',
                'note' => 'option allows to set default field for {$user_email} variable.<br />Used for general email notifications and also for "Relpay" button on the "Inbox" page.',
                'atts' => array(
                ),                
            ),                                    
            'user_name' => array(
                'type' => 'select',
                'label' => 'User Name Field',
                'fieldSet' => 'userNames',
                'default' => 'name',
                'section' => 'general_notifications_settings',
                'class' => 'widefat regular-select',
                'note' => 'option allows to set default field for {$user_name} variable.<br/>Used for general email notifications and also for "Relpay" button on the "Inbox" page.',
                'atts' => array(
                ),                
            ),                                                
            'reply_subject_field' => array(
                'type' => 'select',
                'label' => 'Subject Field',
                'fieldSet' => 'formTextFields',
                'default' => 'subject',
                'section' => 'general_notifications_settings',
                'class' => 'widefat regular-select',
                'note' => 'option allows to set default field for {$user_subject} variable.<br/>Used for general email notifications and also for "Relpay" button on the "Inbox" page.',
                'atts' => array(
                ),                
            ),            
            'reply_message_field' => array(
                'type' => 'select',
                'label' => 'Message Field',
                'fieldSet' => 'formTextFields',
                'default' => 'message',
                'section' => 'general_notifications_settings',
                'class' => 'widefat regular-select',
                'note' => 'option allows to set default field for {$user_message} variable.<br/>Used for general email notifications and also for "Relpay" button on the "Inbox" page.',
                'atts' => array(
                ),                
            ),                        
            'another_email' => array(
                'type' => 'text',
                'label' => 'Send to Email',
                'default' => '',
                'section' => 'admin_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to set administrator email address for notifications (several email addresses should be separated by comma).<br/><strong>Default email address</strong> is used from:<br/>"Settings" --> "General" --> "E-mail Address"',
                'atts' => array(
                ),                
            ),            
            'email_from' => array(
                'type' => 'text',
                'label' => 'Email From',
                'default' => '',
                'section' => 'admin_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to change "from" email address to value from a field with user email address.<br/>You can use the following variables:<br/><strong>{$user_email}</strong> - User email variable<br /><br />This option was added by multiple users\' requests, however we <strong class="scfp-warning-text">HIGHLY DO NOT RECOMMEND</strong> to use this option. It doesn\'t work with SMTP email configuration and doesn\'t work stable with common WordPress email configuration. We do not provide any guarantee of properly work of this option and you will use it at your own risk.',
                'atts' => array(
                ),                
            ),                                    
            'email_from_name' => array(
                'type' => 'text',
                'label' => 'Email From Name',
                'default' => '',
                'section' => 'admin_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to change "email from" name to vlaue from a field with user name.<br/>You can use the following variables:<br/><strong>{$user_name}</strong> - User name variable<br /><br />This option was added by multiple users\' requests, however we <strong class="scfp-warning-text">HIGHLY DO NOT RECOMMEND</strong> to use this option. It doesn\'t work with SMTP email configuration and doesn\'t work stable with common WordPress email configuration. We do not provide any guarantee of properly work of this option and you will use it at your own risk.',                
                'atts' => array(
                ),                
            ),                                                            
            'subject' => array(
                'type' => 'text',
                'label' => 'Subject',
                'default' => 'New submission from contact form',
                'section' => 'admin_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to set default subject of administrator notification message.<br/>You can use the following variables:<br/><strong>{$admin_name}</strong> - Administrator name<br/><strong>{$user_name}</strong> - User name<br/><strong>{$user_email}</strong> - User email<br/><strong>{$user_subject}</strong> - User subject',
                'atts' => array(
                ),                
            ),                        
            'message' => array(
                'type' => 'tinymce',
                'label' => 'Message',
                'default' => "Dear {\$admin_name},\nYou have got a new message from contact form!\n\nForm message:\n{\$data}",
                'section' => 'admin_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to set default text of administrator notification message.<br/>You can use the following variables:<br/><strong>{$admin_name}</strong> - Administrator name<br/><strong>{$user_name}</strong> - User name<br/><strong>{$user_email}</strong> - User email<br/><strong>{$user_subject}</strong> - User subject<br/><strong>{$user_message}</strong> - User message<br/><strong>{$data}</strong> - Form data',
                'atts' => array(
                ),                                              
            ),  
            'disable' => array(
                'type' => 'checkbox',
                'label' => 'Disable Admin Notifications',
                'default' => 0,
                'section' => 'admin_notifications_settings',
                'class' => '',
                'note' => 'option allows to disable notifications of new form submissions'
            ),  
            'user_email_from' => array(
                'type' => 'text',
                'label' => 'Email From',
                'default' => '',
                'section' => 'user_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to change generic email address "wordpress@yourdomain.com" to custom vlaue.<br /><br />This option was added by multiple users\' requests, however we <strong class="scfp-warning-text">HIGHLY DO NOT RECOMMEND</strong> to use this option. It doesn\'t work with SMTP email configuration and doesn\'t work stable with common WordPress email configuration. We do not provide any guarantee of properly work of this option and you will use it at your own risk.',  
                'atts' => array(
                ),                
            ),                                    
            'user_email_from_name' => array(
                'type' => 'text',
                'label' => 'Email From Name',
                'default' => '',
                'section' => 'user_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to change "WordPress" sender name to custom vlaue.<br /><br />This option was added by multiple users\' requests, however we <strong class="scfp-warning-text">HIGHLY DO NOT RECOMMEND</strong> to use this option. It doesn\'t work with SMTP email configuration and doesn\'t work stable with common WordPress email configuration. We do not provide any guarantee of properly work of this option and you will use it at your own risk.',
                'atts' => array(
                ),                
            ),                                                
            'user_subject' => array(
                'type' => 'text',
                'label' => 'Subject',
                'default' => 'Form submission confirmation',
                'section' => 'user_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to set default subject of user notification message.<br/>You can use the following variables:<br/><strong>{$user_subject}</strong> - User subject',
                'atts' => array(
                ),                
            ),                        
            'user_message' => array(
                'type' => 'tinymce',
                'label' => 'Message',
                'default' => "Dear {\$user_name},\nThanks for contacting us!\nWe will get in touch with you shortly.\n\nYour message:\n{\$data}",
                'section' => 'user_notifications_settings',
                'class' => 'widefat',
                'note' => 'option allows to set default text of user notification message.<br/>You can use the following variables:<br/><strong>{$admin_name}</strong> - Administrator name<br/><strong>{$user_name}</strong> - User name<br/><strong>{$user_email}</strong> - User email<br/><strong>{$user_subject}</strong> - User subject<br/><strong>{$user_message}</strong> - User message<br/><strong>{$data}</strong> - Form data',
                'atts' => array(
                ),                
            ),  
            'user_disable' => array(
                'type' => 'checkbox',
                'label' => 'Disable User Notifications',
                'default' => 0,
                'section' => 'user_notifications_settings',
                'note' => 'option allows to disable notifications for successful form submission',
                'class' => '',
            ),               
            
        ),
    ),        
    'scfp_recaptcha_settings' => array(
        'sections' => array(
            'general_recaptcha_settings' => array(
                'label' => 'General Settings',
            ),                        
            'render_recaptcha_settings' => array(
                'label' => 'Render Settings',
            ),                                    
            'lang_recaptcha_settings' => array(
                'label' => 'Language Settings',
            ),                                                
            
        ),
        'fields' => array(
            'rc_key' => array(
                'type' => 'text',
                'label' => 'Key',
                'default' => '',
                'section' => 'general_recaptcha_settings',
                'class' => 'widefat regular-text',
                'note' => 'allows to set <a href="https://www.google.com/recaptcha" title="Get the reCAPTCHA key" target="_blank">reCAPTCHA key</a>',
                'atts' => array(
                ),
            ),
            'rc_secret_key' => array(
                'type' => 'text',
                'label' => 'Secret Key',
                'default' => '',
                'section' => 'general_recaptcha_settings',
                'class' => 'widefat regular-text',
                'note' => 'allows to set <a href="https://www.google.com/recaptcha" title="Get the reCAPTCHA secret key" target="_blank">reCAPTCHA secret key</a>',
                'atts' => array(
                ),
            ),            
            'rc_theme' => array(
                'type' => 'select',
                'label' => 'Theme',
                'fieldSet' => 'recaptchaTheme',
                'default' => 'light',
                'section' => 'render_recaptcha_settings',
                'class' => 'widefat regular-select',
                'note' => 'allows to set reCAPTCHA theme',
                'atts' => array(
                ),                
            ),                                                            
            'rc_type' => array(
                'type' => 'select',
                'label' => 'Type',
                'fieldSet' => 'recaptchaType',
                'default' => 'image',
                'section' => 'render_recaptcha_settings',
                'class' => 'widefat regular-select',
                'note' => 'allows to set reCAPTCHA type',
                'atts' => array(
                ),                
            ),                                                                        
            'rc_size' => array(
                'type' => 'select',
                'label' => 'Size',
                'fieldSet' => 'recaptchaSize',
                'default' => 'normal',
                'section' => 'render_recaptcha_settings',
                'class' => 'widefat regular-select',
                'note' => 'allows to set reCAPTCHA size',
                'atts' => array(
                ),                
            ),          
            'rc_wp_lang' => array(
                'type' => 'checkbox',
                'label' => 'Use current WordPress language',
                'default' => 0,
                'section' => 'lang_recaptcha_settings',
                'class' => '',
                'note' => "option allows to change default reCAPTCHA language (if it's possible)",
            ),                                                  
            
        ),
    ),
);
