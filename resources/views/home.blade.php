@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <a href="{{route('pegawai.create')}}" class=" btn btn-info">Tambah Data <i class="fa fa-pencil"></i></a>
    </div>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIP</th>
            <th scope="col">Golongan</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
                $no= 1;
                @endphp
                @foreach($data_pegawai as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{ $row->nip }}</td>
                    <td>{{ $row->golongan }}</td>
                    <td>{{$row->email}}</td>
                    <td><a href="{{route('pegawai.edit',$row->id)}}"><button type="button" class="btn btn-warning">Edit</button></a>
                    <form action="{{route('pegawai.destroy',$row->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button></form></td>
                </tr>
                @endforeach
        </tbody>
      </table>
</div>
@endsection
