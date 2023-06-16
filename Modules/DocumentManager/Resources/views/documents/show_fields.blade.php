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
    {!! Form::label('document_url', 'Document:') !!}
    <p><a target="_blank" href="{{ asset($document->document_url) }}">View</a></p>
</div>

<!-- Folder Id Field -->
<div class="col-sm-12">
    {!! Form::label('folder_id', 'Folder:') !!}
    <p>{{ $document->folder ? $document->folder->name : '' }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $document->createdBy ? $document->createdBy->name : '' }}</p>
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
