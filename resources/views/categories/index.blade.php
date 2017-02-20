@extends('layouts.two-column')

@section('title', '| All Categories')

@section('content')

    <h1>Categories</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th>{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('sidebar')
    <div class="well">
        <h3>New Category</h3>
        {!! Form::open(['route' => 'categories.store']) !!}
            {{ Form::label('name', 'Category Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}

            {{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
        {!! Form::close() !!}
    </div>
@endsection
