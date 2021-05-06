@extends('layouts.admin.app')
<link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">

@section('content')
<div class="container">
    <h2>Dashboard</h2>
    <div class="cont-content-dashboard">
        <div class="cont-img-intro">
            <img src="../image/Hello-pana.svg" alt="">
            <div class="cont-intro">
                <p>Welcome Back, {{ Auth::user()->name }}</p>
                <p>Enjoy Your Work</p>
            </div>
        </div>
        <div class="card-body">
            <div class="dashboard-item">
                <a href="">
                    <span class="badge" id="transaksiBadge"></span>
                    <img src="../image/Confirmed2.svg" alt="">
                    <p>Approve Transaksi</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="">
                    <span class="badge"><p>3</p></span>
                    <img src="../image/send_gift.svg" alt="">
                    <p>Approve Withdraw</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="">
                    <span class="badge"><p>3</p></span>
                    <img src="../image/Confirmation.svg" alt="">
                    <p>Register Confirm</p>
                </a>
            </div>
            <div class="dashboard-item">
                <a href="">
                    <span class="badge"><p>3</p></span>
                    <img src="../image/Vehicle_sale.svg" alt="">
                    <p>Approve Transaksi</p>
                </a>
            </div>
        </div>
    </div>
    
</div>
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
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="../js/adminDashboard.js"></script>



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


