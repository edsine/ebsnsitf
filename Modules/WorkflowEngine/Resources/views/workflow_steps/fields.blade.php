<!-- Workflow Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workflow_id', 'Workflow Id:') !!}
    {!! Form::number('workflow_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Step Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step_order', 'Step Order:') !!}
    {!! Form::number('step_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Step Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_step_id', 'Parent Step Id:') !!}
    {!! Form::number('parent_step_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Next Approved Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_approved_id', 'Next Approved Id:') !!}
    {!! Form::number('next_approved_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Next Rejected Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_rejected_id', 'Next Rejected Id:') !!}
    {!! Form::number('next_rejected_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Actor Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actor_type_id', 'Actor Type Id:') !!}
    {!! Form::number('actor_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Actor Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actor_role_id', 'Actor Role Id:') !!}
    {!! Form::number('actor_role_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Step Activity Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step_activity_id', 'Step Activity Id:') !!}
    {!! Form::number('step_activity_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Step Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step_type_id', 'Step Type Id:') !!}
    {!! Form::number('step_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Step Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step_name', 'Step Name:') !!}
    {!! Form::text('step_name', null, ['class' => 'form-control']) !!}
</div>