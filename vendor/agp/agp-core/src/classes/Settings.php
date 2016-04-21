<?php
namespace Awb\Core;

use Awb\Core\Config\SettingsAbstract;

class Settings extends SettingsAbstract {
    
    /**
     * The single instance of the class 
     * 
     * @var object 
     */
    protected static $_instance = null;    

    /**
     * Parent Module
     * 
     * @var Agp_Module
     */
    protected static $_parentModule;
    
	/**
	 * Main Instance
	 *
     * @return object
	 */
	public static function instance($parentModule = NULL) {
		if ( is_null( self::$_instance ) ) {
            self::$_parentModule = $parentModule;            
			self::$_instance = new self();
		}
		return self::$_instance;
	}    
    
	/**
	 * Cloning is forbidden.
	 */
	public function __clone() {
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	public function __wakeup() {
    }        
    
    /**
     * Constructor 
     * 
     * @param Agp_Module $parentModule
     */
    public function __construct() {
        $config = include ($this->getParentModule()->getBaseDir() . '/config/config.php');        
        parent::__construct($config);
    }
    
    public static function getParentModule() {
        return self::$_parentModule;
    }
    
    public static function renderSettingsPage() {
        echo self::getParentModule()->getTemplate('admin/options/layout', self::instance());
    }    
    
}

