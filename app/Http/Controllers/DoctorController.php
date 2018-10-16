<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\UserService;
use App\Providers\ServiceService;
use App\Providers\TermsService;
use App\Providers\DoctorService;
use App\Providers\PaymentService;
use Session;

class DoctorController extends Controller
{
    /**
     *
     * READ
     *
     */

    public function done_appointment(Request $request, $id_appointment) {
        $patient_id     = $request->input('patient-appointment');
        $service_id     = $request->input('service-appointment');
        $date           = $request->input('date-appointment');
        $term_id        = $request->input('term-appointment');
        $done_service   = $request->input('done-service');
        $paid_service   = $request->input('paid-service');

        //dozvola
        DoctorService::done_appointment($done_service, $id_appointment);

        //dozvola
        //zoves payment service i prosledis mu sve
        PaymentService::paid($patient_id, $service_id, $date, $term_id, $paid_service);

        //dozvola
        //zoves DoneService i prosledis mu sve
        //ili samo iz tabele appointment izvces tamo gde je donesevice = da

        Session::flash('success', 'Uspesno ste dodali informacije o pregledu!');
        return redirect('doktor/pregledi');
    }

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
