<!-- Employer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employer_id', 'Employer Id:') !!}
    {!! Form::text('employer_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Middle Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('middle_name', 'Middle Name:') !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Of Birth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_of_birth', 'Date Of Birth:') !!}
    {!! Form::text('date_of_birth', null, ['class' => 'form-control','id'=>'date_of_birth']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_of_birth').datepicker()
    </script>
@endpush

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control']) !!}
</div>

<!-- Marital Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    {!! Form::text('marital_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Employment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employment_date', 'Employment Date:') !!}
    {!! Form::text('employment_date', null, ['class' => 'form-control','id'=>'employment_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#employment_date').datepicker()
    </script>
@endpush

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Local Govt Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('local_govt_area', 'Local Govt Area:') !!}
    {!! Form::text('local_govt_area', null, ['class' => 'form-control']) !!}
</div>

<!-- State Of Origin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state_of_origin', 'State Of Origin:') !!}
    {!! Form::text('state_of_origin', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::number('phone_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Means Of Identification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('means_of_identification', 'Means Of Identification:') !!}
    {!! Form::text('means_of_identification', null, ['class' => 'form-control']) !!}
</div>

<!-- Identity Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identity_number', 'Identity Number:') !!}
    {!! Form::number('identity_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Identity Issue Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identity_issue_date', 'Identity Issue Date:') !!}
    {!! Form::text('identity_issue_date', null, ['class' => 'form-control','id'=>'identity_issue_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#identity_issue_date').datepicker()
    </script>
@endpush

<!-- Identity Expiry Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identity_expiry_date', 'Identity Expiry Date:') !!}
    {!! Form::text('identity_expiry_date', null, ['class' => 'form-control','id'=>'identity_expiry_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#identity_expiry_date').datepicker()
    </script>
@endpush

<!-- Next Of Kin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_of_kin', 'Next Of Kin:') !!}
    {!! Form::text('next_of_kin', null, ['class' => 'form-control']) !!}
</div>

<!-- Next Of Kin Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('next_of_kin_phone', 'Next Of Kin Phone:') !!}
    {!! Form::number('next_of_kin_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Monthly Renumeration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monthly_renumeration', 'Monthly Renumeration:') !!}
    {!! Form::text('monthly_renumeration', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>