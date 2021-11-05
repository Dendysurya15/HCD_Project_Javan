@extends('template.admin')

@section('title', " Leave List")

@section('content')


@if ($message = Session::get('midd_response'))
<div class="alert alert-danger alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('accept_leave'))
<div class="alert alert-success alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('reject_leave'))
<div class="alert alert-warning alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif


<div class="card mb-3">

    <div class="card-body">
        <p class="h3 pb-2" style="color:#2B4F5F">List of Leave </p>
        @if(!$leave_data->isEmpty())
        <table class="table mt-2 table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Employee Name</th>
                    <th>Type of Leave</th>
                    <th>Date of ask leave</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leave_data as $ld)
                <tr>

                    <td>{{$loop->iteration}}</td>
                    <td>{{$ld->employeemasters->first_name}} {{$ld->employeemasters->last_name}}</td>
                    <td>{{$ld->leavecategories->name}}</td>
                    <td>{{$ld->created_at->format('l, d-m-yy, H:i:s')}}</td>
                    <td>
                        <div class="row">
                            <div class="col">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Leave</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">

                                                    <div class="col">
                                                        <small class="form-text text-muted">Employee Name</small>
                                                        <input type="text" class="form-control" name="middle_name" ">
                                                    </div>
                                                </div>
                                                <div class=" row mt-2">
                                                        <div class="col">

                                                            <small class="form-text text-muted">Employee ID</small>
                                                            <input type="text" class="form-control" name="middle_name" ">
                                                    </div>

                                                    <div class=" col">

                                                            <small class="form-text text-muted">Status Employee</small>
                                                            <input type="text" class="form-control" name="middle_name" ">
                                                    </div>

                                                </div>
                                                <div class=" row mt-2">
                                                            <div class="col">

                                                                <small class="form-text text-muted">Type of Leave</small>
                                                                <input type="text" class="form-control" name="middle_name" ">
                                                    </div>

                                                    <div class=" col">

                                                                <small class="form-text text-muted">Estimated Days Off</small>
                                                                <input type="text" class="form-control" name="middle_name" ">
                                                    </div>

                                                </div>

                                                <div class=" row mt-2">
                                                                <div class="col">
                                                                    <small class="form-text text-muted">Argument</small>
                                                                    <textarea type="text" class="form-control" rows="5" name="middle_name" "></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @if($ld->id_status_report == 1)
                                <form action=" {{route('leavepage/accept',$ld->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i></button>
                                </form>
                                <form action="{{route('leavepage/reject',$ld->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn btn-danger"> <i class="fa fa-ban"></i></button>
                                </form>
                                @elseif($ld->id_status_report == 2)
                                <button class="btn btn-success">Approved</button>

                                @elseif($ld->id_status_report == 3)
                                <button class="btn btn-danger">Not Approved</button>
                                @endif
                            </div>

                        </div>

                    </td>
                </tr>
                @endforeach
            <tbody>
        </table>
        @else
        <p class="text-center ">Until now, there are no request for leave</p>
        @endif
    </div>

</div>

@endsection