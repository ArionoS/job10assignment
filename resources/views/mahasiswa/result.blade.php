@extends('mahasiswa.layout')
@section('content')
@if(count($result))

    <div class="row">
        <div class="col-lg-12 margin-tb">
    <div class="pull-left mt-2">
        <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
</div><br>
<div class="float-right my-2">
    <a class="btn btn-success" href="{{ route('mahasiswa.search') }}"> Input Mahasiswa</a>
        </div>
        <form class="form-horizontal" role="search" method="get" action="index.php?cari-akun">
            <div class="col-md-8 col-xs-12">
                <input type="text" name="keyword" class="form-control" placeholder="Cari Akun Disini...">
            </div><p>
            <div class="col-md-4">
                <a class="btn btn-success" href="{{ route('mahasiswa.index') }}"> Cari Mahasiswa</a>
            </div>
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
    <th width="280px">Action</th>
    </tr>
    @foreach ($mahasiswa as $mhs)
    <tr>
    <td>{{ $mhs ->nim }}</td>
    <td>{{ $mhs ->nama }}</td>
    <td>{{ $mhs ->kelas }}</td>
    <td>{{ $mhs ->jurusan }}</td>
    <td>
        <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">
    <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
    @csrf
@method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
     @endforeach
    </table>

    <div class="d-flex">      
        {{$mahasiswa->links()}}
  </div>
  @endforeach
@endsection