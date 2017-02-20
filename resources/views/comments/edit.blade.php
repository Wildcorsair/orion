@extends('layouts.one-column')

@section('title', '| Edit comment')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}

            {{ Form::label('name', 'Name:', ['class' => '']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}

            {{ Form::label('email', 'Email:', ['class' => '']) }}
            {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}

            {{ Form::label('comment', 'Comment:', ['class' => '']) }}
            {{ Form::textarea('comment', null, ['class' => 'form-control', 'row' => '5']) }}

            {{ Form::submit('Update comment', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

        {!! Form::close() !!}
    </div>
@endsection