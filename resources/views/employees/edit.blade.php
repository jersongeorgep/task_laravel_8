@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Employee</div>

                <div class="card-body">
                    <form action="{{ url('employees/update/' . $employee->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Employee Name" required value="{{ $employee->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="{{ $employee->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="mobile_no" class="form-label">Mobile No</label>
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile" required value="{{ $employee->mobile_no }}">
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-control" name="department" id="department" required>
                                <option value="">Select Department</option>
                                <option value="Sales" {{ $employee->department == "Sales" ? "selected" : ""}} >Sales</option>
                                <option value="Marketing" {{ $employee->department == "Sales" ? "selected" : ""}}  >Marketing</option>
                                <option value="IT" {{ $employee->department == "Sales" ? "selected" : ""}} >IT</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="">Select Status</option>
                                <option value="Active" {{ $employee->status == "Active" ? "selected" : "" }}>Active</option>
                                <option value="Inactive" {{ $employee->status == "Inactive" ? "selected" : "" }}>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection