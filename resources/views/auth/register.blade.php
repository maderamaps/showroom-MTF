@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="background"></div>
            <div class="imgText1"></div>
            <div class="imgText2"></div>
            <div class="imgText3"></div>
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                <div class="card-body ">
                    
                    <form id="fromRegistrasi" class="col-md-5 float-left" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="title">Sign Up</div>
                        <div class="page1">
                            <div class="form-group row">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror itemInput" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group row">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror itemInput" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group row">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror itemInput" name="password" placeholder="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group row">
                                    <input id="password-confirm" type="password" class="form-control itemInput" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>

                            <div class="form-group row">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror itemInput" name="phone" value="{{ old('phone') }}" placeholder="No Telp" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <textarea id="address" type="text" rows="3" class="form-control @error('address') is-invalid @enderror itemInput" name="address" placeholder="Alamat Showroom" style="resize: none" required autocomplete="address-line1" autofocus>{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group row">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input input1 @error('cv') is-invalid @enderror itemInput" id="cv" name="cv">
                                    <label class="custom-file-label label1" for="cv">CV (jpg,jpeg,png) max(1MB)</label>
                                </div>
                                @error('cv')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0 float-right">
                                <img class="next" id="next" src="../image/next-form.png" style="width: 100px" >
                            </div>
                            {{-- <div class="form-group row mb-0">
                                    <button type="submit" class="itemBtn btn btn-primary" onclick="alert('Thank for register, please come back later after your account confirmed')">
                                        {{ __('Register') }}
                                    </button>
                            </div> --}}
                        </div>   

                        <div class="page2" style="display: none">
                            <div class="form-group row">
                                <input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror itemInput" name="owner_name" value="{{ old('owner_name') }}" placeholder="Nama Pemilik Showroom" required autocomplete="name" autofocus>
                                @error('owner_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <input id="owner_email" type="email" class="form-control @error('owner_email') is-invalid @enderror itemInput" name="owner_email" value="{{ old('owner_email') }}" placeholder="Email Pemilik Showroom" required autocomplete="email" autofocus>
                                @error('owner_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <input id="owner_phone" type="text" class="form-control @error('owner_phone') is-invalid @enderror itemInput" name="owner_phone" value="{{ old('owner_phone') }}" placeholder="No Telp Pemilik Showroom" required autocomplete="phone" autofocus>
                                @error('owner_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <textarea id="owner_address" rows="3" type="text" class="form-control @error('owner_address') is-invalid @enderror itemInput" name="owner_address" placeholder="Alamat Pemilik Showroom" style="resize: none" required autocomplete="address-line1" autofocus>{{ old('owner_address') }}</textarea>
                                @error('owner_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <input id="ktp_number" type="text" class="form-control @error('name') is-invalid @enderror itemInput" name="ktp_number" value="{{ old('ktp_number') }}" placeholder="No KTP Pemilik Showroom" required autocomplete="phone" autofocus>
                                @error('ktp_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input input2 @error('owner_ktp') is-invalid @enderror itemInput" id="owner_ktp" name="owner_ktp">
                                    <label class="custom-file-label label2" for="owner_ktp">KTP (jpg,jpeg,png) max(1MB)</label>
                                </div>
                                @error('owner_ktp')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0 float-left">
                                <img class="previous" id="previous" src="../image/Previous-Form.png" style="width: 100px" >
                            </div>

                            <div class="form-group row mb-0 float-right">
                                <img class="btnSubmit" id="btnSubmit" src="../image/signup.png" style="width: 100px" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="../js/loginRegister.js"></script>


