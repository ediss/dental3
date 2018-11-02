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
                                    @foreach($data['permissions'] as $permission)
                                        <tr>
                                            <td>{{ $permission->permission }}</td>
                                            <td>{{ $permission->description }}</td>
                                            <td> <a href="#" class ='btn btn-primary'  data-toggle="modal" data-target="#exampleModal-{{$permission->id_permission}}">Izmeni</a><a href="{{ route('admin.permission.delete', $permission->id_permission) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        <h5 class="modal-title" id="exampleModalLabel">Izmena admina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('admin.permission.update', $permission->id_permission)}}">
            {{ csrf_field() }}


            <label>Naziv dozvole:</label>
            <input type="text" name="permission_name" class = 'form-control'  value="{{$permission->permission}}" />

            <label>Opis dozvole:</label>
            <input type="text" name="description" class = 'form-control'  value="{{$permission->description}}" />

            <!-- <label>Lozinka:</label>
            <input type="password" name="password" class = 'form-control' />-->



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

