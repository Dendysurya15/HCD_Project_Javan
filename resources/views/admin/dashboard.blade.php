@extends('template.admin')

@section('title', " Dashboard")

@section('content')

@if ($message = Session::get('midd_response'))
<div class="alert alert-danger alert-block text-center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class=" card ">



    <span class="text-center">Halaman Belum Siap !</span>
</div>

@endsection