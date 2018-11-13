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

    public function __construct() {
        $this->middleware('auth:admin');
    }


    public function done_appointment(Request $request, $id_appointment) {

        $data = [
            'patient_id'    => $request->input('patient-appointment'),
            'service_id'    => $request->input('service-appointment'),
            'tooth'         => $request->input('tooth-appointment'),
            'date'          => $request->input('date-appointment'),
            'term_id'       => $request->input('term-appointment'),
            'done_service'  => $request->input('done-service'),
            'paid_service'  => $request->input('paid-service'),
            'note'          => $request->input('note'),
        ];

        $request->validate( [
            'tooth-appointment'  =>  'required|numeric|nullable',
        ]);

        /*$patient_id     = $request->input('patient-appointment');
        $service_id     = $request->input('service-appointment');
        $tooth          = $request->input('tooth-appointment');
        $date           = $request->input('date-appointment');
        $term_id        = $request->input('term-appointment');
        $done_service   = $request->input('done-service');
        $paid_service   = $request->input('paid-service');*/

        //dozvola
        $file = $request->file('patient_files');

        $name = time(). '.' . $file->getClientOriginalExtension();
        $path = $file ? $file->move('PatientsDocuments/'.$id_appointment, $name) : null;


        DoctorService::done_appointment($data['done_service'], $data['note'], $path, $id_appointment);

        //dozvola
        //PaymentService::paid($patient_id, $service_id, $date, $term_id, $paid_service);
        PaymentService::createOrUpdate($data);


        Session::flash('success', 'Uspešno ste dodali informacije o pregledu!');
        return redirect('doktor/pregledi');
    }

    public function index() {
        $data = array (
            //"patients" => UserService::getUsers(),
            "patients" => DoctorService::getPatients(),
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
    public function patientMedicalHistory($patient_id) {
        //dozvola
        return self::response('medical-history', [
            'patientHistories'  =>  DoctorService::getpatientMedicalHistory($patient_id),
            'patient_id'        =>  $patient_id,
            'patient_files'     =>  UserService::getPatientFiles($patient_id),
            'user' => UserService::getUser($patient_id),
        ]);
    }

    public function insertPatientFiles(Request $request, $patient_id) {

        $request->validate([
            'patient_files' => 'required',
        ]);

        $file = $request->file('patient_files');
        $name = time(). '.' . $file->getClientOriginalExtension();
        $path = $file ? $file->move('PatientsDocuments/'.$patient_id, $name) : null;

        UserService::uploadPatientFile($path, $patient_id);

        return self::patientMedicalHistory($patient_id);

    }


    public function createAppointment(Request $request) {

        $name       = $request->input('patients');
        $service    = $request->input('services');
        $date       = $request->input('date');
        $term       = $request->input('terms');
        $tooth      = $request->input('teeth');
        $doctor     = UserService::getPatientDoctor($name);

        ($tooth === 'izaberi') ? $tooth = null : $tooth = $request->input('teeth');

        $request->validate( [
            'teeth'  =>  'integer|nullable',
        ]);

        DoctorService::createAppointment($name, $doctor, $date, $term, $service, $tooth);

        Session::flash('success', 'Uspešno ste zakazali pregled!');

        return redirect('doktor/pregledi');

    }


}
