@extends('layouts.main')

@section('content')

    <div class="content">
        <div class="title m-b-md">
            <h1>Uvid u placanja</h1>
        </div>

        <form method="GET" id="paymentForms">
            @csrf

            <h5>Izaberi datum</h5>
            <input type = 'date' name = 'date-payment' id = 'date-payment'>
        </form>

        <div class="links" id ="payments-table">
                    <!--ubacis formu sa rutom prema nekom kontroleru koji ce pozvati provider koji ce uneti u bazu-->
            <table class="table  table-dark">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th>-->
                        <th scope="col">Pacijent</th>
                        <th scope="col">Usluga</th>
                      <!--  <th scope="col">Zub</th>-->
                        <th scope="col">Cena</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Termin</th>
                        <th scope="col">Placeno?</th>
                    </tr>
                </thead>

                <tbody>

                    <form method="POST" id="paymentForm">
                        @csrf

                        @foreach($data['payments'] as $payment)
                            <tr>
                                <td>{{ $payment->patient->name }}</td>

                                <td>{{ $payment->service->service }}</td>

                                <td>{{ $payment->service->price }}</td>
                                <td>{{ date('d-M-Y', strtotime($payment->date_payment))}}</td>

                                <td>{{ $payment->term->term }}</td>

                                <td> {{ ($payment->paid == 1) ? 'Da' : 'Ne'}}</td>


                            </tr>
                        @endforeach

                    </form>
                </tbody>
            </table>
        </div>
    </div>

@endsection