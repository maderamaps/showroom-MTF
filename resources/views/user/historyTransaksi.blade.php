@extends('layouts.user.app')
<link href="{{ asset('css/userHistoryTransaksi.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">History Transaksi</div>
                <div class="card-body align-self-center col-md-12">
                    <div class="search-container">
                      <form action="{{route('TransaksiUserSearch')}}">
                        <input type="search" placeholder="Search..." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                      </form>
                    </div>
                       <table class="historyTransaksi">
                           <thead>
                               <tr class="firstRow">
                                   <th class="firstCol" width=60px>No</th>
                                   <th>No. Transaksi</th>
                                   <th>Tanggal</th>
                                   <th>nama</th>
                                   <th>phone</th>
                                   <th>Email</th>
                                   <th>Alamat</th>
                                   <th>Nominal</th>
                                   <th class="lastCol">Status</th>
                               </tr>
                           </thead>
                           <tbody>
                             <?php $i=1 ?>
                               @foreach ( $transaksi as $trs)
                                <tr>
                                    
                                    <td>{{$i++}}</td>
                                    <td>{{$trs->no_transaksi}}</td>
                                    <td>{{substr($trs->created_at,0,10)}}</td>
                                    <td>{{$trs->name}}</td>
                                    <td>{{$trs->phone}}</td>
                                    <td>{{$trs->email}}</td>
                                    <td>{{$trs->address}}</td>
                                    <td>{{$trs->nominal}}</td>
                                    <td> @if($trs->status=="confirmed") <p class="text-success">Accepted</p> @endif 
                                         @if($trs->status=="delay") <p class="text-warning">In Process</p> @endif
                                         @if($trs->status=="decline") <p class="text-danger">Decline</p> @endif
                                    </td>
                                </tr>
                                @endforeach
                           </tbody>
                       </table>
                       <div class="link">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li id="firstLink" class="page-item">
                                <a class="page-link" href="{{$transaksi->previousPageUrl()}}" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                  <span class="sr-only">Previous</span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="{{$transaksi->url(1)}}">1</a></li>
                              {{-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                              <li id="lastLink" class="page-item">
                                <a class="page-link" href="{{$transaksi->nextPageUrl()}}" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </li>
                            </ul>
                          </nav>
                          <p>page {{$transaksi->currentPage()}} from {{$transaksi->lastPage()}}</p>
                       </div>
                       
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="../js/userTransaksiHistory.js"></script>
<script>
    $(document).ready(function() {
        links({{$transaksi->currentPage()}},{{$transaksi->total()}},{{$transaksi->count()}})
    });
</script>
