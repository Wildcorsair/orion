@extends('layouts.one-column')

@section('title', '| Create Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Create Post</h2>
            <hr>
            {!! Form::open(array('route' => 'posts.store', 'id' => 'create-post-form', 'files' => true)) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}

                {{ Form::label('slug', 'Slug:', array('class' => 'form-spacing-top')) }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::label('category_id', 'Category', array('class' => 'form-spacing-top')) }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

                {{ Form::label('tags', 'Tags', array('class' => 'form-spacing-top')) }}
                {{ Form::select('tags[]', $tags, null, ['id' => 'select-tags', 'class' => 'form-control', 'multiple' => 'multiple']) }}

                {{ Form::label('featured_image', 'Upload featured image:', array('class' => 'form-spacing-top')) }}
                {{ Form::file('featured_image') }}

                {{ Form::label('body', 'Body:', array('class' => 'form-spacing-top')) }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}

                {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block btn-h1-spacing')) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    {!! Html::script('js/functions.js') !!}
@endsection