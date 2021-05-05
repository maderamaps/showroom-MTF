@extends('layouts.user.app')
<link href="{{ asset('css/userProfile.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body align-self-center col-md-11">
                    <div class="avatar">
                        <form id="formAvatar"  method="POST" action="{{ route('ProfileUserUpdateAvatar') }}"  enctype="multipart/form-data">
                            @csrf
                            <img id="avatar" >
                            <p id="btnInputAvatar">Change Photo</p> 
                            <input id="inputAvatar" name="avatar" type="file" style="display: none">
                        </form>
                    </div>
                    <div class="form">
                        <div id="alert" ></div>
                        <span>Profile Showroom</span><hr> 

                        <table>
                            <tr>
                                <th width="150px">Name</th>
                                <td>:</td>
                                <td><input id="name" type="text"></td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td><input id="phone" type="text"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><input id="email" type="text"></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td><textarea id="address" rows="3" style="resize: none" ></textarea></td>
                            </tr>
                        </table>
          

                        <span>Profile Showroom Owner</span><hr> 

                        <table>
                            <tr>
                                <th width="150px">Name</th>
                                <td>:</td>
                                <td><input id="ownerName" type="text"></td>
                            </tr>
                            <tr>
                                <th>No Ktp</th>
                                <td>:</td>
                                <td><input id="ownerKtp" type="text" readonly></td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td><input id="ownerPhone" type="text"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><input id="ownerEmail" type="text"></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td><textarea id="ownerAddress" rows="3" style="resize: none" ></textarea></td>
                            </tr>
                        </table>

                        <button id="submit">Submit</button>
                    </div>    

                    

                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="../js/userProfile.js"></script>
