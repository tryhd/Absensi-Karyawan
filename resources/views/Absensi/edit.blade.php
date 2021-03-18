@extends('layout.master')
@section('content')
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Kelola Pegawai</h1>

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pegawai</h6>
     </div>
     <div class="card-body">
        <form action="{{ route('pegawai.update',$data->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method("PUT")
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">NIP</label>
                    <input type="number" class="form-control" name="nip" value="{{ $data->nip }}">
                    @if ($errors->has('nip'))
                        <span class="text-danger">{{ $errors->first('nip') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label  class="form-label">Alamat</label>
                    <input autocomplete="on" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}">
                    @if ($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
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
