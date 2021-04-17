@extends('mahasiswa.layout')

@section('content')
<div class="container mt-5"><div class="row justify-content-center align-items-center">
    <div class="card" style="width: 24rem;">
<div class="card-header">
        Edit Mahasiswa
</div>
    <div class="card-body">
@if ($errors->any())
        <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
    </ul>
    </div>
@endif
<form method="post" action="{{ route('mahasiswa.update', $Mahasiswa->nim) }}" id="myForm" enctype="multipart/form-data">
@csrf
@method('PUT')
        <div class="form-group">
    <label for="nim">Nim</label>
    <input type="text" name="nim" class="form-control" id="nim" value="{{ $Mahasiswa->nim }}" aria-describedby="nim" >
</div>
    <div class="form-group">
<label for="nama">Nama</label>
    <input type="text" name="nama" class="form-control" id="nama" value="{{ $Mahasiswa->nama }}" aria-describedby="nama" >
</div>
<div class="form-group">
    <label for="class">Class</label>
            <select name="class" class="form-control">
                @foreach($class as $kls)
    <option value="{{$kls->id}}"{{$Mahasiswa->class_id == $kls->id ? 'selected' : ''}}>{{$kls->class_name}}</option>
    @endforeach
            </select>
</div>
    <div class="form-group">
<label for="jurusan">Jurusan</label>
    <input type="jurusan" name="jurusan" class="form-control" id="jurusan" value="{{ $Mahasiswa->jurusan }}" aria-describedby="jurusan" >
</div>
<div class="form-group">
    <label for="alamat">Alamat</label>
        <input type="alamat" name="alamat" class="form-control" id="alamat" value="{{ $Mahasiswa->alamat }}" aria-describedby="alamat" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $Mahasiswa->email }}" aria-describedby="email" >
        </div>
        <div class="form-group">
            <label for="image">Image</label>
                <input type="file" class="form-control"required="required" name="image" value="{{$Mahasiswa->profile_picture}}"><br>
            <img width="150px" src="{{asset('storage/'.$Mahasiswa->profile_picture)}}">
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        </div>
    </div>
</div>
@endsection