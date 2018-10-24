<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Providers\UserService;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user()->id;
        return self::response('user-home', ['appointments' => UserService::getPatientAppointments($user)]);
    }
}
