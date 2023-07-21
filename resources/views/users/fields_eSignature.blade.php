<div class="col-sm-4">
    {!! Form::label('user_signature', 'User Signature') !!}
    <div class="form-group">
    {!! Form::file('user_signature',null, ['class' => 'form-control','accept'=>'image/*']) !!}
    </div>
</div>