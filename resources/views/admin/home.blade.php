@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h3>Dashboard</h2>
    <!-- <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <div class="dashboard-menu" id="approveTransaksi">
                       <div class="dashboard-menu-gambar" style="background-image: url('../image/admin/cashback.png')"></div>
                        <div class="dashboard-menu-title"><p>Approve Transaksi</p></div>
                        <span class="badge">3</span>
                    </div>
                    <div class="dashboard-menu" id="approveWithdraw">
                        <div class="dashboard-menu-gambar" style="background-image: url('../image/admin/withdraw.png')"></div>
                         <div class="dashboard-menu-title"><p>Approve Withdraw Reward</p></div>
                        <span class="badge">13</span>
                     </div>
                     <div class="break"></div>
                     <div class="dashboard-menu" id="approveRegistrasi">
                        <div class="dashboard-menu-gambar" style="background-image: url('../image/admin/check.png')"></div>
                         <div class="dashboard-menu-title"><p>Approve Registrasi</p></div>
                        <span class="badge">10</span>
                     </div>
                     <div class="dashboard-menu" id="listShowroom">
                        <div class="dashboard-menu-gambar" style="background-image: url('../image/admin/verify.png')"></div>
                         <div class="dashboard-menu-title"><p>List Showroom</p></div>
                     </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script>
        $( document ).ready(function() {
            $( "#approveTransaksi" ).click(function() {
                location.replace('{{route("ApproveTransaksi")}}');
            });    
        });
        $( document ).ready(function() {
            $( "#approveWithdraw" ).click(function() {
                location.replace('{{route("ApproveWithdraw")}}');
            });    
        });
        $( document ).ready(function() {
            $( "#approveRegistrasi" ).click(function() {
                location.replace('{{route("RegisterConfirm")}}');
            });    
        });
        $( document ).ready(function() {
            $( "#listShowroom" ).click(function() {
                location.replace('{{route("ListShowroom")}}');
            });    
        });
    </script>


