<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div id="role_id" class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', $roles, null, ['id' => 'role_id', 'class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
      {!! Form::label('password', 'Password Confirmation') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

