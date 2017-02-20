@extends('layouts.one-column')

@section('title', '| Contact')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h2>Contact Me</h2>
        {!! Form::open(['route' => 'contactForm']) !!}
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}

            {{ Form::label('subject', 'Subject:', ['class' => 'btn-h1-spacing']) }}
            {{ Form::text('subject', null, ['class' => 'form-control']) }}

            {{ Form::label('message', 'Message:', ['class' => 'btn-h1-spacing']) }}
            {{ Form::textarea('message', null, ['class' => 'form-control']) }}

            {{ Form::submit('Send Email', ['class' => 'btn btn-success btn-h1-spacing pull-right']) }}
        {!! Form::close() !!}
    </div>
@endsection