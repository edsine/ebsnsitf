<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $memo->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $memo->description }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $memo->createdBy ? $memo->createdBy->first_name : '' }}</p>
</div>

<!-- Document Id Field -->
<div class="col-sm-12">
    {!! Form::label('document_id', 'Document URL:') !!}
    @php
        $latestDocumentUrl = $memo->document
            ->documentVersions()
            ->latest()
            ->first()
            ? $memo->document
                ->documentVersions()
                ->latest()
                ->first()->document_url
            : '#';
    @endphp
    {{-- <p>{{ $latestDocumentUrl }}</p> --}}
    <a target="_blank" href="{{ asset($latestDocumentUrl) }}">
        <p>View</p>
    </a>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $memo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $memo->updated_at }}</p>
</div>
