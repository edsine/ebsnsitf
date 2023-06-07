<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $workflow->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $workflow->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $workflow->updated_at }}</p>
</div>

<!-- Workflow Name Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_name', 'Workflow Name:') !!}
    <p>{{ $workflow->workflow_name }}</p>
</div>

<!-- Workflow Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_type_id', 'Workflow Type Id:') !!}
    <p>{{ $workflow->workflow_type_id }}</p>
</div>

