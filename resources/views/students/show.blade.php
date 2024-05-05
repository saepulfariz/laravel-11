@extends('template.index')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div>
                    <h3 class="text-center my-4">CRUD STUDENTS</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body text-center">
                        <p><b>Name</b> : {{ $data->name }}</p>
                        <p><b>Npm</b> : {{ $data->npm }}</p>
                        <p><b>Gender</b> : {{ $data->gender == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' }}</p>
                        <p><b>Address</b> : {{ $data->address }}</p>
                        <a href="{{ route($link . '.index') }}" class="btn btn-md btn-secondary">BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
