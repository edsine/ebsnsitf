@if (isset($user->first_name))
    

 <!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('first_name', 'First Name') !!}
    <p>{!! $user->first_name !!}</p>
</div>

<!-- Middle Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('middle_name', 'Middle Name') !!}
    <p>{!! $user->middle_name !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('last_name', 'Last Name') !!}
    <p>{!! $user->last_name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Role Field -->
<div class="col-sm-4">
    {!! Form::label('roles', 'Roles') !!}
    <div class="form-group">
        <p>{!! $user->roles !!}</p>
    </div>
</div>

<!-- My Groups Field -->
<div class="form-group col-sm-4">
    {!! Form::label('my_groups', 'My Groups') !!}
    <p>{!! $user->my_groups !!}</p>
</div>

<!-- Staff Form Fields -->
<div class="col-sm-12" id="staffDiv">
<div  style="display: flex;">

<!-- Department Field -->
<div class="col-sm-4">
    {!! Form::label('department_id', 'Department') !!}
    <div class="form-group">
        <p>{!! $user->department_id !!}</p>
    </div>
</div>

<!-- Branch Field -->
<div class="col-sm-4">
    {!! Form::label('branch_id', 'Branch') !!}
    <div class="form-group">
        <p>{!! $user->branch_id !!}</p>
    </div>
</div>

<!-- Dash Field -->
<div class="form-group col-sm-4">
    {!! Form::label('dash_type', 'Dash Type') !!}
    <p>{!! $user->dash_type !!}</p>
</div>
</div>

<div  style="display: flex;">
<!-- Gender Field -->
<div class="form-group col-sm-4">
    {!! Form::label('gender', 'Gender') !!}
    <div class="">
        <p>{!! $user->gender !!}</p>
    </div>

</div>

<!-- StaffID Field -->
<div class="form-group col-sm-4">
    {!! Form::label('staff_id', 'Staff ID') !!}
    <p>{!! $user->staff_id !!}</p>
</div>

<!-- Region Field -->
<div class="form-group col-sm-4">
    {!! Form::label('region', 'Region') !!}
    <p>{!! $user->region !!}</p>
</div>

</div>

<div  style="display: flex;">

    <!-- Phone Number Field -->
    <div class="col-sm-4">
        {!! Form::label('phone', 'Phone Number') !!}
        <div class="form-group">
            <p>{!! $user->phone !!}</p>
        </div>
    </div>
    
    <!-- Profile Picture Field -->
    <div class="col-sm-4">
        {!! Form::label('profile_picture', 'Profile Picture') !!}
        <div class="form-group">
            <p>
                <img style="width: 100px;height: 100px" src="{{ url('storage/') }}{!! '/'.$user->profile_picture !!}" alt="Image"></p>
        </div>
    </div>
    
    <!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', 'Status') !!}
    <div class="">
        <p>{!! $user->status !!}</p>
    </div>

</div>
</div>

<div  style="display: flex;">
    <!-- Alternate Email Address Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('alternative_email', 'Alternate Email Address') !!}
        <p>{!! $user->alternative_email !!}</p>
    </div>
    
    <!-- Created By Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_by', 'Created By') !!}
        <p>{!! $user->created_by !!}</p>
    </div>
    
    <!-- Date Approved Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('date_approved', 'Date Approved') !!}
        <p>{!! $user->date_approved !!}</p>
    </div>
    
</div>
<div  style="display: flex;">
    <!-- Approved By Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('approved_by', 'Approved By') !!}
        <p>{!! $user->approved_by !!}</p>
    </div>
    
    <!-- Security Key Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('security_key', 'Security Key') !!}
        <p>{!! $user->security_key !!}</p>
    </div>
    
    <!-- Date Modified Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('date_modified', 'Date Modified') !!}
        <p>{!! $user->date_modified !!}</p>
    </div>
    
</div>
<div  style="display: flex;">
    <!-- Modified By Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('modified_by', 'Modified By') !!}
        <p>{!! $user->modified_by !!}</p>
    </div>
    
    <!-- Office Position Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('office_position', 'Office Position') !!}
        <p>{!! $user->office_position !!}</p>
    </div>
    
    <!-- Position Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('position', 'Position') !!}
        <p>{!! $user->position !!}</p>
    </div>
    
</div>

<div  style="display: flex;">
    <!-- About Me Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('about_me', 'About Me') !!}
        <p>{!! $user->about_me !!}</p>
    </div>
    
    <!-- Total Received Email Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_received_email', 'Total Received Email') !!}
        <p>{!! $user->total_received_email !!}</p>
    </div>
    
    <!-- Total Sent Email Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_sent_email', 'Total Sent Email') !!}
        <p>{!! $user->total_sent_email !!}</p>
    </div>
    
</div>

<div  style="display: flex;">
    
    <!-- Total Draft Email Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_draft_email', 'Total Draft Email') !!}
        <p>{!! $user->total_draft_email !!}</p>
    </div>
    
    <!-- Total Event Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_event', 'Total Event') !!}
        <p>{!! $user->total_event !!}</p>
    </div>
    
    

</div>

</div>


@else
    <p>This user is not a staff!</p>
@endif
