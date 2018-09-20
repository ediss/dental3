<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\FolderService;
use File;

class FolderController extends Controller
{


    public function index()
    {
        $old_name = 'folder1';
        $new_name = 'folder2';

        //$src = public_path()."/".FolderService::$patien_document_route."/".$old_name;
        //$dst = public_path()."/".FolderService::$patien_document_route."/".$new_name;
        //dd($old_path, $new_path);
        FolderService::updateFolder($old_name, $new_name, FolderService::$patien_document_route);

        //FolderService::copyFolder($src, $dst);
    }
}
