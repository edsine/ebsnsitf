<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Branch Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch:') !!}
    {!! Form::select('branch_id', $branches, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Image Field -->
<div class="col-sm-4">
    {!! Form::label('images', 'Image Document') !!}
    <div class="form-group">
    {!! Form::file('images',null, ['class' => 'form-control','accept' => 'image/*']) !!}
    </div>
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