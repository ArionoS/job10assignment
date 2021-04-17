<!--Template Name: vacayhome
File Name: home.html
Author Name: ThemeVault
Author URI: http://www.themevault.net/
License URI: http://www.themevault.net/license/-->

@extends('layouts.app')
@section('content')
<div class="container">
<form action="/articles/{{$articles->id}}" method="post" enctype="multipart/form-data">
@method('PUT')
@csrf

<div class="form-group">
    <label for="title">Title</label>
        <input type="text" class="form-control" required="required" name="title" value="{{$articles->title}}"><br>
</div>
<div class="form-group">
    <label for="content">Content</label>
        <input type="text" class="form-control"required="required" name="content" value="{{$articles->content}}"><br>
</div>
<div class="form-group">
    <label for="image">Image</label>
        <input type="file" class="form-control"required="required" name="image" value="{{$articles->featured_image}}"><br>
    <img width="150px" src="{{asset('storage/'.$articles->featured_image)}}">
</div>
        <button type="submit" class="btn btn-primary floatright">Update Data</button>
    </form>
</div>  
@endsection