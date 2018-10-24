<div class="links" id ="appointments-table">
    <table class="table  table-dark">
        <thead>
            <tr>
                <!-- <th scope="col">#</th>-->
                <th scope="col">Pacijent</th>
                <th scope="col">Usluga</th>
                <th scope="col">Zub</th>
                <th scope="col">Cena</th>
                <th scope="col">Datum</th>
                <th scope="col">Termin</th>
                <th scope="col">Doktor</th>
                <th scope="col">Obavljen pregled?</th>
            </tr>
        </thead>
        <tbody>
            <form method="POST" id="appointmentForm">
                @csrf

                @foreach($data['appointments'] as $appointment)
                    <tr>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->service->service }}</td>
                        <td>{{ $appointment->tooth }}</td>
                        <td>{{ $appointment->service->price }}</td>
                        <td>{{ date('d-M-Y', strtotime($appointment->date_appoitment))}}</td>
                        <td>{{ $appointment->term->term }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td><a href = "#" class = "btn btn-primary"  data-toggle="modal" data-target="#exampleModal-{{$appointment->id_appoitment}}">Prikazi formular</a> </td>
                    </tr>
                @endforeach

            </form>
        </tbody>
    </table>
</div>