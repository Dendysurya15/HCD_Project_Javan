@extends('template.admin')

@section('title', "Edit Employee")

@section('content')

<div class="card mb-3">

    <div class="card-body">


        <p class="h3 pb-2" style="color:#2B4F5F"><a href="/employee"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            </a>Edit Employee </p>
        <form action="{{route('employee/form_edit',$employee->id)}}" method='POST'>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>First Name</small>
                    <input type="text" class="form-control {{$errors->has('first_name')? 'is-invalid':''}}"" name=" first_name" value="{{$employee->first_name}}">
                    @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{$errors->first('first_name')}}
                    </div>
                    @endif
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Middle Name</small>
                    <input type="text" class="form-control" name="middle_name" value="{{$employee->middle_name}}">
                </div>
                <div class=" col form-group">
                    <small class="form-text text-muted"><span>*</span>Last Name</small>
                    <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
                </div>
                <div class=" col form-group">
                    <small class="form-text text-muted"><span>*</span>Employee ID</small>
                    <input type="number" class="form-control" name="employee_id" value="{{$employee->employee_id}}">
                </div>
            </div>
            <div class=" row">
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Employee Status</small>
                    <select class="form-control" name="status_id">
                        <option value="{{$employee->status_id}}" selected>{{$employee->statusemployee->status_name}}</option>
                        <option disabled>-----</option>
                        @foreach($status as $status)
                        <option value="{{$status->id}}">{{$status->status_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Supervisor Name </small>
                    <select class="form-control" name="supervisor_id">
                        <option value="{{$employee->supervisor_id}}" selected>{{$employee->supervisor->supervisor_name}}</option>
                        <option disabled>-----</option>
                        @foreach($supervisor as $supervisor)
                        <option value="{{$supervisor->id}}">{{$supervisor->supervisor_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Job Title </small>
                    <select class="form-control" name="job_title_id">
                        <option value="{{$employee->job_title_id}}" selected>{{$employee->jobtitle->jobtitle_name}}</option>
                        <option disabled>-----</option>
                        @foreach($jobtitle as $jobtitle)
                        <option value="{{$jobtitle->id}}">{{$jobtitle->jobtitle_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted"><span>*</span>Sub Unit </small>
                    <select class="form-control" name="sub_unit_id">
                        <option value="{{$employee->sub_unit_id}}" selected>{{$employee->subunit->sub_unit_name}}</option>
                        <option disabled>-----</option>
                        @foreach($subUnit as $subUnit)
                        <option value="{{$subUnit->id}}">{{$subUnit->sub_unit_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Edit Employee</button>
            <a href="{{route('employee')}}" class="btn btn-danger ">Cancel</a>
        </form>

    </div>
</div>
@endsection