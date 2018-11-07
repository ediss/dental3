@extends ('admin.admin-main')

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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="alert alert-success" role="alert">

                </div>
            <div class="content" style = 'width:100%;'>
<div id = "proba">
</div>
                <div class = 'row'>
                    <div class = 'col-md-8' style = "margin-left:45px;">
                    <div class="title m-b-md">
                        <h1>Dozvole</h1>
                    </div>
                        <div class="links">
                            <table class="table  table-dark" id ="permission_table">
                                <thead>
                                    <tr>
                                    <!-- <th scope="col">#</th>-->
                                        <th scope="col">Naziv dozvole</th>
                                        <th scope="col">Opis dozvole</th>
                                        <th scope="col">Uloge kojima pripada dozvola</th>
                                        <th scope="col">Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['permissions'] as $permission)
                                        <tr>
                                            <td class='permission_table_td'>{{ $permission->permission }}</td>
                                            <td>{{ $permission->description }}</td>
                                            <td>
                                                @foreach($permission->permissionsRoles as $role)
                                                    {{ $role->role }}<br/>
                                                @endforeach
                                            </td>
                                            <td><a href="#" class ='btn btn-primary openModal'  data-toggle="modal" data-id = "{{$permission->id_permission}}" data-target="#exampleModal-{{$permission->id_permission}}">Izmeni</a><a href="{{ route('admin.permission.delete', $permission->id_permission) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!!$data['permissions']->links();!!}
                            </div>
                        </div>
                        <a href = "{{route('admin.permission.create')}}" class = "btn btn-success btn-block">Unesi novu dozvolu</a>
                    </div>

                </div>

@endsection
@section('modal')

<!-- Modal -->
@foreach($data['permissions'] as $permission)
<div class="modal fade" id="exampleModal-{{$permission->id_permission}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmena dozvole</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method = "POST">
            {{ csrf_field() }}


            <label>Naziv dozvole:</label>
            <input type="text"    id = "permisssion_name_{{$permission->id_permission}}"  name="permission_name" class = 'form-control'  value="{{$permission->permission}}" />

            <label>Opis dozvole:</label>
            <input type="text"    id = "description_{{$permission->id_permission}}"       name="description"     class = 'form-control'  value="{{$permission->description}}" />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <button type="submit" class='btn btn-success' name = "update-permission">Sačuvaj</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection

