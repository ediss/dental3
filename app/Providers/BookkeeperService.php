<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admin as Bookkeeper;
use App\Exceptions\CustomException;

class BookkeeperService extends ServiceProvider
{
    /**
     *
     * READ
     *
     */


    public static function getBookkeepers() {
        //postavi masinsko ime role
        return  Bookkeeper::where('role_id', '5')->get();
    }

    /**
     *
     * UPDATE
     *
     */

    public static function updateBookkeeper($name, $email, $id) {
        if(!PermissionService::checkPermission('userModify')) throw new \Exception('Nemate dozvolu da izmenite podatke o knjigovodji!');
        $bookkeeper = Bookkeeper::find($id);

        $bookkeeper->name  = $name;
        $bookkeeper->email = $email;

        $bookkeeper->save();
    }

    /**
     *
     * DELETE
     *
     */

    public static function deleteBookkeeper($id) {
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da izbrisete knjigovodju!');

        $bookkeeper =  Bookkeeper::find($id);

        $bookkeeper->delete();
    }

}
