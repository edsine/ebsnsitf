<!-- Department Unit Field -->
<div class="col-sm-12">
    {!! Form::label('department_unit', 'Department Unit:') !!}
    <p>{{ $department->department_unit }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}<br/>
     @if (isset($department->status) && $department->status == 1)
    <span class="btn btn-sm btn-success">Active</span>
@else
    <span class="btn btn-sm btn-danger">In-Active</span>
@endif
</div>


<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $department->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $department->updated_at }}</p>
</div>
