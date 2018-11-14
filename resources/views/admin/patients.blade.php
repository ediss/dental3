@extends ('admin.admin-main')

@section('content')

@include('components.messages')

    <div class="alert alert-success" id = "success-messages" role="alert"></div>
    <div class="alert alert-danger"  id = "error-messages" role="alert"></div>

    <div class="content">
        <div class="title m-b-md">
            <h1>Uvid u pacijente</h1>
        </div>
        <div id = "testDiv"></div>
            <div class="links">
            <input type="search" id="search_patient_table" type="text" placeholder="Search..">
           <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">-->
                <table class="table  table-dark" id="patients_table">
                    <thead>
                        <tr>
                           <!-- <th scope="col">#</th>-->
                            <th scope="col">Ime</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Akcije</th>
                        </tr>
                    </thead>
                    <tbody id="patients_table_body">
                        @foreach($data['patients'] as $patient)
                            <tr id = "patient_row_{{$patient->patient_id}}"  data-route = "{{ route('user.profile', $patient->patient_id)}}">
                                <td id = "patient_name_{{$patient->patient_id}}">{{ $patient->patient_name }}</td>
                                <td id = "patient_email_{{$patient->patient_id}}">{{ $patient->email }}</td>
                                <td>
                                    <a href= "{{ route('user.profile', $patient->patient_id) }}" id = "profil_button_{{$patient->patient_id}}" class = 'btn btn-primary' >Profil</a>
                                    <a href="#" class = 'btn btn-danger ml-1 openModal' data-id = "{{$patient->patient_id}}" data-toggle="modal" data-target="#confirm-delete-{{$patient->patient_id}}">Izbriši</a>
                                </td>
                                <td> </td>
                            </tr>
                            <input type = "hidden" id = "hiddenId" value = "{{$patient->patient_id}}">
                        @endforeach
                    </tbody>
                </table>
                    <div class="text-center">
                        {!!$data['patients']->links();!!}
                    </div>
            </div>
    </div>
    <script>

</script>
@endsection


@section('modal')

<!-- Modal -->
@foreach($data['allPatients'] as $patient)

<!-- Modal for delete permissions -->
<div class="modal fade" id="confirm-delete-{{$patient->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                POTVRDA
            </div>
            <div class="modal-body">
                <p>Da li ste sigurni da želite da izbrišete pacijenta "{{$patient->name}}"?</p>
            </div>
            <div class="modal-footer">
                <form method = "POST">
                    {{ csrf_field() }}

                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    <button type="submit" class="btn btn-danger btn-ok" name = "delete-patient">Izbriši</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection