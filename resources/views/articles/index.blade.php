<!--Template Name: vacayhome
File Name: home.html
Author Name: ThemeVault
Author URI: http://www.themevault.net/
License URI: http://www.themevault.net/license/-->

@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered" style="width:95%;margin: 0
auto;">
<tr>
<th>Title</th>
<th>Content</th>
<th>Image</th>
</tr>
@foreach ($articles as $article)
<tr>
<td>{{ $article->title }}</td>
<td>{{ $article->content }}</td>
<td><img width="150px"
src="{{asset('storage/'.$article->featured_image)}}"></td>Page 4 of 15
</tr>
@endforeach
</table>
@endsection