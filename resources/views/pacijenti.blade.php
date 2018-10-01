@extends('admin/admin-main')

@section('content')
            <div class="content">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
                <div class="title m-b-md">
                   <h1>Uvid u pacijente</h1>
                </div>

                <div class="links">
                <table class="table  table-dark">
                    <thead>
                        <tr>
                           <!-- <th scope="col">#</th>-->
                            <th scope="col">Pacijent</th>
                            <th scope="col">Doktor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{ $patient->patient_name }}</td>
                                <td>{{ $patient->doctor_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <a href ="{{ route('doctor.make-appointment.submit')}}" class = "btn btn-success"><strong>Zakazi novi pregled</strong></a>
            </div>
@endsection
