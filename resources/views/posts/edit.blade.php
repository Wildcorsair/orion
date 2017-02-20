@extends('layouts.one-column')

@section('title', '| Edit Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        {!! Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT', 'files' => true)) !!}
            <div class="col-md-8">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class' => 'form-control input-lg')) }}

                {{ Form::label('slug', 'Slug:', array('class' => 'form-spacing-top')) }}
                {{ Form::text('slug', null, array('class' => 'form-control')) }}

                {{ Form::label('category_id', 'Category:', array('class' => 'form-spacing-top')) }}
                {{ Form::select('category_id', $categories, null, array('class' => 'form-control')) }}

                {{ Form::label('tags', 'Tags', array('class' => 'form-spacing-top')) }}
                {{ Form::select('tags[]', $tags, null, ['id' => 'select-tags', 'class' => 'form-control', 'multiple' => 'multiple']) }}

                {{ Form::label('featured_image', 'Update featured image:', array('class' => 'form-spacing-top')) }}
                {{ Form::file('featured_image') }}

                {{ Form::label('body', 'Body:', array('class' => 'form-spacing-top')) }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}
            </div>
            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{ $post->created_at }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Updated At:</dt>
                        <dd>{{ $post->updated_at }}</dd>
                    </dl>

                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save', array('class' => 'btn btn-success btn-block')) }}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div> <!-- end of .row -->
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {!! Html::script('js/functions.js') !!}
    <script>
        $('#select-tags').select2().val({{ json_encode($post->tags()->getRelatedIds()) }}).trigger('change');
    </script>
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
@endsection