<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $document->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $document->description }}</p>
</div>

<!-- Document Url Field -->
<div class="col-sm-12">
    {!! Form::label('document_url', 'Document Url:') !!}
    <p>{{ $document->document_url }}</p>
</div>

<!-- Folder Id Field -->
<div class="col-sm-12">
    {!! Form::label('folder_id', 'Folder:') !!}
    <p>{{ $document->folder_id }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $document->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $document->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $document->updated_at }}</p>
</div>

