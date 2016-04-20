<?php
namespace Agp\Plugin\Awb;

use Agp\Plugin\Awb\Compress\ZipManager;
use Ifsnop\Mysqldump as IMysqldump;

class BackupManager {
    
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
        if (isset( $_GET['awb-backup-download']) ) {
            add_action( 'wp', array($this, 'downloadBackup') );
        }        
    }

    public function downloadBackup() {
        $uniqueName = 'agp_backup_' . date('YmdHis');        
        $fileZip = $uniqueName . '.zip';
        
        $backup = $this->_createFullBackup($uniqueName);
        $backupMetaData = stream_get_meta_data($backup);
        $backupFileName = $backupMetaData['uri'];        
        
        if ( is_resource($backup) ) {
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename='.$fileZip);
            readfile($backupFileName);            
            unlink($backupFileName);
            exit();   
        }
    }    
    
    private function _createFullBackup ($uniqueFolder = '') {
        error_reporting(E_ALL|E_STRICT); ini_set('display_errors', 1);
        
        if (empty($uniqueFolder)) {
            $uniqueFolder = 'agp_backup_' . date('YmdHis');
        }
        $file = tmpfile(); 
        $fileMetaData = stream_get_meta_data($file);
        $filePath = $fileMetaData['uri'];               
        
        $zip = new ZipManager();
        $zip->open($filePath, \ZipArchive::CREATE );
        if (!empty($uniqueFolder)) {
            $zip->addEmptyDir( $uniqueFolder );    
            $zip->addEmptyDir( $uniqueFolder.'/database' );    
            $zip->addEmptyDir( $uniqueFolder.'/project' );    
        }

        $fileDb = tmpfile();
        $fileDbMetaData = stream_get_meta_data($fileDb);
        $fileDbName = $fileDbMetaData['uri'];
        $this->_createDatabaseBackup( $fileDbName );
        $zip->addFile($fileDbName, $uniqueFolder.'/database/'.DB_NAME.'.sql' );
        unlink($fileDb);        

        $zip->zipDir(ABSPATH, $uniqueFolder.'/project');        

        $zip->close();
        return $file;      
    }
    
    
    private function _createDatabaseBackup ( $fileName ) {
        try {
            if ( !empty($fileName) ) {
                $dump = new IMysqldump\Mysqldump("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array( 'add-drop-table' => TRUE ));                
                $dump->start($fileName);    
            }
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }                        
    }
}
