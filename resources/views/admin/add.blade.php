@extends('template.admin')

@section('title', "Add Employee")

@section('content')

<div class="card mb-3">

    <div class="card-body">


        <p class="h3 pb-2" style="color:#2B4F5F"><a href="/employee"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            </a>Create New Employee</p>
        <form action="{{route('employee')}}" method="post">
            @csrf
            <div class="row">
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>First Name</small>
                    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name ...">
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Middle Name</small>
                    <input type="text" class="form-control" name="middle_name" placeholder="Enter Middle Name ...">
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Last Name</small>
                    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name ...">
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Employee ID</small>
                    <input type="number" class="form-control" name="employee_id" placeholder="Enter ID of Employee">
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Employee Status</small>
                    <select class="form-control" name="status_id">
                        <option disabled selected>Choose status</option>
                        @foreach($status as $status)
                        <option value="{{$status->id}}">{{$status->status_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Supervisor Name </small>
                    <select class="form-control" name="supervisor_id">
                        <option hidden>Choose Supervisor</option>
                        @foreach($supervisor as $supervisor)
                        <option value="{{$supervisor->id}}">{{$supervisor->supervisor_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Job Title </small>
                    <select class="form-control" name="job_title_id">
                        <option hidden>Choose position</option>
                        @foreach($jobtitle as $jobtitle)
                        <option value="{{$jobtitle->id}}">{{$jobtitle->jobtitle_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Sub Unit </small>
                    <select class="form-control" name="sub_unit_id">
                        <option hidden>Choose sub unit</option>
                        @foreach($subUnit as $subUnit)
                        <option value="{{$subUnit->id}}">{{$subUnit->sub_unit_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">+Add Employee</button>
            <input type="reset" value="Reset Form" class="btn btn-danger">
        </form>

    </div>
</div>
@endsection