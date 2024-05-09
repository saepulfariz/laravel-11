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
                        <a href="{{ route($link . '.create') }}" class="btn btn-md btn-success mb-3">ADD</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">NPM</th>
                                        <th scope="col">SUBJECT</th>
                                        <th scope="col">GENDER</th>
                                        <th scope="col">ADDRESS</th>
                                        <th scope="col" style="width: 20%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $a = 1 @endphp
                                    @forelse ($data as $d)
                                        <tr>
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->npm }}</td>
                                            <td>
                                                @forelse ($d->subject as $s)
                                                    {{ $s->name }},
                                                @empty
                                                    NO SUBJECT
                                                @endforelse
                                            </td>
                                            <td>{{ $d->gender }}</td>
                                            <td>{{ $d->address }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route($link . '.destroy', $d->id) }}" method="POST">
                                                    <a href="{{ route($link . '.show', $d->id) }}"
                                                        class="btn btn-sm mb-2 btn-dark">SHOW</a>
                                                    <a href="{{ route($link . '.edit', $d->id) }}"
                                                        class="btn btn-sm mb-2 btn-primary">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm mb-2 btn-danger">HAPUS</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Student belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
