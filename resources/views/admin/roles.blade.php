@extends ('admin.admin-main')

@section('content')
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
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
                                <td> <a href="#" class ='btn btn-primary'  data-toggle="modal" data-target="#exampleModal-{{$role->id_role}}">Izmeni</a><a href="{{ route('admin.role.delete', $role->id_role) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href = "{{route('admin.role.create')}}" class = "btn btn-success btn-block">Unesi novu ulogu</a>
                </div>

            </div>
@endsection

@section('modal')

<!-- Modal -->
@foreach($roles as $role)
<div class="modal fade" id="exampleModal-{{$role->id_role}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmena uloge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('admin.role.update', $role->id_role)}}">
            {{ csrf_field() }}


            <label>Naziv uloge:</label>
            <input type="text" name="role"   class = 'form-control'  value="{{$role->role}}" />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <input type="submit" class='btn btn-success' value = "Savucaj izmene">
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
