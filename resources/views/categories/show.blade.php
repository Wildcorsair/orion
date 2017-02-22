@extends('layouts.two-column')

@section('title', '| View Category')

@section('content')
    <h1>{{ $category->name }} Category <small>{{ $category->posts()->count() }} Posts</small></h1>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($category->posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
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
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-block pull-right form-spacing-top">Edit</a>
        </div>
        <div class="col-md-6">
            {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block form-spacing-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection