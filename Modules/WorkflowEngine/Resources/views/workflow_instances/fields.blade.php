<!-- Workflow Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workflow_id', 'Workflow Id:') !!}
    {!! Form::number('workflow_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Started By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('started_by', 'Started By:') !!}
    {!! Form::number('started_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Completed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_completed', 'Date Completed:') !!}
    {!! Form::text('date_completed', null, ['class' => 'form-control','id'=>'date_completed']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_completed').datepicker()
    </script>
@endpush