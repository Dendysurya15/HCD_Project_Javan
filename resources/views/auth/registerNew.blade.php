@extends('layouts.app')

@section('title','Register')
<style>
    .form-control:focus {
        border-color: white;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, #2B4F5F);
    }
</style>

@section('content')

<body>
    <div class="container-fluid mb-5">

        <div class="row mt-4">
            <div class="col-lg-4 shadow offset-lg-4 col-md-6 offset-md-3 col-8 offset-2 p-4" style="color: #2B4F5F;border-radius:10px">

                <h3 class="p-3 text-center text-uppercase font-weight-normal"> Register New Account</h3>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control {{$errors->has('name')? 'is-invalid':''}}" name="name" placeholder="Please insert your name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control {{$errors->has('email')? 'is-invalid':''}}" name="email" placeholder="Enter email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control {{$errors->has('password')? 'is-invalid':''}}" name="password" placeholder="Password">
                        @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Confirmation</label>
                        <input type="password" class="form-control {{$errors->has('password_confirmation')? 'is-invalid':''}}" name="password_confirmation" placeholder="Password">
                        @if($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{$errors->first('password_confirmation')}}
                        </div>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection