@extends('admin.admin-main')

@section('content')

@include('components.messages')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Kreiranje nove dozvole') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.permission.create.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naziv dozvole:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="permission_name" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Opis:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="description" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Napravi') }}
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
