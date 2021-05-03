@extends('layouts.user.app')
<link href="{{ asset('css/userReward.css') }}" rel="stylesheet">
<link href="{{ asset('css/userRewardChart.css') }}" rel="stylesheet">
<link href='http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

@section('content')
<div class="container">
    <div class="box">
        <h2>Reward</h2>
        <div class="box-body">
            <div class="point">
                <span class="title">My Points :</span> <span class="point">3000</span>
                <button type="button" class="btn btn-success">Withdraw</button>
            </div>
            <div class="date">
                <i class="fas fa-sort-down"><input type="text" id="datepicker" class="datepicker"></i>
            </div>
            <div class="chart row justify-content-center">
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
    <div class="box2">
        <div class="box2-body">
            <div class="reward">
                <table class="table-recentReward">
                    <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                     </thead>
                    <tbody>
                        @foreach ($reward as $reward)
                            <tr>
                                <td>{{$reward->no_transaksi}}</td>
                                <td>{{$reward->name}}</td>
                                <td>{{$reward->nominal}}</td>
                                <td>@if($reward->status=="reward") <p class="text-success">Reward</p> @endif 
                                    @if($reward->status=="withdraw") <p class="text-warning">In Process Witdraw</p> @endif
                                    @if($reward->status=="withdraw confirmed") <p class="text-danger">Withdraw</p> @endif
                                </td>
                                <td>{{substr($reward->created_at,0,10)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                            <td class="seeAll" colspan="3">See All &#8594</td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


<script src="../js/userReward.js"></script>
