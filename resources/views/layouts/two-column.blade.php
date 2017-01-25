@extends('main')

@section('body')
    <div class="col-md-8">
    	@yield('content')
    </div>
    <div class="col-md-3 col-md-offset-1">
    	@yield('sidebar')
    </div>
@endsection