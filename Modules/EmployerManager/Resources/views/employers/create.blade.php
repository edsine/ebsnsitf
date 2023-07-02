@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>
                    Create Employers
                </h1>
            </div>
        </div>
    </div>
</section>


@include('adminlte-templates::common.errors')
<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Stepper-->
        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10" id="kt_create_account_stepper">

            @include('employermanager::employers.fields')
        </div>
        <!--end::Stepper-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
@endsection