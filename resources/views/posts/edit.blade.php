@extends('layouts.layout')

@section('content')

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>


<h2>Edit a post:</h2>


<form action="/posts/{{$post->alias}}" method="post">
    
    {{csrf_field()}}
    {!! method_field('patch') !!}
    
    <div class="form-group">
        <label for="title">Title:</label>
        <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}"/>
    </div>
    <div class="form-group">
        <label for="alias">Alias:</label>
        <input class="form-control" type="text" name="alias" id="alias" value="{{$post->alias}}"/>
    </div>
    <div class="form-group">
        <label for="intro">Intro:</label>
        <textarea class="form-control" type="text" name="intro" id="intro">{{$post->intro}}</textarea>
    </div>
    <div class="form-group">
        <label for="body">Body:</label>
        <textarea class="form-control" type="text" name="body" id="body">{!!$post->body!!}</textarea>
        <script>
            CKEDITOR.replace('body', {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        </script>
    </div>
    
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
    
    @include('layouts.error')
</form>

@endsection