@extends('layouts.two-column')

@section('title', '| Edit Category')

@section('content')
    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
        {{ Form::label('name', 'Title:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}

        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-h1-spacing']) }}
    {!! Form::close() !!}
@endsection