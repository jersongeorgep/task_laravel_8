@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-md-12 mb-2">
            <a class="btn btn-success" href="{{route('tasks.create') }}">Add New</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tasks List</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr>    
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->Description }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>
                                        @if ($task->status == 'Unassigned')
                                            <a href="{{ url('tasks/edit/'. $task->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('tasks/delete/'. $task->id) }}" class="btn btn-danger">Delete</a>    
                                        @else
                                            <a href="{{ url('tasks/edit/'. $task->id) }}" class="btn btn-info">Edit</a>
                                        @endif
                                    </td>
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
