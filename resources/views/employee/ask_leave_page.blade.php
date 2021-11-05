@extends('template.employee')

@section('title','Form Ask for Leave')

@section('content')


@if ($message = Session::get('midd_response'))
<div class="alert alert-danger alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('success_leave'))
<div class="alert alert-success alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="card mb-3">

    <div class="card-body">

        <p class="h3 pb-2" style="color:#2B4F5F">Ask Leave </p>
        <form action="{{route('ask_leave_page')}}" class="form-group" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <div class="col">
                            <small class="form-text text-muted">Type of leave </small>
                            <select class="form-control" name="id_leaveCategories">
                                <option disabled selected>Please Choose..</option>
                                @foreach($leavecategories as $lc)
                                <option value="{{$lc->id}}">{{$lc->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small class="form-text text-muted">How Many Days...</small>
                            <input type="number" class="form-control d-inline" name="days" placeholder="Type on number please">
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <small class="form-text text-muted">Argument</small>
                    <textarea class="form-control" rows="3" name="argument" placeholder="write down the reason you want to apply for this leave"></textarea>
                </div>


            </div>

            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <input type="reset" value="Reset Form" class="btn btn-danger">
                </div>
            </div>
        </form>


    </div>
</div>

</div>


<div class="card mb-3">

    <div class="card-body">
        <p class="h3 pb-2" style="color:#2B4F5F">History Leave </p>
        @if(!$historyleave->isEmpty())
        <table class="table mt-2 table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Type of Leave</th>
                    <th>Estimated Days Off</th>
                    <th>Date of ask leave</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historyleave as $historyleave)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$historyleave->leavecategories->name}}</td>
                    <td>{{$historyleave->days}}</td>
                    <td>{{$historyleave->created_at->format('l, d-m-yy')}}</td>
                    <td>
                        @if($historyleave->id_status_report == 1)
                        <button class="btn btn-block btn-light"><i class="fa fa-eye-slash"></i> Not Checked</button>
                        @elseif($historyleave->id_status_report == 2)
                        <button class="btn btn-block btn-success"><i class="fa fa-check-circle"></i> Approved</button>
                        @elseif($historyleave->id_status_report == 3)
                        <button class="btn btn-block btn-danger"><i class="fa fa-ban"></i> Not Approved</i> </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            <tbody>
        </table>
        @else
        <p class="text-center ">Until now, there are no ask for leave</p>
        @endif
    </div>

</div>
@endsection