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

                                <td> <a href="#" class ='btn btn-primary' data-toggle="modal" data-target="#exampleModal-{{$bookkeeper->id}}">Izmeni</a><a href="{{ route('admin.delete', [$bookkeeper->id, 'knjigovodje']) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
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

        <form method="post" action="{{ route('admin.update.submit', [$bookkeeper->id, 'knjigovodje'])}}">
            {{ csrf_field() }}


            <label>Ime:</label>
            <input type="text" name="name"   class = 'form-control'  value="{{$bookkeeper->name}}" />

            <label>E-mail adresa:</label>
            <input type="email" name="email" class = 'form-control'  value="{{$bookkeeper->email}}" />

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
