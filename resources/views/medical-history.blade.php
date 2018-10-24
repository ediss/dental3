@extends('admin/admin-main')

@section('content')
    <div class="content">

        <div class="title m-b-md">
            <h1>Uvid u karton pacijenta</h1>
        </div>

        <div class="links">
            <table class="table  table-dark">
                <thead>
                    <tr>
                    <!-- <th scope="col">#</th>-->
                        <th scope="col">Pacijent</th>
                        <th scope="col">Usluga</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Termin</th>
                        <th scope="col">Doktor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['patientHistories'] as $patientHistory)
                        <tr>
                            <td>{{ $patientHistory->patient->name }}</td>
                            <td>{{ $patientHistory->service->service }}</td>
                            <td>{{ $patientHistory->date_appoitment }}</td>
                            <td>{{ $patientHistory->term->term }}</td>
                            <td>{{ $patientHistory->doctor->name }}</td>
                            <!--<td> <a href = "#" class = "btn btn-primary"> <strong>Karton</strong></a></td>-->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection