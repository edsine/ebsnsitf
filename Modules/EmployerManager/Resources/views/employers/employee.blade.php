@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employees</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-left"
                       href="{{ route('employees.create') }}">
                        Add New
                    </a>
                    <a class="btn btn-default float-right"
                       href="{{ route('employers.index') }}">Back</a>
                </div>
                
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('employermanager::employers.employee_table')
        </div>
    </div>

@endsection
