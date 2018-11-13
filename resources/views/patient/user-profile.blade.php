@extends('admin.admin-main')

@section('content')

@include('components.messages')

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

    <div class="col-md-6 bg-white ml-2 mr-2">

    <div class = "col-md p-5">
        <form action = "POST">

            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>

                <div class="col-md-6">
                    <input id="patient_name" type="text" class="form-control" name="patient_name" value="{{$data['user']->name}}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Pol') }}</label>

                <div class="col-md-6">
                    <input type="radio"  name="rbgender" value = 'male'     {{ $data['user']->gender == 'male'      ? 'checked' : '' }}>Muški<br/>
                    <input type="radio"  name="rbgender" value = 'female'   {{ $data['user']->gender == 'female'    ? 'checked' : '' }}>Ženski
                </div>
            </div>

            <div class="form-group row">
                <label for="date-of-birth" class="col-md-4 col-form-label text-md-right">{{ __('Datum rođenja') }}</label>

                <div class="col-md-6">
                    <input type="date" id = "date_of_birth"  name="date_of_birth" value = "{{$data['user']->date_of_birth}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adresa') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" id = "email" name="email" value="{{$data['user']->email}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Lozinka') }}</label>

                <div class="col-md-6">
                    <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id = "password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potvrdi lozinku') }}</label>

                <div class="col-md-6">
                    <input  type="password" class="form-control" id = "password_confirmation" name="password_confirmation" required>
                </div>
            </div>
                <input type = 'hidden'  id = "hiddenId" name = "hiddenId"  value = "{{$data['user']->id}}">
              <button type="submit"     name = "update-patient" class="btn btn-primary form-control">Izmeni</button>

        </form>

    </div>


    </div>

    <div class="col-md-2 bg-white">
        <div class = "col-md p-3">
            <h3>Stomatolog</h3>
            @foreach($data['doctors'] as $doctor)
                <input type = 'checkbox' {{$data['user']->doctor_id == $doctor['id'] ? 'checked' : ""}}>{{$doctor->name}}<br/><br/>
            @endforeach
        </div>
    </div>


</div>

@endsection