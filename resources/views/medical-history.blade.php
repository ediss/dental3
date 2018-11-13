@extends('admin/admin-main')

@section('content')
    <div class="content">


<?php
/*
        {{Form::open(array('route' => array ('doctor.insert.patient.files', 2), 'files' => true))}}

        {{Form::label('user_photo', 'User Photo',['class' => 'control-label'])}}
        {{Form::file('patient_files')}}
        {{Form::submit('Save', ['class' => 'btn btn-success'])}}

        {{Form::close()}} */
?>

@include('components.messages')
        <div class="title m-b-md">

        </div>


    <div class="alert alert-success" id = "success-messages" role="alert"></div>
    <div class="alert alert-danger"  id = "error-messages" role="alert"></div>

    <div class="row">
        <div class="col-md-3 bg-white">
            <div class = 'm-5 d-flex justify-content-center'>
                <img src="/img/150.png" alt="" class="rounded-circle">
            </div>

            <div class = 'd-flex justify-content-center'>
            <h2>{{$data['user']->name}}</h2>

            </div>
            <hr/>
            <p class  ="float-left">E-mail adresa:</p>
            <p class = "float-right"> {{ $data['user']->email }}</p><br/><br/>

            <p class  ="float-left">Pol:</p>

            <i class = "fas {{$data['user']->gender == 'male' ? 'fa-mars' : 'fa-venus'}} fa-2x float-right"></i>


        </div>

            <div class="links col-md-8">
            <table class="table  table-dark">
                <thead>
                    <tr>
                    <!-- <th scope="col">#</th>-->
                        <th scope="col">Zub</th>
                        <th scope="col">Usluga</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Termin</th>
                        <th scope="col">Beleška</th>
                        <th scope="col">Dokument</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['patientHistories'] as $patientHistory)
                        <tr>
                            <td>{{ $patientHistory->tooth}}</td>
                            <td>{{ $patientHistory->service->service }}</td>
                            <td>{{ $patientHistory->date_appoitment }}</td>
                            <td>{{ $patientHistory->term->term }}</td>
                            <td>{{ $patientHistory->note }}</td>
                            <td><img src ="{{URL::to( $patientHistory->patient_file )}}" width="50px" height="40px"></td>

                            <!--<td> <a href = "#" class = "btn btn-primary"> <strong>Karton</strong></a></td>-->
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="text-center">
                    {!!$data['patientHistories']->links();!!}
                </div>
        </div>
    </div>

    <div class = "row">
    
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