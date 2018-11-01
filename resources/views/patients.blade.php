@extends('admin/admin-main')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif

       @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
    @endif

    <div class="content">

        <div class="title m-b-md">
            <h1>Uvid u pacijente</h1>
        </div>

        <div class="links">
            <table class="table  table-dark">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th>-->
                        <th scope="col">Informacije o pacijentu</th>
                        <th scope="col">Kontakt informacije</th>
                        <th scope="col">Dodaj dokument</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['patients'] as $patient)
                        <tr>
                            <td>
                                ime: {{ $patient->patient_name }}<br/>
                                pol: {{ ($patient->gender === 'male') ? 'Muški' : 'Ženski'}}<br/>
                                datum rodjenja: {{ date('d-m-Y', strtotime($patient->date_of_birth))}}<br/>
                                doktor: {{$patient->doctor_name}}
                            </td>
                            <td>{{ $patient->patient_email }}</td>
                            <td> <a href = "#"  data-toggle="modal" data-target="#addFilesModal-{{$patient->patient_id}}"> <i class="fas fa-plus-circle"></i></a></td>
                            <td> <a href = "#" class = "btn btn-success"  data-toggle="modal" data-target="#exampleModal-{{$patient->patient_id}}"><strong>Zakazi pregled</strong></a> <a href = "{{ route('patient.medical.history', $patient->patient_id) }}" class = "btn btn-primary"> <strong>Karton</strong></a></td>
                            <!--<td> <a href = "#" class = "btn btn-primary"> <strong>Karton</strong></a></td>-->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('modal')
@foreach($data['patients'] as $patient)

<div class="modal fade" id="exampleModal-{{$patient->patient_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zakazivanje pregleda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('doctor.make-appointment.submit')}}">
        @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pacijent') }}</label>

                <div class="col-md-6">
                    <select name = 'patients' class = 'form-control'>
                            <option value = "{{ $patient->patient_id }}" > {{$patient->patient_name}} </option>
                    </select>
                    <!--<input id="name" type="text" class="form-control" name="name" value="" required autofocus>-->
                </div>
            </div>

            <div class="form-group row">
                <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Usluga') }}</label>

                <div class="col-md-6">
                    <select name = 'services' class = 'form-control'>
                        @foreach ($data['services'] as $service)
                            <option value = "{{ $service->id_service }}" > {{$service->service}} </option>
                        @endforeach
                    </select>
                <!--  <input id="service" type="text" name = "service" class="form-control" required>-->
                </div>
            </div>

               <div class="form-group row">
                <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Zub') }}</label>

                <div class="col-md-6">
                    <select name = 'teeth' class = 'form-control'>
                        <option value = "izaberi" > Izaberi </option>
                        <option value = "1" > 1 </option>
                        <option value = "2" > 2 </option>
                        <option value = "3" > 3 </option>
                        <option value = "4" > 4 </option>
                        <option value = "5" > 5 </option>
                    </select>
                <!--  <input id="service" type="text" name = "service" class="form-control" required>-->
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Datum') }}</label>

                <div class="col-md-6">
                    <input id="date" type="date" class="form-control" name="date" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="term" class="col-md-4 col-form-label text-md-right">{{ __('Termin') }}</label>

                <div class="col-md-6">
                    <select name = 'terms' class = 'form-control'>
                        @foreach ($data['terms'] as $term)
                            <option value = "{{ $term->id_term }}" > {{$term->term}} </option>
                        @endforeach
                    </select>

                <!--  <input id="term" type="text" class="form-control" name="term" required>-->
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <input type="submit" class='btn btn-success' value = "Zakazi">
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->
@foreach($data['patients'] as $patient)

<div class="modal fade" id="addFilesModal-{{$patient->patient_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unesi dokument za {{$patient->patient_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    <form method="POST" action="{{ route('doctor.insert.patient.files', $patient->patient_id) }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Izaberi:') }}</label>

                <div class="col-md-6">
                    <input type="file" name="patient_files" >
                </div>
            </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <input type="submit" class='btn btn-success' value = "Unesi">
    </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
