<div class="form-section" id="section-1">

    <div class="form-group col-sm-6">
        {!! Form::label('type', 'SELECT LEAVE TYPE:') !!}
        {!! Form::select('type', $leavetype, null, ['class' => 'form-control form-select', 'required','id'=>'leave_type']) !!}
    
    </div>



    <div class="form-group  col-sm-6">
        {!! Form::label('date_last_leave', 'DATE RESUME FROM LAST LEAVE:') !!}
        {!! Form::date('date_last_leave', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group col-sm-6">
        {!! Form::label('date_start_new', 'DATE REQUESTED TO COMMENCE PRESENT LEAVE:') !!}
        {!! Form::date('date_start_new',  null, ['class' => 'form-control ','id'=>'date_start']) !!}
    </div>
    
    
    <div class="form-group col-sm-6">
        {!! Form::label('number_days', 'NUMBER OF DAYS:') !!}
        {!! Form::number('number_days',   null, ['class' => 'form-control ','readonly'=>true,'id'=>'number_days']) !!}
    </div>
    
        <div class="form-group col-sm-6">
            {!! Form::label('daystaken', 'Number of days to take:') !!}
            {!! Form::number('daystaken',  null, ['class' => 'form-control ','placeholder'=>'input the number of days to take','id'=>'days']) !!}
        </div>
    
    <div class="form-group col-sm-6">
        {!! Form::label('home_address', 'HOME ADDRESS:') !!}
        {!! Form::text('home_address',  null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('home_number', 'HOUSE NUMBER:') !!}
        {!! Form::text('home_number',  null, ['class' => 'form-control ']) !!}
    </div>




</div>



<div class="form-section" id="section-2">

    <div class="form-group col-sm-6">
        {!! Form::label('street_number', 'STREET NUMBER:') !!}
        {!! Form::text('street_number',  null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('district', 'DISTRICT:') !!}
        {!! Form::text('district',  null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('local_council', 'LOCAL COUNCIL/AREA COUNCIL:') !!}
        {!! Form::text('local_council',  null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('end_date', 'EXPECTED DATE TO RESUME:') !!}
        {!! Form::text('end_date',  null, ['class' => 'form-control ','placeholder'=>'the date for you to resume','id'=>'end_date','readonly'=>true]) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('state', 'STATE:') !!}
        {!! Form::select('state', getBranchRegions(), null, ['class' => 'form-control form-select ']) !!}
    </div>
    
    
    
    
    <div class="form-group col-sm-6">
        {!! Form::label('phone_number', 'PHONE NUMBER:') !!}
        {!! Form::text('phone_number',  null, ['class' => 'form-control ']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('officer_relieve', 'NAME OF OFFICER TO RELIEVE:') !!}
        {!! Form::text('officer_relieve',  null, ['class' => 'form-control ']) !!}
    </div>
    
    <!-- Signature Field -->
    <div class="col-sm-4 my-4">
        {!! Form::label('signature_path', 'UPLOAD SIGNATURE PDF ONLY') !!}
        <div class="form-group">
        {!! Form::file('signature_path',null, ['class' => 'form-control','accept' => 'image/*']) !!}
        </div>
    </div>
</div>







<!-- Description Field -->


@can(['approve as md_hr', 'approve as leave_officer', 'approve as supervisor_office','approve as approve_status'])
<!-- Regional Manager Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('md_hr', 'MD HR') !!}
    <div class="">
    {!! Form::radio('md_hr', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('md_hr', 0, true) !!}&nbsp;Unapproved
    </div>
</div>

<!-- Head Office Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_officer', 'Head Office Status') !!}
    <div class="">
    {!! Form::radio('leave_officer', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('leave_officer', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('supervisor_office', 'Supervisor OFFICER') !!}
    <div class="">
    {!! Form::radio('supervisor_office', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('supervisor_office', 0, true) !!}&nbsp;Unapproved
    </div>
</div>

<!-- APPROVE STATUS Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approve_status', 'Approved Status') !!}
    <div class="">
    {!! Form::radio('approve_status', 1, false) !!}&nbsp;Approved&nbsp;&nbsp;
    {!! Form::radio('approve_status', 0, true) !!}&nbsp;Unapproved
    </div>
</div>
@endcan

 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#leave_type').on('click', function() {
          const selectedId = $(this).val();          
       if (selectedId !== '') {
                    $.ajax({
                        url: `http://localhost:8000/leave_request_data/get-data/${selectedId}`,
                        type: 'GET',
                        data: {id: selectedId},
                        dataType: 'json',
                        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(response) {
                            var du = JSON.stringify(response.duration);
                            $('#number_days').val('');
                            $('#number_days').val(du);
                            
                        },
                        error: function() {
                            alert('Failed to retrieve duration.');
                        }
                    });
                } else {
                    $('#number_days').val('');
                }
            });
        });
    </script>

<script>
    let btn=document.getElementById('leave_type')
    btn.addEventListener('click',()=>{
        
        
    
        
        //document.getElementById('end_date').value=new Date.now();
    })
    let nextbtn= document.getElementById('next-button');
nextbtn.addEventListener('change',()=>{
    


   })
   
</script> 

<script>
    let number_values=document.getElementById('number_days');
</script>




<script>
    // Wait for the DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
      // Get all the form sections
      const formSections = document.querySelectorAll('.form-section');
  
      // Get the "Next" button
      const nextButton = document.getElementById('next-button');
  
      // Keep track of the current section index
      let currentSectionIndex = 0;
  
      // Function to show the next section
      function showNextSection() {
        // Hide the current section
        formSections[currentSectionIndex].style.display = 'none';
  
        // Increment the current section index
        currentSectionIndex++;
  
        // Show the next section
        if (currentSectionIndex < formSections.length) {
          formSections[currentSectionIndex].style.display = 'block';
        }
  
        // If we are at the last section, hide the "Next" button
        if (currentSectionIndex === formSections.length - 1) {
          nextButton.style.display = 'none';
        }
      }
      // using the nextbtn to do the content here
      nextButton.addEventListener('click',()=>{
        let days= document.getElementById('number_days').value;
    let date_to_resume =document.getElementById('end_date');
    let date_start_new =document.getElementById('date_start').value;
    let daystaken=document.getElementById('daystaken').value;

    // getting all values of days and number
    let datestart = new Date(date_start_new);
datestart.setDate(datestart.getDate()+daystaken)
const newdate=datestart.toISOString().slice(0,10);

// alert('jsjjjjjjjjj')
    
        
      })
      // Add a click event listener to the "Next" button
      nextButton.addEventListener('click', showNextSection);
    });
  </script>
  