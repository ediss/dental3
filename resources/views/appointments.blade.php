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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['appointmets'] as $appointment)
                            <tr>
                                <td>{{ $appointment->patient->name }}</td>
                                <td>{{ $appointment->service->service }}</td>
                                <td>{{ $appointment->service->price }}</td>
                                <td>{{ date('d-M-Y', strtotime($appointment->date_appoitment))}}</td>
                                <td>{{ $appointment->term->term }}</td>
                                <td>{{ $appointment->doctor->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <a href ="{{ route('doctor.make-appointment.submit')}}" class = "btn btn-success"><strong>Zakazi novi pregled</strong></a>
            </div>
@endsection
