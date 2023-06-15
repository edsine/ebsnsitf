<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Folder Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('folder_id', 'Folder:') !!}
    {!! Form::select('folder_id', $folders, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Document Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'Upload file:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input']) !!}
            {!! Form::label('file', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- Created By Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::select('created_by', [], null, ['class' => 'form-control custom-select']) !!}
</div> --}}
