@extends ('admin.admin-main')

@section('content')
            <div class="content">
                <div class="title m-b-md">
                   Uvid u pacijente
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
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->email }}</td>

                                <td> <a href="{{ route('admin.patient.edit',   $patient->id)}} " class ='btn btn-primary'>Izmeni</a><a href="{{ route('admin.patient.delete', $patient->id) }}" class = "btn btn-danger ml-1">Izbrisi</a></td>
                                <td> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
@endsection
