<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\UserService;
use App\Providers\ServiceService;
use App\Providers\TermsService;
use App\Providers\DoctorService;
use Session;

class DoctorController extends Controller
{
    public function getPatients() {
        return self::response('patients', ['patients'=>DoctorService::getPatients()]);
    }

    public function index() {
        $data = array (
            "patients" => UserService::getUsers(),
            "services" => ServiceService::getServices(),
            "terms"    => TermsService::getTerms(),
        );
        return self::response('make-appointment', $data);
    }

    public function createAppointment(Request $request) {

        $name       = $request->input('patients');
        $service    = $request->input('services');
        $date       = $request->input('date');
        $term       = $request->input('terms');
        $doctor     = 2;

        DoctorService::createAppointment($name, $doctor, $date, $term, $service);

        Session::flash('success', 'Uspesno ste zakazali pregled!');
        return redirect('doktor/pregledi');

    }
}
