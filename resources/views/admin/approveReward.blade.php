@extends('layouts.admin.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Approve Registrasi</div>

                <div class="card-body"> 
 
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Point</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Made Rama PS</td>
            <td>20/04/2021</td>
            <td>198</td>
            <td>
              <button type="button" class="btn"><i class="fa fa-check"></i></button>
            <button type="button" class="btn "><i class="fa fa-times" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Ihsan Fajri</td>
            <td>19/04/2021</td>
            <td>30</td>
            <td>
            <button type="button" class="btn"><i class="fa fa-check"></i></button>
            <button type="button" class="btn "><i class="fa fa-times" aria-hidden="true"></i></button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Anggi Pratama</td>
            <td>19/04/2021</td>
            <td>1.200</td>
            <td>
            <button type="button" class="btn"><i class="fa fa-check"></i></button>
            <button type="button" class="btn "><i class="fa fa-times" aria-hidden="true"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  </div>
</div>
@endsection