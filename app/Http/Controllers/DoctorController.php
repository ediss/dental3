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
    /**
     *
     * READ
     *
     */

    public function index() {
        $data = array (
            "patients" => UserService::getUsers(),
            "services" => ServiceService::getServices(),
            "terms"    => TermsService::getTerms(),
        );
        return self::response('make-appointment', $data);
    }

     /**
      * Get patients
      *
      * @return array
      */
    public function getPatients() {
        $data = array (
            'patients' => DoctorService::getPatients(),
            "services" => ServiceService::getServices(),
            "terms"    => TermsService::getTerms(),
        );
        return self::response('patients', $data);
    }

    /**
     * Get patient medical history
     *
     *
     */
    public function patientMedicalHistory($patient_id){

        return self::response('medical-history', ['patientHistories' => DoctorService::getpatientMedicalHistory($patient_id)]);
    }


    public function createAppointment(Request $request) {

        $name       = $request->input('patients');
        $service    = $request->input('services');
        $date       = $request->input('date');
        $term       = $request->input('terms');
        $doctor     = DoctorService::getCurrentDoctor()->id;

        DoctorService::createAppointment($name, $doctor, $date, $term, $service);

        Session::flash('success', 'Uspesno ste zakazali pregled!');
        return redirect('doktor/pregledi');

    }
}
