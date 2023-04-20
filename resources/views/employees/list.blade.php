@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-md-12 mb-2">
            <a class="btn btn-success" href="{{route('employees.create') }}">Add New</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employees List</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Moble</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>    
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->mobile_no }}</td>
                                    <td>{{ $employee->department }}</td>
                                    <td>{{ $employee->status }}</td>
                                    <td><a href="{{ url('employees/edit/'. $employee->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('employees/delete/'. $employee->id) }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
