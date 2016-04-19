<?php
namespace Agp\Plugin\Awb;

use Ifsnop\Mysqldump as IMysqldump;
use splitbrain\PHPArchive\Zip;
use splitbrain\PHPArchive\Archive;

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
        // download link
        if (isset( $_GET['awb-backup-download']) ) {
            add_action( 'wp', array($this, 'downloadBackup') );
        }        
    }
    
    public function createTmpFullBackup ($uniqueFolder = '') {
        $fileFull = tmpfile(); 
        $fileFullMetaData = stream_get_meta_data($fileFull);
        $fileFullPath = $fileFullMetaData['uri'];       
        
        $arch = new Zip();            
        $arch->setCompression(9, Archive::COMPRESS_BZIP);
        $arch->create($fileFullPath);

        $file = tmpfile();
        $fileMetaData = stream_get_meta_data($file);
        $fileName = $fileMetaData['uri'];
        $this->createDatabaseBackup( $fileName );
        $arch->addFile($fileName, $this->getDatabaseBackupFilename($uniqueFolder));
        unlink($file);
        
        //$fileList = array_merge( $this->getFileList('{,.}*', GLOB_BRACE), $this->getFileList() );
        $fileList = $this->getFileList('{,.}*', GLOB_BRACE);
        
        if (!empty($fileList) && is_array($fileList)) {
            foreach ($fileList as $item) {
                if (basename($item) == '.' || basename($item) == '..') {
                    continue;
                }
                
//                if (is_dir($item)) {
//                    if( count(scandir($item)) == 2 ) {
//                        continue;
//                    }
//                }
                
                if (strpos($item, './') === 0 ) {
                    $itemName = substr($item, 2);
                } else {
                    $itemName = $item;
                }
                
                Awb::debug($item);
                Awb::debug($this->getFileBackupFileName($itemName, $uniqueFolder));
                Awb::debug(\splitbrain\PHPArchive\FileInfo::fromPath($item));
                Awb::debug(\splitbrain\PHPArchive\FileInfo::fromPath($item, $this->getFileBackupFileName($itemName, $uniqueFolder)));
                
                
                $arch->addFile($item, $this->getFileBackupFileName($itemName, $uniqueFolder));                
            }
        }
        
        $arch->close();
        die();
                
        return $fileFull;
    }
    
    
    private function createDatabaseBackup ( $fileName ) {
        try {
            if ( !empty($fileName) ) {
                $dump = new IMysqldump\Mysqldump("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASSWORD, array( 'add-drop-table' => TRUE ));                
                $dump->start($fileName);    
            }
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }                        
    }
    
    private function getDatabaseBackupFilename ($path = '') {
        return sprintf('%sdatabase/%s.sql', !empty($path) ? "{$path}/" : '', DB_NAME );
    }
    
    private function getFileBackupFileName ($fileName, $path = '') {
        return sprintf('%sfiles/%s', !empty($path) ? "{$path}/" : '', $fileName);
    }    
    
    private function getFileList( $pattern='*.*', $flags = 0 ) {
        $files = glob($pattern, $flags); 
        $glob_files = glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT);
        if ($files === FALSE) {
            $files = array();
        }
        if ($glob_files === FALSE) {
            $glob_files = array();
        }        

        foreach ($glob_files as $dir) {
            $files = array_merge($files, $this->getFileList($dir.'/'.basename($pattern), $flags));
        }
        return $files;        
    }
    
    public function downloadBackup() {
        $uniqueName = 'backup_' . date('YmdHis');        
        $fileZip = $uniqueName . '.zip';
        
        $backup = $this->createTmpFullBackup($uniqueName);
        $backupMetaData = stream_get_meta_data($backup);
        $backupFileName = $backupMetaData['uri'];        
        
        if ( is_resource($backup) ) {
            header("Content-type: application/x-msdownload");
            header("Content-Disposition: attachment; filename=" . $fileZip);
            header("Pragma: no-cache");
            header("Expires: 0");                        
            
            $result = fread($backup, filesize($backupFileName));    
            unlink($backupFileName);
            
            echo $result;
            exit();   
        }
    }
    
}
