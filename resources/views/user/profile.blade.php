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
                        <img class="avatar" src="/image/default-avatar.png">
                        <p>Change Photo</p> 
                    </div>
                    <div class="form">
                        <span>Profile Showroom</span><hr> 

                        <table>
                            <tr>
                                <th width="150px">Name</th>
                                <td>:</td>
                                <td><input id="nominal" type="text"></td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td><input id="nominal" type="text"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><input id="nominal" type="text"></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td><textarea id="nominal" rows="3" style="resize: none" ></textarea></td>
                            </tr>
                        </table>
          

                        <span>Profile Showroom Owner</span><hr> 

                        <table>
                            <tr>
                                <th width="150px">Name</th>
                                <td>:</td>
                                <td><input id="nominal" type="text"></td>
                            </tr>
                            <tr>
                                <th>No Ktp</th>
                                <td>:</td>
                                <td><input id="nominal" type="text" readonly></td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td><input id="nominal" type="text"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><input id="nominal" type="text"></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td><textarea id="nominal" rows="3" style="resize: none" ></textarea></td>
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
<script src="../js/userTransaksiInput.js"></script>
