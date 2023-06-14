<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Middle Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('middle_name', 'Middle Name') !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['readonly' => true,'class' => 'form-control']) !!}
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

<!-- Role Field -->
<div class="col-sm-6">
    {!! Form::label('roles', 'Roles') !!}
    <div class="form-group">
    {!! Form::select('roles',$roles,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
      {!! Form::label('password_confirmation', 'Password Confirmation') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

