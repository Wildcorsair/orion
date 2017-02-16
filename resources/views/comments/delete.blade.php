@extends('layouts.one-column')

@section('title', '| Delete comment')

@section('content')
    <div class="col-md-4 col-md-offset-4">

        <h2>Delete this comment?</h2>
        <p>
            <strong>Name:</strong>&nbsp;{{ $comment->name }}<br>
            <strong>Email:</strong>&nbsp;{{ $comment->email }}
        </p>

        {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

            {{ Form::submit('Delete comment', ['class' => 'btn btn-danger btn-block btn-h1-spacing']) }}

        {!! Form::close() !!}
        <a href="{{ route('posts.show', $comment->post->id) }}" class="btn btn-default btn-block btn-h1-spacing">Cancel</a>
    </div>
@endsection