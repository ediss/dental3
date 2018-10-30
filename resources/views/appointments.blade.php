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
                            <th scope="col">Obavljen pregled?</th>
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
                                <td><a href = "#" class = "btn btn-primary"  data-toggle="modal" data-target="#exampleModal-{{$appointment->id_appoitment}}">Prikazi formular</a> </td>
                            </tr>
                        @endforeach

                        </form>
                    </tbody>
                </table>
                </div>
            </div>
@endsection
@section('modal')
@foreach($data['appointments'] as $appointment)

<div class="modal fade" id="exampleModal-{{$appointment->id_appoitment}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zakazivanje pregleda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('doctor.done-appointment', $appointment->id_appoitment)}}">
        @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pacijent') }}</label>

                <div class="col-md-6">
                    <select name = 'patient-appointment' class = 'form-control' readonly>
                            <option value = "{{ $appointment->patient->id }}" > {{$appointment->patient->name}} </option>
                    </select>
                    <!--<input id="name" type="text" class="form-control" name="name" value="" required autofocus>-->
                </div>
            </div>

            <div class="form-group row">
                <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Usluga') }}</label>

                <div class="col-md-6">
                    <select  name = 'service-appointment' class = 'form-control' readonly>
                        <option value = "{{ $appointment->service->id_service }}" > {{$appointment->service->service}} </option>
                    </select>
                <!--  <input id="service" type="text" name = "service" class="form-control" required>-->
                </div>
            </div>

            <div class="form-group row">
                <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Zub') }}</label>

                <div class="col-md-6">
                    <select  name = 'tooth-appointment' class = 'form-control' readonly>
                        <option value = "{{ $appointment->tooth }}" > {{$appointment->tooth}} </option>
                    </select>
                <!--  <input id="service" type="text" name = "service" class="form-control" required>-->
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Datum') }}</label>

                <div class="col-md-6">
                    <input readonly type="text" class="form-control" name="date-appointment" value = "{{ $appointment->date_appoitment }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="term" class="col-md-4 col-form-label text-md-right">{{ __('Termin') }}</label>

                <div class="col-md-6">
                    <select name = 'term-appointment' class = 'form-control'readonly >
                        <option value = "{{ $appointment->term->id_term }}" > {{$appointment->term->term}} </option>
                    </select>

                <!--  <input id="term" type="text" class="form-control" name="term" required>-->
                </div>
            </div>


            <div class="form-group row">
                <label for="done_service" class="col-md-4 col-form-label text-md-right">{{ __('Obavljeno?') }}</label>

                <div class="col-md-6">
                    <select name = 'done-service' class = 'form-control'>
                        <option value = "Da" > Da </option>
                        <option value = "Ne" > Ne </option>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="paid" class="col-md-4 col-form-label text-md-right">{{ __('Placeno?') }}</label>

                <div class="col-md-6">
                    <select name = 'paid-service' class = 'form-control'>
                        <option value = "1" > Da </option>
                        <option value = "0" > Ne </option>
                    </select>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <input type="submit" class='btn btn-success' value = "Savucaj izmene">
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection