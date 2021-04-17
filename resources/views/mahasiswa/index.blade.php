@extends('mahasiswa.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
    <div class="pull-left mt-2">
        <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
</div><br>
<div class="float-right my-2">
    <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
        </div>
        <div class="float-left my-4">
        <form action="/mahasiswa/cari/" method="GET">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Search Name...">
                <button type="submit" class="btn btn-primary">
                    Search
            </div><p>
        </form>
</div>
</div>
        @if ($message = Session::get('success'))<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <table class="table table-bordered">
<tr>
    <th>Nim</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    <th>alamat</th>
    <th>email</th>
    <th>Profile Picture</th>
    <th width="280px">Action</th>
    </tr>
    @foreach ($mahasiswa as $mhs)
    <tr>
    <td>{{ $mhs ->nim }}</td>
    <td>{{ $mhs ->name }}</td>
    <td>{{ $mhs ->class->class_name }}</td>
    <td>{{ $mhs ->major }}</td>
    <td>{{ $mhs ->address}}</td>
    <td>{{ $mhs ->email }}</td>
    <td width="110px"><img width="50px" src="{{asset('storage/'.$mhs->profile_picture)}}"></td>
    <td>
        <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">
    <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
    @csrf
@method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        <a class="btn btn-warning" href="{{ route('mahasiswa.showCourse',$mhs->nim) }}">Nilai</a>
            </form>
        </td>
    </tr>
     @endforeach
    </table>

 
@endsection