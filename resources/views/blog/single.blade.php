@extends('layouts.two-column')

@section('title', "| $post->title")

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{!! $post->body !!}</p>
    <hr>
    <p>Posted in: {{ $post->category->name }}</p>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h3 class="comment-title">
                {{ $post->comments()->count() }}&nbsp;Comments
                <span class="glyphicon glyphicon-comment"></span>
            </h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS G:i', strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
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
    <h3>Most popular</h3>
@endsection