@extends('template.employee')

@section('title','Edit Profile Personal Information User')
@section('content')
<!-- Konten Personal Information -->
<div>

    <div class="card">

        <h5 class="p-3 shadow-sm " style="color: whitesmoke;background-color:#2B4F5F;border-top-left-radius:5px;border-top-right-radius:5px; "><i class="fa fa-user fa-lg" aria-hidden="true"></i> Personal Information</h5>
        <div class="container card-body" style="margin-top:-10px">
            <form action="{{route('profile/edit/update_person_info',$person_info->id)}}" method='POST' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row ">
                    <div class="col">
                        <div class="row " style="color:#2B4F5F;background-color: white ;">
                            <div class="col mb-1">
                                <p style=" position: relative;top: 50%;transform: translateY(-50%);font-weight:600;display: inline-block;border-bottom: 2px solid #2B4F5F;padding-bottom:10px;">Person Identity </p>
                            </div>
                        </div>
                        <div class="row" style="background-color: white ;">
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px"><span> *</span>First Name</small>
                                    <input type="text" class="form-control" name="first_name" value="{{$person_info->first_name}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Middle Name</small>
                                    <input type="text" class="form-control" name="middle_name" value="{{$person_info->middle_name}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px"><span> *</span>Last Name</small>
                                    <input type="text" class="form-control" name="last_name" value="{{$person_info->last_name}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted d-block" style="font-size:15px"><span> *</span>Gender</small>

                                    <div class="form-check form-check-inline">


                                        <input class="form-check-input" name="gender" type="radio" value="male" {{ $person_info->gender == 'male' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                        <input class="form-check-input ml-2" name="gender" type="radio" value="female" {{ $person_info->gender == 'female' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="inlineRadio1">Female</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="background-color: white ;border-bottom-left-radius:10px;border-bottom-right-radius:10px">
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Place of Birth</small>
                                    <input type="text" class="form-control" name="place_of_birth" value="{{$person_info->place_of_birth}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px"><span> *</span>Date of Birth</small>
                                    <input type="date" class="form-control" name="date_of_birth" value="{{$person_info->date_of_birth}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Marital Status</small>
                                    <select class="form-control" name="marital_status">
                                        <option disabled selected>Please Choose..</option>
                                        <option value="single" {{ $person_info->gender == 'male' ? 'selected' : ''}}>Single</option>
                                        <option value="married" {{ $person_info->gender == 'female' ? 'selected' : ''}}>Married</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px"><span> *</span>Nationality</small>
                                    <input type="text" class="form-control" name="nationality" value="{{$person_info->nationality}}">
                                </div>
                            </div>
                        </div>

                        <!-- <hr> -->


                        <div class="row mt-1" style="background-color: white ;color:#2B4F5F;border-top-left-radius:10px;border-top-right-radius:10px">
                            <div class="col mb-2">
                                <p style="position: relative;top: 50%;transform: translateY(-50%);font-weight:600;display: inline-block;border-bottom: 2px solid #2B4F5F;padding-bottom:10px;">Other Identity </p>
                            </div>
                        </div>

                        <div class="row" style="background-color: white ;">
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Employee ID</small>
                                    <input type="text" class="form-control {{$errors->has('employee_id')? 'is-invalid':''}}" value="{{Auth::user()->employee_id}}" disabled>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Other ID</small>
                                    <input type="text" class="form-control {{$errors->has('other_id')? 'is-invalid':''}}" name="other_id" value="{{$person_info->other_id}}">
                                    @if($errors->has('other_id'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('other_id')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row" style="background-color:white ; border-bottom-left-radius:10px;border-bottom-right-radius:10px">
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px"><span> *</span>Driver's License Number</small>
                                    <input type="text" class="form-control {{$errors->has('driver_license_number')? 'is-invalid':''}}" name="driver_license_number" value="{{$person_info->driver_license_number}}">
                                    @if($errors->has('driver_license_number'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('driver_license_number')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">License Expire Date</small>
                                    <input type="date" class="form-control" name="license_expire_date" value="{{$person_info->license_expire_date}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col">
                                <div class="card">

                                    @if(!empty($person_info->image))
                                    <img src="{{asset('storage/'.$person_info->image)}}" id="upload-img" class="img-thumbnail">
                                    @else
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" id="upload-img" class="img-thumbnail" style="display: block;">
                                    @endif

                                    <div class="pt-2">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fileupload" name="image">
                                            <label class="custom-file-label" for="fileupload">Choose file...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-success  btn-block">Update Information</button>
                    </div>
                    <div class="col">
                        <a href="{{route('profile')}}" class="btn btn-danger  btn-block">Cancel</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection