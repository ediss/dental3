@extends('admin/admin-main')

@section('content')

            <div class="content">
                <div class="title m-b-md">
                   <h1>Uvid u preglede</h1>
                </div>


                <form method="GET" id="appointmentForms">
                    @csrf

                    <h5>Izaberi datum</h5>
                    <input type = 'date' name = 'date-appointment' id = 'date-appointment'>
                </form>
                <div class="links" id ="appointments-table">
                    <!--ubacis formu sa rutom prema nekom kontroleru koji ce pozvati provider koji ce uneti u bazu-->
                <table class="table  table-dark">
                    <thead>
                        <tr>
                           <!-- <th scope="col">#</th>-->
                            <th scope="col">Pacijent</th>
                            <th scope="col">Usluga</th>
                            <th scope="col">Zub</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Termin</th>
                            <th scope="col">Doktor</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form method="POST" id="appointmentForm">
                    @csrf

                        @foreach($data['appointments'] as $appointment)
                            <tr>
                                <td>{{ $appointment->patient->name }}</td>

                                <td>{{ $appointment->service->service }}</td>
                                <td>{{ $appointment->tooth }}</td>

                                <td>{{ $appointment->service->price }}</td>
                                <td>{{ date('d-M-Y', strtotime($appointment->date_appoitment))}}</td>

                                <td>{{ $appointment->term->term }}</td>

                                <td>{{ $appointment->doctor->name }}</td>
                            </tr>
                        @endforeach

                        </form>
                    </tbody>
                </table>
                </div>
            </div>
@endsection
