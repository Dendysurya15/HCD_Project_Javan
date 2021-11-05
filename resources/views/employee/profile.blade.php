@extends('template.employee')

@section('title','Profile User')
@section('content')
<!-- Konten Personal Information -->
<div>


    @if ($message = Session::get('success_update_person'))
    <div class="alert alert-success alert-block text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('no_update'))
    <div class="alert alert-warning alert-block text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('midd_response'))
    <div class="alert alert-danger alert-block text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


    <div class="card">
        <h5 class="p-3 shadow-sm " style="color: whitesmoke;background-color:#2B4F5F;border-top-left-radius:5px;border-top-right-radius:5px; "><i class="fa fa-user fa-lg" aria-hidden="true"></i> Personal Information</h5>
        <div class="container card-body" style="margin-top:-10px">


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
                                <small class="text-muted" style="font-size:15px">First Name</small>
                                @if(!empty($person_info->first_name))
                                <p class="font-weight-normal" style="color:black">{{$person_info->first_name}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Middle Name</small>
                                @if(!empty($person_info->middle_name))
                                <p class="font-weight-normal" style="color:black">{{$person_info->middle_name}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Last Name</small>
                                @if(!empty($person_info->last_name))
                                <p class="font-weight-normal" style="color:black">{{$person_info->last_name}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted d-block" style="font-size:15px">Gender</small>
                                @if(!empty($person_info->gender))
                                <p class="font-weight-normal" style="color:black">{{$person_info->gender}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row" style="background-color: white ;border-bottom-left-radius:10px;border-bottom-right-radius:10px">
                        <div class="col">
                            <div class="form-group">

                                <small class="text-muted" style="font-size:15px">Place of Birth</small>
                                @if(!empty($person_info->place_of_birth))
                                <p class="font-weight-normal" style="color:black">{{$person_info->place_of_birth}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Date of Birth</small>
                                @if(!empty($person_info->date_of_birth))
                                <p class="font-weight-normal" style="color:black">{{$format_date_of_birth}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Marital Status</small>
                                @if(!empty($person_info->marital_status))
                                <p class="font-weight-normal" style="color:black">{{$person_info->marital_status}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Nationality</small>
                                @if(!empty($person_info->nationality))
                                <p class="font-weight-normal" style="color:black">{{$person_info->nationality}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
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
                                @if(!empty($person_info->employeemasters->employee_id))
                                <p class="font-weight-normal" style="color:black">{{Auth::user()->employee_id}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Other ID</small>
                                @if(!empty($person_info->other_id))
                                <p class="font-weight-normal" style="color:black">{{$person_info->other_id}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row" style="background-color:white ; border-bottom-left-radius:10px;border-bottom-right-radius:10px">
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Driver's License Number</small>
                                @if(!empty($person_info->driver_license_number))
                                <p class="font-weight-normal" style="color:black"> {{$person_info->driver_license_number}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">License Expire Date</small>
                                @if(!empty($person_info->license_expire_date))
                                <p class="font-weight-normal" style="color:black"> {{$license_expire_date}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-4">
                    <div class="row">
                        <div class="col">
                            <div class="card">

                                @if(!empty($person_info->image))
                                <img src="{{asset('storage/'.$person_info->image)}}" class="img-thumbnail" style="width: 100%">
                                @else
                                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-thumbnail" style="width: 100%;height: 270px;display: block;">

                                @endif
                                @if(!empty($person_info->date_of_birth))
                                <div class="card-body">
                                    <p class="card-text text-center">{{$person_info->first_name}} {{$person_info->last_name}} <br> {{$age}} Thn , {{Auth::user()->statusemployee->status_name}} </p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <a href="{{route('profile/edit_person',$person_info->id)}}" class="btn btn-success  btn-block">Edit Personal Information</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Konten Related Information -->

@if ($message = Session::get('success_update_related'))
<div class="alert alert-success alert-block text-center mt-2">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('failed_update'))
<div class="alert alert-danger alert-block text-center mt-2">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if($person_info->employeemasters->status_account != 1)
<div class="container">
    <div id="myModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h4 class="modal-title" style="color:#2B4F5F">Caution !</h4>
                </div>
                <div class="modal-body">
                    <p class="font-weight-normal text-center" style="color:#2B4F5F">For now your account is being <span class="font-italic"> deactivated </span>, try to contact the admin or related competent authorities <br> Thanks & have a nice day :)</p>
                </div>

                <div class="modal-footer justify-content-center ">
                    <a href="{{ route('logout') }}" class="btn btn-danger "><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class=" mt-3 mb-2">
    <div class="card">

        <h5 class="p-3 shadow-sm " style="color: whitesmoke;background-color:#2B4F5F ;border-top-left-radius:5px;border-top-right-radius:5px;"><i class="fa fa-address-book fa-lg" aria-hidden="true"></i></i> Related Information</h5>
        <div class="card-body" style="margin-top:-10px">

            <div class="row ">
                <div class="col">
                    <div class="row " style="color:#2B4F5F;background-color: white ;">
                        <div class="col mb-1">
                            <p style=" position: relative;top: 50%;transform: translateY(-50%);font-weight:600;display: inline-block;border-bottom: 2px solid #2B4F5F;padding-bottom:10px;">Social Media </p>
                        </div>
                    </div>
                    <div class="row" style="background-color: white ;">
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Telegram</small>
                                @if(!empty($related_info->telegram))
                                <p class="font-weight-normal" style="color:black">{{$related_info->telegram}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">LinkedIn</small>
                                @if(!empty($related_info->linkedin))
                                <p class="font-weight-normal" style="color:black">{{$related_info->linkedin}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Facebook</small>
                                @if(!empty($related_info->facebook))
                                <p class="font-weight-normal" style="color:black">{{$related_info->facebook}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Instagram</small>
                                @if(!empty($related_info->instagram))
                                <p class="font-weight-normal" style="color:black">{{$related_info->instagram}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row " style="color:#2B4F5F;background-color: white ;">
                        <div class="col mb-1">
                            <p style=" position: relative;top: 50%;transform: translateY(-50%);font-weight:600;display: inline-block;border-bottom: 2px solid #2B4F5F;padding-bottom:10px;"> Insurance and Social Security</p>
                        </div>
                    </div>
                    <div class="row" style="background-color: white ;border-bottom-left-radius:10px;border-bottom-right-radius:10px">
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">BPJS Kesehatan</small>
                                @if(!empty($related_info->bpjs_kesehatan))
                                <p class="font-weight-normal" style="color:black">{{$related_info->bpjs_kesehatan}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">BPJS Ketenagakerjaan</small>
                                @if(!empty($related_info->bpjs_ketenagakerjaan))
                                <p class="font-weight-normal" style="color:black">{{$related_info->bpjs_ketenagakerjaan}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Golongan Darah</small>
                                @if(!empty($related_info->gol_darah))
                                <p class="font-weight-normal" style="color:black">{{$related_info->gol_darah}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row " style="color:#2B4F5F;background-color: white ;">
                        <div class="col mb-1">
                            <p style=" position: relative;top: 50%;transform: translateY(-50%);font-weight:600;display: inline-block;border-bottom: 2px solid #2B4F5F;padding-bottom:10px;">Other Number</p>
                        </div>
                    </div>

                    <div class="row pb-2" style="background-color:white ;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Nomor Ijazah</small>
                                @if(!empty($related_info->no_ijazah))
                                <p class="font-weight-normal" style="color:black">{{$related_info->no_ijazah}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Nomor Kartu Keluarga</small>
                                @if(!empty($related_info->no_kk))
                                <p class="font-weight-normal" style="color:black">{{$related_info->no_kk}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">NPWP</small>
                                @if(!empty($related_info->npwp))
                                <p class="font-weight-normal" style="color:black">{{$related_info->npwp}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small class="text-muted" style="font-size:15px">Rekening Payroll</small>
                                @if(!empty($related_info->rek_payroll))
                                <p class="font-weight-normal" style="color:black">{{$related_info->rek_payroll}}</p>
                                @else
                                <p class="font-weight-normal">-</p>
                                @endif
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="row">
                <div class="col mt-2">
                    <a href="{{route('profile/edit_related',$related_info->id)}}" class="btn btn-success btn-block ">Edit Related Information</a>
                </div>
            </div>

        </div>
    </div>



    @endsection