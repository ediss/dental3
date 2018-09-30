@extends('admin.admin-main')

@section('content')

            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Admin page</h1>
                    </div>
                </div>
@endsection