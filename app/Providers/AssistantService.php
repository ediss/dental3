<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admin as Assistant;

class AssistantService extends ServiceProvider
{
    /**
     *
     * READ
     *
     */


    public static function getAssistants() {
        return  Assistant::where('role_id', '4')->get();
    }

    /**
     *
     * UPDATE
     *
     */

    public static function updateAssistant($name, $email, $id) {
        if(!PermissionService::checkPermission('userModify')) throw new \Exception('Nemate dozvolu da izmenite podatke o  asistentu!');
        $assistant = Assistant::find($id);

        $assistant->name  = $name;
        $assistant->email = $email;

        $assistant->save();
    }

    /**
     *
     * DELETE
     *
     */

    public static function deleteAssistant($id) {
        if(!PermissionService::checkPermission('userModify')) throw new \Exception('Nemate dozvolu da izbrisete asistenta!');

        $assistant =  Assistant::find($id);

        $assistant->delete();
    }

}
