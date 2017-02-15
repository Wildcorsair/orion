@extends('layouts.two-column')

@section('title', "| $post->title")

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>
    <p>Posted in: {{ $post->category->name }}</p>
    <hr>
    <div class="row">
        {!! Form::open(['route' => ['comments.store', $post->id]]) !!}
            <div class="col-md-6">
                {{ Form::label('name', 'Name:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <div class="col-md-6">
                {{ Form::label('email', 'Email:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>
            <div class="col-md-12">
                {{ Form::label('comment', 'Comment:', ['class' => 'form-spacing-top']) }}
                {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                {{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('sidebar')
    <h2>Sidebar</h2>
@endsection