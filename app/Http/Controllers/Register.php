<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Providers\FolderService;
use App\Providers\UserService;
use App\Providers\RoleService;

class Register extends Controller
{
    use RegistersUsers;

    public function showRegistrationForm()
    {
       /* $roles = RoleService::getRoles();
        return view('auth.register', $roles);

        trosenje ram memorije zbog pravljenaj vise promenljivih
        */

        return view('auth.register', ['roles' => RoleService::getRoles()]);
    }

    /**
     * Registring users
     *
     * @param Request $request
     * @return void
     */
    public static function register(Request $request){

        //$id         = Auth::id();
        //$id ='nesto';
        $name       = $request->input('name');
        $email      = $request->input('email');
        $password   = Hash::make($request->input('password'));
        $role       = $request->input('role');

        $id =  UserService::createUser($name, $email, $password);
        // admin servis createAdmin
        FolderService::createFolder($id, FolderService::$patien_document_route);

        return view('admin-home');
    }
}
