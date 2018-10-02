<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\FolderService;
use App\Providers\UserService;
use App\Providers\AdminService;
use App\Providers\RoleService;
use Session;

class Register extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    use RegistersUsers;

    public function showRegistrationForm() {
       /* $roles = RoleService::getRoles();
        return view('auth.register', $roles);

        trosenje ram memorije zbog pravljenja vise promenljivih
        */

        return self::response('auth.register');
    }

    /**
     * Registring users
     *
     * @param Request $request
     * @return void
     */
    public static function register(Request $request){
        $name       = $request->input('name');
        $email      = $request->input('email');
        $password   = Hash::make($request->input('password'));
        $role       = $request->input('role');

        if ($role == 3) {
            $id = UserService::createUser($name, $email, $password);
            FolderService::createFolder($id, FolderService::$patien_document_route);
        } else {
            AdminService::createAdmin($name, $email, $password, $role);
        }

        Session::flash('success', 'Uspesno ste registrovali novog korisnika!');

        return self::response('admin/admin-home');

    }
}
