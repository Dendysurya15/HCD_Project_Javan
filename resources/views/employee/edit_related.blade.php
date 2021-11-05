@extends('template.employee')

@section('title','Edit Profile Related Information User')
@section('content')

<!-- Konten Related Information -->

<div class=" mt-3 mb-2">
    <div class="card">

        <h5 class="p-3 shadow-sm " style="color: whitesmoke;background-color:#2B4F5F ;border-top-left-radius:5px;border-top-right-radius:5px;"><i class="fa fa-address-book fa-lg" aria-hidden="true"></i></i> Related Information</h5>
        <div class="card-body" style="margin-top:-10px">
            <form action="{{route('profile/edit/update_related_info',$related_info->id)}}" method='POST'>
                @csrf
                @method('PUT')
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
                                    <input type="text" class="form-control" name="telegram" value="{{$related_info->telegram}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">LinkedIn</small>
                                    <input type="text" class="form-control" name="linkedin" value="{{$related_info->linkedin}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Facebook</small>
                                    <input type="text" class="form-control" name="facebook" value="{{$related_info->facebook}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Instagram</small>
                                    <input type="text" class="form-control" name="instagram" value="{{$related_info->instagram}}">
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
                                    <input type="text" class="form-control  {{$errors->has('bpjs_kesehatan')? 'is-invalid':''}}" name="bpjs_kesehatan" value="{{$related_info->bpjs_kesehatan}}">
                                    @if($errors->has('bpjs_kesehatan'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('bpjs_kesehatan')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">BPJS Ketenagakerjaan</small>
                                    <input type="text" class="form-control  {{$errors->has('bpjs_ketenagakerjaan')? 'is-invalid':''}}" name="bpjs_ketenagakerjaan" value="{{$related_info->bpjs_ketenagakerjaan}}">
                                    @if($errors->has('bpjs_ketenagakerjaan'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('bpjs_ketenagakerjaan')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Golongan Darah</small>
                                    <select class="form-control" name="gol_darah">
                                        <option disabled selected>Please Choose...</option>
                                        <option value="A" {{ $related_info->gol_darah == 'A' ? 'selected' : ''}}>A</option>
                                        <option value="B" {{ $related_info->gol_darah == 'B' ? 'selected' : ''}}>B</option>
                                        <option value="AB" {{ $related_info->gol_darah == 'AB' ? 'selected' : ''}}>AB</option>
                                        <option value="O" {{ $related_info->gol_darah == 'O' ? 'selected' : ''}}>O</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row " style="color:#2B4F5F;background-color: white ;">
                            <div class="col mb-1">
                                <p style=" position: relative;top: 50%;transform: translateY(-50%);font-weight:600;display: inline-block;border-bottom: 2px solid #2B4F5F;padding-bottom:10px;">Other Number</p>
                            </div>
                        </div>

                        <div class="row" style="background-color:white ;border-bottom-left-radius:10px;border-bottom-right-radius:10px">
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Nomor Ijazah</small>
                                    <input type="text" class="form-control {{$errors->has('no_ijazah')? 'is-invalid':''}}" name="no_ijazah" value="{{$related_info->no_ijazah}}">
                                    @if($errors->has('no_ijazah'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('no_ijazah')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Nomor Kartu Keluarga</small>
                                    <input type="text" class="form-control {{$errors->has('no_kk')? 'is-invalid':''}}" name="no_kk" value="{{$related_info->no_kk}}">
                                    @if($errors->has('no_kk'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('no_kk')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">NPWP</small>
                                    <input type="text" class="form-control {{$errors->has('npwp')? 'is-invalid':''}}" name="npwp" value="{{$related_info->npwp}}">
                                    @if($errors->has('npwp'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('npwp')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <small class="text-muted" style="font-size:15px">Rekening Payroll</small>
                                    <input type="text" class="form-control {{$errors->has('rek_payroll')? 'is-invalid':''}}" name="rek_payroll" value="{{$related_info->rek_payroll}}">
                                    @if($errors->has('rek_payroll'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('rek_payroll')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button type="Edit" class="btn btn-success btn-block">Update Information</button>
                            </div>
                            <div class="col">
                                <a href="{{route('profile')}}" class="btn btn-danger  btn-block">Cancel</a>
                            </div>
                        </div>



                    </div>
            </form>
        </div>

    </div>
</div>


@endsection