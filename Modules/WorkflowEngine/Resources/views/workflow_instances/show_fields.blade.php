<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $workflowInstance->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $workflowInstance->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $workflowInstance->updated_at }}</p>
</div>

<!-- Workflow Id Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_id', 'Workflow Id:') !!}
    <p>{{ $workflowInstance->workflow_id }}</p>
</div>

<!-- Started By Field -->
<div class="col-sm-12">
    {!! Form::label('started_by', 'Started By:') !!}
    <p>{{ $workflowInstance->started_by }}</p>
</div>

<!-- Date Completed Field -->
<div class="col-sm-12">
    {!! Form::label('date_completed', 'Date Completed:') !!}
    <p>{{ $workflowInstance->date_completed }}</p>
</div>

