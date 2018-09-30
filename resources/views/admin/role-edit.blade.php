@extends ('admin.admin-main')

@section('content')

            <div class="content">
                <div class="title">
                    <h1>Izmena Uloge</h1>
                </div>

                <div class="col-md-4">
                <div class="card">

                <div class="card-body">

                    <form method="post" action="{{ route('admin.role.update', $role->id_role)}}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naziv uloge:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$role->role}}" required autofocus>
                            </div>
                        </div>
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sacuvaj') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
@endsection
