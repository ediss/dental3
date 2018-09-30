@extends ('admin.admin-main')

@section('content')
            <div class="content">
                <div class="title">
                   <h1>Rad sa ulogama</h1>
                </div>

                <div class="col-md-6">
                <table class="table  table-dark">
                    <thead>
                        <tr>
                           <!-- <th scope="col">#</th>-->
                            <th scope="col">Naziv uloge</th>
                            <th scope="col">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->role }}</td>
                                <td> <a href="{{ route('admin.role.edit', $role->id_role)}} " class ='btn btn-primary'>Izmeni</a><a href="{{ route('admin.role.delete', $role->id_role) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href = "{{route('admin.role.create')}}" class = "btn btn-success btn-block">Unesi novu ulogu</a>
                </div>
                
            </div>
@endsection
