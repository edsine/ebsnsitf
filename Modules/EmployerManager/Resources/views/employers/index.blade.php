@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employers</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('employers.create') }}">
                        Add New
                    </a>

                    <a class="btn btn-primary float-right"
                       href="{{ route('employers.create') }}">
                        Bulk Import
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('employermanager::employers.table')
        </div>
    </div>

@endsection
