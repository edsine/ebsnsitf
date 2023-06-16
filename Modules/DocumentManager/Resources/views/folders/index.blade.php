@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Folders</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-end"
                       href="{{ route('folders.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('documentmanager::folders.table')
        </div>
    </div>

@endsection
