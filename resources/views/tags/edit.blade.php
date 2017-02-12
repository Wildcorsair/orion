@extends('layouts.two-column')

@section('title', '| Edit Tag')

@section('content')
    {!! Form::open() !!}
        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
    {!! Form::close() !!}
@endsection