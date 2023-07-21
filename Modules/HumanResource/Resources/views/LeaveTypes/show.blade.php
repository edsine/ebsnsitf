@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>

                       THE VARIOUS LEAVE TYPE 
                    </h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right" href="{{ route('leave_type.index') }}">

                       THE VARIOUS LEAVE TYPE
                    </h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-secondary float-end" href="{{ route('leave_type.index') }}">

                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">


                    @include('humanresource::leavetypes.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
