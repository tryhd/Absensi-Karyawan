@extends('layout.master')
@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Laporan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Absensi</h6>
      </div>
      <div class="card-body">
        <div class="card-title">
            <div class="panel-wrapper">
                <form  action="{{ route('search') }}" method="POST" autocomplete="on" enctype="multipart/form-data">
                    @csrf
                     <div class="form-row">
                     <div class="form-group col-md-6">
                         <label class="form-label">Tanggal Mulai</label>
                         <input type="date" class="form-control" name="mulai" placeholder="Masukan tanggal mulai">
                     </div>
                     <div class="form-group col-md-6">
                         <label class="form-label">Tanggal Akhir</label>
                         <input type="date" class="form-control" name="akhir" placeholder="Masukan tanggal akhir">
                     </div>
                     <div class="form-group col-12">
                         <button type="submit" class="btn btn-primary">Cari</button>
                     </div>
                 </div>
                 </form>
            </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection
