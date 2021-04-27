@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Approve Withdraw</div>

                    <div class="card-body">
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
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="../js/approveWithdraw.js"></script>