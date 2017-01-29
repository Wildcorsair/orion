@extends('layouts.one-column')

@section('title', '| Home')

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome to my blog</h1>
            
            @foreach($posts as $post)
                <h3>{{ $post->title }}</h3>
                <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                <div><a href="#" class="btn btn-default">Read more</a></div>
                <hr>
            @endforeach

        </div>
    </div>

@endsection

@section('sidebar')
	<h2>Sidebar</h2>
@endsection