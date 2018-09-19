<?php

namespace App\Providers;

use File;
use Storage;
class FolderService
{

    // route for folder where patients document will be stored
    public static $patien_document_route = 'PatientsDocuments';

    /**
     *
     * CREATE
     *
     */

    /**
     * Function for checking if folder exist and for createing new folder
     *
     * @param string    $folder             specific a name  of folder (patient id)
     * @param string    $document_route     specific a route of folder
     * @return void
     */
    public static function createFolder($folder, $path) {
        $full_path = public_path().'/'.$path.'/'.$folder;

        if (self::folderExist($full_path) !== true) mkdir($full_path, 0755, true);
    }

    /**
     *
     * READ
     *
     */

     /**
      * Check's is folder exists
      *
      * @param  string      $folder_path        Folder path
      * @return bool        True if exists, false  otherwise
      */
    public static function folderExist($folder_path) {
        return is_dir($folder_path);
    }

    /**
     *
     * UPDATE
     *
     */

     /**
      * Scaning and copy folder content, makeing new folder and deleteing the old folder
      *
      * @param string       $old_name       old name of  folder
      * @param string       $new_name       new name for folder
      * @param string       $path           path to the  folder
      * @return void
      */
    public static function updateFolder($old_name, $new_name, $path) {
        $full_old_path = public_path().'/'.$path.'/'.$old_name;
        $full_new_path = public_path().'/'.$path.'/'.$new_name;

        if (self::folderExist($full_old_path)) {
            $content = scandir($full_old_path);

            self::createFolder($new_name, $path);

            foreach ($content as $node) {
                if ($node === '.' || $node === '..') continue;

                if (is_dir($full_old_path.'/'.$node)) self::updateFolder($old_name.'/'.$node, $new_name.'/'.$node, $path);
                else copy($full_old_path.'/'.$node, $full_new_path.'/'.$node);
            }

            self::deleteFolder($full_old_path);
        }
    }

    /**
     *
     * DELETE
     *
     */

    public static function deleteFolder($full_folder_path) {
        $content = scandir($full_folder_path);

        foreach ($content as $node) {
            if ($node === '.' || $node === '..') continue;

            is_dir($full_folder_path.'/'.$node) ? self::deleteFolder($full_folder_path.'/'.$node) : unlink($full_folder_path.'/'.$node);
        }

        rmdir($full_folder_path);
    }

}