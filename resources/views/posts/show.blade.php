@extends('layouts.one-column')

@section('title', '| View Post')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>{{ $post->title }}</h1>
			<p class="lead">
				{{ $post->body }}
			</p>
		</div>
	</div>
@endsection