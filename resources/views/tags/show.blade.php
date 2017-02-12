@extends('layouts.two-column')

@section('title', '| View Tag')

@section('content')
    <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Tags</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tag->posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>
                    @foreach($post->tags as $tag)
                        <span class="label label-default">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('sidebar')
    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right form-spacing-top">Edit</a>
@endsection