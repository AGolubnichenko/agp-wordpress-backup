<?php
namespace Awb\Core;

class Agp extends ModuleAbstract {

    /**
     * Current plugin version
     * 
     * @var type 
     */
    private $version;
    
    /**
     * Plugin settings
     * 
     * @var Settings
     */
    private $settings;    
    
    
    /**
     * The single instance of the class 
     * 
     * @var object 
     */
    protected static $_instance = null;    
    
	/**
	 * Main Instance
	 *
     * @return object
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
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
    
    public function __construct() {
        parent::__construct(dirname(dirname(__FILE__)));
        
        $this->settings = Settings::instance( $this );
        
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts' ) );                
        add_action( 'admin_enqueue_scripts', array($this, 'enqueueAdminScripts' ));       
    }
    
    public function enqueueScripts () {
    }        
    
    public function enqueueAdminScripts () {
        wp_register_style( 'agp-options-css', $this->getAssetUrl('css/agp-options.css') );           
//        wp_enqueue_style( 'agp-options-css' );                    
    }

    public function getVersion() {
        return $this->version;
    }

    public function getSettings() {
        return $this->settings;
    }
}

Agp::instance();