<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $form->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $form->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $form->updated_at }}</p>
</div>

<!-- Form Name Field -->
<div class="col-sm-12">
    {!! Form::label('form_name', 'Form Name:') !!}
    <p>{{ $form->form_name }}</p>
</div>

<!-- Has Workflow Field -->
<div class="col-sm-12">
    {!! Form::label('has_workflow', 'Has Workflow:') !!}
    <p>{{ $form->has_workflow }}</p>
</div>

<!-- Workflow Id Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_id', 'Workflow Id:') !!}
    <p>{{ $form->workflow_id }}</p>
</div>

