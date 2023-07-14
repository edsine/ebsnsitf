<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'SELECT LEAVE TYPE:') !!}
    {!! Form::select('type', leave_type(), null, ['class' => 'form-control form-select', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('date_last_leave', 'DATE RESUME FROM LAST LEAVE:') !!}
    {!! Form::date('date_last_leave', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_start_new', 'DATE REQUESTED TO COMMENCE PRESENT LEAVE:') !!}
    {!! Form::date('date_start_new',  null, ['class' => 'form-control ']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
    {!! Form::number('number_days',  null, ['class' => 'form-control ']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('home_address', 'HOME ADDRESS:') !!}
    {!! Form::text('home_address',  null, ['class' => 'form-control ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('home_number', 'HOUSE NUMBER:') !!}
    {!! Form::text('home_number',  null, ['class' => 'form-control ']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('street_number', 'STREET NUMBER:') !!}
    {!! Form::text('street_number',  null, ['class' => 'form-control ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('district', 'DISTRICT:') !!}
    {!! Form::text('district',  null, ['class' => 'form-control ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('local_council', 'LOCAL COUNCIL/AREA COUNCIL:') !!}
    {!! Form::text('local_council',  null, ['class' => 'form-control ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('state', 'STATE:') !!}
    {!! Form::select('state', getBranchRegions(), null, ['class' => 'form-control form-select ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'PHONE NUMBER:') !!}
    {!! Form::text('phone_number',  null, ['class' => 'form-control ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('officer_relieve', 'NAME OF OFFICER TO RELIEVE:') !!}
    {!! Form::text('officer_relieve',  null, ['class' => 'form-control ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:') !!}
    {!! Form::date('end_date',  null, ['class' => 'form-control ']) !!}
</div>

<!-- Image Field -->
<div class="col-sm-4 my-4">
    {!! Form::label('signature_path', 'UPLOAD SIGNATURE PDF ONLY') !!}
    <div class="form-group">
    {!! Form::file('signature_path',null, ['class' => 'form-control','accept' => 'image/*']) !!}
    </div>
</div>

@can(['approve as md_hr', 'approve as leave_officer', 'approve as supervisor_office','approve as approve_status'])
<!-- Regional Manager Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('md_hr', 'MD HR') !!}
    <div class="">
    {!! Form::radio('md_hr', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('md_hr', 0, true) !!}&nbsp;Unapproved
    </div>
</div>

<!-- Head Office Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_officer', 'Head Office Status') !!}
    <div class="">
    {!! Form::radio('leave_officer', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('leave_officer', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('supervisor_office', 'Supervisor OFFICER') !!}
    <div class="">
    {!! Form::radio('supervisor_office', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('supervisor_office', 0, true) !!}&nbsp;Unapproved
    </div>
</div>

<!-- APPROVE STATUS Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approve_status', 'Approved Status') !!}
    <div class="">
    {!! Form::radio('approve_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('approve_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endcan