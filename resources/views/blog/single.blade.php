@extends('layouts.two-column')

@section('title', "| $post->title")

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
@endsection

@section('sidebar')
    <h2>Sidebar</h2>
@endsection