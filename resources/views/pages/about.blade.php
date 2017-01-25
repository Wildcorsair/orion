@extends('layouts.one-column')

@section('title', '| About')

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="col-md-12">
        <h2>About Me</h2>
        <p>Welcome to my blog. My name is {{ $data['first_name'] }} {{ $data['last_name'] }}. Write me a letter at web.jungle.ua@gmail.com</p>
    </div>
@endsection