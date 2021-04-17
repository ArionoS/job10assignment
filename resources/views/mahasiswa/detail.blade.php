@extends('mahasiswa.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
        Detail Mahasiswa
    </div>
        <div class="card-body">
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Nim: </b>{{$Mahasiswa->nim}}</li>
            <li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->name}}</li>
        <li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->class->class_name}}</li>
    <li class="list-group-item"><b>Jurusan: </b>{{$Mahasiswa->major}}</li>
    <li class="list-group-item"><b>Alamat: </b>{{$Mahasiswa->address}}</li>
    <li class="list-group-item"><b>Email: </b>{{$Mahasiswa->email}}</li>
    <li class="list-group-item"><b>Profile Picture: </b><br><img width="50px" src="{{asset('storage/'.$Mahasiswa->profile_picture)}}"></li>
</ul>
</div>
        <a class="btn btn-success mt-3" href="{{ route('mahasiswa.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection