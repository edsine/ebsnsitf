<div class="form-group row col-sm-12">
    <!-- Field Name Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('field_name', 'Field Name:') !!}
        {!! Form::text('form_field[0]["field_name"]', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Field Type Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('field_type_id', 'Field Type:') !!}
        {!! Form::select('form_field[0]["field_type_id"]', $field_types, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Field Label Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('field_label', 'Field Label:') !!}
        {!! Form::text('form_field[0]["field_label"]', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Field Options Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('field_options', 'Field Options:') !!}
        {!! Form::text('form_field[0]["field_options"]', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Is Required Field -->
    <div class="form-group col-sm-3">
        <div class="form-check">
            {!! Form::hidden('form_field[0]["is_required"]', 0, ['class' => 'form-check-input']) !!}
            {!! Form::checkbox('form_field[0]["is_required"]', '1', null, ['class' => 'form-check-input']) !!}
            {!! Form::label('is_required', 'Is Required', ['class' => 'form-check-label']) !!}
        </div>
    </div>

    <!-- Add Button -->
    <div class="form-group col-sm-3">
        {!! Form::button('Delete', ['class' => 'btn btn-danger']) !!}
    </div>

</div>



<!-- Add Button -->
<div class="form-group col-sm-12">
    {!! Form::button('Add New', ['class' => 'btn btn-success']) !!}
</div>
