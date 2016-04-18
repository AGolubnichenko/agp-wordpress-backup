<?php
/**
 * Plugin Name: AGP Wordpress Backup 
 * Plugin URI: https://wordpress.org/plugins/agp-wordpress-backup/ 
 * Description: The wordpress plugin allows backup and restore your site
 * Version: 1.0.0
 * Author: Alexey Golubnichenko
 * Author URI: http://www.profosbox.com/
 * License: GPL2
 * 
 * @package AWB
 * @category Core
 * @author Alexey Golubnichenko
 */
/*  Copyright 2016  Alexey Golubnichenko  (email : profosbox@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( !defined( 'AWB_MIN_PHP_VERSION' ) ) {
    define( 'AWB_MIN_PHP_VERSION', '5.3.0');    
}

if ( !defined( 'AWB_CUR_PHP_VERSION' ) ) {
    if ( function_exists( 'phpversion' ) ) {
        define( 'AWB_CUR_PHP_VERSION', phpversion() );        
    } else {
        define( 'AWB_CUR_PHP_VERSION', AWB_MIN_PHP_VERSION );        
    }
}


/**
 * Check for minimum required PHP version
 */
if ( function_exists( 'version_compare' ) && version_compare( AWB_CUR_PHP_VERSION , AWB_MIN_PHP_VERSION) == -1 ) {
    add_action( 'admin_notices', 'AWB_PHPVersion_AdminNotice' , 0 );

/**
 * Initialize
 */    
} else {
    register_activation_hook(__FILE__,'AWB_activate');
    register_deactivation_hook( __FILE__, 'AWB_deactivate' );
    register_uninstall_hook( __FILE__, 'AWB_uninstall' );    
    
    include_once (dirname(__FILE__) . '/agp-wordpress-backup-init.php' );    
}

function AWB_PHPVersion_AdminNotice() {
    $name = get_file_data( __FILE__, array ( 'Plugin Name' ), 'plugin' );

    printf(
        '<div class="error">
            <p><strong>%s</strong> plugin can\'t work properly. Your current PHP version is <strong>%s</strong>. Minimum required PHP version is <strong>%s</strong>.</p>
        </div>',
        $name[0],
        AWB_CUR_PHP_VERSION,
        AWB_MIN_PHP_VERSION
    );
}

function AWB_activate() {
}

function AWB_deactivate() {
}

function AWB_uninstall() {
}

