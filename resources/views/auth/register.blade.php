@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="background"></div>
            <div class="imgText1"></div>
            <div class="imgText2"></div>
            <div class="imgText3"></div>
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                <div class="card-body ">
                    
                    <form class="col-md-5 float-left" method="POST" action="{{ route('register') }}">
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
                                <input id="telp" type="text" class="form-control itemInput" name="phone" placeholder="No Telp" required>
                            </div>

                            <div class="form-group row">
                                <textarea id="alamat" type="text" rows="3" class="form-control itemInput" name="alamat" placeholder="Alamat Showroom" style="resize: none" required></textarea>
                            </div>
                            
                            <div class="form-group row">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input itemInput" id="cv">
                                    <label class="custom-file-label" for="cv">Choose file</label>
                                </div>
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
                                <input id="namePemilik" type="text" class="form-control itemInput" name="namePemilik" placeholder="Nama Pemilik Showroom" required autocomplete="name" autofocus>
                            </div>

                            <div class="form-group row">
                                <input id="emailPemilik" type="email" class="form-control itemInput" name="emailPemilik" placeholder="Email Pemilik Showroom" required autocomplete="email" autofocus>
                            </div>

                            <div class="form-group row">
                                <input id="phonePemilik" type="text" class="form-control itemInput" name="phonePemilik" placeholder="No Telp Pemilik Showroom" required autocomplete="phone" autofocus>
                            </div>

                            <div class="form-group row">
                                <textarea id="alamatPemilik" rows="3" type="text" class="form-control itemInput" name="alamatPemilik" placeholder="Alamat Pemilik Showroom" style="resize: none" required autocomplete="address-line1" autofocus></textarea>
                            </div>

                            <div class="form-group row">
                                <input id="noKtpPemilik" type="text" class="form-control itemInput" name="noKtpPemilik" placeholder="No KTP Pemilik Showroom" required autocomplete="phone" autofocus>
                            </div>

                            <div class="form-group row">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input itemInput" id="ktpPemilik">
                                    <label class="custom-file-label" for="ktpPemilik">Choose file</label>
                                </div>
                            </div>

                            <div class="form-group row mb-0 float-left">
                                <img class="previous" id="previous" src="../image/Previous-Form.png" style="width: 100px" >
                            </div>

                            <div class="form-group row mb-0 float-right">
                                <img class="submit" id="submit" src="../image/signup.png" style="width: 100px" >
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


