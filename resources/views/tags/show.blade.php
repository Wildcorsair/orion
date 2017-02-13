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
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block pull-right form-spacing-top">Edit</a>
        </div>
        <div class="col-md-6">
            {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block form-spacing-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection