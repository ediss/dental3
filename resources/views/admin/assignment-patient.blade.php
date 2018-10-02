@extends ('admin.admin-main')

@section ('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class = 'col-md-4'>
        <div class="title">
            <h1>Dodeljivanje pacijenata</h1>
        </div>

        <div class="card">

            <div class="card-header">{{ __('Dodeljivanje pacijenata doktoru') }}</div>

            <div class="card-body table-dark">
                <form method="POST" action="{{ route('admin.assigngment-patient.submit') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pacijent:') }}</label>

                        <div class="col-md-6">
                            <select name = 'patients' class = 'form-control'>
                                @foreach ($data['patients'] as $patient)
                                    <option value = "{{ $patient->id }}" > {{ $patient->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Doktor:') }}</label>

                            <div class="col-md-6">
                                <select name = 'doctors' class = 'form-control'>
                                    @foreach ($data['doctors'] as $doctor)
                                        <option value = "{{ $doctor->id }}" > {{ $doctor->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">{{ __('Dodeli') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection