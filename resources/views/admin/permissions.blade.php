@extends ('admin.admin-main')

@section('content')

@include('components.messages')

    <div class="alert alert-success" id = "success-messages" role="alert"></div>
    <div class="alert alert-danger"  id = "error-messages" role="alert"></div>


    <div class="content" style = 'width:100%;'>

        <div class = 'row'>
            <div class = 'col-md-8' style = "margin-left:45px;">
                <div class="title m-b-md">
                    <h1>Dozvole</h1>
                </div>
                <div class="links">
                <!--<input type="search" id="search_permission_table" type="text" placeholder="Search..">-->

                    <table class="table  table-dark" id ="myTable">
                        <thead>
                            <tr>
                                <!-- <th scope="col">#</th>-->
                                <th scope="col">Dozvola</th>
                                <th scope="col">Uloge kojima pripada dozvola</th>
                                <th scope="col">Akcije</th>
                            </tr>
                        </thead>
                        <tbody id = "permission_table_body">
                            @foreach($data['permissions'] as $permission)
                                <tr id = "permission_row_{{$permission->id_permission}}">
                                    <td id = "permission_{{$permission->id_permission}}">{{ $permission->description }}</td>
                                    <td>
                                        @foreach($permission->permissionsRoles as $role)
                                            {{ $role->role }}<br/>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="#" class = 'btn btn-primary openModal'     data-toggle="modal" data-id = "{{$permission->id_permission}}" data-target="#exampleModal-{{$permission->id_permission}}">Izmeni</a>
                                        <a href="#" class = 'btn btn-danger ml-1 openModal' data-toggle="modal" data-id = "{{$permission->id_permission}}" data-target="#confirm-delete-{{$permission->id_permission}}">Izbriši</a>
                                    </td>
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

<!-- Modal for change info about permissions -->
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

            <label> Dozvola:</label>
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
<!--end of modal for change-->

<!-- Modal for delete permissions -->
<div class="modal fade" id="confirm-delete-{{$permission->id_permission}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                POTVRDA
            </div>
            <div class="modal-body">
                <p>Da li ste sigurni da želite da izbrišete dozvolu "{{$permission->permission}}"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                <a class="btn btn-danger btn-ok" name = "delete-permission">Izbriši</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

