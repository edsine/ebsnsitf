<!-- Form Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('form_name', 'Form Name:') !!}
    {!! Form::text('form_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Workflow Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('has_workflow', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('has_workflow', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('has_workflow', 'Has Workflow', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Workflow Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workflow_id', 'Workflow Id:') !!}
    {!! Form::number('workflow_id', null, ['class' => 'form-control']) !!}
</div>