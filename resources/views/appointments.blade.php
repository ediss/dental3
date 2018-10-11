@extends('admin/admin-main')

@section('content')

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="content">

                <div class="title m-b-md">
                   <h1>Uvid u preglede</h1>
                </div>

                <div class="links">
                    <!--ubacis formu sa rutom prema nekom kontroleru koji ce pozvati provider koji ce uneti u bazu-->
                <table class="table  table-dark">
                    <thead>
                        <tr>
                           <!-- <th scope="col">#</th>-->
                            <th scope="col">Pacijent</th>
                            <th scope="col">Usluga</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Termin</th>
                            <th scope="col">Doktor</th>
                            <th scope="col">Obavljen pregled?</th>
                            <th scope="col">Placeno?</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form method="POST" id="appointmentForm">
                    @csrf

                        @foreach($data['appointments'] as $appointment)
                            <tr>
                                <td id = 'id_patient' data-patientid = "{{ $appointment->patient->id }}">
                                    {{ $appointment->patient->name }}
                                </td>

                                <td id = 'id_service' data-serviceid = "{{ $appointment->service->id_service }}">
                                    {{ $appointment->service->service }}
                                </td>

                                <td>{{ $appointment->service->price }}</td>
                                <td>{{ date('d-M-Y', strtotime($appointment->date_appoitment))}}</td>

                                <td id = 'id_term' data-term = "{{ $appointment->term->id_term }}">
                                    {{ $appointment->term->term }}
                                </td>

                                <td id = 'id_doctor' data-doctor = "{{ $appointment->doctor->id }}">
                                    {{ $appointment->doctor->name }}
                                </td>
                                <td><input type='checkbox'  name = 'checkboxvar[]'  value='Da'></td>
                                <td><input type='checkbox' name='checkboxpaid[]' value='Da'></td>
                                <td><input type='hidden' name='skriveno' value='{{$appointment->id_appoitment}}'></td>
                            </tr>
                        @endforeach
                        <button type="submit" class="btn btn-primary">{{ __('Sacuvaj') }}</button>
                        </form>
                    </tbody>
                </table>
                </div>
            </div>
@endsection
