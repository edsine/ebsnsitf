@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <h1 class="text-black-50">You are logged in!</h1>
    </div>
@endsection
