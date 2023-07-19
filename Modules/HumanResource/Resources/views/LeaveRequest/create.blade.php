
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    LEAVE REQUEST PORTAL
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'leave_request.store','enctype' => 'multipart/form-data','id'=>'multi-page-form']) !!}

            <div class="card-body">

                <div class="row">
                    @include('humanresource::LeaveRequest.fields')
                    <div class="form-group my-5 col-sm-6">
                    {!!Form::button('NEXT PAGE',['class'=>'btn btn-success','id'=>'next-button']) !!}
                    </div>
                </div>

            </div>

            {{-- <button type="button" class="btn btn-success" id="next-button">NEXT </button> --}}

            <div class="card-footer">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('leave_request.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
