@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zakazivanje pregleda') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('doctor.make-appointment.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pacijent') }}</label>

                            <div class="col-md-6">
                                <select name = 'patients' class = 'form-control'>
                                    @foreach ($patients as $patient)
                                        <option value = "{{ $patient->id }}" > {{$patient->name}} </option>
                                    @endforeach
                                </select>
                                <!--<input id="name" type="text" class="form-control" name="name" value="" required autofocus>-->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service" class="col-md-4 col-form-label text-md-right">{{ __('Usluga') }}</label>

                            <div class="col-md-6">
                                <select name = 'services' class = 'form-control'>
                                    @foreach ($services as $service)
                                        <option value = "{{ $service->id_service }}" > {{$service->service}} </option>
                                    @endforeach
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
                                    @foreach ($terms as $term)
                                        <option value = "{{ $term->id_term }}" > {{$term->term}} </option>
                                    @endforeach
                                </select>

                              <!--  <input id="term" type="text" class="form-control" name="term" required>-->
                            </div>
                        </div>

              

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zakazi') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection