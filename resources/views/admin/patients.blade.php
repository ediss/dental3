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
                   <h1>Uvid u pacijente</h1>
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
                        @foreach($data['patients'] as $patient)
                            <tr>
                                <td>{{ $patient->patient_name }}</td>
                                <td>{{ $patient->email }}</td>
                                <td> <a href="#" class ='btn btn-primary openModal' data-id = "{{$patient->patient_id}}" data-toggle="modal" data-target="#exampleModal-{{$patient->patient_id}}">Izmeni</a><a href="{{ route('admin.patient.delete', $patient->patient_id) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
                                <td> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!!$data['patients']->links();!!}
                </div>
                </div>
            </div>
@endsection


@section('modal')

<!-- Modal -->
@foreach($data['patients'] as $patient)

<div class="modal fade" id="exampleModal-{{$patient->patient_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmena pacijenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST">
            {{ csrf_field() }}


            <label>Ime:</label>
            <input type="text"  id = "username_{{ $patient->patient_id }}"name="user-name"   class = 'form-control'  value="{{$patient->patient_name}}" />

            <label>E-mail adresa:</label>
            <input type="email" id = "email_{{ $patient->patient_id }}" name="email" class = 'form-control'  value="{{$patient->email}}" />

            <!-- <label>Lozinka:</label>
            <input type="password" name="password" class = 'form-control' />-->



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
        <button type="submit" class='btn btn-success' name = "update-patient">Sačuvaj izmene</button>

        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection