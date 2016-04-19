<?php
namespace Agp\Plugin\Awb;

use Agp\Core\ModuleAbstract;
use Agp\Core\Persistence\Session\Session;
use Agp\Plugin\Awb\Settings;
use Agp\Plugin\Awb\Ajax;

class Awb extends ModuleAbstract {

    /**
     * Current plugin version
     * 
     * @var type 
     */
    private $version = '1.0.0';
    
    /**
     * Plugin settings
     * 
     * @var Settings
     */
    private $settings;    
    
    
    /**
     * Session
     * 
     * @var Session
     */
    private $session;

    /**
     * Ajax
     * 
     * @var Ajax 
     */
    private $ajax;
    
    
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
        
        $this->session = Session::instance();        
        $this->settings = Settings::instance( $this );
        $this->ajax = Ajax::instance();
        
        $this->updatePlugin();        
        
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts' ) );                
        add_action( 'admin_enqueue_scripts', array($this, 'enqueueAdminScripts' ));                    
    }

    public function updatePlugin () {
        $currentVersion = $this->getVersion();
        $version = get_option( 'awb-version' );
        if (empty($version)) {
            $version = '1.0.0';
        }
        
        if ( function_exists( 'version_compare' ) && version_compare( $version , $currentVersion) == -1 ) {
//            if ( version_compare( $version , 'xx.xx.xx', '<' ) ) {
//            }       
            
            update_option( 'awb-version', $currentVersion );   
            $this->settings->refreshConfig();
        }
    }    
    
    public function enqueueScripts () {
        wp_register_script( 'awb', $this->getAssetUrl('js/main.js'), array('jquery') ); 
        wp_localize_script( 'awb', 'ajax_awb', array( 
            'base_url' => site_url(),         
            'ajax_url' => admin_url( 'admin-ajax.php' ), 
            'ajax_nonce' => wp_create_nonce('ajax_atf_nonce'),        
        ));  
        
        wp_register_style( 'awb-css', $this->getAssetUrl('css/style.css') );                     
        
        wp_enqueue_script( 'awb' );         
        wp_enqueue_style( 'awb-css' );    
    }        
    
    public function enqueueAdminScripts () {
        wp_register_script( 'awb', $this->getAssetUrl('js/admin.js'), array('jquery' ) );   
        wp_register_style( 'awb-css', $this->getAssetUrl('css/admin.css') );   
        
        wp_enqueue_script( 'awb' );         
        wp_enqueue_style( 'awb-css' );            
    }
    function getVersion() {
        return $this->version;
    }

    function getSettings() {
        return $this->settings;
    }

    function getSession() {
        return $this->session;
    }

    function getAjax() {
        return $this->ajax;
    }
}
