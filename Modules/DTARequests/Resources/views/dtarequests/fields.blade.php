<!-- Name Field -->


<!-- Destination Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::text('destination', null, ['class' => 'form-control']) !!}
</div>

<!-- NUMBER OF DAYS -->
<div class="form-group col-sm-6">
    {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
    {!! Form::number('number_days',null, ['class' => 'form-control ']) !!}
</div>
{{-- Travel date --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('travel_date', 'TRAVEL DATE:') !!}
    {!! Form::date('travel_date',null, ['class' => 'form-control ']) !!}
</div>
{{-- Arrival date --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('arrival_date', 'ARRIVAL DATE:') !!}
    {!! Form::date('arrival_date',null, ['class' => 'form-control ']) !!}
</div>
{{--  estimated expenses --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('estimated_expenses', 'ESTIMATED EXPENSES:') !!}
    {!! Form::text('estimated_expenses',null, ['class' => 'form-control']) !!}
</div>
{{-- purpose of travel --}}
<div class="form-group col-sm-6 my-4">
    {!! Form::label('purpose_travel ', 'PURPOSE OF TRAVEL:') !!}
    {!! Form::textarea('purpose_travel',null, ['class' => 'form-control']) !!}
</div>


<!-- document fields -->
<div class="col-sm-4 my-5">
    <span class="text-danger">UPLOAD ALL NECESSARY SUPPORTING DOCUMENT INCLUDING RECIEPT AND INVOICE(SCAN ALL AS SINGLE DOC IN PDF FORMAT)</span>
    <div class="form-group">
        {!! Form::file('uploaded_doc',null, ['class' =>'form-control','accept' => 'image/*']) !!}
    </div>
    {!! Form::label('uploaded_doc', ' PDF FILE') !!}
</div>













@can(['approve as regional manager', 'approve as medical team', 'approve as head office'])
<!-- Regional Manager Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regional_manager_status', 'Regional Manager Status') !!}
    <div class="">
    {!! Form::radio('regional_manager_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('regional_manager_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>

<!-- Head Office Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('head_office_status', 'Head Office Status') !!}
    <div class="">
    {!! Form::radio('head_office_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('head_office_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>

<!-- Medical Team Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medical_team_status', 'Medical Team Status') !!}
    <div class="">
    {!! Form::radio('medical_team_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('medical_team_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endcan