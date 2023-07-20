<!-- Subject Field -->
<div class="col-sm-12">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{{ $correspondence->subject }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $correspondence->date }}</p>
</div>

<!-- Sender Field -->
<div class="col-sm-12">
    {!! Form::label('sender', 'Sender:') !!}
    <p>{{ $correspondence->sender }}</p>
</div>

<!-- Reference Number Field -->
<div class="col-sm-12">
    {!! Form::label('reference_number', 'Reference Number:') !!}
    <p>{{ $correspondence->reference_number }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $correspondence->description }}</p>
</div>

<!-- Comments Field -->
<div class="col-sm-12">
    {!! Form::label('comments', 'Comments:') !!}
    <p>{{ $correspondence->comments }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $correspondence->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $correspondence->updated_at }}</p>
</div>

