@extends ('admin.admin-main')

@section('content')

@include('components.messages')

    <div class="alert alert-success" id = "success-messages" role="alert"></div>
    <div class="alert alert-danger"  id = "error-messages" role="alert"></div>


    <div class="content">
        <div class="title m-b-md">
           <h1>Knjigovodje</h1>
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
                    @foreach($data['bookkeepers'] as $bookkeeper)
                        <tr>
                            <td>{{ $bookkeeper->name }}</td>
                            <td>{{ $bookkeeper->email }}</td>
                            <td>
                                <a href="#" class ='btn btn-primary openModal'      data-id = "{{$bookkeeper->id}}" data-toggle="modal" data-target="#exampleModal-{{$bookkeeper->id}}">Izmeni</a>
                                <a href="#" class = 'btn btn-danger ml-1 openModal' data-id = "{{$bookkeeper->id}}" data-toggle="modal" data-target="#confirm-delete-{{$bookkeeper->id}}">Izbriši</a>
                            </td>
                            <td> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modal')

<!-- Modal -->
@foreach($data['bookkeepers'] as $bookkeeper)

<div class="modal fade" id="exampleModal-{{$bookkeeper->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmena knjigovodje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST">
            {{ csrf_field() }}


            <label>Ime:</label>
            <input type="text" id = "username_{{$bookkeeper->id}}"  name="name"   class = 'form-control'  value="{{$bookkeeper->name}}" />

            <label>E-mail adresa:</label>
            <input type="email" id = "email_{{$bookkeeper->id}}"    name="email"  class = 'form-control'  value="{{$bookkeeper->email}}" />


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <button type="submit" class='btn btn-success' name = "admin_update">Sačuvaj izmene</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for delete bookkeper -->

<div class="modal fade" id="confirm-delete-{{$bookkeeper->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                POTVRDA
            </div>
            <div class="modal-body">
                <p>Da li ste sigurni da želite da izbrišete knjigovođu "{{$bookkeeper->name}}"?</p>
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
