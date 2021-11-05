@extends('template.admin')

@section('title', " Employee")

@section('content')

@if ($message = Session::get('midd_response'))
<div class="alert alert-danger alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="card mb-3">

    <div class="card-body">

        <p class="h3 pb-2" style="color:#2B4F5F">Search Employee</p>
        <form>
            <div class="row">
                <div class="col form-group">
                    <small class="form-text text-muted">Employee Name</small>
                    <input type="text" class="form-control" placeholder="Enter Name of Employee">
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted">Employee ID</small>
                    <input type="number" class="form-control" placeholder="Enter ID of Employee">
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted">Employee Status</small>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>All</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <small class="form-text text-muted">Supervisor Name </small>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>All</option>
                    </select>
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted">Job Title </small>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>All</option>
                    </select>
                </div>
                <div class="col form-group">
                    <small class="form-text text-muted">Sub Unit </small>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>All</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Search</button>
            <input type="reset" value="Reset Form" class="btn btn-danger">
        </form>

    </div>
</div>

@if ($message = Session::get('success_add'))
<div class="alert alert-success alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('success_edit'))
<div class="alert alert-warning alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('deactived_account'))
<div class="alert alert-secondary alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('actived_account'))
<div class="alert alert-success alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="card">
    <div class="card-body">
        <p class="h3 pb-2" style="color:#2B4F5F">All Employee</p>
        <form action="">
            <a href="employee/form_add" class="btn btn-success">+Add User</a>
            <button type="submit" class="btn btn-danger">Delete Employee</button>
        </form>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th></th>
                    <th>Employee ID</th>
                    <th>First & Last Name</th>
                    <th>Job Title</th>
                    <th>Employee Status</th>
                    <th>Sub Unit</th>
                    <th>Supervisor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $employee)

                @if($employee->is_admin == 1)
                <tr class="d-none"></tr>
                @else
                <tr>
                    <td><input type="checkbox" aria-label="Checkbox for following text input"></td>
                    <td>{{$employee->employee_id}}</td>
                    <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                    <td>{{$employee->jobtitle->jobtitle_name}}</td>
                    <td>{{$employee->statusemployee->status_name}}</td>
                    <td>{{$employee->subunit->sub_unit_name}}</td>
                    <td>{{$employee->supervisor->supervisor_name}}</td>

                    @if($employee->status_account == 1)
                    <td class="col-2">
                        <a href="{{route('employee/form_edit',$employee->id)}}" class="btn btn-warning"><i class="fa fa-edit d-inline"> </i></a>

                        <form action="{{route('employee/deactived_account',$employee->id)}}" method="POST" class="d-inline">
                            @csrf
                            {{method_field('PUT')}}
                            <button type="submit" class="btn btn-danger"><i class="fa fa-user-times " aria-hidden="true"></i></button>
                        </form>
                    </td>
                    @else
                    <td class="col-2">
                        <form action="{{route('employee/actived_account',$employee->id)}}" method="POST" class="d-inline">
                            @csrf
                            {{method_field('PUT')}}
                            <button type="submit" class="btn btn-info"><i class="fa fa-user-plus mr-2" aria-hidden="true"></i>Active</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endif
                @endforeach
            <tbody>
        </table>
    </div>

</div>
@endsection