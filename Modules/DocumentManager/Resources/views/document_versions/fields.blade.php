<!-- Version Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version_number', 'Version Number:') !!}
    {!! Form::number('version_number', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Document Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_id', 'Document Id:') !!}
    {!! Form::select('document_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Document Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_url', 'Document Url:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('document_url', ['class' => 'custom-file-input']) !!}
            {!! Form::label('document_url', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::select('created_by', [], null, ['class' => 'form-control custom-select']) !!}
</div>