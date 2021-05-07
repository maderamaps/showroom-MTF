@extends('layouts.admin.app')
<link rel="stylesheet" href="{{asset('css/adminApproveTransaksi.css')}}">

@section('content')
    <div class="container">
        <h2>Approve Transaksi</h2>
        <div class="cont-table">
            <input class="searchListShowroom" id="search" type="search" placeholder="Search...">
            <table class="table-users">
                <thead>
                    <tr>
                        <th>No Transaksi</th>
                        <th>Showroom</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            </table>

        </div>
        <!-- <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Approve Transaksi</div>

                    <div class="card-body">
                    <input class="searchListShowroom" id="search" type="search" placeholder="Search...">
                    <table class="table-users content-table">
                            <thead>
                                <tr>
                                    <th>No Transaksi</th>
                                    <th>Showroom</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div> -->
    </div>


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="../js/approveTransaksi.js"></script>