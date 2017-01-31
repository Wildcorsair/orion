@extends('layouts.two-column')

@section('title', '| Blog')

@section('content')
    <div class="col-md-12">
        <h1>Blog</h1>
    </div>
    
    @foreach($posts as $post)
        <div class="col-md-12">
            <h2>{{ $post->title }}</h2>
            <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
            <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
            <a href="{{ route('blog.single', $post->slug)}}" class="btn btn-primary">Read More</a>
            <hr>
        </div>
    @endforeach
    <div class="col-md-12">
        {!! $posts->links() !!}
    </div>
@endsection

@section('sidebar')
    <h2>Sidebar</h2>
@endsection