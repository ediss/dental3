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
        $assistant =  Assistant::find($id);

        $assistant->delete();
    }

}
