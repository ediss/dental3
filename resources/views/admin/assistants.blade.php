@extends ('admin.admin-main')

@section('content')

@include('components.messages')

    <div class="alert alert-success" id = "success-messages" role="alert"></div>
    <div class="alert alert-danger"  id = "error-messages" role="alert"></div>

    <div class="content">
        <div class="title m-b-md">
           <h1>Asistenti</h1>
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
                    @foreach($data['assistants'] as $assistant)
                        <tr>
                            <td>{{ $assistant->name }}</td>
                            <td>{{ $assistant->email }}</td>
                            <td>
                                <a href="#" class ='btn btn-primary openModal'      data-id = "{{$assistant->id}}" data-toggle="modal" data-target="#exampleModal-{{$assistant->id}}">Izmeni</a>
                                <a href="#" class = 'btn btn-danger ml-1 openModal' data-id = "{{$assistant->id}}" data-toggle="modal" data-target="#confirm-delete-{{$assistant->id}}">Izbriši</a>
                            </td>
                            <td> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!!$data['assistants']->links();!!}
            </div>
        </div>
    </div>
@endsection

@section('modal')

<!-- Modal -->
@foreach($data['assistants'] as $assistant)
<div class="modal fade" id="exampleModal-{{$assistant->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmena Asistenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST">
            {{ csrf_field() }}


            <label>Ime:</label>
            <input type="text"  id = "username_{{$assistant->id}}"      name="name"  class = 'form-control'  value="{{$assistant->name}}" />

            <label>E-mail adresa:</label>
            <input type="email" id = "email_{{$assistant->id}}"         name="email" class = 'form-control'  value="{{$assistant->email}}" />

            <!-- <label>Lozinka:</label>
            <input type="password" name="password" class = 'form-control' />-->



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <button type="submit" class='btn btn-success' name = "admin_update">Sačuvaj izmene</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for delete assistant -->

<div class="modal fade" id="confirm-delete-{{$assistant->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                POTVRDA
            </div>
            <div class="modal-body">
                <p>Da li ste sigurni da želite da izbrišete asistenta "{{$assistant->name}}"?</p>
            </div>
            <div class="modal-footer">
                <form method = "POST">
                    {{ csrf_field() }}

                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    <button type="submit" class="btn btn-danger btn-ok" name = "delete-admin">Izbriši</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
