@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Assign Tasks</div>

                <div class="card-body">
                    <form action="{{route('assign.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="employee" class="form-label">Employee</label>
                            <select class="form-control" name="employee">
                                <option value="">Select Employee</option>
                                 @foreach ($employees as $employee)
                                 <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="task" class="form-label">Task</label>
                            <select class="form-control" name="task">
                                <option value="">Select Task</option>
                                @foreach ($tasks as $task)
                                 <option value="{{ $task->id }}">{{ $task->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
