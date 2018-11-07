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

            <div id = "error_message"></div>
            <div id = "success_message"></div>
            <div class="content">
                <div class="title m-b-md">
                   <h1>Administratori</h1>
                </div>

                <div class="links">
                <table class="table  table-dark">
                    <thead>
                        <tr>
                           <!-- <th scope="col">#</th>-->
                            <th scope="col">Ime</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['admins'] as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>

                                <td> <a href="#" class ='btn btn-primary openModal' data-id = "{{$admin->id}}" data-toggle="modal" data-target="#exampleModal-{{$admin->id}}">Izmeni</a><a href="{{ route('admin.delete', [$admin->id, 'admini']) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
                                <td> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!!$data['admins']->links();!!}
                </div>
                </div>
            </div>
@endsection

@section('modal')

<!-- Modal -->
@foreach($data['admins'] as $admin)

<div class="modal fade" id="exampleModal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmena admina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST">
            {{ csrf_field() }}


            <label>Ime:</label>
            <input type="text"  id = "username_{{$admin->id}}" name = "proba"     class = 'form-control'  value="{{$admin->name}}" />

            <label>E-mail adresa:</label>
            <input type="email" id = "email_{{$admin->id}}"    name = "email"    class = 'form-control'  value="{{$admin->email}}" />


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <button type="submit" class='btn btn-success' name = "admin_update">Sačuvaj izmene</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

