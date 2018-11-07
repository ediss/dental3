

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
                        @foreach($roles as $role)

                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->email }}</td>

                                <td> <a href="#" class ='btn btn-primary' data-toggle="modal" data-target="#exampleModal-{{$role->id}}">Izmeni</a><a href="{{ route('admin.assistant.delete', $role->id) }}" class = "btn btn-danger ml-1">Izbriši</a></td>
                                <td> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>


@section('modal')

<!-- Modal -->
@foreach($roles as $role)
<div class="modal fade" id="exampleModal-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmena Asistenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('admin.assistant.update', $role->id)}}">
            {{ csrf_field() }}


            <label>Ime:</label>
            <input type="text" name="name"   class = 'form-control'  value="{{$role->name}}" />

            <label>E-mail adresa:</label>
            <input type="email" name="email" class = 'form-control'  value="{{$role->email}}" />

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
