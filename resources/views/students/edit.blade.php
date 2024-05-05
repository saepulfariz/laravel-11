@extends('template.index')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">CRUD STUDENTS</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route($link . '.update', $data->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAME</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $data->name) }}" placeholder="Masukkan Name">

                                <!-- error message untuk name -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NPM</label>
                                <input type="text" class="form-control @error('npm') is-invalid @enderror" name="npm"
                                    value="{{ old('npm', $data->npm) }}" placeholder="Masukkan npm">

                                <!-- error message untuk npm -->
                                @error('npm')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">GENDER</label>
                                @foreach ($genders as $d)
                                    <div class="form-check @error('npm') is-invalid @enderror">
                                        <input class="form-check-input" type="radio" name="gender" id="gender1"
                                            value="{{ $d }}" {{ $d == $data->gender ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gender1">
                                            {{ $d == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' }}
                                        </label>
                                    </div>
                                @endforeach

                                <!-- error message untuk gender -->
                                @error('gender')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">ADDRESS</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="5"
                                    placeholder="Masukkan address">{{ old('address', $data->address) }}</textarea>

                                <!-- error message untuk address -->
                                @error('address')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a href="{{ route($link . '.index') }}" class="btn btn-md btn-secondary">BACK</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
