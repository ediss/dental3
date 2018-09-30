@extends('admin.admin-main')

@section('content')
            <div class="content">
                <div class="title m-b-md">
                    <h1>Izmena Pacijenta</h1>
                </div>

                <div class="col-md-4">
                    <div class = 'card'>
                        <div class = 'card-body'>
                            <form method="post" action="{{ route('admin.patient.update', $patient->id)}}">
                                {{ csrf_field() }}


                                <label>Ime:</label>
                                <input type="text" name="name"   class = 'form-control'  value="{{$patient->name}}" />

                                <label>E-mail adresa:</label>
                                <input type="email" name="email" class = 'form-control'  value="{{$patient->email}}" />

                            <!-- <label>Lozinka:</label>
                                <input type="password" name="password" class = 'form-control' />

                                <label>Potvrdite lozinku:</label>
                                <input type="password" name="password_confirmation" class = 'form-control' />-->

                                <input type="submit" class='btn btn-success' value = "Savucaj izmene">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
