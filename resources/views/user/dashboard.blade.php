@extends('layouts.user.app')
<link href="{{ asset('css/barChart.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-8">
            <div class="opening">Hello, Showroom {{ Auth::user()->name }}</div>
            <span class="opening">Welcome Back</span>

            <div class="card graph">

                <div class="card-body">
                   <table id="q-graph">
                        <caption>Grafik Transaksi</caption>
                        <tbody>
                        <tr class="qtr" id="q1">
                        <th scope="row">Jan</th>
                        <td id="bar1" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q2">
                        <th scope="row">Feb</th>
                        <td id="bar2" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q3">
                        <th scope="row">Mar</th>
                        <td id="bar3" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q4">
                        <th scope="row">Apr</th>
                        <td id="bar4" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q5">
                        <th scope="row">Mei</th>
                        <td id="bar5" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q6">
                        <th scope="row">Jun</th>
                        <td id="bar6" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q7">
                        <th scope="row">Jul</th>
                        <td id="bar7" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q8">
                        <th scope="row">Aug</th>
                        <td id="bar8" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q9">
                        <th scope="row">Sep</th>
                        <td id="bar9" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q10">
                        <th scope="row">Oct</th>
                        <td id="bar10" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q11">
                        <th scope="row">Nov</th>
                        <td id="bar11" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        <tr class="qtr" id="q12">
                        <th scope="row">Dec</th>
                        <td id="bar12" class="sent bar" style="height: 0%;"></td>
                        </tr>
                        </tbody>
                        </table>
                        
                        <div id="ticks">
                        <div id="ticks1" class="tick" style="height: 20%;"></div>
                        <div id="ticks2" class="tick" style="height: 20%;"></div>
                        <div id="ticks3" class="tick" style="height: 20%;"></div>
                        <div id="ticks4" class="tick" style="height: 20%;"></div>
                        <div id="ticks5" class="tick" style="height: 20%;"></div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card recentHistory">
                <div class="card-body point">
                    <div class="point">
                        <table>
                            <tr>
                                <td rowspan="2"><img class="logo" src="image/point.png"></td>
                                <td><span class="title">My Points</span></td>
                            </tr>
                            <tr>
                                <td><span class="number">15000000</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="recentReward">
                        <table class="table-recentReward">
                            <thead>
                                <tr>
                                    <th colspan="3">Reward</th>
                                </tr>
                             </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                    <td class="seeAll" colspan="3"><a href="{{route('RewardUser')}}">See All &#8594</a></td>
                            </tfoot>
                        </table>
                    </div>
                    <div class="recentWithdraw">
                        <table class="table-recentWithdraw">
                            <thead>
                                <tr>
                                    <th colspan="3">Withdraw</th>
                                </tr>
                             </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                   <td class="seeAll" colspan="3"><a href="{{route('RewardUser')}}">See All &#8594</a></td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-8">
            <div class="card recentTransaksi">
                <div class="card-header">Transaksi Terakhir <a class="seeAll float-right" href="{{route('TransaksiUserHistory')}}">See All &#8594</a></div>
                <div class="card-body">
                    <table class="table-recentTransaksi">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>No Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nominal Transaksi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="z-index:-10"></div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="../js/userDashboard.js"></script>


