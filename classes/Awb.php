<?php
namespace Agp\Plugin\Awb;

use Awb\Core\ModuleAbstract;
use Awb\Core\Persistence\Session\Session;
use Agp\Plugin\Awb\Settings;
use Agp\Plugin\Awb\Ajax;

class Awb extends ModuleAbstract {

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
     * Backup Manager
     * 
     * @var BackupManager;
     */
    private $backupManager;


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
        $this->setKey('agp_wordpress_backup');
        parent::__construct(dirname(dirname(__FILE__)));
        
        $this->settings = Settings::instance( $this );
        $this->version = $this->settings->getVersion();
        $this->session = Session::instance();        
        $this->ajax = Ajax::instance();
        $this->backupManager = BackupManager::instance();
        
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts' ) );                
        add_action( 'admin_enqueue_scripts', array($this, 'enqueueAdminScripts' ));       
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
        
        wp_dequeue_style( 'agp-options-css' ); 
        wp_enqueue_style( 'awb-options-css', $this->getAssetUrl('css/agp-options.css') );           
    }

    public function getVersion() {
        return $this->version;
    }

    public function getSettings() {
        return $this->settings;
    }

    public function getSession() {
        return $this->session;
    }

    public function getAjax() {
        return $this->ajax;
    }

}
