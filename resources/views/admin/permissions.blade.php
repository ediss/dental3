@extends ('admin.admin-main')

@section('content')

            <div class="content" style = 'width:100%;'>

                <div class = 'row'>
                    <div class = 'col-md-8' style = "margin-left:45px;">
                    <div class="title m-b-md">
                        <h1>Dozvole</h1>
                    </div>
                        <div class="links">
                            <table class="table  table-dark">
                                <thead>
                                    <tr>
                                    <!-- <th scope="col">#</th>-->
                                        <th scope="col">Naziv dozvole</th>
                                        <th scope="col">Opis dozvole</th>
                                        <th scope="col">Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->permission }}</td>
                                            <td>{{ $permission->description }}</td>
                                            <td> <a href="{{ route('admin.permission.edit', $permission->id_permission)}} " class ='btn btn-primary'>Izmeni</a><a href="{{ route('admin.permission.delete', $permission->id_permission) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href = "{{route('admin.permission.create')}}" class = "btn btn-success btn-block">Unesi novu dozvolu</a>
                    </div>

                </div>

@endsection
