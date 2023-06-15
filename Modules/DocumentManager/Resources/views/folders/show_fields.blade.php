<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $folder->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $folder->description }}</p>
</div>

<!-- Parent Folder Id Field -->
<div class="col-sm-12">
    {!! Form::label('parent_folder_id', 'Parent Folder:') !!}
    <p>{{ $folder->parentFolder ? $folder->parentFolder->name : '' }}</p>
</div>

<!-- Branch Id Field -->
<div class="col-sm-12">
    {!! Form::label('branch_id', 'Branch:') !!}
    <p>{{ $folder->branch ? $folder->branch->branch_name : '' }}</p>
</div>

<!-- Department Id Field -->
<div class="col-sm-12">
    {!! Form::label('department_id', 'Department:') !!}
    <p>{{ $folder->department ? $folder->department->name : '' }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $folder->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $folder->updated_at }}</p>
</div>
