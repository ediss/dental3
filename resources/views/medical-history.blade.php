@extends('admin/admin-main')

@section('content')
    <div class="content">

    <form method="POST" action="{{ route('doctor.insert.patient.files', $data['patient_id']) }}" enctype="multipart/form-data">
    @csrf

        <label>Izaberi:</label>
        <input type="file" name="patient_files" >
        <input type = 'submit' name = 'btn-submit' class = 'btn btn-success' value = 'Dodaj dokument'>
    </form>

<?php
/*
        {{Form::open(array('route' => array ('doctor.insert.patient.files', 2), 'files' => true))}}

        {{Form::label('user_photo', 'User Photo',['class' => 'control-label'])}}
        {{Form::file('patient_files')}}
        {{Form::submit('Save', ['class' => 'btn btn-success'])}}

        {{Form::close()}} */
?>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif
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
        <div class = 'row'>
            @foreach($data['patient_files'] as $file)
                <div class = 'col-md-4'>
                    <img src="{{URL::to($file->img_src)}}">
                </div>
            @endforeach
        </div>
    </div>

@endsection