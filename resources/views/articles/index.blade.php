
@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

<div class="row">
    <div style="margin:0px 0px 0px 70px;">
        <a class="btn btn-success" href="{{route('print_pdf')}}">Print PDF</a>
    </div>
</div><br>
<div class="row">
    <div style="margin:0px 0px 0px 70px;">
        <a class="btn btn-success" href="{{route('create')}}">ADD PDF</a>
    </div>
</div><br>
<table class="table table-bordered" style="width:95%;margin: 0
auto;">
<tr>
<th>Title</th>
<th>Content</th>
<th>Image</th>
</tr>
@foreach ($articles as $article)
<tr>
    <td width="110px"><a  href="{{route('articles.edit',['article'=>$article->id]) }}">{{$article->title}}</td>
        <td width="880px">{{ $article->content }}</td>
        <td width="110px"><img width="50px" src="{{asset('storage/'.$article->featured_image)}}"></td>
</tr>
@endforeach
</table>
@endsection