@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List Showroom</div>

                    <div class="card-body">
                    <input class="searchListShowroom" id="search" type="search" placeholder="Search...">
                    <table class="table-users content-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="circle"></div>
        
        
    </div>

{{-- Pop Up --}}
<div class="w3-container">  
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="" >
            <div class="w3-container w3-padding">
                <table class="table-user">
                    <tbody>
                        <tr>
                            <td style="padding: auto"><label for="name">Nama</label></td>
                            <td>:</td>
                            <td id="name"></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td>:</td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <td><label for="telp">No Telp</label></td>
                            <td>:</td>
                            <td id="telp"></td>
                        </tr>
                        <tr>
                            <td><label for="telp">Alamat</label></td>
                            <td>:</td>
                            <td id="alamat"></td>
                        </tr>
                        <tr>
                            <td><label for="tanggal">Tanggal Registrasi</label></td>
                            <td>:</td>
                            <td id="tanggal"></td>
                        </tr>
                        <tr>
                            <td><label for="cv">CV</label></td>
                            <td>:</td>
                            <td id="cv"></td>
                        </tr>
                        <tr>
                            <td><label for="ktp">KTP</label></td>
                            <td>:</td>
                            <td id="ktp"></td>
                        </tr>
                        <tr>
                            <td><label for="reward">reward</label></td>
                            <td>:</td>
                            <td id="reward"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
            <div class="w3-container w3-padding" id="action">
                <span id="confirm"></span>
                <span id="delete"></span>
                <span id="close"></span>
            </div>
        </div>
    </div>
</div>
{{-- ----- --}}



@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="../js/listShowroom.js"></script>