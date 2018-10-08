@extends ('admin.admin-main')

@section ('content')
    <div class = 'col-md-4'>
        <div class="title">
            Dodeljivanje dozvola
        </div>

        <div class="card">

            <div class="card-header">{{ __('Dodeljivanje dozvole ulozi') }}</div>

            <div class="card-body table-dark">
                <form method="POST" action="{{ route('admin.role-permission.create.submit') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Uloga:') }}</label>

                        <div class="col-md-6">
                            <select name = 'roles' class = 'form-control'>
                                @foreach ($roles as $role)
                                    <option value = "{{ $role->id_role }}" > {{$role->role}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dozvola:') }}</label>

                            <div class="col-md-6">
                                <select name = 'permissions' class = 'form-control'>
                                    @foreach ($data['permissions'] as $permission)
                                        <option value = "{{ $permission->id_permission }}" > {{$permission->permission}} </option>
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