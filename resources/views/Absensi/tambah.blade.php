@extends('layout.master')
@section('content')
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Kelola Anggota</h1>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Anggota</h6>
     </div>
     <div class="card-body">
        <form  action="{{ route('absensi.store') }}" method="POST" autocomplete="on" enctype="multipart/form-data">
           @csrf
            <div class="form-row">
            <div class="form-group col-md-6">
                <label class="form-label">Nama Pegawai</label>
                <select name="karyawan" id="id_pegawai" class="form-control">
                    <option selected>Pilih Karyawan</option>
                    @foreach($karyawan as $row)
                      <option name="karyawan" value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="form-label">Gaji</label>
                <input type="text" class="form-control" name="gaji" placeholder="Masukan gaji karyawan">
                @if ($errors->has('gaji'))
                <span class="text-danger">{{ $errors->first('gaji') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label  class="form-label">Tanggal</label>
                <input autocomplete="on" type="date" class="form-control" name="tanggal" placeholder="Masukan tanggal">
                @if ($errors->has('tanggal'))
                <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label class="form-label">Waktu Masuk</label>
                <input type="time" class="form-control" name="masuk" placeholder="Masukan waktu masuk">
                @if ($errors->has('masuk'))
                    <span class="text-danger">{{ $errors->first('masuk') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label class="form-label">Waktu Keluar</label>
                <input type="time" class="form-control" name="keluar" placeholder="Masukan waktu masuk">
                @if ($errors->has('keluar'))
                    <span class="text-danger">{{ $errors->first('keluar') }}</span>
                @endif
            </div>
            <div class="form-group col-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
   </div>
@endsection
