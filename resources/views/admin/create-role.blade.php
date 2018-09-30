@extends ('admin.admin-main')

@section('content')

        <div class="col-md-4">
            <div class="card">

                <div class="card-header">{{ __('Kreiranje nove uloge') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.role.create.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naziv uloge:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
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
    

@endsection
