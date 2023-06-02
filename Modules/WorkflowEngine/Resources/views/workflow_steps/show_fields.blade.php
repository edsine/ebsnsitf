<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $workflowStep->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $workflowStep->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $workflowStep->updated_at }}</p>
</div>

<!-- Workflow Id Field -->
<div class="col-sm-12">
    {!! Form::label('workflow_id', 'Workflow Id:') !!}
    <p>{{ $workflowStep->workflow_id }}</p>
</div>

<!-- Step Order Field -->
<div class="col-sm-12">
    {!! Form::label('step_order', 'Step Order:') !!}
    <p>{{ $workflowStep->step_order }}</p>
</div>

<!-- Parent Step Id Field -->
<div class="col-sm-12">
    {!! Form::label('parent_step_id', 'Parent Step Id:') !!}
    <p>{{ $workflowStep->parent_step_id }}</p>
</div>

<!-- Next Approved Id Field -->
<div class="col-sm-12">
    {!! Form::label('next_approved_id', 'Next Approved Id:') !!}
    <p>{{ $workflowStep->next_approved_id }}</p>
</div>

<!-- Next Rejected Id Field -->
<div class="col-sm-12">
    {!! Form::label('next_rejected_id', 'Next Rejected Id:') !!}
    <p>{{ $workflowStep->next_rejected_id }}</p>
</div>

<!-- Actor Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('actor_type_id', 'Actor Type Id:') !!}
    <p>{{ $workflowStep->actor_type_id }}</p>
</div>

<!-- Actor Role Id Field -->
<div class="col-sm-12">
    {!! Form::label('actor_role_id', 'Actor Role Id:') !!}
    <p>{{ $workflowStep->actor_role_id }}</p>
</div>

<!-- Step Activity Id Field -->
<div class="col-sm-12">
    {!! Form::label('step_activity_id', 'Step Activity Id:') !!}
    <p>{{ $workflowStep->step_activity_id }}</p>
</div>

<!-- Step Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('step_type_id', 'Step Type Id:') !!}
    <p>{{ $workflowStep->step_type_id }}</p>
</div>

<!-- Step Name Field -->
<div class="col-sm-12">
    {!! Form::label('step_name', 'Step Name:') !!}
    <p>{{ $workflowStep->step_name }}</p>
</div>

