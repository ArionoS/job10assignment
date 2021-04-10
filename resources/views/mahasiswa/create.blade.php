@extends('mahasiswa.layout')
  
@section('content')
   
<div class="container mt-5">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Tambah Mahasiswa
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
            <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
            @csrf
                <div class="form-group">
                    <label for="Nim">Nim</label>                    
                    <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim" >                
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>                    
                    <input type="name" name="name" class="form-control" id="name" aria-describedby="name" >                
                </div>
                <div class="form-group">
                    <label for="class">Kelas</label>                    
                    <input type="class" name="class" class="form-control" id="class" aria-describedby="class" >                
                </div>
                <div class="form-group">
                    <label for="major">Jurusan</label>                    
                    <input type="major" name="major" class="form-control" id="major" aria-describedby="major" >                
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>                    
                    <input type="address" name="address" class="form-control" id="address" aria-describedby="address" >                
                </div>
                <div class="form-group">
                    <label for="email">Email</label>                    
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" >                
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection
