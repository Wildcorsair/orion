@extends('layouts.two-column')

@section('title', '| All Tags')

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
        @foreach($tags as $tag)
            <tr>
                <th>{{ $tag->id }}</th>
                <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('sidebar')
    <div class="well">
        <h3>New Category</h3>
        {!! Form::open(['route' => 'tags.store']) !!}
        {{ Form::label('name', 'Tag Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}

        {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
        {!! Form::close() !!}
    </div>
@endsection
