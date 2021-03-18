@extends('layout.master')
@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Absensi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
      </div>
      <div class="card-body">
        <div class="card-title">
            <div class="panel-wrapper">
            </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <td>Tanggal</td>
                <td>Jam Masuk</td>
                <td>Jam Keluar</td>
                <td>Keterangan</td>
                <td>Gaji</td>
              </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($data as $row)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->nip }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->masuk }}</td>
                <td>{{ $row->keluar }}</td>
                <td>{{ $row->keterangan }}</td>
                <td>{{ $row->gaji }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection
