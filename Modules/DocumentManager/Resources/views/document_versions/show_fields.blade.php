<!-- Version Number Field -->
<div class="col-sm-12">
    {!! Form::label('version_number', 'Version Number:') !!}
    <p>{{ $documentVersion->version_number }}</p>
</div>

<!-- Document Id Field -->
<div class="col-sm-12">
    {!! Form::label('document_id', 'Document Id:') !!}
    <p>{{ $documentVersion->document_id }}</p>
</div>

<!-- Document Url Field -->
<div class="col-sm-12">
    {!! Form::label('document_url', 'Document Url:') !!}
    <p>{{ $documentVersion->document_url }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $documentVersion->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $documentVersion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $documentVersion->updated_at }}</p>
</div>

