<?php
namespace Agp\Plugin\Awb\Compress;

class ZipManager extends \ZipArchive {
    
    private function folderToZip( $folder, $exclusiveLength, $initDir='' ) {
        $handle = opendir($folder);
        while (false !== $f = readdir($handle)) {
            if ($f != '.' && $f != '..') {
                $filePath = str_replace('//', '/', "$folder/$f");
                $localPath = str_replace('//', '/', (!empty($initDir) ? $initDir.'/' : '') . substr( $filePath, $exclusiveLength ) );
                if ( is_file( $filePath ) ) {
                    $this->addFile( $filePath, $localPath );
                } elseif ( is_dir($filePath) ) {
                    $this->addEmptyDir( $localPath );
                    $this->folderToZip($filePath, $exclusiveLength, $initDir);
                }
            }
        }
        closedir($handle);
    }     
    
    public function zipDir( $sourcePath, $initDir='' ) {
        $pathInfo = pathInfo($sourcePath);
        $parentPath = $pathInfo['dirname'];
        $dirName = $pathInfo['basename'];
        $this->folderToZip( $sourcePath, strlen("$parentPath/$dirName/"), $initDir );
    }
}