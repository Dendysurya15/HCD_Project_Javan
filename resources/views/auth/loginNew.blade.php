@extends('layouts.app')

@section('title','Login')
<style>
    .form-control:focus {
        border-color: white;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, #2B4F5F);
    }
</style>

@section('content')

<body>

    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-8 offset-2 p-4">
                @if ($message = Session::get('success_logout'))
                <div class="alert alert-success alert-block text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('failed_login'))
                <div class="alert alert-danger alert-block text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('midd_response'))
                <div class="alert alert-warning alert-block text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4 shadow offset-lg-4 col-md-6 offset-md-3 col-8 offset-2 p-4" style="color: #2B4F5F;border-radius:10px">

                <h3 class="p-3 text-center text-uppercase font-weight-normal"> Login Account</h3>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control {{$errors->has('email')? 'is-invalid':''}}" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control {{$errors->has('password')? 'is-invalid':''}}" name="password" placeholder="Type your password ...">
                        @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                    </div>
                    <div class="row">

                        <div class="col text-center mt-3 font-italic">
                            <small class="text-muted">@Design by Surya_dendy</small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @endsection