<!-- Field Type Field -->
<div class="col-sm-12">
    {!! Form::label('field_type', __('models/fieldTypes.fields.field_type').':') !!}
    <p>{{ $fieldType->field_type }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/fieldTypes.fields.created_at').':') !!}
    <p>{{ $fieldType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/fieldTypes.fields.updated_at').':') !!}
    <p>{{ $fieldType->updated_at }}</p>
</div>

