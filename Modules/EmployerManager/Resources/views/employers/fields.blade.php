<!-- User Id Field -->
<div class="form-group col-sm-6">
    <div class="form-group">
        <div class="form-label mb-2">@lang('Employer') ( <small class="help-block text-success">@lang('Select an employer user')</small>) </div>
        <select name="user_id" class="form-control" required="">
            @foreach($employers as $item)
                <option value="{{ $item->id }}">{{ $item->name ." " . $item->last_name . " - ". $item->email }}</option>
            @endforeach
        </select>
    </div>
</div>

<!-- Ecs Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ecs_number', 'ECS Number:') !!}
    {!! Form::text('ecs_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_name', 'Company Name:') !!}
    {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_email', 'Company Email:') !!}
    {!! Form::email('company_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('company_address', 'Company Address:') !!}
    {!! Form::textarea('company_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Rcnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_rcnumber', 'Company Rcnumber:') !!}
    {!! Form::text('company_rcnumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_phone', 'Company Phone:') !!}
    {!! Form::number('company_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Localgovt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_localgovt', 'Company Localgovt:') !!}
    {!! Form::text('company_localgovt', null, ['class' => 'form-control']) !!}
</div>

<!-- Company State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_state', 'Company State:') !!}
    {!! Form::text('company_state', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_area', 'Business Area:') !!}
    {!! Form::text('business_area', null, ['class' => 'form-control']) !!}
</div>

<!-- Inspection Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inspection_status', 'Inspection Status:') !!}
    {!! Form::text('inspection_status', null, ['class' => 'form-control']) !!}
</div>