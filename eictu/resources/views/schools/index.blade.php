@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">School</div>
                    <div class="panel-body">
                        <a href="{{ url('schools/create') }}">Tao moi truong</a>

                        <h2>Danh Sach Truong</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Manager Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($schools as $school)
                                <tr>
                                    <td>{{ $school->code }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->manager->email }}</td>
                                </tr>
                            @empty
                                <p>No school</p>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection