@extends('layouts.user.app')
<link href="{{ asset('css/userInputTransaksi.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Transaksi</div>
                <div class="card-body align-self-center col-md-11">
                        <div id="alert" ></div>
                        <label for="noTransaksi">No Transaksi:</label><br />
                        <div data-tip="Masukan No Transaksi yang customer ajukan lewat aplikasi MTF-GO">
                        <input id="noTransaksi" type="text" ><br /><br />
                        </div>

                        <label for="nominal">Nominal:</label><br />
                        <input id="nominal" type="text" placeholder="Rp." ><br /><br />

                        <label for="namaCustomer">Nama Customer:</label><br />
                        <input id="namaCustomer" type="text" ><br /><br />

                        <label for="noTelp">No Telp Customer:</label><br />
                        <input id="noTelp" type="text" ><br /><br />

                        <label for="email">Email Customer:</label><br />
                        <input id="email" type="text" ><br /><br />

                        <label for="alamatCustomer">Alamat Customer:</label><br />
                        <textarea id="alamatCustomer" rows="3" style="resize: none" ></textarea><br /><br />

                        <button id="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="../js/userTransaksiInput.js"></script>
