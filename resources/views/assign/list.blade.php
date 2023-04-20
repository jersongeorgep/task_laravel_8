@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-md-12 mb-2">
            <a class="btn btn-success" href="{{route('assign.create') }}">Assign Task</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tasks List</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($assign as $value)
                                <tr>    
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->status }}</td>
                                    <td>
                                        @if ($value->status == 'In Progress')
                                            <a href="{{ url('assign/start/'. $value->task_id) }}" class="btn btn-info">Start Task</a>
                                        @elseif($value->status == 'Assigned')
                                        <a href="{{ url('assign/start/'. $value->task_id) }}" class="btn btn-info">Start Task</a>
                                        <a href="{{ url('assign/change/'. $value->id) }}" class="btn btn-danger">Change Task</a>    
                                        @elseif($value->status == 'Done')
                                            <label class="alert alert-danger">Task Completed !</label>
                                        @else
                                            <a href="{{ url('assign/finish/'. $value->task_id) }}" class="btn btn-success">Finish Task</a>
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
